<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAdminModel extends Model
{
    protected $table = 'login_admin';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama', 'email', 'password'];
}
