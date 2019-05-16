<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    
	function admin()
	{
		return $this->Has(Admin::class);
	}

}
