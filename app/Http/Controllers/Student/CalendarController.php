<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClassSession;
use App\Admin;
use App\Classer;
use App\Holiday;
use Carbon\Carbon;
use Auth;
use Lang;

class CalendarController extends Controller
{

    function __construct()
    {
        date_default_timezone_set(setting('student_timezone'));
    }

    function index()
    {
      $present_color = setting('present_color', "#7bf7ab");;
      $postponed_color = setting('postponed_color', "#f48c42");
      $absend_color = setting('absend_color', "#7b7187");
      $holiday_color = setting('holiday_color', "#e86f89");
      $waiting_color = setting('waiting_color', "#e86f89");

      $array_days = array();
      $class_sessions = Auth::user()->classSession;
      $label = "";
      $color = '';

          foreach ($class_sessions as $session){
            if($session->classer->status == "ongoing"){
              switch ($session->status) {
                  case "present":
                      $color  = $present_color;
                      $label = "출석";
                      break;
                  case "absent":
                      $color  = $absend_color;
                      $label = "결석";
                      break;
                  case "postponed":
                      $color  = $postponed_color;
                      $label = '연기';
                      break;
                  case "ready":
                      $color  = $waiting_color;
                      $label = "대기";
                      $description = "";
                      break;
              }

              $array = array(
                  "title" => $label,
                  "start" => date('Y-m-d H:i:s',strtotime($session->date_time)),
                  "end" => date('Y-m-d H:i:s',strtotime($session->date_time . "+". $session->classer->minutes ." minutes")),
                  "backgroundColor" => $color,
                  "url" => url('dashboard/class/'. $session->classer->id.'?session='. $session->id)
              );
              array_push($array_days, $array);
            }
          }

          $holidays = Holiday::All();


            foreach ($holidays as $holiday ){
                $array = array(
                    "title" => $holiday->holiday_name,
                    "start" => $holiday->date,
                    "end" => $holiday->date,
                    "backgroundColor" => $holiday_color,
                    "url" => "#",
                    "all-day" => true
                );
                array_push($array_days, $array);
            }
        



        $data = array(
            'class_sessions' => json_encode($array_days),
        );

       // return $data;

      return view('student.calendar.index')->with($data);
    }
}
