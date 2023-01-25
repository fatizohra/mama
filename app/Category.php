<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable =['name','image','user_id'];


    public function items(){
        return $this->hasMany('App\Item');
    }

    public function category_user(){
        return $this->hasMany('App\CategoryUser');
    }
}
