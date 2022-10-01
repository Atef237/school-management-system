<?php

namespace App\Http\Traits;

use App\Providers\RouteServiceProvider;

trait AuthTrait
{


    public function chekGuard($type){

        if($type == 'student'){
            $guardName = 'student';
        }
        elseif ($type == 'parent'){
            $guardName = 'parent';
        }
        elseif ($type == 'teacher'){
            $guardName = 'teacher';
        }
        else{
            $guardName = 'web';
        }
        return $guardName;
    }


    public function redirect($type){

        switch ("$type"){
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
