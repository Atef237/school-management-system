<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class School_year extends Model
{

    use HasTranslations;
    public $translatable = ['name'];
    protected $table = 'school_years';
    protected $guarded = [];
    protected $with=['classrooms'];


    public function grade(){
        return $this->belongsTo(Grade::class);
    }


    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }

}
