<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Paket;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total pelanggan
        $totalPelanggan = Pelanggan::count();
        
        // Hitung total paket
        $totalPaket = Paket::count();
        
        // Hitung total tagihan (berdasarkan pelanggan yang statusnya 'Belum Lunas')
        $totalTagihan = Pelanggan::where('status_pembayaran', 'Belum Lunas')->count();
        
        // Hitung tagihan yang belum lunas (status bukan 'paid' atau null)
        $tagihanBelumLunas = Tagihan::query()
            ->where(function($query) {
                $query->where('status', '!=', 'paid')
                      ->orWhereNull('status');
            })
            ->count();

        return view('dashboard', [
            'totalPelanggan' => $totalPelanggan,
            'totalPaket' => $totalPaket,
            'totalTagihan' => $totalTagihan,
            'tagihanBelumLunas' => $tagihanBelumLunas,
        ]);
    }
}
