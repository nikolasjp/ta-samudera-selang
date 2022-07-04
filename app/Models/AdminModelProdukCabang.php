<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminModelProdukCabang extends Model
{
    protected $table = 'barang_cabang';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kode_barang', 'nama_barang', 'stok', 'harga', 'barang_masuk', 'barang_keluar'];
}
