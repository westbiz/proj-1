<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sight extends Model
{
    protected $table='tx_sights';

    protected $fillable=[
    	'type_id',
		'parent_id',
		'city_id',
		'cn_name',
		'full_cname',
		'ename',
		'phone',
		'address',
		'zipcode',
		'describtion',
		'active',
    ];


    // public function sightable()
    // {
    // 	return $this->morphTo();
    // }


    public function type()
    {
    	return $this->belongsTo(Type::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'Imageable');
    }

}
