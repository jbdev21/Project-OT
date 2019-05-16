<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{

   

    function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->morphMany('App\Reply', 'replyable');
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }
}
