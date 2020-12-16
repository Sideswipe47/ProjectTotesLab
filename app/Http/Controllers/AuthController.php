<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getLogin(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
        $credential = $request->only('email', 'password');
        $remember_me = ($request->remember_me == "on");

        $remember_me_token_expire_time = 720;

        if(Auth::attempt($credential, $remember_me)){
            if($remember_me){
                //get the randomly generated cookie by laravel
                $remember_me_tokenName = Auth::getRecallerName();
                //get cookie jar
                $cookieJar = Auth::guard()->getCookieJar();
                //get cookie value 
                $cookieVal = $cookieJar->queued($remember_me_tokenName)->getValue();
                $cookieJar->queue($remember_me_tokenName, $cookieVal, $remember_me_token_expire_time);
            }
            return redirect()->to('/home');
        }else{
            return redirect()->back()->withErrors(['error' => 'Authentication Error. Please check your e-mail and password again1']);
        }
    }

    
}
