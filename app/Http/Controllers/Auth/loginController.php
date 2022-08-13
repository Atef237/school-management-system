<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    use AuthTrait;

    public function loginForm($type){
        return view('auth.login',compact('type'));
    }

    public function postLogin(Request $request){

       // return $request;

        if (auth()->guard($this->checkGuard($request))->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])){
          return  $this->redirect($request);
        }else{
            return redirect()->back();
        }
    }


    public function logout(Request $request , $type){
       // return $type;
        Auth::guard($type)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
