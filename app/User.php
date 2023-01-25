<?php

namespace App;
use App\Traits\Friendable;
use App\Notifications\VerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use Notifiable;
    use Friendable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'email','password', 'image', 'admin','country_id','token','status','location'
    ];

    protected $with = ['country'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function fullName() {
        return $this->firstname . ' ' . $this->lastname;
    }

    public function profile() {
        return $this->hasOne('App\Profile');
    }
    public function category_user(){
        return $this->hasMany('App\CategoryUser');
    }


    public function comments(){
        return $this->hasMany('App\Comment');
    }

    public function country(){
        return $this->belongsTo('App\Country','country_id');
    }

    public function followers(){
        return $this->hasMany('App\Follower','follower_id');
    }
    public function following(){
        return $this->hasMany('App\Follower','user_id');
    }

    public function items(){
        return $this->hasMany('App\Item');
    }
    public function favorites(){
        return $this->hasMany('App\Favorite');
    }
    /**
     * Returns true if the user is verified
     *
     * @return bool
     */

    public function verified(){
        return $this->token === null;
    }
    /**
     * send the user a verifation email
     *
     * @return void
     */

    public function sendVerificationEmail(){
        $this->notify(new VerifyEmail($this));
    }
}
