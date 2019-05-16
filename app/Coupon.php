<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    function classer()
    {
        return $this->belongsTo(Classer::class);
    }
}
