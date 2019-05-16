<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    protected $table = "curriculums";

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
