<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class student extends Model
{
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

}
