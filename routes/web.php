<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KitabController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PengarangController;
use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\pelangganController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\PaketKitabController;

// Halaman Dashboard
Route::get('/', [DashboardController::class, 'index']);

// Route untuk Karyawan
Route::prefix('karyawan')->group(function () {
    Route::get('/', [KaryawanController::class, 'index']);
    Route::post('/list', [KaryawanController::class, 'list']);
    Route::get('/create_ajax', [KaryawanController::class, 'create_ajax']);
    Route::post('/ajax', [KaryawanController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax', [KaryawanController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax', [KaryawanController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [KaryawanController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [KaryawanController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [KaryawanController::class, 'delete_ajax']);
    Route::get('/export_excel', [KaryawanController::class, 'export_excel']);
});

// Route untuk Kitab
Route::prefix('kitab')->group(function () {
    Route::get('/', [KitabController::class, 'index']);
    Route::post('/list', [KitabController::class, 'list']);
    Route::get('/create_ajax', [KitabController::class, 'create_ajax']);
    Route::post('/ajax', [KitabController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax', [KitabController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax', [KitabController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [KitabController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [KitabController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [KitabController::class, 'delete_ajax']);
});

// Route untuk Stok
Route::prefix('stok')->group(function () {
    Route::get('/', [StokController::class, 'index']);
    Route::post('/list', [StokController::class, 'list']);
    Route::get('/{id}/show_ajax', [StokController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);
    Route::get('/rekap', [StokController::class, 'rekap']);
});

// Route untuk Penjualan (POS)
Route::prefix('penjualan')->group(function () {
    Route::get('/', [PenjualanController::class, 'index']);
    Route::post('/list', [PenjualanController::class, 'list']);
    Route::get('/create_ajax', [PenjualanController::class, 'create_ajax']);
    Route::post('/ajax', [PenjualanController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax', [PenjualanController::class, 'show_ajax']);
    Route::get('/{id}/delete_ajax', [PenjualanController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [PenjualanController::class, 'delete_ajax']);
});

// Route untuk Laporan
Route::prefix('laporan')->group(function () {
    Route::get('/penjualan', [LaporanController::class, 'penjualan']);
    Route::get('/persediaan', [LaporanController::class, 'persediaan']);
    Route::get('/penjualan/export-excel', [LaporanController::class, 'exportPenjualanExcel']);
    Route::get('/penjualan/export-pdf', [LaporanController::class, 'exportPenjualanPdf']);
    Route::get('/persediaan/export-excel', [LaporanController::class, 'exportPersediaanExcel']);
    Route::get('/persediaan/export-pdf', [LaporanController::class, 'exportPersediaanPdf']);
});

// Route untuk Kategori
Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index']);
    Route::post('/list', [KategoriController::class, 'list']);
    Route::get('/create_ajax', [KategoriController::class, 'create_ajax']);
    Route::post('/ajax', [KategoriController::class, 'store_ajax']);
    Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
});

// Route untuk Pengarang
Route::prefix('pengarang')->group(function () {
    Route::get('/', [PengarangController::class, 'index']);
    Route::post('/list', [PengarangController::class, 'list']);
    Route::get('/create_ajax', [PengarangController::class, 'create_ajax']);
    Route::post('/ajax', [PengarangController::class, 'store_ajax']);
    Route::get('/{id}/edit_ajax', [PengarangController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [PengarangController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [PengarangController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [PengarangController::class, 'delete_ajax']);
});

// Route untuk Penerbit
Route::prefix('penerbit')->group(function () {
    Route::get('/', [PenerbitController::class, 'index']);
    Route::post('/list', [PenerbitController::class, 'list']);
    Route::get('/create_ajax', [PenerbitController::class, 'create_ajax']);
    Route::post('/ajax', [PenerbitController::class, 'store_ajax']);
    Route::get('/{id}/edit_ajax', [PenerbitController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [PenerbitController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [PenerbitController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [PenerbitController::class, 'delete_ajax']);
});

// Route untuk Supplier
Route::prefix('supplier')->group(function () {
    Route::get('/', [SupplierController::class, 'index']);
    Route::post('/list', [SupplierController::class, 'list']);
    Route::get('/create_ajax', [SupplierController::class, 'create_ajax']);
    Route::post('/ajax', [SupplierController::class, 'store_ajax']);
    Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']);
});

// Route untuk Pembelian
Route::prefix('pembelian')->group(function () {
    Route::get('/', [PembelianController::class, 'index']);
    Route::post('/list', [PembelianController::class, 'list']);
    Route::get('/create_ajax', [PembelianController::class, 'create_ajax']);
    Route::post('/ajax', [PembelianController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax', [PembelianController::class, 'show_ajax']);
    Route::get('/{id}/delete_ajax', [PembelianController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [PembelianController::class, 'delete_ajax']);
});

// Route untuk Pelanggan
Route::prefix('pelanggan')->group(function () {
    Route::get('/', [PelangganController::class, 'index']);
    Route::post('/list', [PelangganController::class, 'list']);
    Route::get('/create_ajax', [PelangganController::class, 'create_ajax']);
    Route::post('/ajax', [PelangganController::class, 'store_ajax']);
    Route::get('/{id}/edit_ajax', [PelangganController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [PelangganController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [PelangganController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [PelangganController::class, 'delete_ajax']);
});

// Route untuk Santri
Route::prefix('santri')->group(function () {
    Route::get('/', [SantriController::class, 'index']);
    Route::post('/list', [SantriController::class, 'list']);
    Route::get('/create_ajax', [SantriController::class, 'create_ajax']);
    Route::post('/ajax', [SantriController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax', [SantriController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax', [SantriController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [SantriController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [SantriController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [SantriController::class, 'delete_ajax']);
});

// Route untuk Paket Kitab
Route::prefix('paket-kitab')->group(function () {
    Route::get('/', [PaketKitabController::class, 'index']);
    Route::post('/list', [PaketKitabController::class, 'list']);
    Route::get('/create_ajax', [PaketKitabController::class, 'create_ajax']);
    Route::post('/ajax', [PaketKitabController::class, 'store_ajax']);
    Route::get('/{id}/show_ajax', [PaketKitabController::class, 'show_ajax']);
    Route::get('/{id}/edit_ajax', [PaketKitabController::class, 'edit_ajax']);
    Route::put('/{id}/update_ajax', [PaketKitabController::class, 'update_ajax']);
    Route::get('/{id}/delete_ajax', [PaketKitabController::class, 'confirm_ajax']);
    Route::delete('/{id}/delete_ajax', [PaketKitabController::class, 'delete_ajax']);
});