<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\KeuanganController;
use App\Http\Controllers\Admin\LaporanPdfController;
use App\Http\Controllers\Admin\IbadahHarianController;
use App\Http\Controllers\Admin\IbadahMingguController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'login'])->name('login.post');
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('ibadah')->group(function () {
        Route::prefix('minggu')->group(function () {
            Route::get('/', [IbadahMingguController::class, 'index'])->name('ibadah.minggu');
            Route::get('/tambah', [IbadahMingguController::class, 'tambah'])->name('ibadah.minggu.tambah');
            Route::post('/tambah', [IbadahMingguController::class, 'post'])->name('ibadah.minggu.post');
            Route::get('/{id}/ubah', [IbadahMingguController::class, 'ubah'])->name('ibadah.minggu.ubah');
            Route::put('/{id}/ubah', [IbadahMingguController::class, 'put'])->name('ibadah.minggu.put');
            Route::delete('/{id}/hapus', [IbadahMingguController::class, 'delete'])->name('ibadah.minggu.hapus');
        });
        Route::prefix('harian')->group(function () {
            Route::get('/', [IbadahHarianController::class, 'index'])->name('ibadah.harian');
            Route::get('/tambah', [IbadahHarianController::class, 'tambah'])->name('ibadah.harian.tambah');
            Route::post('/tambah', [IbadahHarianController::class, 'post'])->name('ibadah.harian.post');
            
            Route::get('/{id}/ubah', [IbadahHarianController::class, 'ubah'])->name('ibadah.harian.ubah');
            Route::put('/{id}/ubah', [IbadahHarianController::class, 'put'])->name('ibadah.harian.put');
            Route::delete('/{id}/hapus', [IbadahHarianController::class, 'delete'])->name('ibadah.harian.hapus');
        });
     
    });
    Route::prefix('keuangan')->group(function () {
        Route::get('/', [KeuanganController::class, 'index'])->name('keuangan');
        Route::get('/tambah', [KeuanganController::class, 'tambah'])->name('keuangan.tambah');
        Route::post('/tambah', [KeuanganController::class, 'post'])->name('keuangan.post');
        Route::get('/{id}/ubah', [KeuanganController::class, 'ubah'])->name('keuangan.ubah');
        Route::put('/{id}/ubah', [KeuanganController::class, 'put'])->name('keuangan.put');
        Route::delete('/{id}/hapus', [KeuanganController::class, 'delete'])->name('keuangan.hapus');
        
    });
    Route::prefix('laporan')->group(function () {
        Route::get('/tambah', [LaporanPdfController::class, 'tambah'])->name('laporanPdf.tambah');
        Route::post('/tambah', [LaporanPdfController::class, 'post'])->name('laporanPdf.post');
        Route::get('/{id}/ubah', [LaporanPdfController::class, 'ubah'])->name('laporanPdf.ubah');
        Route::put('/{id}/ubah', [LaporanPdfController::class, 'put'])->name('laporanPdf.put');
        Route::delete('/{id}/hapus', [LaporanPdfController::class, 'delete'])->name('laporanPdf.hapus');

    });

    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('berita');
        Route::get('/tambah', [BeritaController::class, 'create'])->name('berita.tambah');
        Route::post('/tambah', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('/{id}/ubah', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::put('/{id}/ubah', [BeritaController::class, 'update'])->name('berita.update');
        Route::delete('/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    });
});