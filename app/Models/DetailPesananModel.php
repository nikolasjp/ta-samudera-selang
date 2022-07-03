<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPesananModel extends Model
{
    protected $table = 'detail_pesanan';
    protected $fillable = ['pesanan_id', 'barang_id', 'total_harga', 'total_berat', 'quantity'];
}
