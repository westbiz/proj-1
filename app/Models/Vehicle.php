<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $table = 'tx_vehicles';

    protected $fillable = [
		'name', 
		'remark',
		'active',
    ];
}
