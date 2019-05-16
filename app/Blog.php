<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    
    function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
	
}
