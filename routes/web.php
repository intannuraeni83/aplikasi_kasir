<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;





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

Route::get('/', function () {
    return view('welcome');
});

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//Route Login
Route::get('/', [LoginController::class, 'login'])->name('login');
Route::post('/auth', [LoginController::class, 'auth'])->name('auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Route Register
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// Juga tambahkan rute untuk mengarahkan kembali pengguna dari halaman login ke halaman pendaftaran saat mereka mengklik tombol "Buat Akun"
Route::get('/register-from-login', [RegisterController::class, 'create'])->name('register-from-login');


//Route Produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/create', [ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{produk}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
Route::delete('/produk/{produk}', [ProdukController::class, 'destroy'])->name('produk.destroy');

// //Route Pelanggan
// Route::resource('pelanggan', PelangganController::class);
// Route::get('export_pdf_pelanggan',[PelangganController::class, 'export_pdf'])->name('export_pdf_pelanggan');
Route::get('/pelanggan/index', [PelangganController::class,'create'])->name('pelanggan.index');
Route::get('/pelanggan/create', [PelangganController::class,'create'])->name('pelanggan.create');
Route::post('/pelanggan', [PelangganController::class,'store'])->name('pelanggan.store');
Route::get('/pelanggan', [PelangganController::class,'create'])->name('pelanggan.index');

//Route Detail Penjualan

Route::get('/detail_penjualan', [DetailPenjualanController::class, 'index'])->name('detail_penjualan.index');
Route::get('/detail_penjualan/create', [DetailPenjualanController::class, 'create'])->name('detail_penjualan.create');
Route::post('/detail_penjualan', [DetailPenjualanController::class, 'store'])->name('detail_penjualan.store');
Route::get('/detail_penjualan/{id}', [DetailPenjualanController::class, 'show'])->name('detail_penjualan.show');
Route::get('/detail_penjualan/{id}/edit', [DetailPenjualanController::class, 'edit'])->name('detail_penjualan.edit');
Route::put('/detail_penjualan/{id}', [DetailPenjualanController::class, 'update'])->name('detail_penjualan.update');
Route::delete('/detail_penjualan/{id}', [DetailPenjualanController::class, 'destroy'])->name('detail_penjualan.destroy');

//Route Penjualan
Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
Route::get('/penjualan/{penjualan}/edit', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::put('/penjualan/{penjualan}', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::delete('/penjualan/{penjualan}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');




Route::resource('produk', ProdukController::class)->middleware('auth');
Route::get('/export_pdf_produk', [ProdukController::class, 'export_pdf'])->name('export_pdf_produk');
Route::get('export_excel_produk' ,[ProdukController::class, 'export_excel'])->name('export_excel_produk');



Route::resource('detail_penjualans', DetailPenjualanController::class);
