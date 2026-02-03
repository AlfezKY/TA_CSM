@extends('layouts.dashboard')

@section('title', config('app.name', 'Laravel') . ' - Edit Pelanggan')
@section('page_title', 'Edit Pelanggan')
@section('page_subtitle', 'Ubah data pelanggan')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="POST" action="{{ route('pelanggan.update', $pelanggan->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $pelanggan->nama_lengkap) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('nama_lengkap')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="paket" class="block text-sm font-medium text-gray-700 mb-2">Paket</label>
                    <select name="paket" id="paket" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Paket --</option>
                        @foreach($paket as $item)
                            <option value="{{ $item->Nama_Produk }}" {{ old('paket', $pelanggan->paket) == $item->Nama_Produk ? 'selected' : '' }}>
                                {{ $item->Nama_Produk }} - {{ $item->Jenis_Produk }} ({{ $item->Harga_Produk }})
                            </option>
                        @endforeach
                    </select>
                    @error('paket')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="nomor_telepon" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                    <input type="text" name="nomor_telepon" id="nomor_telepon" value="{{ old('nomor_telepon', $pelanggan->nomor_telepon) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('nomor_telepon')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="jatuh_tempo" class="block text-sm font-medium text-gray-700 mb-2">Jatuh Tempo</label>
                    <input type="date" name="jatuh_tempo" id="jatuh_tempo" value="{{ old('jatuh_tempo', $pelanggan->jatuh_tempo->format('Y-m-d')) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('jatuh_tempo')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="status_pembayaran" class="block text-sm font-medium text-gray-700 mb-2">Status Pembayaran</label>
                    <select name="status_pembayaran" id="status_pembayaran" required
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                        <option value="">-- Pilih Status --</option>
                        <option value="Belum Lunas" {{ old('status_pembayaran', $pelanggan->status_pembayaran) == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                        <option value="Lunas" {{ old('status_pembayaran', $pelanggan->status_pembayaran) == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                    </select>
                    @error('status_pembayaran')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('alamat', $pelanggan->alamat) }}</textarea>
                    @error('alamat')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <a href="{{ route('pelanggan.index') }}" class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition text-sm font-medium">
                    Kembali
                </a>
                <button type="submit" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition text-sm font-medium">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
@endsection

