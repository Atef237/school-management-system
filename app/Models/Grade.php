<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Grade extends Model
{

    use HasTranslations;
    public $translatable = ['name'];   //Select the fields that translate

    protected $guarded=[];
    protected $table = 'Grades';
    public $timestamps = true;


    public function School_years(){
        return $this->hasMany(School_year::class);
    }

    public function classrooms(){
        return $this->hasMany(classroom::class);
    }

}
