<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Translatable\HasTranslations;

class MyParent extends Authenticatable
{
    use HasTranslations, Notifiable;

    public $translatable = ['Name_Father','Job_Father','Name_Mother','Job_Mother'];    //Select the fields that translate

    protected $table = 'my_parents';

    protected $guarded = [];

    public function attachments(){
        return $this->hasMany(ParentAttachment::class);
    }

}
