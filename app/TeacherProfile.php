<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeacherProfile extends Model
{
    function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
