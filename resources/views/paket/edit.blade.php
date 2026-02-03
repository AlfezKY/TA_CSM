@extends('layouts.dashboard')

@section('title', config('app.name', 'Laravel') . ' - Edit Paket')
@section('page_title', 'Edit Paket')
@section('page_subtitle', 'Ubah data paket')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="POST" action="{{ route('paket.update', $paket->id) }}" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="Id_Produk" class="block text-sm font-medium text-gray-700 mb-2">ID Produk</label>
                    <input type="text" name="Id_Produk" id="Id_Produk" value="{{ old('Id_Produk', $paket->Id_Produk) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('Id_Produk')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="Nama_Produk" class="block text-sm font-medium text-gray-700 mb-2">Nama Produk</label>
                    <input type="text" name="Nama_Produk" id="Nama_Produk" value="{{ old('Nama_Produk', $paket->Nama_Produk) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    @error('Nama_Produk')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="Jenis_Produk" class="block text-sm font-medium text-gray-700 mb-2">Jenis Produk</label>
                    <input type="text" name="Jenis_Produk" id="Jenis_Produk" value="{{ old('Jenis_Produk', $paket->Jenis_Produk) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Contoh: 10Mbps, 20Mbps, 30Mbps, 50Mbps">
                    @error('Jenis_Produk')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="Harga_Produk" class="block text-sm font-medium text-gray-700 mb-2">Harga Produk</label>
                    <input type="text" name="Harga_Produk" id="Harga_Produk" value="{{ old('Harga_Produk', $paket->Harga_Produk) }}" required
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                           inputmode="numeric"
                           autocomplete="off"
                           placeholder="Contoh: Rp. 150.000">
                    @error('Harga_Produk')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="Deskripsi_Produk" class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Produk</label>
                    <textarea name="Deskripsi_Produk" id="Deskripsi_Produk" rows="3" required
                              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">{{ old('Deskripsi_Produk', $paket->Deskripsi_Produk) }}</textarea>
                    @error('Deskripsi_Produk')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center gap-3 pt-4 border-t border-gray-200">
                <a href="{{ route('paket.index') }}" class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition text-sm font-medium">
                    Kembali
                </a>
                <button type="submit" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition text-sm font-medium">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <script>
        (function () {
            const input = document.getElementById('Harga_Produk');
            if (!input) return;

            function formatRupiah(value) {
                const digits = String(value || '').replace(/\D+/g, '');
                if (!digits) return '';
                const withDots = digits.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                return 'Rp. ' + withDots;
            }

            function onInput() {
                input.value = formatRupiah(input.value);
            }

            input.value = formatRupiah(input.value);
            input.addEventListener('input', onInput);
            input.addEventListener('blur', onInput);
        })();
    </script>
@endsection

