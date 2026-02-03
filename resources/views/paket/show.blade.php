@extends('layouts.dashboard')

@section('title', config('app.name', 'Laravel') . ' - Detail Paket')
@section('page_title', 'Detail Paket')
@section('page_subtitle', 'Lihat informasi paket')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">ID</label>
                <p class="text-sm text-gray-900">{{ $paket->id }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">ID Produk</label>
                <p class="text-sm text-gray-900 font-medium">{{ $paket->Id_Produk }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
                <p class="text-sm text-gray-900 font-medium">{{ $paket->Nama_Produk }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Produk</label>
                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                    {{ $paket->Jenis_Produk }}
                </span>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Produk</label>
                <p class="text-sm text-gray-900">{{ $paket->Deskripsi_Produk }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Harga Produk</label>
                <p class="text-sm text-gray-900 font-semibold text-lg">{{ $paket->Harga_Produk }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Dibuat</label>
                <p class="text-sm text-gray-900">{{ $paket->created_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
            <a href="{{ route('paket.edit', $paket->id) }}" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition text-sm font-medium">
                Edit
            </a>
            <a href="{{ route('paket.index') }}" class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition text-sm font-medium">
                Kembali
            </a>
        </div>
    </div>
@endsection

