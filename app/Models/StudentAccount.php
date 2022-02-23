<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class StudentAccount extends Model
{
    protected $guarded;
    use HasTranslations;
    public $translatable = ['notes'];   //Select the fields that translate

}
