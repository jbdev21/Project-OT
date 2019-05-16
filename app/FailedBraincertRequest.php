<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FailedBraincertRequest extends Model
{
    public function failedbraincertable()
   {
   		return $this->morphTo();
   }	
}
