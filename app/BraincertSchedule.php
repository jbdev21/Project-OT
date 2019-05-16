<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BraincertSchedule extends Model
{
   
   public function braincertable()
   {
   		return $this->morphTo();
   }	

   // public function class_session()
   // {
   // 		return $this->belongsTo(ClassSession::class);
   // }
}
