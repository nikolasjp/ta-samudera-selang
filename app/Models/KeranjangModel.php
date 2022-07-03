<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeranjangModel extends Model
{
    protected $table = 'keranjang_belanja';
    protected $fillable = ['id', 'user_id', 'id_produk', 'berat', 'harga', 'quantity',];
}
