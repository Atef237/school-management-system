<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\auth;

class loginController extends Controller
{
    use AuthTrait;

    public function loginForm($type){
        return view('auth.login',compact('type'));
    }

    public function postLogin(Request $request){
     // return  $this->chekGuard($request->type);
        dd( auth::guard($this->chekGuard($request->type))->attempt(['email' =>'test@test.com', 'password' => 12345 ]) );

        if(auth::guard("teacher")->attempt(['email' => $request->email, 'password' => $request->password])){
            return $this->redirect($request->type);
        }else{
            return redirect()->back();
        }

    }


    public function logout(Request $request , $type){
       // return $type;
        auth::guard($type)->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
