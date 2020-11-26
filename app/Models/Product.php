<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Product extends Model
{
    use SoftDeletes;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_category',
        'name', 
        'image_url',
        'description',
        'price',
        'discount_percent',
        'final_amount'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [];
}