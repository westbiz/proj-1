<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //
    protected $table='tx_countries';

    protected $fillable=[
        'continent_id', 'cn_name', 'en_name', 'lower_name', 'full_cname', 'full_name', 'country_code', 'remark', 'active',
    ];

    public $preserveKeys = true;

    /**
     * 创建一个新的Eloquent集合实例
     *
     * @param  array  $models
     * @return \Illuminate\Database\Eloquent\Collection
     */
    // public function newCollection(array $models = [])
    // {
    //     return new CustomCollection($models);
    // }

    public function continent()
    {
        return $this->belongsTo(Continent::class, 'continent_id', 'id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id', 'id');
    }
}
