<?php

namespace App\Http\Controllers\setting;

use App\Http\Controllers\Controller;
use App\Http\Traits\AttachFileTrait;
use App\Models\setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use AttachFileTrait;

    public function index(){
        $setting = setting::all();

        $data['setting'] = $setting->flatMap(function ($setting){
            return [$setting->key => $setting->value];
        });

        return view('dashboard.setting.index',$data);

    }


    public function update(Request $request){

        $logo = setting::where('key','logo')->select('value')->first();

        if($request->hasFile('logo')){
            $this->deleteFile('attachments/setting/logo',$logo->value);
            $this->uploadFile($request,'logo','attachments/setting/logo');
        }
        $data = $request->except('_method','_token','test');
        $data['logo'] = $request->file('logo')->getClientOriginalName();

        foreach ( $data as $key=>$value){
            Setting::where('key', $key)->update(['value' => $value]);
        }
        return back();
    }
}
