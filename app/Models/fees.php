<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class fees extends Model
{

    use HasTranslations;
    public $translatable = ["title"];

    protected $guarded;


    public function grade(){
        return $this->belongsTo(Grade::class,'grade_id');
    }

    public function schooleYear(){
        return $this->belongsTo(School_year::class,'schooleYear_id');
    }



}
