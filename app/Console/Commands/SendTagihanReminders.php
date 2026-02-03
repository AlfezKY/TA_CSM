<?php

namespace App\Console\Commands;

use App\Models\Tagihan;
use App\Services\WablasClient;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class SendTagihanReminders extends Command
{
    protected $signature = 'tagihan:remind {--dry-run : Jangan mengirim WA / jangan update sent_at}';

    protected $description = 'Kirim WhatsApp reminder tagihan H-1/H/H+1 via Wablas (sekali per kategori)';

    public function handle(WablasClient $wablas): int
    {
        $dryRun = (bool) $this->option('dry-run');

        $today = now()->startOfDay();

        $buckets = [
            'hmin1' => [
                'label' => 'H-1',
                'date' => (clone $today)->addDay(),
                'column' => 'reminder_hmin1_sent_at',
            ],
            'h' => [
                'label' => 'H',
                'date' => (clone $today),
                'column' => 'reminder_h_sent_at',
            ],
            'hplus1' => [
                'label' => 'H+1',
                'date' => (clone $today)->subDay(),
                'column' => 'reminder_hplus1_sent_at',
            ],
        ];

        $totalSent = 0;

        foreach ($buckets as $key => $bucket) {
            $date = $bucket['date']->toDateString();
            $col = $bucket['column'];

            $tagihanList = Tagihan::query()
                ->with('pelanggan')
                ->where('status', 'unpaid')
                ->whereDate('jatuh_tempo', $date)
                ->whereNull($col)
                ->get();

            $this->info("Bucket {$bucket['label']} ({$date}): {$tagihanList->count()} tagihan" . ($dryRun ? ' [DRY RUN]' : ''));

            foreach ($tagihanList as $t) {
                if (!$t->pelanggan) {
                    continue;
                }

                $msg = $this->buildMessage($t->pelanggan->nama_lengkap, $t->periode, (int) $t->nominal, $t->jatuh_tempo);

                if ($dryRun) {
                    $totalSent++;
                    continue;
                }

                try {
                    $wablas->sendMessage($t->pelanggan->nomor_telepon, $msg);
                    $t->forceFill([$col => now()])->save();
                    $totalSent++;
                } catch (\Throwable $e) {
                    Log::warning('WA reminder failed', [
                        'bucket' => $key,
                        'tagihan_id' => $t->id,
                        'pelanggan_id' => $t->pelanggan_id,
                        'error' => $e->getMessage(),
                    ]);
                    $this->warn("Gagal kirim tagihan_id={$t->id}: " . $e->getMessage());
                }
            }
        }

        $this->info("Selesai. total_sent={$totalSent}" . ($dryRun ? ' (dry-run)' : ''));
        return self::SUCCESS;
    }

    private function buildMessage(string $nama, string $periode, int $nominal, $jatuhTempo): string
    {
        $jt = $jatuhTempo instanceof Carbon ? $jatuhTempo : Carbon::parse($jatuhTempo);
        $nominalFmt = number_format($nominal, 0, ',', '.');

        return "Halo {$nama},\n\n"
            . "Ini adalah pengingat tagihan periode {$periode}.\n"
            . "Nominal: Rp {$nominalFmt}\n"
            . "Jatuh tempo: " . $jt->format('d M Y') . "\n\n"
            . "Mohon segera melakukan pembayaran. Terima kasih.";
    }
}

