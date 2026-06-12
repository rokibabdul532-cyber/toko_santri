<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KitabController;

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