<?php

use App\Http\Controllers\UserController;
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

// Route Admin Cabang
Route::get('/admin_cabang', [UserController::class, 'admin_cabang']);

// Route Admin Website
Route::get('/admin', [UserController::class, 'admin']);
Route::get('/ubah/{id}', [UserController::class, 'ubah']);
Route::post('/edit/{id}', [UserController::class, 'edit']);
Route::get('/delete/{id}', [UserController::class, 'delete']);
Route::get('/tambah', [UserController::class, 'tambah']);
Route::post('/add', [UserController::class, 'add']);
Route::get("search", [UserController::class, 'search']);
Route::get('/tambah_produk', [UserController::class, 'tambah_produk']);

// Route Company Profile Website
Route::get('/contact', [UserController::class, 'contact']);
Route::get('/franchise', [UserController::class, 'franchise']);
Route::post('/add_produk', [UserController::class, 'add_produk']);
Route::get('/', [UserController::class, 'tampil']);
