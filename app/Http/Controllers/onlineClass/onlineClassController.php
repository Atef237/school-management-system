<?php

namespace App\Http\Controllers\onlineClass;

use App\Http\Controllers\Controller;
use App\Http\Traits\MeetingZoom;
use App\Interfaces\OnlineClassRepositoryInterface;
use Illuminate\Http\Request;

class onlineClassController extends Controller
{
    use MeetingZoom;
    protected $onlineClass;
    public function __construct(OnlineClassRepositoryInterface $OnlineClassRepositoryInterface)
    {
        $this->onlineClass = $OnlineClassRepositoryInterface;
    }


    public function index(){
        return $this->onlineClass->index();
    }

    public function create(){
        return $this->onlineClass->create();
    }

    public function store(Request $request){
        return $this->onlineClass->store($request);
    }

    public function destroy(Request $request){
        return $this->onlineClass->destroy($request);
    }
}
