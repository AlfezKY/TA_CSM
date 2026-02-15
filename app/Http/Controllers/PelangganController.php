<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\Paket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $query = Pelanggan::query();
        
        // Filter berdasarkan nama pelanggan jika ada parameter search
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_lengkap', 'like', '%' . $request->search . '%');
        }
        
        $pelanggan = $query->orderBy('created_at', 'desc')->get();
        return view('pelanggan.index', compact('pelanggan'));
    }

    public function create()
    {
        $paket = Paket::orderBy('Nama_Produk')->get();
        return view('pelanggan.create', compact('paket'));
    }

    public function store(Request $request)
    {
        Pelanggan::create($request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'paket' => 'required|string|max:50',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jatuh_tempo' => 'required|date',
            'status_pembayaran' => 'required|string|in:Belum Lunas,Lunas',
        ]));
        
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('pelanggan.show', compact('pelanggan'));
    }

    public function edit(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $paket = Paket::orderBy('Nama_Produk')->get();
        return view('pelanggan.edit', compact('pelanggan', 'paket'));
    }

    public function update(Request $request, string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($request->validate([
            'nama_lengkap' => 'required|string|max:100',
            'paket' => 'required|string|max:50',
            'nomor_telepon' => 'required|string|max:20',
            'alamat' => 'required|string',
            'jatuh_tempo' => 'required|date',
            'status_pembayaran' => 'required|string|in:Belum Lunas,Lunas',
        ]));
        
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        return redirect()->route('pelanggan.index')->with('success', 'Pelanggan berhasil dihapus');
    }
}
