@extends('layouts.dashboard')

@section('title', config('app.name', 'Laravel') . ' - Tambah Tagihan')
@section('page_title', 'Tambah Tagihan')
@section('page_subtitle', 'Buat tagihan baru')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <form method="POST" action="{{ route('tagihan.store') }}" class="space-y-4">
            @csrf

            <div class="border border-dashed border-gray-200 rounded-lg p-6 text-gray-600">
                Form tambah tagihan (placeholder).
            </div>

            <div class="flex items-center gap-3">
                <a href="{{ route('tagihan.index') }}" class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition text-sm font-medium">
                    Kembali
                </a>
                <button type="submit" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition text-sm font-medium">
                    Simpan
                </button>
            </div>
        </form>
    </div>
@endsection

