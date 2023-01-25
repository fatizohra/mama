<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $table = "countries";
    protected $fillable = [
        'sortname', 'name','phonecode'
    ];

    public function user(){
        return $this->hasMany('App\User');
    }

    public function items(){
        return $this->hasManyThrough('App\Item', User::class, 'country_id', 'user_id');
    }
    public function cities(){
        return $this->hasMany('App\City');
    }

}
