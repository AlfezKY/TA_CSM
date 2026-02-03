@extends('layouts.dashboard')

@section('title', config('app.name', 'Laravel') . ' - Detail Tagihan')
@section('page_title', 'Detail Tagihan')
@section('page_subtitle', 'Lihat informasi tagihan')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6 space-y-4">
        <div class="text-sm text-gray-600">
            ID: <span class="font-medium text-gray-900">{{ $id }}</span>
        </div>

        <div class="border border-dashed border-gray-200 rounded-lg p-6 text-gray-600">
            Detail tagihan (placeholder).
        </div>

        <div class="flex items-center gap-3">
            <a href="{{ route('tagihan.edit', $id) }}" class="px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 transition text-sm font-medium">
                Edit
            </a>
            <a href="{{ route('tagihan.index') }}" class="px-4 py-2 rounded-lg border border-gray-200 text-gray-700 hover:bg-gray-50 transition text-sm font-medium">
                Kembali
            </a>
        </div>
    </div>
@endsection

