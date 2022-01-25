<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class specialization extends Model
{
    use HasTranslations;
    public $translatable = ['Name'];   //Select the fields that translate
    protected $guarded = [];
}
