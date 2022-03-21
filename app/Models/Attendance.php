<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Attendance extends Model
{
    use HasTranslations;

    protected $guarded = [];

    protected $translatable = ['notes'] ;
}
