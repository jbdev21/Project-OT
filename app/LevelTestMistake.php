<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelTestMistake extends Model
{
    function LevelTest()
    {
        return $this->belongsTo(LevelTest::class);
    }

    function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
