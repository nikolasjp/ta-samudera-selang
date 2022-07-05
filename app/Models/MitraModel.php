<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MitraModel extends Model
{
    protected $table = 'mitra';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_mitra', 'img_mitra'];
}
