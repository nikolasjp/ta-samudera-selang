<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPembelianModel extends Model
{
    protected $table = 'detail_pembelian';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'user_id', 'nama_barang', 'harga', 'quantity', 'harga_pengiriman', 'berat', 'detail_alamat', 'total_harga', 'status'];
}
