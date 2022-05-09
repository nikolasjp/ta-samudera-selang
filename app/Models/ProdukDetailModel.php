<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdukDetailModel extends Model
{
    protected $table = 'produk_detail';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kategori_artikel', 'header_produk', 'content_produk', 'content_produk_2'];
}
