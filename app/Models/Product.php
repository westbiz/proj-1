<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table='tx_products';

    protected $fillable=[
        'parent_id', 
        'name', 
        'category_id', 
        'supplier_id', 
        'property_id', 
        'days', 
        'nights', 
        'transport', 
        'stars', 
        'remark', 
        'content', 
        'rank', 
        'comments',
    ];

}
