<?php

use App\Http\Controllers\KonserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/konser', [KonserController::class, 'index'])
    ->name('konser.index');

Route::get('/konser/{id}', [KonserController::class, 'show'])
    ->whereNumber('id')
    ->name('konser.detail');

// Route Laporan Penjualan
Route::get('/laporan', [LaporanController::class, 'index'])
    ->name('laporan.index');

// Route Download PDF
Route::get('/laporan/pdf', [LaporanController::class, 'pdf'])
    ->name('laporan.pdf');