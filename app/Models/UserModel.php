<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table = 'persebaran';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kota', 'alamat', 'img'];
}
