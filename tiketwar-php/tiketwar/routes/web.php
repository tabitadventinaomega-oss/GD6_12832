<?php

use App\Http\Controllers\KonserController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/konser', [KonserController::class, 'index'])
    ->name('konser.index');

Route::get('/konser/{id}', [KonserController::class, 'show'])
    ->whereNumber('id')
    ->name('konser.detail');

Route::get('/konser/{konser}/pesan', [PesananController::class, 'create'])
    ->whereNumber('konser')
    ->name('pesanan.create');

Route::post('/konser/{konser}/pesan', [PesananController::class, 'store'])
    ->whereNumber('konser')
    ->name('pesanan.store');