<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sightcategory extends Model
{
    //
    protected $table = 'sight_categories';

    protected $fillable = [
    			'name',
				'parent_id',
				'path',
				'remark',
    ];
}
