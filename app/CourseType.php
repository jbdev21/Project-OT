<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseType extends Model
{

	use SoftDeletes;

	function course(){
		return $this->hasMany(Course::class);
	}

	public function code()
	{
		$code = '';
		$name = $this->name;

		$array = explode(' ', $name);
		foreach($array  as $array)
		{
			$code .= strtoupper(str_limit($array,1,''));
		}

		return $code;
	}
}
