<?php

namespace App\Library\Videoware;


use App\Classer;
use App\ClassSession;
use App\LevelTest;

class Videoware {

	protected $host;

	function __construct(){
		//$this->host = 'http://video2.'. setting('videoware_url') . '.co.kr/Urllink/default.asp';
		$this->host = 'http://'. setting('videoware_url') . '.videoware.kr/sso/type1.do';
	}

	function url($id, $type = 'student', $is_leveltest = false)
	{
		
		$type == "student" ? $type_code = setting('videoware_student_code') : $type_code = setting('videoware_teacher_code');

		if($is_leveltest){
			$leveltest = LevelTest::find($id);
			$class_code = $leveltest->code;
		}else{

			//$session = ClassSession::find($id);
			
			$class = Classer::find($id);

			if($class->admin_id == "")
			{
				if($class->admin_id == "")
				{
					return "#";
				}else{
					//$session->admin_id = $class->admin_id;
				//	$session->save();
				}
			}

			if($class->admin){
				$class_code = date('Ymd') . date('Hi', strtotime($class->time)) .  $class->admin->username;
			}else{	
				$class_code ="#";
			}
		}
		

		if($type == 'teacher'){
			if($is_leveltest){
				$user = $leveltest->admin;
			}else{
				$user = $class->admin;	
			}

			if($user->username == ""){
				$username = "Teacher_" . $user->id;
			}else{
				$username = $user->username;
			}
		}else{
			if($is_leveltest){
				$username = $leveltest->name;
			}else{
				$user = $class->user;
				if($user->username == ""){
					$username = "Student_" . $user->id;
				}else{
					$username = $user->username;
				}
			}
			
		}


		$href = $this->host .'?userid=' . $username .'&username='. $username . '&confcode=' . $class_code . '&conftype=2&usertype='. $type_code;

		return $href;
	}

}
