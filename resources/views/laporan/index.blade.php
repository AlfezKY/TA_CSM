@extends('layouts.dashboard')

@section('title', config('app.name', 'Laravel') . ' - Laporan')
@section('page_title', 'Laporan')
@section('page_subtitle', 'Ringkasan dan laporan data')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between gap-4 mb-4">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Laporan</h2>
                <p class="text-sm text-gray-600">Halaman laporan masih placeholder.</p>
            </div>
        </div>

        <div class="border border-dashed border-gray-200 rounded-lg p-6 text-gray-600">
            Konten laporan akan ditampilkan di sini.
        </div>
    </div>
@endsection

