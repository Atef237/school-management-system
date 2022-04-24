<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_class extends Model
{
    use HasFactory;

    protected $guarded=[];


    public function classroom(){
        return $this->belongsTo(classroom::class,'classroom_id');
    }
    public function schoolYear(){
        return $this->belongsTo(School_year::class,'school_year_id');
    }

    public function grade(){
        return $this->belongsTo(Grade::class,'Grade_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
