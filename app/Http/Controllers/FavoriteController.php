<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Favorite;
use App\Item;
use Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $countries= Favorite::all();
        return view('countries.index',['countries'=> $countries]);

    }
    public function getFavourites()
    {
        $user = Auth::user();
        $usersfavoutire = Favorite::where('user_id', $user->id)->pluck('item_id');
//        $userIdsfavourite[] = $usersfavoutire->item_id;

//        dd($usersfavoutire);
        $favoriteitems = Item::whereIn('id', $usersfavoutire)->where('status',1)->with('user','user.country')
            ->orderBy('created_at','DESC')
            ->paginate(40);


        return view('web.item.favorite', compact('favoriteitems'));

    }

    public function check_favorite($id)
    {
        $favorite = Favorite::where('user_id', Auth::user()->id)
            ->where('item_id', $id)
            ->first();

        if(!$favorite){
            return 'false';
        }else{
            return 'true';
        }
    }
    public function favoriteItem($item_id)
    {
        $user= Auth::user();
        $favorite = new Favorite();
        $data =[
            'user_id'=>  $user->id,
            'item_id'=> $item_id,
        ];
        $favorite->create($data);
        return Response()->json(['etat' =>true]);
    }
    public function unFavorite($item_id){
       Favorite::where('user_id', Auth::user()->id)
            ->where('item_id', $item_id)
            ->delete();
        return Response()->json(['etat' => true]);
    }



}
