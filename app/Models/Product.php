<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
class Product extends Model
{
    use SoftDeletes;
    use Sluggable;
    use SluggableScopeHelpers;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_category',
        'name', 
        'image_url',
        'description',
        'price',
        'discount_percent',
        'final_amount',
        'slug'
    ];
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [];
}