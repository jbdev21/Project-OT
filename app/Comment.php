<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    function user()
    {
    	return $this->belongsTo(User::class);
    }

    function admin()
    {
    	return $this->belongsTo(Admin::class);
    }
}
