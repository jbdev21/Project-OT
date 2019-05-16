<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProofReading extends Model
{
    public function replies()
    {
        return $this->morphMany('App\Reply', 'replyable');
    }

    public function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
