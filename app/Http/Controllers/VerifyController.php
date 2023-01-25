<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class VerifyController extends Controller
{
    /**
     * verify the user with a given token
     * @param string $token
     * @return Response
     */
    public function verify($token){
       User::where('token', $token)->firstOrFail()
            ->update(['token' => null]);
        return redirect('/home')->withFlashMessage('Your account has been confirmed. Thanks!');
    }
}
