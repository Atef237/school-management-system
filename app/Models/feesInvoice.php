<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class feesInvoice extends Model
{
    protected $guarded;
    use HasTranslations;
    public $translatable = ['notes'];   //Select the fields that translate


    public function grade()
    {
        return $this->belongsTo(Grade::class, 'Grade_id');
    }


    public function School_year()
    {
        return $this->belongsTo(School_year::class, 'school_years_id');
    }


    public function student()
    {
        return $this->belongsTo(student::class, 'student_id');
    }

    public function fees()
    {
        return $this->belongsTo(fees::class, 'fee_id');
    }


}
