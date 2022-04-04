<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModelProduk extends Model
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
    protected $fillable = ['id_produk', 'nama_produk', 'img_produk'];
}
