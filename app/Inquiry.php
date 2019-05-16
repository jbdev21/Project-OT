<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    
    public function replies()
    {
        return $this->morphMany('App\Reply', 'replyable');
    }
}
