<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{

   public function replyable()
   {
   		return $this->morphTo();
   }	

   public function admin()
   {
   		return $this->belongsTo(Admin::class);
   }

   public function user()
   {
   		return $this->belongsTo(User::class);
   }

   public function message()
   {
         return $this->belongsTo(Message::class);
   }

   public function testimonial()
   {
         return $this->belongsTo(Testimonial::class);
   }

   public function proofreading()
   {
         return $this->belongsTo(ProofReading::class);
   }
}
