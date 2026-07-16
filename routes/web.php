<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\KategoriSparepartController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\ServisController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DetailServisController;
use App\Http\Controllers\DetailSparepartController;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    Route::resource('pelanggan', PelangganController::class);
    Route::resource('kendaraan', KendaraanController::class);
    Route::resource('mekanik', MekanikController::class);
    Route::resource('kategori-sparepart', KategoriSparepartController::class);
    Route::resource('sparepart', SparepartController::class);
    Route::resource('servis', ServisController::class);
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('detail-servis', DetailServisController::class);
    Route::resource('detail-sparepart',DetailSparepartController::class);
    Route::get('/pembayaran/{id}/nota', [PembayaranController::class, 'nota'])->name('pembayaran.nota');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/laporan/cetak', [LaporanController::class, 'cetak'])->name('laporan.cetak');
});

require __DIR__.'/auth.php';