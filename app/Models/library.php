<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class library extends Model
{
    use HasTranslations;
    public $translatable = ['title'];   //Select the fields that translate
    protected $table = "libraries";
    use HasFactory;

    protected $guarded = [];


    public function teacher(){
        return $this->belongsTo(teachers::class);
    }

    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function schooleYear(){
        return $this->belongsTo(School_year::class,'school_year_id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }


}
