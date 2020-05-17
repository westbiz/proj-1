<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table='tx_categories';

    protected $fillable=[
        'parent_id','name','describtion', 'active',
    ];


    // public function sight(){
    //     return $this->morphToMany(Sight::class, 'sightable');
    // }

    public function sights()
    {
    	return $this->hasMany(Sight::class);
    }


    // public function images()
    // {
    //     return $this->morphMany(Image::class, 'Imageable');
    // }

}
