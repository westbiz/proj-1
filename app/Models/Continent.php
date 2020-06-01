<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Continent extends Model
{
    //
    protected $table='tx_continents';

    protected $fillable=[
        'parent_id','cn_name','en_name'
    ];


    // public $preserveKeys = true;
    

    public function countries()
    {
        return $this->hasMany(Country::class, 'continent_id', 'id');
    }


    public function cities()
    {
    	return $this->hasManyThrough(City::class, Country::class, 'continent_id', 'country_id', 'id' ,'id');
    }
}
