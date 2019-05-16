<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mistake extends Model
{
     public function classSession()
    {
        return $this->belongsTo(ClassSession::class);
    }
}
