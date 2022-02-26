<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class AccountsFund extends Model
{
    use HasTranslations;

    protected $guarded=[];
    protected $translatable = ['notes'];
}
