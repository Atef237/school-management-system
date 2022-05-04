<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait AttachFileTrait
{


    public function uploadFile($request,$name,$filePath){

        $file_name = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs($filePath .'/',$file_name,'upload_attachments' );
      //  return  $file_name;
    }


    public function downloadFile($filePath,$filename){
        return response()->download(public_path($filePath.'/'.$filename));
    }


    public function deleteFile($filePath,$file_name){
        $exists = storage::disk('upload_attachments')->exists($filePath.'/'.$file_name);
        if($exists){
            storage::disk('upload_attachments')->delete($filePath.'/'.$file_name);
        }
    }


}
