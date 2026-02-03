<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paket = [
            [
                'Id_Produk' => 'PKT-001',
                'Nama_Produk' => 'Paket Hemat',
                'Jenis_Produk' => '10Mbps',
                'Deskripsi_Produk' => 'Paket hemat cocok digunakan untuk satu orang pengguna',
                'Harga_Produk' => 'Rp.150.000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id_Produk' => 'PKT-002',
                'Nama_Produk' => 'Paket Sedang',
                'Jenis_Produk' => '20Mbps',
                'Deskripsi_Produk' => 'Paket sedang cocok untuk digunakan keluarga kecil',
                'Harga_Produk' => 'Rp.200.000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id_Produk' => 'PKT-003',
                'Nama_Produk' => 'Paket Senyum',
                'Jenis_Produk' => '30Mbps',
                'Deskripsi_Produk' => 'Paket senyum cocok digunakan untuk keluarga 5-6 orang',
                'Harga_Produk' => 'Rp.250.000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'Id_Produk' => 'PKT-004',
                'Nama_Produk' => 'Paket Bahagia',
                'Jenis_Produk' => '50Mbps',
                'Deskripsi_Produk' => 'Paket Bahagia cocok digunakan untuk semua keluarga',
                'Harga_Produk' => 'Rp.350.000',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('paket')->insert($paket);
    }
}
