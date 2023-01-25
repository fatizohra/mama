<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserRequestAdmin;
use App\Http\Requests\UserUpdateRequest;
use App\Http\Requests\UserUpdatePassword;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Item;
use App\Profile;
use App\Country;
use App\Follower;

use Illuminate\Support\Facades\Mail;
use Validator;
use Session;
use Auth;
use Hash;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Mail\Mailer;
use Yajra\DataTables\DataTables;


class UsersController extends Controller
{
    //////////////***********************Admin Panel**********************////////////////////////
    public function index()
    {
        return view('admin.user.index');
    }

    public function create()
    {
        $countries = Country::all();
        return view('admin.user.add',compact('countries'));
    }

    public function store(AddUserRequestAdmin $request)
    {
        $img = $request->file('image');
        if($img){
            $extention = $img->getClientOriginalExtension();
            $newFileName = str_random(13) . '.' . $extention;
            $fileName =  uploadImage($img,$newFileName);
            $image = $fileName;
        }else{
            $image='';
        }

        $user = User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'admin' => $request->admin,
            'image' => $image,
            'email' => $request->email,
            'country_id' => $request->country_id,
            'location' => $request->location,
            'password' => bcrypt($request->password),
        ]);
        Profile::create(['user_id' => $user->id, 'username' => $request['firstname'] . '' . $request['lastname'] . '' . $user->id, 'profile' => 'username']);
        return redirect('/adminpanel/users')->withFlashMessage('Member is added successfuly');;
    }

    public function edit($id)
    {
        $countries = Country::all();
        $user = User::find($id);
        return view('admin.user.edit', compact('user','countries'));
    }

    public function update($id, UserUpdateRequest $request)
    {
        $updateUser = User::find($id);
        $updateUser->fill(array_except($request->all(), ['image']))->save();

        $img = $request->file('image');
        if($img){
            $extention = $img->getClientOriginalExtension();
            $newFileName = str_random(13) . '.' . $extention;
            $fileName = uploadImage($img,$newFileName, '/public/website/images/', '500', '362', $updateUser->image);
            $image = $fileName;
        }else{
            $image='';
        }
        $updateUser->fill(['image' => $image])->save();
        return redirect('/adminpanel/users')->withFlashMessage('Member is updated successfuly');
    }

    public function updatePass(Request $request, User $user)
    {
        $userUpdate = $user->find($request->user_id);
        $password = bcrypt($request->password);
        $userUpdate->fill(['password' => $password])->save();
        return redirect('/adminpanel/users')->withFlashMessage('Password is updated successfuly');
    }

    public function destroy($id, User $user)
    {
        if ($id != 1) {
            $user->find($id)->delete();
            Item::where('user_id', $id)->delete();
            Profile::where('user_id', $id)->delete();
            Follower::where('user_id', $id)->delete();
            Follower::where('follower_id', $id)->delete();
            return redirect('/adminpanel/users')->withFlashMessage('Member is deleted successfuly');
        } else {
            return redirect('/adminpanel/users')->withFlashMessage('you can not delete admin');
        }
    }

    public function anyData(User $user)
    {
        $users = $user->all();

        return Datatables::of($users)
            ->editColumn('lastname', function ($model) {
                return '<a href="' . url('/adminpanel/users/' . $model->id . '/edit') . '">' . $model->lastname . '</a>';
            })
            ->editColumn('country', function ($model) {
                return   $model->country->name;
            })
            ->editColumn('admin', function ($model) {
                return $model->admin == 0 ? '<span class="badge badge-info">' . 'User' . '</span>' : '<span class="badge badge-warning">' . 'Admin' . '</span>';
            })
            ->editColumn('myitems', function ($model) {
                return '<a href="' . url('/adminpanel/item/' . $model->id) . '"> <span class="btn btn-danger btn-circle"> <i class="fa fa-link"></i> </span> </a>';
            })
            ->editColumn('control', function ($model) {
                $all = '<a href="' . url('/adminpanel/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle">
                <i class="fa fa-edit"></i> </a>';

                $all .= '<a href="' . url('/adminpanel/users/' . $model->id . '/delete') . '" class="btn btn-danger btn-primary" onclick="preventDelete(event)">
                   <i class="fa fa-trash-o"></i> </a>';


                // '<a href="' . url('/adminpanel/users/' . $model->id . '/edit') . '" class="btn btn-info btn-circle"><i class="fa fa-edit"></i></a>';
                //  $all .= '<a href="' . url('/adminpanel/users/' . $model->id . '/delete') . '" class="btn btn-danger btn-circle"><i class="fa fa-trash-o"></i></a>';

                return $all;
            })
            ->rawColumns(['lastname', 'firstname', 'email','country', 'created_at', 'myitems', 'admin', 'control'])->make(true);
    }
    //////////////***********************Admin Panel**********************////////////////////////
    //forget password login form
    public function setToken(Request $request)
    {
        $email = $request->email;
        //check any user have this email address
        $validator = Validator::make($request->all(), [
            'email' => 'email|required'
        ]);

        if ($validator->fails()) {
            return redirect('forgetPassword')
                ->withErrors($validator)
                ->withInput();
        }

        $checkEmail = DB::table('users')->where('email', $email)->get();
        $emailcount = DB::table('password_resets')->select("email")->where('email', $email)->count();
        $emailtoken = DB::table('password_resets')->select("token")->where('email', $email)->first();
        if($emailcount > 0){
          $token = $emailtoken->token;
        }else{
//            dd("mashib7al");

            $randomNumber = rand(1, 500);
            $token_sl = bcrypt($randomNumber);
            $token = stripslashes($token_sl);
            $insert_token = DB::table('password_resets')->insert(['email' => $email, 'token' => $token,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString()]);
         }
        $name = User::select("firstname")->where("email", $email)->first();

        //echo "send reset link to this email address";
        $baseUrl = route('activate', $token);
        $to = $email;
        $subject = "Password reset";
        $message = "<a href='$baseUrl'>$token</a>";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        // More headers
        $headers .= 'From: <admin@larabook.com>' . "\r\n";
//   mail($to, $subject, $message, $headers);
//
        $data = [
            'token' => $token,
            'baseUrl' => $baseUrl,
             'name' => $name,

        ];
        Mail::send('web.emails.forgetpassword', $data, function ($message) use ($email, $subject) {

            $message->from('admin@larabook.com', 'Laravel');
            $message->to($email);
            $message->subject($subject);
        });

        return view('profile.confirmation');
    }

    public function setPass(Request $request)
    {
        $email = $request->email;
        $pass = $request->pass;
        $cpass = $request->confrim_pass;
        if ($pass == $cpass) {
            //update the pass for this user
            DB::table('users')->where('email', $email)->update(['password' => bcrypt($pass)]);
            return view('profile.resetsubmit', compact('profileInfo'));
        } else {

            return Redirect::back()->withFlashMessage('passwords not matched');
        }
    }

    public function confirmation()
    {
        return view('profile.confirmation');
    }

    public function desactivateAccount(){
        $user = Auth::user();
        $user->status = 0;
//     $items = Item::where('user_id', auth()->user->id)->get()
//        foreach($items as $item)
//            $item->status = 0
//$item-save()
        $items = Item::where('user_id', $user->id)
            ->update(['status' => 0]);
        $user->save();
        Auth::logout();
        Session::flush();

        return Redirect::to('login')->withFlashMessage('desactivate ur account');
    }
}
