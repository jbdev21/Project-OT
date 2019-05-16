<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    public function classer()
    {
        return $this->belongsToMany(Classer::class);
    }

    public function course()
    {
        return $this->belongsToMany(Course::class);
    }
}
