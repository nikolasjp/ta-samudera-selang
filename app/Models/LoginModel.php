<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginModel extends Model
{
    protected $table = 'login_user';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama', 'email', 'password'];
}
