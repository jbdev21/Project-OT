<?php

namespace App\Http\Controllers\API\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Classer;
use App\ClassSession;
use Auth;

class ClassApiController extends Controller
{
    function info($id)
    {
        return Classer::with('admin')->find($id);
    }

    function sessions(Request $request, $id, $per_page)
    {
        $class = Classer::find($id);
        if(!$request->page || $request->page < 2){
            $current_slot = $this->getNearest($id);
            $current = ceil(round($current_slot / $per_page, 1));

            $currentPage = $current > 0 ? $current : 1;
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });
        }
        
        $array = array();
        $number = 1;
       // return $class->classSession()->with('mistake')->paginate($per_page);
        foreach($class->classSession()->with('mistake')->get() as $session)
        {
            $item = array(
                    'id' => $session->id,
                    'class_number' =>  $session->status != "postponed" ? $number++ : '',
                    'classer_id' => $session->classer_id,
                    'contact_number' => str_replace(["(", ")", ""],"",Auth::user()->contact_number),
                    'classer_type' => $session->classer->type,
                    'date' =>   date('Y-m-d', strtotime($session->date_time)),
                    'date_time' => $this->DateFormater($session->date_time),
                    'status' => $session->status,
                    'postponed_deduction' => $session->postponed_deduction,
                    'reason' => $session->reason,
                    'postponed_timestamp' => $session->postponed_timestamp,
                    'postponed_apply' => $session->postponed_apply,
                    'comment' => $session->comment,
                    'admin_id' => $session->admin_id,
                    'comprehension' => $session->comprehension,
                    'pronounciation' => $session->pronounciation,
                    'fluency' => $session->fluency,
                    'vocabulary' => $session->vocabulary,
                    'grammar' => $session->grammar,
                    'sub_id' => $session->sub_id,
                    'created_at' => $session->created_at,
                    'updated_at' => $session->updated_at,
                    'deleted_at' => $session->deleted_at,
                    'mistake' => $session->mistake
            );

            array_push($array , $item);
        }
         $pageStart = $request->get('page', 1);
        // Start displaying items from this number;
        $offSet = ($pageStart * $per_page) - $per_page; 

        // Get only the items you need using array_slice
        $itemsForCurrentPage = array_slice($array, $offSet, $per_page, true);
        
        return new LengthAwarePaginator($itemsForCurrentPage, count($array), $per_page,Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));

    }

    function classsessions($id)
    {
        date_default_timezone_set(setting('student_timezone'));
     
        $class = Classer::find($id);
        $array = array();
        $selected = 0;
        
        foreach($class->classSession as $session)
        {
           

            $date = new \Carbon\Carbon($session->date_time);
            $ddd = date('Y-m-d H:i:s');
            $diff =  $date->diffInMinutes($ddd, false);
            
            if($session->status == "ready")
            {
                if(setting('postponed_limit_time')){
                    if($diff <= -setting('postponed_limit_time'))
                    {
                        $status = "ready";

                    }else{
                        $status = "absent";
                    }
                    
                }
                elseif(date('Y-m-d', strtotime($session->date_time)) < date('Y-m-d'))
                {
                    $status = "absent";
                
                }else{
                    $status = $session->status;
                }

            }else{
                 $status = $session->status;
            }


            if($status == 'ready')
            {
                if(date('Y-m-d', strtotime($session->date_time)) == date('Y-m-d'))
                {
                    $selected = 1;
                }else {
                    # code...
                    $selected = 0;
                }
            }
            $item = array(
                'id' => $session->id,
                'date_time' => $this->DateFormater($session->date_time),
                'selected' => $selected,
                'status' => $status,
                'diff' => $diff
            );

            array_push($array, $item);
        }   

        return $array;
      
    
    }

    function DateFormater($date_time)
    {
        $weekdays = array();
        $weekdays[0] = '일';
        $weekdays[1] = '월';
        $weekdays[2] = '화';
        $weekdays[3] = '수';
        $weekdays[4] = '목';
        $weekdays[5] = '금';
        $weekdays[6] = '금';

        $totime = strtotime($date_time);
        return date('Y-m-d', $totime) . ' ' .  $weekdays[date('N', $totime)] . ' ' . date('h:i A', $totime);
    }

    function postponed($id)
    {
        $array = array();
        $class = Classer::find($id);
        foreach($class->classSession()->where('status', 'postponed')->get() as $session)
        {
            $item = array(
                'id' => $session->id,
                'date_time' => $this->DateFormater($session->date_time),
                'reason' => $session->reason,
                'postponed_apply' => $session->postponed_apply,
            );

            array_push($array, $item);
        }   

        return $array;
    }

    function getNearest($class_id)
    {
       return ClassSession::where('classer_id', $class_id)->whereDate('date_time', '<=', date('Y-m-d'))->count();
    }

    
}
