<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModelProdukCabang extends Model
{
    protected $table = 'barang_cabang';
    protected $primaryKey = 'kode_barang';
    protected $fillable = ['kode_barang', 'nama_barang', 'stok', 'harga', 'barang_masuk', 'barang_keluar'];
}
