<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TagihanController extends Controller
{
    /**
     * Menampilkan daftar pelanggan jatuh tempo (tagihan belum dibayar).
     */
    public function index(): View
    {
        $pelanggan = Pelanggan::jatuhTempo()->orderBy('jatuh_tempo')->get();

        return view('tagihan.index', compact('pelanggan'));
    }

    /**
     * Tandai pelanggan lunas: update status dan geser jatuh tempo berdasarkan bulan yang dipilih.
     */
    public function tandaiLunas(int $id): RedirectResponse
    {
        $pelanggan = Pelanggan::findOrFail($id);
        
        // Validasi bulan (1-12)
        $bulan = request()->validate([
            'bulan' => 'required|integer|min:1|max:12',
        ])['bulan'];
        
        // Hitung hari: bulan * 30 hari
        $hari = $bulan * 30;
        
        // Update status dan tambahkan hari ke jatuh tempo
        $pelanggan->update([
            'status_pembayaran' => 'Lunas',
            'jatuh_tempo' => Carbon::parse($pelanggan->jatuh_tempo)->addDays($hari),
        ]);

        return redirect()->route('tagihan.index')
            ->with('success', "Pelanggan berhasil ditandai lunas. Jatuh tempo ditambah {$bulan} bulan (+{$hari} hari).");
    }
}
