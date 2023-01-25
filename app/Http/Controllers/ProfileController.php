<?php

namespace App\Http\Controllers;


use App\Http\Requests\UserUpdateRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Http\Request;
use App\Profile;
use App\Country;
use App\Follower;
use App\Category;
use Validator;
use App\User;
use App\Item;
use Redirect;
use Auth;
use DB;
use Illuminate\Mail\Mailer;

class ProfileController extends Controller
{
    ///////////////////////////***************Admin Panel**************///////////////////////////
    public function index()
    {
        return view('admin.profile.index');
    }

    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('admin.profile.edit', compact('profile'));
    }

    public static function update(Request $request, $id)
    {
        $profile_update = Profile::find($id);
        $profile_update->fill($request->all())->save();
        return redirect('/adminpanel/profile')->withFlashMessage('Settings saved');
    }

    public function anyData(Profile $profile)
    {
        $profiles = $profile->all();

        return Datatables::of($profiles)
            ->editColumn('username', function ($model) {
                return '<a href="' . url('/adminpanel/profile/' . $model->id . '/edit') . '">' . $model->username . '</a>';
            })

            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/profile/' . $model->id . '/edit') . '" class="btn btn-info btn-circle">
                <i class="fa fa-edit"></i> </a>';

                $all .= '<a href="' . url('/adminpanel/profile/' . $model->id . '/delete') . '" class="btn btn-danger btn-primary" onclick="preventDelete(event)">
                   <i class="fa fa-trash-o"></i> </a>';
                return $all;
            })
            ->rawColumns(['username', 'created_at', 'control'])->make(true);
    }

    ///////////////////////////***************Admin Panel**************///////////////////////////

    public function show_settings($username,Request $request)
    {
        $user = Auth::user();
//        $profile = Profile::where('username', $username)->with('user')->where('status', 1)->first();
        $profile = Profile::where('username', $username)->with('user')->first();
        if ($profile && $profile->user->status == 1) {
            $followingCount = Follower::where('user_id', $profile->user_id)
                ->whereHas('user', function($q){
                    $q->Where('status',1);
                })->count();

            $followerCount = Follower::where('follower_id', $profile->user_id)
                ->whereHas('userfollowing', function($q){
                    $q->where('status','=',1);
                })->count();

        } else {
            $messageBody = "  This user (**********) is not available.";
            return view('web.item.nopermission', compact('messageBody'));
        }
        $categories = Category::all();

        $myItems = Item::where('user_id', $profile->user_id)
            ->where('status',1)
            ->with('user','user.profile')->orderBy('created_at', 'DESC')
             ->paginate(40);

        if($request->ajax()) {
            return [
                'myItems' => view('web.ajax.items_index')->with(compact('myItems'))->render(),
                'next_page' => $myItems->nextPageUrl()
            ];
        }

        $following = DB::table('followers')
            ->Join('users', 'users.id', 'followers.follower_id')
            ->Join('profiles', 'profiles.user_id', 'followers.follower_id')
            ->Join('countries', 'countries.id', 'users.country_id')
            ->Where('status',1)
            ->where('followers.user_id', $profile->user_id)// who is loggedin
            ->get();

        $follower = DB::table('followers')
            ->Join('users', 'users.id', 'followers.user_id')
            ->Join('profiles', 'profiles.user_id', 'followers.user_id')
            ->Join('countries', 'countries.id', 'users.country_id')
            ->Where('status',1)
            ->where('followers.follower_id', $profile->user_id)// who is loggedin
            ->get();

        $suggested_users = User::with('profile', 'followers')
            ->whereNotIn('id', $user->followers->pluck('follower_id'))->Where('status',1)->where('id', '!=', Auth::id())->take(4)->get();
        if (!$profile)
            return 'user not found';
        return view('profile.main', ['profile' => $profile, 'myItems' => $myItems, 'followerCount' => $followerCount, 'followingCount' => $followingCount,
            'following' => $following, 'follower' => $follower, 'suggested_users' => $suggested_users,   'categories' => $categories]);
    }

    #edit user info web
    public function edit_user_details()
    {
        $user = Profile::where('user_id', Auth::user()->id)
            ->join('users', 'users.id', '=', 'profiles.user_id')->first();
        $countries = Country::all();
        return view('profile.edit', compact('user', 'countries'));
    }

    #update user setting
    public function userUpdateProfile(UserUpdateRequest $request, User $users)
    {

        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $user = Auth::user();

        if ($request->username != $profile->username) {
            $checkusername = $profile->where('username', $request->username)->count();
            if ($checkusername == 0) {
                $user->fill(array_except($request->all(), ['image']))->save();
                $profile->fill($request->all())->save();

            } else {
                return Redirect::back()->withFlashMessage('Username already taken');
            }
        } else {
            $user->fill(array_except($request->all(), ['image']))->save();
            $profile->fill($request->all())->save();
        }


        if ($request->email != $user->email) {
            $checkmail = $users->where('email', $request->email)->count();
            if ($checkmail == 0) {
                $user->fill(array_except($request->all(), ['image']))->save();
                $profile->fill($request->all())->save();

            } else {
                return Redirect::back()->withFlashMessage('Email already taken');
            }
        } else {
            $user->fill(array_except($request->all(), ['image']))->save();
            $profile->fill($request->all())->save();
        }
        $img = $request->file('image');
        if ($img) {
            $extention = $img->getClientOriginalExtension();
            $newFileName = str_random(13) . '.' . $extention;
            $fileName = uploadImage($img, $newFileName, '/public/website/images/', '500', '362', $user->image);
            $user->fill(['image' => $fileName])->save();

        }

        return Redirect::back()->with('message', 'Settings saved');

    }

    public function editPassword()
    {
        return view('profile.editprofile_password');

    }

    public function changePassword(UserUpdatePassword $request, User $user)
    {
        $user = Auth::user();
        if (Hash::check($request->password, $user->password)) {
            $hash = Hash::make($request->newpassword);
            $user->fill(['password' => $hash])->save();
            return Redirect::back()->withFlashMessage('Password saved');
        } else {
            return Redirect::back()->withFlashMessage('Please make sure to type the right password');
        }

    }


}