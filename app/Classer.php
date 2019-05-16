<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Classer extends Model
{
    use SoftDeletes;

    function classSession()
    {
    	return $this->hasMany(ClassSession::class);
    }

    function admin()
    {
    	return $this->belongsTo(Admin::class);
    }

    function user()
    {
    	return $this->belongsTo(User::class);
    }


    public function day()
    {
        return $this->belongsToMany(Day::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function getRemainingSession()
    {
       return self::classSession()->whereDate('date_time', '>=', date('Y-m-d'))->where('status','ready')->get();
    }
    
    public function getRemainingCredits()
    {
        $credits = $this->postponed_credits;
        $used = self::classSession()->where("postponed_deduction", 1)->count();
        $remaining = $credits - $used;
        if($remaining > 0){
            return $remaining;
        }else{
            return 0;
        }
    }


     public function getFirstSession()
    {
        return self::classSession()->orderby('date_time', 'ASC')->first();
    }

    public function getLastSession()
    {
        return self::classSession()->orderby('date_time', 'DESC')->first();
    }

    public function class_log()
    {
        return $this->hasMany(ClassLog::class);
    }

    public function coupons()
    {
         return $this->hasMany(Coupon::class);
    }

   
}
