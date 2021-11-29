<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MyParent extends Model
{
    use HasTranslations;

    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];    //Select the fields that translate

    protected $table = 'my_parents';

    protected $guarded = [];

    public function attachments(){
        return $this->hasMany(ParentAttachment::class);
    }

}
