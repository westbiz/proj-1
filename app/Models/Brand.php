<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    //
    protected $table = 'tx_brands';

    protected $fillable = [
    	'cname', 
		'ename',
		'symbol',
		'describtion',
		'active',
    ];
}
