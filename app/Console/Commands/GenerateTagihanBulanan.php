<?php

namespace App\Console\Commands;

use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class GenerateTagihanBulanan extends Command
{
    protected $signature = 'tagihan:generate {--periode= : Format YYYY-MM (default: bulan ini)} {--dry-run : Jangan simpan perubahan}';

    protected $description = 'Generate/update tagihan periode berjalan untuk semua pelanggan';

    public function handle(): int
    {
        $periode = $this->option('periode') ?: now()->format('Y-m');
        $dryRun = (bool) $this->option('dry-run');

        if (!preg_match('/^\d{4}-\d{2}$/', (string) $periode)) {
            $this->error('Periode tidak valid. Gunakan format YYYY-MM.');
            return self::FAILURE;
        }

        $pelangganList = Pelanggan::query()->get();
        $this->info("Generate tagihan untuk periode {$periode} (pelanggan: {$pelangganList->count()})" . ($dryRun ? ' [DRY RUN]' : ''));

        $created = 0;
        $updated = 0;

        foreach ($pelangganList as $p) {
            $nominal = $this->resolveNominal($p->paket);
            $jatuhTempo = $p->jatuh_tempo instanceof Carbon ? $p->jatuh_tempo : Carbon::parse($p->jatuh_tempo);

            $attrs = [
                'jatuh_tempo' => $jatuhTempo->toDateString(),
                'nominal' => $nominal,
                'status' => 'unpaid',
            ];

            if ($dryRun) {
                $exists = Tagihan::query()
                    ->where('pelanggan_id', $p->id)
                    ->where('periode', $periode)
                    ->exists();
                $exists ? $updated++ : $created++;
                continue;
            }

            $tagihan = Tagihan::query()->updateOrCreate(
                ['pelanggan_id' => $p->id, 'periode' => $periode],
                $attrs
            );

            $tagihan->wasRecentlyCreated ? $created++ : $updated++;
        }

        $this->info("Selesai. created={$created}, updated={$updated}");
        return self::SUCCESS;
    }

    private function resolveNominal(?string $namaPaket): int
    {
        $namaPaket = trim((string) $namaPaket);
        if ($namaPaket === '') {
            return 0;
        }

        $paket = Paket::query()
            ->where('Nama_Produk', $namaPaket)
            ->first();

        if (!$paket) {
            return 0;
        }

        return $this->parseHargaToInt((string) $paket->Harga_Produk);
    }

    private function parseHargaToInt(string $raw): int
    {
        // Ambil digit saja, mis: "Rp 150.000" => "150000"
        $digits = preg_replace('/\D+/', '', $raw) ?? '';
        if ($digits === '') {
            return 0;
        }

        // Hindari overflow aneh
        return (int) Str::of($digits)->limit(18, '')->toString();
    }
}

