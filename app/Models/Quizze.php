<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Quizze extends Model
{
    use HasTranslations;
    public $translatable = ['name'];   //Select the fields that translate
    protected $guarded=[];

    public function teacher(){
        return $this->belongsTo(teachers::class,'teacher_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function school_year(){
        return $this->belongsTo(School_year::class,'school_year_id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class,'classroom_id');
    }

}
