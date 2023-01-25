<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
//    use Notifiable;

    protected $table = "cities";
    protected $fillable = [
        'name', 'state_id','country_id'
    ];

    public function country(){
        return $this->belongsTo('App\Country','country_id');
    }
}
