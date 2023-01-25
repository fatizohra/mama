<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Auth;
use Redirect;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function notifications()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return view('nots')->with('nots', Auth::user()->notifications);
    }
    public function deleteNot($id)
    {

        $not = Notification::where('not_id',$id);
//        dd($not);
        $not->delete();
        return Redirect::back();
    }


}
