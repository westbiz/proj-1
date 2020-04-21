<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='tx_categories';

    protected $fillable=[
        'parent_id','name','describtion',
    ];
}
