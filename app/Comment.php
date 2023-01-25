<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment','item_id'
    ];
//nsawal wach khsni ndir foreign key hna
    public function item(){
        return $this->belongsTo('App\Item');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function profile(){
        return $this->belongsTo('App\Profile','user_id');
    }
}
