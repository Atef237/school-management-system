<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Models\Grades;
use App\Models\School_year;
use App\Models\teachers;


class Subject extends Model
{
    
    use HasTranslations;
    public $translatable = ["name"];
    protected $guarded = [];


    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }

    // جلب اسم الصفوف الدراسية
    public function School_year()
    {
        return $this->belongsTo(School_year::class, 'school_year_id');
    }

    // جلب اسم المعلم
    public function teacher()
    {
        return $this->belongsTo(teachers::class, 'teacher_id');
    }
}
