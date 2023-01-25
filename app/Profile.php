<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Profile extends Model
{
    use Notifiable;
    protected $fillable = [
        'username','about','gender','user_id',
    ];
    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

    public function followers(){
        return $this->hasMany('App\Follower','follower_id','user_id');
    }
    public function following(){
        return $this->hasMany('App\User','user_id','follower_id');
    }
    public function comments(){
        return $this->hasMany('App\Comment','user_id');
    }
}
