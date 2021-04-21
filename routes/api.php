<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BeritaController;
use App\Http\Controllers\Api\IbadahController;
use App\Http\Controllers\Api\KeuanganController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('ibadah/minggu', [IbadahController::class, 'minggu']);
Route::get('ibadah/harian', [IbadahController::class, 'harian']);
Route::get('keuangan', [KeuanganController::class, 'index']);
Route::get('berita-sepekan', [BeritaController::class, 'index']);