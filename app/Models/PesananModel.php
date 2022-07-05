<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'pesanan_id';
    protected $fillable = [
        'pesanan_id',    'harga_pengiriman',    'detail_alamat',    'total_harga_barang',    'status', 'kurir', 'nomor_resi',
    ];
}
