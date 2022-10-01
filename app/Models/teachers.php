<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Translatable\HasTranslations;

class teachers extends Authenticatable
{
    use HasTranslations;
    public $translatable = ['Name'];   //Select the fields that translate
    protected $guarded = [];



    public function classrooms(){
        return $this->belongsToMany(Classroom::class,'classroom_teacher');
    }

    public function genders(){
        return $this->belongsTo(gender::class,'Gender_id');
    }

    public function specialization(){
        return $this->belongsTo(specialization::class,'Specialization_id');
    }
}
