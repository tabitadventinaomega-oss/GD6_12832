
<?php

use App\Http\Controllers\Api\KonserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PesananController;
use App\Http\Controllers\Api\TokenController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// API publik TiketWar
Route::get('/konser', [KonserController::class, 'index'])
    ->name('api.konser.index');

Route::get('/konser/{konser}', [KonserController::class, 'show'])
    ->whereNumber('konser')
    ->name('api.konser.show');
Route::post('/konser/{konser}/pesanan', [PesananController::class, 'store'])
    ->whereNumber('konser')
    ->name('api.pesanan.store');
// Login untuk mendapatkan token
Route::post('/login', [TokenController::class, 'store'])
    ->name('api.login');

// Route yang memerlukan autentikasi Sanctum
// Route yang memerlukan autentikasi Sanctum
Route::middleware('auth:sanctum')->group(function () {

    // Logout dan mencabut token
    Route::post('/logout', [TokenController::class, 'destroy'])
        ->name('api.logout');

    // Menampilkan seluruh pesanan khusus admin
    Route::get('/admin/pesanan', [PesananController::class, 'index'])
        ->name('api.admin.pesanan.index');

});
