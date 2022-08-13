<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{


    public function checkGuard($request){
        switch ($request->type){
            case 'student':
                $guardName = 'student';
                break;

            case 'parent':
                $guardName = 'parent';
                break;

            case 'teacher':
                $guardName = 'teacher';
                break;

            default :
                $guardName = 'web';
                break;
        }

        return $guardName;
    }


    public function redirect($request){

        switch ($request->type){
            case 'student':
                return redirect()->intended(RouteServiceProvider::STUDENT);
                break;

            case 'parent':
                return redirect()->intended(RouteServiceProvider::PARENT);
                break;

            case 'teacher':
                return redirect()->intended(RouteServiceProvider::TEACHER);
                break;

            default :
                return redirect()->intended(RouteServiceProvider::HOME);
        }

    }






}
