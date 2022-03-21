<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    use SoftDeletes;

    use HasTranslations;
    public $translatable = ["name"];
    protected $guarded = [];


    public function gender(){
        return $this->belongsTo(gender::class,'gender_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class,'Grade_id');
    }

    public function classroom(){
        return $this->belongsTo(Classroom::class,'Classroom_id');
    }

    public function schoole_year(){
        return $this->belongsTo(School_year::class,'school_years_id');
    }

    public function Attachments(){   // Relationship with attachments to return attachments
        return $this->morphMany(Attachment::class,'Attachmentable');
    }

    public function Nationality(){
        return $this->belongsTo(nationalitie::class,'nationalitie_id');
    }

    public function parent(){
        return $this->belongsTo(MyParent::class);
    }

    public function type_boolet(){
        return $this->belongsTo(typeBlood::class,'blood_id');
    }

    public function student_account(){
        return $this->hasMany(StudentAccount::class,'student_id');
    }

    public function attendance(){
        return $this->hasMany(Attendance::class,'student_id');
    }

}
