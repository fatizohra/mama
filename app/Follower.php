<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{


    protected $fillable = [
        'user_id', 'follower_id',
    ];

//mn b3d nbadal
    public function profile()
    {
        return $this->belongsTo('App\Profile','follower_id','user_id');
    }

    public function user(){
        return $this->belongsTo('App\User','follower_id');
    }
    public function userfollowing(){
        return $this->belongsTo('App\User','user_id');
    }
//    public function getUser(){
//        return $this->belongsTo('App\User','follower_id');
//    }
    public function items(){
        return $this->hasMany('App\Item','user_id','follower_id');
    }

}