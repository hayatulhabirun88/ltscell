<?php

use App\Http\Controllers\DaftarHargaController;
use App\Http\Controllers\PulsaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/riwayat', [HomeController::class, 'riwayat'])->name('riwayat');
Route::get('/riwayat-detail/{id}', [HomeController::class, 'riwayat_show'])->name('riwayat.show');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');

// Pulsa Reguler
Route::get('/pulsa-reguler', [PulsaController::class, 'index'])->name('pulsa.reguler');
Route::get('/pulsa-reguler-nominal', [PulsaController::class, 'nominal'])->name('pulsa.pilih-nominal');
Route::get('/pulsa-view-transaksi/{id}', [PulsaController::class, 'view_proses'])->name('pulsa.view-transaksi');
Route::post('/pulsa-proses-transaksi', [PulsaController::class, 'proses_transaksi'])->name('pulsa.proses-transaksi');
Route::get('/pulsa-finish-proses', [PulsaController::class, 'finish_proses'])->name('pulsa.view-transaksi-finish');

// riwayat
Route::get('/riwayat-pulsa', [HomeController::class, 'riwayat_pulsa'])->name('riwayat.pulsa');


Route::get('/daftar-harga', [DaftarHargaController::class, 'index'])->name('daftar.harga');
Route::get('/daftar-harga-prepaid/{id}', [DaftarHargaController::class, 'show'])->name('daftar.harga_prepaid.show');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');