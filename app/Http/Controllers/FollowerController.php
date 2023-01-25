<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use App\Follower;
use App\User;
use App\Item;
use Auth;
use DB;
class FollowerController extends Controller
{


    public function check_following($id)
    {
        $following = Follower::where('user_id', Auth::user()->id)
            ->where('follower_id', $id)
            ->first();

        if(!$following){
            return 'false';
        }else{
            return 'true';
        }

    }
    public function followUser($follower_id)
    {
        $resp = Auth::user()->followUser($follower_id);
        User::find($follower_id)->notify(new \App\Notifications\NewFriendRequest(Auth::user()));

        return $resp;
    }
    public function unFollow($follower_id){
        DB::table('followers')
            ->where('user_id', Auth::user()->id)
            ->where('follower_id', $follower_id)
            ->delete();

        return Response()->json(['etat' => true]);
    }

    public function findNetwork()
    {
        $user = Auth::user();
        $users = User::with('profile','followers','country')
            ->where('status', 1)
            ->where('id', '!=', Auth::id())
            ->where('country_id',$user->country_id)
            ->whereNotIn('id', $user->following->pluck('follower_id'))
             ->paginate(40);
        $message = "Suggested";

        return view('web.followers.findfollowing',compact('users','message'));
    }
}