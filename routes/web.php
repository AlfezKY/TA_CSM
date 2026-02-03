<?php

use App\Http\Controllers\TagihanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\AuthController;

// Route Home
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Route Authentication
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Route Laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');

// Route Pelanggan
Route::prefix('pelanggan')->name('pelanggan.')->group(function () {
    Route::get('/', [PelangganController::class, 'index'])->name('index');
    Route::get('/create', [PelangganController::class, 'create'])->name('create');
    Route::post('/', [PelangganController::class, 'store'])->name('store');
    Route::get('/{id}', [PelangganController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PelangganController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PelangganController::class, 'update'])->name('update');
    Route::delete('/{id}', [PelangganController::class, 'destroy'])->name('destroy');
});

// Route Paket
Route::prefix('paket')->name('paket.')->group(function () {
    Route::get('/', [PaketController::class, 'index'])->name('index');
    Route::get('/create', [PaketController::class, 'create'])->name('create');
    Route::post('/', [PaketController::class, 'store'])->name('store');
    Route::get('/{id}', [PaketController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PaketController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PaketController::class, 'update'])->name('update');
    Route::delete('/{id}', [PaketController::class, 'destroy'])->name('destroy');
});

// Route Tagihan
Route::prefix('tagihan')->name('tagihan.')->group(function () {
    Route::get('/', [TagihanController::class, 'index'])->name('index');
    Route::get('/create', [TagihanController::class, 'create'])->name('create');
    Route::post('/', [TagihanController::class, 'store'])->name('store');
    Route::get('/{id}', [TagihanController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [TagihanController::class, 'edit'])->name('edit');
    Route::put('/{id}', [TagihanController::class, 'update'])->name('update');
    Route::delete('/{id}', [TagihanController::class, 'destroy'])->name('destroy');
});

Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan.index');
Route::post('/tagihan/{id}/lunas', [TagihanController::class, 'tandaiLunas'])->name('tagihan.lunas');
