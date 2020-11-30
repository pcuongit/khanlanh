<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use SoftDeletes;
    protected $table = 'banner';
    protected $primaryKey = 'id';
    protected $fillable = [
        'image_url',
        'priorty'
    ];
}