<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Classroom extends Model
{
    use HasTranslations;

    protected $guarded=[];
    protected $table = 'classrooms';
    protected $translatable = ['name'];

     // protected $with=['schoolYear'];

    public function schoolYear(){
        return $this->belongsTo(School_year::class,'school_year_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class);
    }

}
