<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class PaymentStudent extends Model
{
    use HasTranslations;

    protected $guarded=[];
    protected $translatable = ['notes'];


    public function student(){
        return $this->belongsTo(student::class,'student_id');
    }

}
