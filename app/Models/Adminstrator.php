<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Adminstrator extends Authenticatable
{
    protected $table = 'adminstrator';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'password',
    ];
    // protected $hidden = ['password'];
}