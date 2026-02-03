<?php

namespace Tests\Feature;

use App\Models\Paket;
use App\Models\Pelanggan;
use App\Models\Tagihan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class TagihanAutomationTest extends TestCase
{
    use RefreshDatabase;

    public function test_generate_tagihan_creates_one_per_pelanggan_per_periode(): void
    {
        Paket::query()->create([
            'Id_Produk' => 'PKT-001',
            'Nama_Produk' => 'Paket A',
            'Jenis_Produk' => 'Internet',
            'Deskripsi_Produk' => 'Test',
            'Harga_Produk' => 'Rp 150.000',
        ]);

        $p1 = Pelanggan::query()->create([
            'nama_lengkap' => 'A',
            'paket' => 'Paket A',
            'nomor_telepon' => '08123456789',
            'alamat' => 'Alamat 1',
            'jatuh_tempo' => now()->toDateString(),
        ]);

        $p2 = Pelanggan::query()->create([
            'nama_lengkap' => 'B',
            'paket' => 'Paket A',
            'nomor_telepon' => '08123456780',
            'alamat' => 'Alamat 2',
            'jatuh_tempo' => now()->toDateString(),
        ]);

        $periode = now()->format('Y-m');

        $this->artisan('tagihan:generate', ['--periode' => $periode])
            ->assertExitCode(0);

        $this->assertDatabaseCount('tagihan', 2);
        $this->assertDatabaseHas('tagihan', [
            'pelanggan_id' => $p1->id,
            'periode' => $periode,
            'status' => 'unpaid',
            'nominal' => 150000,
        ]);
        $this->assertDatabaseHas('tagihan', [
            'pelanggan_id' => $p2->id,
            'periode' => $periode,
            'status' => 'unpaid',
            'nominal' => 150000,
        ]);

        // Jalankan ulang tidak membuat duplikat (unique pelanggan_id+periode)
        $this->artisan('tagihan:generate', ['--periode' => $periode])
            ->assertExitCode(0);

        $this->assertDatabaseCount('tagihan', 2);
    }

    public function test_reminder_command_sends_once_and_sets_sent_at(): void
    {
        config()->set('services.wablas.token', 'test-token');
        config()->set('services.wablas.base_url', 'https://example.test');
        config()->set('services.wablas.device_id', null);

        Http::fake([
            'https://example.test/api/send-message' => Http::response(['status' => true], 200),
        ]);

        $p = Pelanggan::query()->create([
            'nama_lengkap' => 'C',
            'paket' => 'Paket A',
            'nomor_telepon' => '08123456781',
            'alamat' => 'Alamat 3',
            'jatuh_tempo' => now()->toDateString(),
        ]);

        $t = Tagihan::query()->create([
            'pelanggan_id' => $p->id,
            'periode' => now()->format('Y-m'),
            'jatuh_tempo' => now()->toDateString(),
            'nominal' => 1000,
            'status' => 'unpaid',
        ]);

        $this->artisan('tagihan:remind')->assertExitCode(0);

        $t->refresh();
        $this->assertNotNull($t->reminder_h_sent_at);

        Http::assertSentCount(1);

        // Run again should not send again (kolom sudah terisi)
        $this->artisan('tagihan:remind')->assertExitCode(0);
        Http::assertSentCount(1);
    }
}

