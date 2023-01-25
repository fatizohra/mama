<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Session;
use Redirect;
use Response;
use Validator;
use pagination;
use App\Item;
use App\Country;
use App\Category;
use App\Follower;
use App\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Requests\ItemRequest;

class ItemController extends Controller
{
    protected $posts_per_page = 6;

    ////////////////////////////////////*************AdminPanel**************//////////////////////////////////////////
    public function index(Request $request)
    {
        $id = $request->id !== null ? '?user_id=' . $request->id : null;
        return view('admin.item.index', compact('id'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.item.add', compact('categories'));
    }

    public function store(ItemRequest $itemRequest)
    {
        $img = $itemRequest->file('image');
        if($img){
            $extention = $img->getClientOriginalExtension();
            $newFileName = str_random(13) . '.' . $extention;
            $fileName =  uploadImage($img,$newFileName);
            $image = $fileName;
        }
         //$user = Auth::user();
        $item = new Item();
        $data = [
            'title' => $itemRequest->title,
            'category_id' => $itemRequest->category_id,
            'description' => $itemRequest->description,
            'status' => $itemRequest->status,
            'site' => $itemRequest->site,
            'user_id' => auth()->id(),
            'image' => $image,
        ];
        $item->create($data);
        return redirect('adminpanel/item')->withFlashMessage('Offer saved');
    }

    public function edit($id)
    {
        $categories = Category::all();
        $item = Item::find($id);
//        $item = Item::where('id', $id)->first();
        return view('admin.item.edit', compact('item','categories'));
    }

    public static function update(ItemRequest $request, $id)
    {
        $updateItem = Item::find($id);
        $updateItem->fill(array_except($request->all(), ['image']))->save();
        $img = $request->get('image');

        if($img){
            $extention = $img->getClientOriginalExtension();
            $newFileName = str_random(13) . '.' . $extention;
            $fileName =  uploadImage($img,$newFileName, '/public/website/images/' , '500' , '362', $updateItem->image);
            $updateItem->fill(['image' => $fileName])->save();
        }

        return redirect('/adminpanel/item')->withFlashMessage('Offer saved');
    }

    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();
        $path='/public/website/images/';
        $path2='/public/website/thumb/';
        deleteImage( base_path().$path.'/'.$item->image);
        deleteImage( base_path().$path2.'/'.$item->image);
        $item->comments()->delete();
        return redirect('/adminpanel/item')->withFlashMessage('Offer deleted successfuly');
    }

    public function anyData(Request $request, Item $item)
    {
        if ($request->user_id) {
            $items = $item->where('user_id', $request->user_id)->get();
        } else {
            $items = $item->all();
        }
        return Datatables::of($items)
            ->editColumn('title', function ($model) {
                return '<a href="' . url('/adminpanel/item/' . $model->id . '/edit') . '">' . $model->title . '</a>';
            })
            ->editColumn('category', function ($model) {
                return  $model->category->name ;
            })
            ->editColumn('status', function ($model) {
                return $model->status == 0 ? '<span class="badge badge-info">' . 'Not activated' . '</span>' : '<span class="badge badge-warning">' . ' Activated' . '</span>';
            })
            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/item/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                $all .= '<a href="' . url('/adminpanel/item/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle" onclick="preventDelete(event)"><i class="fa fa-trash-o"></i></a>';

                return $all;
            })
            ->rawColumns(['title', 'category', 'status', 'created_at', 'control'])->make(true);
    }
////////////////////////////////////*************website**************//////////////////////////////////////////

//    public function addItem(Request $request)
//    {
//        $data = Country::select("name")->where("name", "Like", "%{$request->input('query')}%")->get();
//        $countries = Country::all();
//        return view('web.useritem.add_item', compact('data', 'countries'));
//    }

    public function storeItem(Request $itemRequest )
    {
        $img = $itemRequest->file('image');
            if($img){
                $extention = $img->getClientOriginalExtension();
                $newFileName = str_random(13) . '.' . $extention;
                $fileName =  uploadImage($img,$newFileName);
             }

            $item = new Item();
            $user = Auth::user() ? Auth::user() : 0;
            $data = [
                'title' => $itemRequest->title,
                'description' => $itemRequest->description,
                'category_id' => $itemRequest->category_id,
                'user_id' => auth()->id(),
                'site' => 'http://' .$itemRequest->site,
                'image'=>$fileName,
            ];
             $item->create($data);
             $follower_id = Follower::where('user_id', Auth::id())->pluck('follower_id');
        $users= User::with('items')->find($follower_id);

        foreach ($users as $user) {
            $user->notify(new \App\Notifications\AddNewItem(Auth::user()));
        }
        return Redirect::back();
    }
    #update item
    public function userUpdateItem(ItemRequest $request)
    {
        $updateItem = Item::find($request->id);
        $updateItem->fill(array_except($request->all(), ['image']))->save();
        $img = $request->file('image');
        if($img){
            $extention = $img->getClientOriginalExtension();
            $newFileName = str_random(13) . '.' . $extention;
            $fileName =  uploadImage($img,$newFileName, '/public/website/images/' , '500' , '362', $updateItem->image);
            $updateItem->fill(['image' => $fileName])->save();
        }

        return Redirect::back()->withFlashMessage('Offer saved');
    }

    public function deleteItem($id)
    {
        $item = Item::find($id);
         $item->delete();
        $path='/public/website/images/';
        $path2='/public/website/thumb/';
        deleteImage( base_path().$path.'/'.$item->image);
        deleteImage( base_path().$path2.'/'.$item->image);
        $item->comments()->delete();
        return Redirect::back();
    }

    #show one item
    public function showItem($id)
    {
        $itemInfo = Item::with('user', 'user.profile')->where('status',1)->findOrFail($id);

        $user = Auth::user();
        $userscountry = User::where('status',1)->where('country_id', $user->country_id)->pluck('id');
        $suggested_items = Item::whereIn('user_id', $userscountry)->where('user_id', '!=', Auth::id())
             ->where('status',1)
            ->where('id','!=',$itemInfo->id)
            ->orderBy('created_at','DESC')
            ->take(2)->get();


        if ($itemInfo->status == 0) {
            $messageTitle = " This item is waiting to be accepted";
            $messageBody = "  This listing (**********) has been removed, or this item isn't available.";
            return view('web.item.nopermission', compact('itemInfo', '$messageBody'));
        }
//        $item = Item::where('user_id', $user->id)->where('status',1)->paginate(10);
        return view('web.item.view_item', compact('itemInfo', 'suggested_items'));
    }

    public function showFriendsItem(Request $request)
    {
        $user = Auth::user();
        $userscountry = User::where('status',1)->where('country_id', $user->country_id)->pluck('id');

        $userIds = $user->following->pluck('follower_id');
        $userIds[] = $user->id;
        $count_items = Item::whereIn('user_id', $userIds)->where('status',1)->where('user_id', '!=', Auth::id())
            ->count();

       if($count_items==0){

           $items = Item::whereIn('user_id', $userscountry)->where('user_id', '!=', Auth::id())->where('status',1)->with('user','user.country')
               ->orderBy('created_at','DESC')
               ->paginate(40);
           }else{

           $items = Item::whereIn('user_id', $userIds)->where('user_id', '!=', Auth::id())->where('status',1)->with('user','user.country')
               ->orderBy('created_at','DESC')
               ->paginate(40);
           }
//
//        if($request->ajax()) {
//            return [
//                'items' => view('web.ajax.index')->with(compact('items','count_items'))->render(),
//                'next_page' => $items->nextPageUrl(),
//            ];
//        }

//               $followers_items=$country_items->merge($items)->sortByDesc('created_at');

        return view('home', compact('items','count_items'));
    }

////////////////////////////////////***************************//////////////////////////////////////////

    public function showItems(){
        $item = Item::where('status',1)->OrderBy('id', 'desc')->paginate(40);
        $countries = Country::all();

        return view('web.item.allitems', compact('item','countries','country_id'));
    }
//
//    public function getProducts()
//    {
//        $countries = Country::all();
//        $this->itemAll = Item::where('status', 1);
//        foreach (request()->all() as $filter => $value) {
//            if (method_exists($this, $filter)) {
//                $this->$filter($value);
//            }
//        }
//        $itemAll = $this->itemAll->paginate(15);;
//        return view('web.item.all', compact('itemAll','countries'));
//    }


    public function explore(Request $request)
    {
        $user = Auth::user();
        $userscountry = User::where('country_id', $user->country_id)->pluck('id');
        $items = Item::whereIn('user_id', $userscountry)->where('user_id', '!=', Auth::id())
            ->where('status',1)
            ->with('user','user.country','user.profile')
            ->orderBy('created_at','DESC')
            ->paginate(40);


        return view('explore', compact('items'));
    }

    public function showByCategory(Request $request,$cat_id){

        $categories = Category::all();
        $user = Auth::user();
        $userscountry = User::where('country_id', $user->country_id)->pluck('id');
        $items = Item::whereIn('user_id', $userscountry)->where('user_id', '!=', Auth::id())
            ->where('status',1)
            ->where('category_id',$cat_id)
            ->orderBy('created_at','DESC')
            ->paginate(40);


        return view('explore', compact('items','categories'));
    }

//    public function search(Request $request){
//        $item_search = $request->get('query');
//        $selected = $request->get('select');
//
//
//        if($item_search!=""){
//            return $items = Item::whereHas('user', function($query) use($item_search) {
//                $query->where('firstname', 'like', '%'.$item_search.'%')
//                    ->orWhere('lastname','LIKE','%'.$item_search.'%');
//            })
//                ->orWhere('title','LIKE','%'.$item_search.'%')
//                ->orWhere('description','LIKE','%'.$item_search.'%')
//                ->get();
//        }
//
//    }

}

