<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    public $guarded = [];

    public function Attachmentable(){
        return $this->morphTo();
    }
}
