<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    function page()
    {
    	return $this->hasMany(BookPage::class);
    }

    function classer()
    {
    	return $this->hasMany(Classer::class);
    }

    public function curriculums()
    {
        return $this->belongsToMany(Curriculum::class);
    }

    public function leveltest()
    {
        return $this->hasMany(LevelTest::class);
    }
    
}
