<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeragamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\ScanController;
use App\Http\Controllers\LaporanController;

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


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/laporan-barang-keluar', [LaporanController::class, 'keluar'])->name('laporan.keluar');
Route::get('/laporan-barang-masuk', [LaporanController::class, 'masuk'])->name('laporan.masuk');
Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('/seragam', SeragamController::class);
Route::get('/hapus-tamu/{id}',[SeragamController::class,'hapus'])->name('hapus.tamu');
Route::resource('/barang-keluar', BarangKeluarController::class);
Route::get('/hapus-barang-keluar/{id}',[BarangKeluarController::class,'hapus'])->name('hapus.barang-keluar');
Route::resource('/barang-masuk', BarangMasukController::class);
Route::get('/hapus-barang-masuk/{id}',[BarangMasukController::class,'hapus'])->name('hapus.barang-masuk');
Route::get('/scan-seragam/{id}',[ScanController::class,'create']);
Route::post('/scan-seragam/store',[ScanController::class,'store'])->name('scan.store');
//Optimize
Route::get('/optimize', function() {
    $exitCode = Artisan::call('optimize');
    return '<h1>Clear Config cleared</h1>';
});