<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutme extends Model
{
    protected $table = 'aboutme';
    protected $primaryKey = 'id';
    protected $fillable = [
        'description'
    ];
}