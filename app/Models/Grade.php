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


    public function classrooms(){
        return $this->hasMany(Classroom::class);
    }
}
