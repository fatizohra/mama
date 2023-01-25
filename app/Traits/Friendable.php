<?php

namespace App\Traits;

use App\Follower;
use Auth;


trait Friendable
{

    public function followUser($follower_id)
    {
        $user= Auth::user();
        $follower = new Follower();
        $data =[
            'user_id'=>  $user->id,
            'follower_id'=> $follower_id,
        ];
        $follower->create($data);
        return Response()->json(['etat' =>true]);
    }

}