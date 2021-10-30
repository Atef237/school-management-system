<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{

    public function loginForm(){
        return view('auth.login');
    }

    public function postLogin(Request $request){
         //['email'=> $request->email, 'password'=> $request->password]

       // $request->request->remove('_token');
       // return $request;
        if (auth()->guard('user')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")])){
            // return view('dashboard.index');
            return redirect()->route('/');
        }else{
            return redirect()->back();
        }



    }

}
