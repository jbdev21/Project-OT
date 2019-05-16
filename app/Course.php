<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{

    use SoftDeletes;

    public function coursetype()
      {
          return $this->belongsTo(CourseType::class,'course_type_id', 'id');
      }

    public function classer()
      {
          return $this->hasMany(Classer::class);
      }

    public function day()
      {
          return $this->belongsToMany(Day::class);
      }
}
