<?php
Route::group(['middleware' => ['web', 'admin']], function () {
    #datatable ajax
    #add it when I have new table
    Route::get('/adminpanel/users/data', ['as' => 'adminpanel.users.data', 'uses' => 'UsersController@anyData']);
    Route::get('/adminpanel/item/data', ['as' => 'adminpanel.item.data', 'uses' => 'ItemController@anyData']);
    Route::get('/adminpanel/profile/data', ['as' => 'adminpanel.profile.data', 'uses' => 'ProfileController@anyData']);
    Route::get('/adminpanel/category/data', ['as'=>'adminpanel.category.data','uses'=> 'CategoriesController@anyData']);
    Route::get('/adminpanel/contact/data', ['as'=>'adminpanel.contact.data','uses'=> 'ContactController@anyData']);
    Route::get('/adminpanel/comment/data', ['as'=>'adminpanel.comment.data','uses'=> 'CommentController@anyData']);

    #main admin
    Route::get('/adminpanel', 'AdminController@index');
    #users
    Route::resource('/adminpanel/users', 'UsersController');
    Route::put('adminpanel/users/{id}', 'UsersController@update');
    Route::get('/adminpanel/users/{id}/delete', 'UsersController@destroy');
    Route::post('/adminpanel/users/changePassword', 'UsersController@updatePass');

    #settingsite
    Route::get('/adminpanel/sitesetting', 'SiteSettingController@index');
    Route::post('/adminpanel/sitesetting', 'SiteSettingController@store');


    #items
    Route::resource('/adminpanel/item', 'ItemController', ['except' => ['index', 'show']]);
    Route::get('/adminpanel/item/{id?}', 'ItemController@index');
    Route::get('adminpanel/item/{id}/delete', 'ItemController@destroy');

    #category
    Route::resource('/adminpanel/category', 'CategoriesController',['except' =>['index','show']]);
    Route::get('/adminpanel/category/{id?}', 'CategoriesController@index');
    Route::get('adminpanel/category/{id}/delete','CategoriesController@destroy');

    #contacts
    Route::resource('/adminpanel/contact', 'ContactController');
    Route::put('adminpanel/contact/{id}','ContactController@update');
    Route::get('adminpanel/contact/{id}/delete','ContactController@destroy');

    #comments
    Route::resource('/adminpanel/comment', 'CommentController');
    Route::put('adminpanel/comment/{id}','CommentController@update');
    Route::get('adminpanel/comment/{id}/delete','CommentController@destroy');

    #profile
    Route::resource('/adminpanel/profile', 'ProfileController');
});/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/;


Route::get('/', function () {
    return view('auth/login');
})->middleware('guest');

$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register')->middleware('guest');;

Auth::routes();
//Route::get('/country_interest', 'Auth\RegisterController@interestCountry');
//Route::post('/home', 'Auth\RegisterController@saveInterestCountry');

//Route::get('/country_of_interest', 'UsersController@interestCountry');
Route::get('/verify/{token}', 'VerifyController@verify')->name('verify');

Route::group(['middleware' => ['auth']], function () {


    #show all items
    Route::get('/explore', 'ItemController@explore');
    Route::get('/items', 'ItemController@showItems');
//    Route::get('/FilterAllProducts', 'ItemController@FilterAllProducts');
    Route::get('/byCategory/{id}', 'ItemController@showByCategory');




    #show user item
//    Route::get('/user/itemshow', 'ItemController@showUserItems');



    Route::view('myaccount', 'web.item.all');
    Route::get('myaccount/{link}', function ($link) {
        return view('web.item.all', ['link' => $link]);
    });


    #edit item web
    Route::get('/editItem/{id}', 'ItemController@userEditItem');
    Route::patch('/editItem/success', 'ItemController@userUpdateItem');
    Route::get('/deleteItem/{id}', 'ItemController@deleteItem');


    #show one item
    Route::get('/oppty/view/{id}', 'ItemController@showItem');


    #profile
    Route::get('/profile/{username}', 'ProfileController@show_settings');


    #edit settings
    Route::get('/editSettings', 'ProfileController@edit_user_details');
    Route::patch('/editSettings', 'ProfileController@userUpdateProfile');

    Route::get('/desactivateAccount', 'UsersController@desactivateAccount');




//    messages
    Route::get('/messages', function () {
        return view('messages');
    });
    Route::get('/getMessages', function () {
        $allUsers1 = DB::table('users')
            ->Join('conversation', 'users.id', 'conversation.user_one')
            ->where('conversation.user_two', Auth::user()->id)->get();
        //return $allUsers1;
        $allUsers2 = DB::table('users')
            ->Join('conversation', 'users.id', 'conversation.user_two')
            ->where('conversation.user_one', Auth::user()->id)->get();
        return array_merge($allUsers1->toArray(), $allUsers2->toArray());
    });
    Route::get('/getMessages/{id}', function ($id) {
        $userMsg = DB::table('messages')
            ->join('users', 'users.id', 'messages.user_from')
            ->where('messages.conversation_id', $id)->get();
        return $userMsg;
    });
    Route::get('newMessage', 'ProfileController@newMessage');
    Route::post('sendNewMessage', 'ProfileController@sendNewMessage');
    Route::post('/sendMessage', 'ProfileController@sendMessage');



    #comments
    Route::get('/getComments/{id}', 'CommentController@getComments');
    Route::post('/addComment', 'CommentController@addComment');
    Route::get('/deleteComment/{id}', 'CommentController@deleteComment');





//    Route::get('/user/create/item','ItemController@addItem');
    Route::post('/addItem/','ItemController@storeItem');




//    change pass web
    Route::get('/settings', 'ProfileController@editPassword');
    Route::post('/changePassword', 'ProfileController@changePassword');


  Route::get('/findnetwork', 'FollowerController@findNetwork');

    #follower
    Route::get('/followUser/{id}', 'FollowerController@followUser');
    Route::get('/unFollow/{id}', 'FollowerController@unFollow');
    Route::get('/check_following/{id}', 'FollowerController@check_following');

    #favorite
    Route::get('/favoriteItem/{id}', 'FavoriteController@favoriteItem');
    Route::get('/unFavorite/{id}', 'FavoriteController@unFavorite');
    Route::get('/check_favorite/{id}', 'FavoriteController@check_favorite');
    Route::get('/MyFavouriteList', 'FavoriteController@getFavourites');


    Route::get('/home', 'ItemController@showFriendsItem');


    Route::get('/get_unread', function () {
        return Auth::user()->unreadNotifications;
    });
    Route::get('/notifications', [
        'uses' => 'HomeController@notifications',
        'as' => 'notifications'
    ]);
    Route::get('/deleteNot/{id}', 'HomeController@deleteNot');

    Route::post('search', 'ItemController@search');
    Route::get('/getCountries', 'CountryController@getCountries');

    Route::get('/contactus',  'ContactController@contact');
    Route::post('/contact',  'ContactController@store');


//    Route::post('items/search',  function(\Illuminate\Http\Request $request){
//
////        $search = $request->search;
//        $search = $request->get('query');
//        $selected = $request->get('select');
//
//        $countries = \App\Country::all();
//        $users_same_country = \App\User::where('country_id', Auth::user()->country_id)->pluck('id');
//        $countriesrequest = $request->country_id;
//        $query = new \App\Item();
//        if(isset($request->search)) {
//            $query= $query->with('user','user.profile')
//                ->where(function ($query) use($search) {
//                    $query ->where('title', 'like', '%'. $search . '%')
//                        ->orWhere('description', 'like', '%'. $search . '%');
//                })->where(function ($query){
//                    $query->where('status', '=', 1)
//                        ->orderBy('created_at', 'DESC');
//                });
//        }
//
////            #item
////            $query= $query->with('user','user.profile')
////                 ->whereIn('user_id', $users_same_country)
////                ->where('title', 'like', '%'. $search . '%')
////                ->orWhere('description', 'like', '%'. $search . '%')
////                ->orderBy('created_at', 'DESC');
//
//        if($countriesrequest !=0)
////            $query = $query->where('country_id',$countriesrequest);
//
//
//            $query = $query->whereHas('user', function($query) use($countriesrequest) {
//                $query->where('country_id',$countriesrequest);
//            });
//
//        $item =$query->get();
//       return Response()->json(['etat' => true, 'item' => $item]);
////        return view('web.item.allitems', compact('item','search','countries'));
//
//    });

    #search
    Route::get('items/search',  function(\Illuminate\Http\Request $request){

       $search = $request->search;
//        $search = $request->get('query');
//        $selected = $request->get('select');



        $countries = \App\Country::all();
        $users_same_country = \App\User::where('country_id', Auth::user()->country_id)->pluck('id');
        $country_id = $request->country_id;

        $query = new \App\Item();
        if(isset($request->search)) {
            $query= $query->with('user','user.profile')
            ->where(function ($query) use($search) {
                $query ->where('title', 'like', '%'. $search . '%')
                    ->orWhere('description', 'like', '%'. $search . '%');
            })->where(function ($query){
                $query->where('status', '=', 1)
                      ->orderBy('created_at', 'DESC');
            })->whereHas('user', function($query) use($country_id){
                    $query->where('country_id',$country_id);
                });
        }

//            #item
//            $query= $query->with('user','user.profile')
//                 ->whereIn('user_id', $users_same_country)
//                ->where('title', 'like', '%'. $search . '%')
//                ->orWhere('description', 'like', '%'. $search . '%')
//                ->orderBy('created_at', 'DESC');



        $query = $query->whereHas('user', function($query) use($country_id) {
            $query->where('country_id',$country_id);
        });

        $item =$query->paginate(60);
//        return Response()->json(['etat' => true, 'item' => $item,'country_id',$country_id]);
      return view('web.item.allitems', compact('item','search','countries','country_id'));

    });



//
    #search
    Route::get('/all',  function(\Illuminate\Http\Request $request){

        $search = $request->search;
        $countries = \App\Country::all();
        $users_same_country = \App\User::where('country_id', Auth::user()->country_id)->pluck('id');

        $item = new \App\Item();
        $people= new \App\User();
        if(isset($request->search)) {
            #people
            $people= $people->with('profile')
                ->where(function ($query) use($search) {
                    $query ->where('firstname', 'like', '%'. $search . '%')
                        ->orWhere('lastname', 'like', '%'. $search . '%')
                        ->orWhere('location', 'like', '%'. $search . '%');
                })->where(function ($query){
                    $query->where('status', '=', 1);
                });


            $item= $item->with('user','user.profile')
                ->where(function ($query) use($search) {
                    $query->where('title', 'like', '%'. $search . '%')
                        ->orWhere('description', 'like', '%'. $search . '%');
                })->where(function ($query){
                    $query->where('status', '=', 1)
                        ->orderBy('created_at', 'DESC');
                })->whereHas('user', function($query) use($users_same_country){
                    $query->whereIn('user_id',$users_same_country);
                })->get();
//            #item
//            $item= $item->with('user','user.profile')
//                ->where('title', 'like', '%'. $search . '%')
//                ->orWhere('description', 'like', '%'. $search . '%')
//                ->orderBy('created_at', 'DESC')->get();

            //            #people
//            $people= $people->with('profile')
////                ->where('status',1)
//                ->where('firstname', 'like', '%'. $search . '%')
//                ->orWhere('lastname', 'like', '%'. $search . '%')
//                ->orderBy('created_at', 'DESC');


        }
         $people= $people->paginate(60);

         $item =$item->take(4);
        return view('web.item.all', compact('item','people','search','countries'));

    });


    #search
    Route::get('/searchFollowing',  function(\Illuminate\Http\Request $request){
        $search = $request->search;

        $query = new \App\User();

        if(isset($request->search)) {

            $query= $query->with('profile')
                ->where(function ($query) use($search) {
                    $query ->where('firstname', 'like', '%'. $search . '%')
                        ->orWhere('lastname', 'like', '%'. $search . '%')
                        ->orWhere('location', 'like', '%'. $search . '%');
                })->where(function ($query){
                    $query->where('status', '=', 1);

                });

        }
         $usercount=  $query->count();

        $message = "Showing " .$usercount.  " results";


        $users = $query->paginate(30);
        return view('web.followers.findfollowing', compact('users','search','message'));
    });
});

Route::get('/help', function () {
    return view('help');
});
Route::get('/terms', function () {
    return view('terms');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact_us', function () {
    $countries =  \App\Country::all();
    return view('contact_us',compact('countries'));
});
Route::post('/contact',  'ContactController@store');
//forget password
Route::get('/forgetPassword', function () {
    return view('profile.forgetPassword');
});
Route::post('/request-password', 'UsersController@setToken');
//get random token by email
Route::get('/getToken/{token}', function ($token) {
    // token is right or wrong
    if (isset($token) && $token != "") {
        $getData = DB::table('password_resets')->where('token', $token)->get();
        if (count($getData) != 0) {
            return view('profile.setPassword')->with('data', $getData);
        } else {
            echo "404 Error: Page not found";
        }
    } else {
        echo "404 Error: Page not found";
    }
})->name('activate');
//set/update new password
Route::get('setPass', 'UsersController@setPass');
Route::get('/request-password', 'UsersController@confirmation');


