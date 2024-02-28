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

// ROUTE PELANGGAN
route::Resource('/pelanggan', PelangganController::class)->middleware('auth');
route::get('/export_pdf_pelanggan', [PelangganController::class, 'export_pdf'])->name('export_pdf_pelanggan');

 // ROUTE DETAIL PENJUALAN
 route::Resource('/detail_penjualan', DetailPenjualanController::class);
 route::get('/export_excel_detpenjualan', [DetailPenjualanController::class, 'export_excel'])->name('export_excel_detpenjualan');
 route::get('/export_pdf_detpenjualan', [DetailPenjualanController::class, 'export_pdf'])->name('export_pdf_detpenjualan');


route::Resource('/penjualan', PenjualanController::class);
route::get('/export_pdf_penjualan', [PenjualanController::class, 'export_pdf'])->name('export_pdf_penjualan');
route::get('/export_excel_penjualan', [PenjualanController::class, 'export_excel'])->name('export_excel_penjualan');




Route::resource('produk', ProdukController::class)->middleware('auth');
Route::get('/export_pdf_produk', [ProdukController::class, 'export_pdf'])->name('export_pdf_produk');
Route::get('export_excel_produk' ,[ProdukController::class, 'export_excel'])->name('export_excel_produk');



// Route::resource('detail_penjualan', DetailPenjualanController::class);
