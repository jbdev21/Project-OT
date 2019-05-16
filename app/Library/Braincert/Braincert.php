<?php

namespace App\Library\Braincert;

use App\BraincertSchedule;
use App\FailedBraincertRequest;
use App\ClassSession;
use App\Leveltest;
use App\Admin;
use App\User;

class Braincert{

	protected $endpoint;
	protected $api_key;
	protected $session;
	protected $leveltest;
	protected $params;
	protected $user_id;
	protected $encrypt_url = true;
	protected $task;
	protected $data_status;

	public $is_teacher;
	public $admin_id;
	public $response;



	public $class_id;
	public $hasFailedRequest = false;	

	function __construct(){
		$this->endpoint = setting('braincert_api_endpoint', 'https://api.braincert.com/v2');
		$this->api_key = setting('braincert_api_key', null);
	}


	public  function setSchedule($session_id, $user_type, $data_status = 'new')
	{
		$this->data_status = $data_status;

		$this->session = ClassSession::find($session_id);

		$this->scheduleParams()->sendRequest()->save();
	   	 
      	return $this->response;

	}

	public function setLevelTestSchedule($leveltest_id, $data_status = "new"){
		$this->data_status = $data_status;
		
		$this->leveltest = Leveltest::find($leveltest_id);

		$this->levelTestParams()->sendRequest()->saveLevelTest();

		return $this->response;
	}


	public function url($session_id, $type = 'student', $encrypt = true)
	{

		$type == 'student' ?  $this->is_teacher = false : $this->is_teacher = true;
		$this->session = ClassSession::find($session_id);
		$class = $this->session->braincert;
		if($class){
			$this->linkParams($class->braincert_class_id)->sendRequest();
		
			if($encrypt){
				return $this->response->encryptedlaunchurl;
			}else{
				return $this->response->launchurl;
			}
		}else{
			return "#";
		}
		

	}

	public function leveltest_url($leveltest_id, $type = 'student', $encrypt = true)
	{

		$type == 'student' ?  $this->is_teacher = false : $this->is_teacher = true;
		$this->leveltest = Leveltest::find($leveltest_id);
		$class = $this->leveltest->braincert;
			if($class){
			$this->leveltestlinkParams($class->braincert_class_id)->sendRequest();
			
			if($encrypt){
				return $this->response->encryptedlaunchurl;
			}else{
				return $this->response->launchurl;
			}
		}else{
			return "#";
		}

	}



	public function removeClass($session_id)
	{
		//$type == 'student' ?  $this->is_teacher = false : $this->is_teacher = true;
		
		$this->session = ClassSession::find($session_id);
		$class = BraincertSchedule::where('class_session_id', $session_id)->first();

		$request = $this->removeParams($class->braincert_class_id)->sendRequest()->get();
		return $this->response;
	}


	private function save()
	{
		if($this->response->status == "ok"){
			
			$braincert = new BraincertSchedule;
			$braincert->braincert_class_id = $this->getClassId();
		    return $this->session->braincert()->save($braincert) ?  true : false;

		}else{
			if($this->data_status == 'new')
			{
				$failedResquest = new FailedBraincertRequest;
				$failedResquest->message = $this->response->error;
				$failedResquest->task = $this->task;

				$this->hasFailedRequest = true;
				return $this->session->failedbraincert()->save($failedResquest) ?  true : false;		
			}
			return true;	
		}
	}

	private function saveLevelTest()
	{
		if($this->response->status == "ok"){
			
			$braincert = new BraincertSchedule;
			$braincert->braincert_class_id = $this->getClassId();
		    return $this->leveltest->braincert()->save($braincert) ?  true : false;

		}else{
			if($this->data_status == 'new')
			{
				$failedResquest = new FailedBraincertRequest;
				$failedResquest->message = $this->response->error;
				$failedResquest->task = $this->task;

				$this->hasFailedRequest = true;
				return $this->leveltest->failedbraincert()->save($failedResquest) ?  true : false;		
			}

			return true;	
		}
	}


	public static function show($class){
		$classer = $this->endpoint == $class;
		return $classer;
	}



	public function scheduleParams()
	{
		$this->task = "schedule";
		$add_before = setting('braincert_minutes_before', 60);
		$add_after = setting('braincert_minutes_after', 60);

		$end_add_time =  $this->session->classer->minutes + $add_after; 
		$start_time = date('h:iA', strtotime($this->session->date_time . " +" . $add_before ." minutes"));
		$end_time = date('h:iA', strtotime($this->session->date_time . " +".$end_add_time ." minutes"));

		
		$data = [
            'apikey' => setting('braincert_api_key'),
            'task' => 'schedule',
            'title' => $this->session->classer->type,
            'timezone' => setting('braincert_timezone'),
            'date' => date('Y-m-d',strtotime($this->session->date_time)),
            'start_time' => $start_time,
            'end_time' => $end_time
        ];

        $this->params = $data;

        return $this;
	}

	public function levelTestParams()
	{
		$this->task = "schedule";
		$add_before = setting('braincert_minutes_before', 60);
		$add_after = setting('braincert_minutes_after', 60);

		$end_add_time =  setting('braincert_leveltest_minutes', 20) + $add_after; 
		$start_time = date('h:iA', strtotime($this->leveltest->time . " -" . $add_before ." minutes"));
		$end_time = date('h:iA', strtotime($this->leveltest->time . " +".$end_add_time ." minutes"));

		
		$data = [
            'apikey' => setting('braincert_api_key'),
            'task' => 'schedule',
            'title' => 'LEVEL TEST',
            'timezone' => setting('braincert_timezone'),
            'date' => date('Y-m-d',strtotime($this->leveltest->date)),
            'start_time' => $start_time,
            'end_time' => $end_time
        ];

        $this->params = $data;

        return $this;
	}


	public function removeParams($class_id)
	{
		$this->task = "removeclass";
		
		$data = [
            'apikey' => setting('braincert_api_key'),
            'task' => 'removeclass',
            'cid' => $class_id,
        ];

        $this->params = $data;

        return $this;
	}



	public function linkParams($class_id)
	{
		$this->task = "getclasslaunch";

		if($this->is_teacher){
			$user = $this->session->classer->admin;
			if($user->username == ""){
				$username = "Teacher_" . $user->id;
			}else{
				$username = $user->username;
			}
		}else{
			$user = $this->session->classer->user;
			if($user->username == ""){
				$username = "Student_" . $user->id;
			}else{
				$username = $user->username;
			}
		}

        $task = 'getclasslaunch';
        $data = [
            'apikey' => setting('braincert_api_key'),
            'task' => $task,
            'class_id' => $class_id,
            'userId' => $user->id,
            'userName' => $username,
            'isTeacher' => $this->is_teacher ? 1 : 0,
            'lessonName' => 'lesson_ ' .date('Y-m-d', strtotime($this->session->date_time)),
            'courseName' => $this->session->classer->type
        ];

        $this->params = $data;
        return $this;
	}


	public function leveltestlinkParams($leveltest_id)
	{
		$this->task = "getclasslaunch";

		if($this->is_teacher){
			$user = $this->leveltest->admin;
			if($user->username == ""){
				$username = "Teacher_" . $user->id;
			}else{
				$username = $user->username;
			}
		}else{
			$user = $this->leveltest;
			$username = $this->leveltest->name;
		}

        $task = 'getclasslaunch';
        $data = [
            'apikey' => setting('braincert_api_key'),
            'task' => $task,
            'class_id' => $leveltest_id,
            'userId' => $user->id,
            'userName' => $username,
            'isTeacher' => $this->is_teacher ? 1 : 0,
            'lessonName' => 'lesson_ ' .date('Y-m-d', strtotime($this->leveltest->date)),
            'courseName' => "Level Test"
        ];

        $this->params = $data;
        return $this;
	}


	 public function sendRequest()
    {

        $data_string = http_build_query($this->params);

        $ch = curl_init($this->endpoint);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        
        $this->response = json_decode($result);
        return $this;
    }


    public function getClassId()
   	{
   		if($this->response->status == "ok")
   		{
   			return $this->response->class_id;
   		}else{
   			return false;
   		}
   	}



   	/*
    *	for getting response
    *   Chain
    */
   	public function get()
   	{
   		return $this->response;
   	}



}


