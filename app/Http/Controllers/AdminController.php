<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Item;
use DB;


class AdminController extends Controller
{

    public function index(User $user, Item $item)
    {
        $itemCount=countAllItems(1);
        $userCount=$user->count();

//        $chart= $item->select(DB::raw('COUNT(*) as counting , month'))->where('year',date('Y'))->groupBy('month')->orderBy('month' , 'asc')->get();
        $latestUsers = $user ->take('8')->orderBy('id','desc')->get();
        $latestItems = $item ->take('4')->orderBy('id','desc')->get();
        return view('admin.home.index', compact('itemCount','userCount','chart','latestUsers','latestItems'));
    }

    public function showYearStatics(Item $item){
        $year = date('Y');
        $chart= $item->select(DB::raw('COUNT(*) as counting , month'))->where('year',date('Y'))->groupBy('month')->orderBy('month' , 'asc')->get();
        return view('admin.home.statics',compact('year','chart'));
    }
}
