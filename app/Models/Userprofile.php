<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userprofile extends Model
{
    //
    protected $table = 'user_profiles';

    protected $fillable = [
	    'user_id',
        'nickname',
        'realname',
        'phone',
        'statement',
        'idtype',
        'idnumber',
        'gender',
        'avatar',
        'city_id',
        'address',
        'zipcode',
        'role',
        'hoby',
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }
}
