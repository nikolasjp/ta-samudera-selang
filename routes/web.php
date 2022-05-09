<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Models\UserModel;
use App\Models\UserModelProduk;
use Illuminate\Support\Facades\Route;

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

// Admin Cabang
Route::get('/dashboard_admin', [AdminController::class, 'dashboard_admin']);
Route::post('/add_barang', [AdminController::class, 'add_barang']);
Route::get('/delete_barang/{id}', [AdminController::class, 'delete_barang']);
Route::post('/edit_barang/{id}', [AdminController::class, 'edit_barang']);

// Website Samudera
Route::get('/produk_hose', [UserController::class, 'produk_hose']);
Route::get('/produk_felxible', [UserController::class, 'produk_felxible']);
Route::get('/produk_assesoris', [UserController::class, 'produk_assesoris']);
Route::get('/produk_pipa_nozel', [UserController::class, 'produk_pipa_nozel']);
Route::get('/produk_industrial', [UserController::class, 'produk_industrial']);
Route::get('/tambah_artikel', [UserController::class, 'tambah_artikel']);
Route::post('/add_artikel', [UserController::class, 'add_artikel']);

Route::get('/', [UserController::class, 'tampil']);
Route::get('/contact', [UserController::class, 'contact']);
Route::get('/admin', [UserController::class, 'admin']);
Route::get('/franchise', [UserController::class, 'franchise']);
Route::get('/tampil', [UserController::class, 'tampil']);
Route::get('/tambah_kantor', [UserController::class, 'tambah_kantor']);
Route::post('/add', [UserController::class, 'add']);
Route::get("search", [UserController::class, 'search']);
Route::get('/tambah_produk', [UserController::class, 'tambah_produk']);
Route::post('/add_produk', [UserController::class, 'add_produk']);
Route::post('/add_mitra', [UserController::class, 'add_mitra']);
Route::get('/tambah_mitra', [UserController::class, 'tambah_mitra']);
Route::get('/ubah_kantor/{id}', [UserController::class, 'ubah_kantor']);
Route::get('/ubah_mitra/{id}', [UserController::class, 'ubah_mitra']);
Route::get('/ubah_produk/{id}', [UserController::class, 'ubah_produk']);
Route::get('/ubah_artikel/{id}', [UserController::class, 'ubah_artikel']);
Route::post('/edit/{id}', [UserController::class, 'edit']);
Route::post('/edit_mitra/{id}', [UserController::class, 'edit_mitra']);
Route::post('/edit_produk/{id}', [UserController::class, 'edit_produk']);
Route::post('/edit_artikel/{id}', [UserController::class, 'edit_artikel']);
Route::get('/delete/{id}', [UserController::class, 'delete']);
Route::get('/delete_produk/{id}', [UserController::class, 'delete_produk']);
Route::get('/delete_mitra/{id}', [UserController::class, 'delete_mitra']);
Route::get('/delete_artikel/{id}', [UserController::class, 'delete_artikel']);
