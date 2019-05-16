<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassSession extends Model
{

    protected $fillable = ['date_time'];

     public function classer()
    {
        return $this->belongsTo('App\Classer');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    

    public function subteacher()
    {
        return $this->belongsTo(Admin::class, 'sub_id', 'id');
    }

    public function mistake()
    {
        return $this->hasMany(Mistake::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function braincert_schedule()
    {
        return $this->hasOne(BraincertSchedule::class);
    }
 

    public function failedBraincertRequest()
    {
        return $this->hasMany(FailedBraincertRequest::class);
    }

    public function braincert()
    {
        return $this->morphOne('App\BraincertSchedule', 'braincertable');
    }

    public function failedbraincert()
    {
        return $this->morphOne('App\FailedBraincertRequest', 'failedbraincertable');
    }

    
  
}
