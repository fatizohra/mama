<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
//   use Notifiable;

    protected $table = "states";
    protected $fillable = [
        'name', 'country_id'
    ];

    public function country(){
        return $this->belongsTo('App\Country','country_id');
    }
    public function cities(){
        return $this->hasMany('App\City');
    }
}
