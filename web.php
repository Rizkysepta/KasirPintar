<?php
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ManajemenController;


Route::get('/', function(){
    return view('welcome');
});
    
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/Laporan', [LaporanController::class, 'index'])->name('Laporan.index');
Route::get('/Laporan/penjualan', [LaporanController::class, 'penjualan'])->name('Laporan.penjualan');
Route::get('/Laporan/keuangan', [LaporanController::class, 'keuangan'])->name('Laporan.keuangan');

Route::get('/Transaksi', [TransaksiController::class, 'index'])->name('Transaksi.index');

Route::get('/Manajemen', [ManajemenController::class, 'index'])->name('Manajemen.index');
Route::get('/Manajemen/karyawan', [ManajemenController::class, 'karyawan'])->name('Manajemen.karyawan');
Route::get('/manajemen/barang', [ManajemenController::class, 'barang'])->name('Manajemen.barang');
