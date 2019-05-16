<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    function admin()
    {
    	return $this->belongsTo(Admin::class);
    }
}
