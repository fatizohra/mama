<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";
    protected $fillable = [
        'title', 'description','status','user_id','image','category_id','site'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Comment','item_id');
    }
    public function countries(){
        return $this->belongsTo('App\Country','country_id');
    }

    public function follower(){
        return $this->belongsTo('App\Follower','user_id','follower_id');
    }
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
}
