<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table = 'tx_types';

    protected $fillable = [
    	'name', 
    	'parent_id', 
    	'description',
    ];


    public function parentType()
    {
        return $this->belongsTo(Type::class, 'parent_id', 'id');
    }

    public function childTypes()
    {
         return $this->hasMany(Type::class, 'parent_id', 'id');
    }

    public function sights()
    {
    	return $this->belongsToMany(Sigth::class, 'tx_sight_types');
    }
}
