<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

// Admin Controller
// Admin
Route::post('/login_admin', [AdminController::class, 'login_admin']);
Route::get('/login_admin', [AdminController::class, 'login_admin']);
Route::get('/admin', [AdminController::class, 'admin']);
Route::get('/logout', [AdminController::class, 'logout_admin']);
// Kantor
Route::get('/tambah_kantor', [AdminController::class, 'tambah_kantor']);
Route::post('/add', [AdminController::class, 'add']);
Route::get('/ubah_kantor/{id}', [AdminController::class, 'ubah_kantor']);
Route::post('/edit/{id}', [AdminController::class, 'edit']);
Route::get('/delete/{id}', [AdminController::class, 'delete']);
// Produk
Route::get('/tambah_produk', [AdminController::class, 'tambah_produk']);
Route::post('/add_produk', [AdminController::class, 'add_produk']);
Route::get('/ubah_produk/{id}', [AdminController::class, 'ubah_produk']);
Route::post('/edit_produk/{id}', [AdminController::class, 'edit_produk']);
Route::get('/delete_produk/{id}', [AdminController::class, 'delete_produk']);
// Mitra
Route::get('/tambah_mitra', [AdminController::class, 'tambah_mitra']);
Route::post('/add_mitra', [AdminController::class, 'add_mitra']);
Route::get('/ubah_mitra/{id}', [AdminController::class, 'ubah_mitra']);
Route::post('/edit_mitra/{id}', [AdminController::class, 'edit_mitra']);
Route::get('/delete_mitra/{id}', [AdminController::class, 'delete_mitra']);
// Artikel
Route::get('/tambah_artikel', [AdminController::class, 'tambah_artikel']);
Route::post('/add_artikel', [AdminController::class, 'add_artikel']);
Route::get('/ubah_artikel/{id}', [AdminController::class, 'ubah_artikel']);
Route::post('/edit_artikel/{id}', [AdminController::class, 'edit_artikel']);
Route::get('/delete_artikel/{id}', [AdminController::class, 'delete_artikel']);
// Pesanan / Checkout
Route::get('/ubah_pesanan/{id}', [AdminController::class, 'ubah_pesanan']);
Route::post('/edit_pembelian/{id}', [AdminController::class, 'edit_pembelian']);
Route::get('/delete_pesanan/{id}', [AdminController::class, 'delete_pesanan']);
Route::get('/verif/{id}', [AdminController::class, 'verifikasi']);
// Pengiriman
Route::post('/add_pengiriman/{pesanan_id}', [AdminController::class, 'add_pengiriman']);

// CheckoutController
Route::get('/beli_produk/{id_produk}', [CheckoutController::class, 'beli_produk']);
Route::get('/province/{id}/cities', [CheckoutController::class, 'getCities']);
Route::post('/test_ongkir/{id_produk}', [CheckoutController::class, 'checkout']);
Route::post('/keranjang_belanja/{id_produk}', [CheckoutController::class, 'keranjang_belanja']);
Route::post('/apply', [CheckoutController::class, 'checkout']);
Route::get('/confirm', [CheckoutController::class, 'confirm_pesanan']);
Route::post('/checkout_keranjang/{id}', [CheckoutController::class, 'checkout_keranjang']);
Route::post('/bukti_pembayaran/{pesanan_id}', [CheckoutController::class, 'bukti_pembayaran']);

// UserController
// Login Register Logout User
Route::get('/login', [UserController::class, 'login']);
Route::post('/login_user', [UserController::class, 'login_user']);
Route::get('/login_user', [UserController::class, 'login_user']);
Route::get('/register_user', [UserController::class, 'register_user']);
Route::get('/logout_user', [UserController::class, 'logout_user']);

// User Index
Route::get('/', [UserController::class, 'index']);
Route::get('/riwayat', [UserController::class, 'riwayat']);
Route::get('/detail_pembelian/{id_pesanan}', [UserController::class, 'detail_pembelian']);
Route::get('/contact', [UserController::class, 'contact']);
Route::get('/franchise', [UserController::class, 'franchise']);
Route::get('/tampil', [UserController::class, 'tampil']);
Route::get('/keranjang', [UserController::class, 'keranjang']);
Route::get('/delete_pesanan_keranjang/{id}', [UserController::class, 'delete_pesanan']);
Route::post('/selesai/{pesanan_id}', [UserController::class, 'selesai']);

// User Produk
Route::get('/produk_hose', [UserController::class, 'produk_hose']);
Route::get('/produk_felxible', [UserController::class, 'produk_felxible']);
Route::get('/produk_assesoris', [UserController::class, 'produk_assesoris']);
Route::get('/produk_pipa_nozel', [UserController::class, 'produk_pipa_nozel']);
Route::get('/produk_industrial', [UserController::class, 'produk_industrial']);
