<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Paket;
use Illuminate\Http\Request;

class PaketController extends Controller
{
    public function index()
    {
        // Urutkan berdasarkan Id_Produk secara ascending
        // Extract angka dari Id_Produk untuk sorting yang benar (PKT-001, PKT-002, dll)
        $paket = Paket::orderByRaw("CAST(SUBSTRING(Id_Produk, 5) AS UNSIGNED) ASC")->get();
        return view('paket.index', compact('paket'));
    }

    private function generateNextIdProduk()
    {
        // Ambil semua paket dan extract angka ID-nya
        $allPaket = Paket::all();
        $usedNumbers = [];
        
        foreach ($allPaket as $paket) {
            if (preg_match('/PKT-(\d+)/', $paket->Id_Produk, $matches)) {
                $usedNumbers[] = (int)$matches[1];
            }
        }
        
        // Jika belum ada paket, mulai dari 1
        if (empty($usedNumbers)) {
            return 'PKT-001';
        }
        
        // Cari gap (angka yang hilang)
        sort($usedNumbers);
        $maxNumber = max($usedNumbers);
        
        // Cari gap dari 1 sampai maxNumber
        for ($i = 1; $i <= $maxNumber; $i++) {
            if (!in_array($i, $usedNumbers)) {
                return 'PKT-' . str_pad($i, 3, '0', STR_PAD_LEFT);
            }
        }
        
        // Jika tidak ada gap, increment dari yang terakhir
        $nextNumber = $maxNumber + 1;
        return 'PKT-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
    }

    public function create()
    {
        // Generate ID Produk otomatis dengan mengisi gap terlebih dahulu
        $nextId = $this->generateNextIdProduk();
        
        return view('paket.create', compact('nextId'));
    }

    public function store(Request $request)
    {
        // Generate ID Produk otomatis dengan mengisi gap terlebih dahulu
        $nextId = $this->generateNextIdProduk();
        
        // Override Id_Produk dengan yang di-generate
        $request->merge(['Id_Produk' => $nextId]);
        
        Paket::create($request->validate([
            'Id_Produk' => 'required|string|max:50|unique:paket,Id_Produk',
            'Nama_Produk' => 'required|string|max:100',
            'Jenis_Produk' => 'required|string|max:50',
            'Deskripsi_Produk' => 'required|string',
            'Harga_Produk' => 'required|string|max:50',
        ]));
        
        return redirect()->route('paket.index')->with('success', 'Paket berhasil ditambahkan');
    }

    public function show(string $id)
    {
        $paket = Paket::findOrFail($id);
        return view('paket.show', compact('paket'));
    }

    public function edit(string $id)
    {
        $paket = Paket::findOrFail($id);
        return view('paket.edit', compact('paket'));
    }

    public function update(Request $request, string $id)
    {
        $paket = Paket::findOrFail($id);
        $paket->update($request->validate([
            'Id_Produk' => 'required|string|max:50|unique:paket,Id_Produk,' . $id,
            'Nama_Produk' => 'required|string|max:100',
            'Jenis_Produk' => 'required|string|max:50',
            'Deskripsi_Produk' => 'required|string',
            'Harga_Produk' => 'required|string|max:50',
        ]));
        
        return redirect()->route('paket.index')->with('success', 'Paket berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $paket = Paket::findOrFail($id);
        $paket->delete();
        return redirect()->route('paket.index')->with('success', 'Paket berhasil dihapus');
    }
}
