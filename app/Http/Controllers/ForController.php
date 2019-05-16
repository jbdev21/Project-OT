<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BraincertSchedule;
use App\Events\SessionDayCreated;
use App\ClassSession;
use App\Library\Braincert\Braincert;
use App\Notifications\FailedBraincertRequest;
use App\Admin;
use Auth; 

class ForController extends Controller
{
   // use InteractsWithQueue;

    protected $endpoint;
    protected $session;


    public function __construct()
    {
        $this->endpoint = 'https://api.braincert.com/v2';

    }

    function index(Request $request){
       $user_id = setting('admin_to_notify');
       $admin = Admin::find($user_id);
        if($request->show == "noti"){
            $admin->notifications;
        }else{
         $admin->notify(new FailedBraincertRequest(3));

        }
  
      
    }

    /**
     * Handle the event.
     *
     * @param  SessionDayCreated  $event
     * @return void
     */
    public function handle($sess)
    {
        

        if(setting('default_video_vitual_room') == 'braincert' ){
            
            $sendRequest = $this->sendRequest();

            if($sendRequest->status == "ok")
            {
                 $class_id = $sendRequest->class_id;

                 // for student encrypted lunch url
                 $student_url = $this->studentUrl($class_id)->encryptedlaunchurl;

                 //saving to DB
                 $this->saveToDb($event->id, $class_id ,$student_url);

            }
        }
    }


    /**
     * Handle the event.
     * 
     * @return object from braincert
     */

    private function sendRequest()
    {
        $task = 'schedule';
        $data = [
            'apikey' => setting('braincert_api_key'),
            'task' => $task,
            'title' => $this->session->classer->type,
            'timezone' => setting('braincert_timezone'),
            'date' => date('Y-m-d',strtotime($this->session->date_time)),
            'start_time' => date('h:iA', strtotime($this->session->date_time)),
            'end_time' => date('h:iA',strtotime($this->session->date_time . "+". $this->session->classer->minutes ." minutes"))
        ];

        $data_string = http_build_query($data);

        $ch = curl_init($this->endpoint);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        return json_decode($result);

    }




    /*
     * generate teacher url for braincert
     * return teacher href URL
     */
    private function teacherUrl($class_id, $lesson_name)
    {
        //
    }




    /*
     * generate student url for braincert
     * return student href URL
     */
    private function studentUrl($class_id)
    {
        $student_id = Auth::user()->id;
        $username = Auth::user()->username;

        $username ? $username == $username : $username ='student_' . $student_id;

        $task = 'getclasslaunch';
        $data = [
            'apikey' => setting('braincert_api_key'),
            'task' => $task,
            'userId' => $student_id,
            'userName' => $username,
            'isTeacher' => 0,
            'lessonName' => 'lesson_ ' .date('Y-m-d', strtotime($this->session->date_time)),
            'courseName' => $this->session->classer->type
        ];

        $data_string = http_build_query($data);

        $ch = curl_init($this->endpoint);

        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $result = curl_exec($ch);
        return json_decode($result);

    }


    private function saveToDb($session_id, $class_id,$student_room_url)
    {
        $braincert = new BraincertSchedule;
        $braincert->class_session_id = $session_id;
        $braincert->braincert_class_id = $class_id;
        $braincert->student_room_url = $student_room_url;
        $braincert->save();
    }
}
