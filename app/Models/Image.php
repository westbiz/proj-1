<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // 图片，一对一多态关联 
    protected $table = 'images';

    protected $fillable = [
    	'url',
        'title',
    	'imageable',
    ];

    // 定义 一对一的多态关联
	public function imageable()
	{
	    return $this->morphTo();
	}

}
