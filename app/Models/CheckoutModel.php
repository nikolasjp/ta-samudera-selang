<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CheckoutModel extends Model
{
    protected $table = 'checkout';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_produk', 'jumlah', 'harga'];
}
