<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'order';
    protected $primaryKey = 'id';
    protected $fillable = [
        'ids_product',
        'total_bill', 
        'name_user',
        'phone_number',
        'email',
        'address_1',
        'address_2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [];
}