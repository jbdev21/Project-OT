<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassLog extends Model
{
    function classer()
    {
        return $this->belongsTo(Classer::class);
    }
}
