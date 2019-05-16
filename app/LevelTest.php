<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LevelTest extends Model
{
   public function user()
   {
   		return $this->belongsTo(User::class);
   }

   public function admin()
   {
   		return $this->belongsTo(Admin::class);
   }

   public function getDateTimeAttribute($value)
    {
        return date(setting('datetime_format'), strtotime($value));
    }

    public function braincert()
    {
        return $this->morphOne('App\BraincertSchedule', 'braincertable');
    }

    public function failedbraincert()
    {
        return $this->morphOne('App\FailedBraincertRequest', 'failedbraincertable');
    }

    public function level_test_mistake()
    {
        return $this->HasMany(LevelTestMistake::class);
    }

    public function book()
    {
        return $this->belongsTo(Book::class);
    }

}
