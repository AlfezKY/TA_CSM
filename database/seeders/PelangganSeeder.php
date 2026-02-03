<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pelanggan = [
            [
                'nama_lengkap' => 'Ahmad Rizki Pratama',
                'paket' => 'Paket Internet 50 Mbps',
                'nomor_telepon' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 123, RT 05/RW 02, Kelurahan Sukajadi, Kecamatan Sukajadi, Bandung',
                'jatuh_tempo' => Carbon::now()->addDays(15)->format('Y-m-d'),
                'status_pembayaran' => 'Belum Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Siti Nurhaliza',
                'paket' => 'Paket Internet 100 Mbps',
                'nomor_telepon' => '082345678901',
                'alamat' => 'Jl. Gatot Subroto No. 45, RT 03/RW 01, Kelurahan Cikini, Kecamatan Menteng, Jakarta Pusat',
                'jatuh_tempo' => Carbon::now()->addDays(20)->format('Y-m-d'),
                'status_pembayaran' => 'Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),  
            ],
            [
                'nama_lengkap' => 'Budi Santoso',
                'paket' => 'Paket Internet 30 Mbps',
                'nomor_telepon' => '083456789012',
                'alamat' => 'Jl. Diponegoro No. 78, RT 02/RW 03, Kelurahan Kebon Jeruk, Kecamatan Kebon Jeruk, Jakarta Barat',
                'jatuh_tempo' => Carbon::now()->addDays(10)->format('Y-m-d'),
                'status_pembayaran' => 'Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Dewi Lestari',
                'paket' => 'Paket Internet 200 Mbps',
                'nomor_telepon' => '084567890123',
                'alamat' => 'Jl. Sudirman No. 12, RT 01/RW 04, Kelurahan Senayan, Kecamatan Kebayoran Baru, Jakarta Selatan',
                'jatuh_tempo' => Carbon::now()->addDays(25)->format('Y-m-d'),
                'status_pembayaran' => 'Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Eko Wijaya',
                'paket' => 'Paket Internet 50 Mbps',
                'nomor_telepon' => '085678901234',
                'alamat' => 'Jl. Thamrin No. 89, RT 04/RW 02, Kelurahan Menteng, Kecamatan Menteng, Jakarta Pusat',
                'jatuh_tempo' => Carbon::now()->addDays(18)->format('Y-m-d'),
                'status_pembayaran' => 'Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Fitri Handayani',
                'paket' => 'Paket Internet 75 Mbps',
                'nomor_telepon' => '086789012345',
                'alamat' => 'Jl. Asia Afrika No. 56, RT 06/RW 01, Kelurahan Braga, Kecamatan Sumur Bandung, Bandung',
                'jatuh_tempo' => Carbon::now()->addDays(22)->format('Y-m-d'),
                'status_pembayaran' => 'Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Gunawan Setiawan',
                'paket' => 'Paket Internet 30 Mbps',
                'nomor_telepon' => '087890123456',
                'alamat' => 'Jl. Ahmad Yani No. 34, RT 03/RW 05, Kelurahan Cipete, Kecamatan Cilandak, Jakarta Selatan',
                'jatuh_tempo' => Carbon::now()->addDays(12)->format('Y-m-d'),
                'status_pembayaran' => 'Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Hani Permata Sari',
                'paket' => 'Paket Internet 100 Mbps',
                'nomor_telepon' => '088901234567',
                'alamat' => 'Jl. HR Rasuna Said No. 67, RT 05/RW 03, Kelurahan Kuningan, Kecamatan Setiabudi, Jakarta Selatan',
                'jatuh_tempo' => Carbon::now()->addDays(28)->format('Y-m-d'),
                'status_pembayaran' => 'Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Indra Kurniawan',
                'paket' => 'Paket Internet 50 Mbps',
                'nomor_telepon' => '089012345678',
                'alamat' => 'Jl. Kebon Sirih No. 23, RT 02/RW 04, Kelurahan Kebon Sirih, Kecamatan Menteng, Jakarta Pusat',
                'jatuh_tempo' => Carbon::now()->addDays(16)->format('Y-m-d'),
                'status_pembayaran' => 'Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nama_lengkap' => 'Joko Widodo',
                'paket' => 'Paket Internet 150 Mbps',
                'nomor_telepon' => '081123456789',
                'alamat' => 'Jl. Jenderal Sudirman No. 90, RT 01/RW 01, Kelurahan Karet Tengsin, Kecamatan Tanah Abang, Jakarta Pusat',
                'jatuh_tempo' => Carbon::now()->addDays(30)->format('Y-m-d'),
                'status_pembayaran' => 'Lunas',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('pelanggan')->insert($pelanggan);
    }
}
