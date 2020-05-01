<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table='tx_cities';

    protected $fillable=[
        'country_id', 'parent_id', 'state', 'name', 'lower_name', 'cn_state', 'cn_name',
        'state_code', 'city_code', 'remark',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
