<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class exam extends Model
{
    use HasTranslations;
    public $translatable = ['name'];
    protected $guarded;

//    use HasTranslations;
//    protected $fillable = ['name','term','academic_year'];
//    public $translatable = ['name'];

}
