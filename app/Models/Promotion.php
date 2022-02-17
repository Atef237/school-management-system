<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{

    protected $guarded;



    public function student(){
        return $this->belongsTo(student::class,'student_id');
    }

    public function f_grade(){
        return $this->belongsTo(Grade::class,'from_grade');
    }

    public function t_grade(){
        return $this->belongsTo(Grade::class,'to_grade');
    }

    public function f_school_year(){
        return $this->belongsTo(School_year::class,'from_school_years');
    }

    public function t_school_year(){
        return $this->belongsTo(School_year::class,'to_school_years');
    }


    public function f_classroom(){
        return $this->belongsTo(Classroom::class,'from_classroom');
    }

    public function t_classroom(){
        return $this->belongsTo(Classroom::class,'to_classroom');
    }

}
