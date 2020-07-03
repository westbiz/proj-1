<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    protected $table='tx_cities';

    protected $fillable=[
        'country_id', 'parent_id', 'cn_name', 'en_name', 'lower_name', 'cn_state','en_state', 'state_code', 'city_code', 'remark', 'active',
    ];

    // public $preserveKeys = true;

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
