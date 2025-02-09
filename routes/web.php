<?php

use App\Http\Controllers\Web\Laporan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthLogin;
use App\Http\Controllers\BpjsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\Wdashboard;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PulsaController;
use App\Http\Controllers\InternetController;
use App\Http\Controllers\PlnPascaController;
use App\Http\Controllers\PulsaDataController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\DaftarHargaController;
use App\Http\Controllers\PlnPrabayarController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/', [LoginController::class, 'index'])->name('login.page');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
Route::get('/riwayat', [HomeController::class, 'riwayat'])->name('riwayat');
Route::get('/riwayat-detail/{id}', [HomeController::class, 'riwayat_show'])->name('riwayat.show');
Route::get('/riwayat/download', [HomeController::class, 'riwayat_download'])->name('riwayat.download');
Route::get('/riwayat-view', [HomeController::class, 'riwayat_view'])->name('riwayat.view');
Route::get('/profile', [HomeController::class, 'profile'])->name('profile');
Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');

// Pulsa Reguler
Route::get('/pulsa-reguler', [PulsaController::class, 'index'])->name('pulsa.reguler');
Route::get('/pulsa-reguler-nominal', [PulsaController::class, 'nominal'])->name('pulsa.pilih-nominal');
Route::get('/pulsa-view-transaksi/{id}', [PulsaController::class, 'view_proses'])->name('pulsa.view-transaksi');
Route::post('/pulsa-proses-transaksi', [PulsaController::class, 'proses_transaksi'])->name('pulsa.proses-transaksi');
Route::get('/pulsa-finish-proses', [PulsaController::class, 'finish_proses'])->name('pulsa.view-transaksi-finish');

// Internet
Route::get('/internet', [InternetController::class, 'index'])->name('internet');
Route::get('/internet-paid', [InternetController::class, 'paid'])->name('internet.paid');
Route::get('/internet-paid-success', [InternetController::class, 'paid_success'])->name('internet.paid-success');

// Pln Pasca Bayar
Route::get('/pln-pasca', [PlnPascaController::class, 'index'])->name('plnpasca');
Route::get('/pln-pasca-paid', [PlnPascaController::class, 'paid'])->name('plnpasca.paid');
Route::get('/pln-pasca-paid-success', [PlnPascaController::class, 'paid_success'])->name('plnpasca.paid-success');

// Pulsa Data
Route::get('/pulsa-data', [PulsaDataController::class, 'index'])->name('pulsadata');
Route::get('/pulsa-data-nominal', [PulsaDataController::class, 'nominal'])->name('pulsadata.pilih-nominal');
Route::get('/pulsa-data-view-transaksi/{id}', [PulsaDataController::class, 'view_proses'])->name('pulsadata.view-transaksi');
Route::get('/pulsa-data-paid', [PulsaDataController::class, 'paid'])->name('pulsadata.paid');
Route::get('/pulsa-data-paid-success', [PulsaDataController::class, 'paid_success'])->name('pulsadata.paid-success');

// Pln Pasca Bayar
Route::get('/pln-prabayar', [PlnPrabayarController::class, 'index'])->name('plnprabayar');
Route::get('/pln-prabayar-paid', [PlnPrabayarController::class, 'paid'])->name('plnprabayar.paid');
Route::get('/pln-prabayar-paid-success', [PlnPrabayarController::class, 'paid_success'])->name('plnprabayar.paid-success');

// BPJS
Route::get('/bpjs', [BpjsController::class, 'index'])->name('bpjs');
Route::get('/bpjs-paid', [BpjsController::class, 'paid'])->name('bpjs.paid');
Route::get('/bpjs-paid-success', [BpjsController::class, 'paid_success'])->name('bpjs.paid-success');

// riwayat
Route::get('/riwayat-pulsa', [HomeController::class, 'riwayat_pulsa'])->name('riwayat.pulsa');


Route::get('/daftar-harga', [DaftarHargaController::class, 'index'])->name('daftar.harga');
Route::get('/daftar-harga-prepaid/{id}', [DaftarHargaController::class, 'show'])->name('daftar.harga_prepaid.show');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout');

// WEB REPORT

Route::get('/auth/login', [AuthLogin::class, 'index'])->name('web.auth.login');
Route::get('/auth/logout', [AuthLogin::class, 'logout'])->name('web.auth.logout');
Route::post('/auth/proses', [AuthLogin::class, 'proses'])->name('web.auth.proses');
Route::get('/web/dashboard', [Wdashboard::class, 'index'])->name('web.dashboard');

// LAPORAN
Route::get('/web/prabayar', [Laporan::class, 'prabayar'])->name('web.laporan.prabayar');
Route::post('/web/proses_prabayar', [Laporan::class, 'proses_prabayar'])->name('web.laporan.proses_prabayar');
Route::get('/web/pascabayar', [Laporan::class, 'pascabayar'])->name('web.laporan.pascabayar');
Route::post('/web/proses_pascabayar', [Laporan::class, 'proses_pascabayar'])->name('web.laporan.proses_pascabayar');