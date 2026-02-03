@extends('layouts.dashboard')

@section('title', config('app.name', 'Laravel') . ' - Detail Pelanggan')
@section('page_title', 'Detail Pelanggan')
@section('page_subtitle', 'Lihat informasi pelanggan')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">ID Pelanggan</label>
                <p class="text-sm text-gray-900">{{ $pelanggan->id }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <p class="text-sm text-gray-900 font-medium">{{ $pelanggan->nama_lengkap }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Paket</label>
                <span class="inline-block px-3 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                    {{ $pelanggan->paket }}
                </span>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor Telepon</label>
                <p class="text-sm text-gray-900">{{ $pelanggan->nomor_telepon }}</p>
            </div>
            <div class="md:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                <p class="text-sm text-gray-900">{{ $pelanggan->alamat }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jatuh Tempo</label>
                <p class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($pelanggan->jatuh_tempo)->format('d M Y') }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Status Pembayaran</label>
                @if($pelanggan->status_pembayaran)
                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full
                        @if($pelanggan->status_pembayaran === 'Lunas')
                            bg-green-100 text-green-800
                        @elseif($pelanggan->status_pembayaran === 'Belum Lunas')
                            bg-amber-100 text-amber-800
                        @else
                            bg-gray-100 text-gray-800
                        @endif">
                        {{ $pelanggan->status_pembayaran }}
                    </span>
                @else
                    <span class="inline-flex items-center px-3 py-1 text-xs font-semibold rounded-full bg-gray-100 text-gray-800">
                        Belum Lunas
                    </span>
                @endif
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Dibuat</label>
                <p class="text-sm text-gray-900">{{ $pelanggan->created_at->format('d M Y H:i') }}</p>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Terakhir Diupdate</label>
                <p class="text-sm text-gray-900">{{ $pelanggan->updated_at->format('d M Y H:i') }}</p>
            </div>
        </div>

        <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
            <a href="{{ route('pelanggan.edit', $pelanggan->id) }}" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition text-sm font-medium">
                Edit
            </a>
            <a href="{{ route('pelanggan.index') }}" class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition text-sm font-medium">
                Kembali
            </a>
        </div>
    </div>
@endsection

