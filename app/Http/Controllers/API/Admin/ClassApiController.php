<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Classer;
use App\Course;
use App\ClassSession;
use App\User;
use App\Admin;

class ClassApiController extends Controller
{
    function classShowList(Request $request, $id, $per_page)
    {
        // $class = Classer::find($id);
        // if(!$request->page || $request->page < 2){
        //     $current_slot = $this->getNearest($id);
        //     $current = ceil(round($current_slot / $per_page, 1));

        //     $currentPage = $current > 0 ? $current : 1;
        //     Paginator::currentPageResolver(function () use ($currentPage) {
        //         return $currentPage;
        //     });
        // }
        
        // return $class->classSession()->paginate($per_page);
        $class = Classer::find($id);
        $student_number = str_replace(["(", ")"," ", '-'],"",$class->user->contact_number);
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
                'date_time' => $session->date_time,
                'phone_recording_link' => "http://phoneedu.bluecomms.co.kr:888/call/call_voice_list?code=30&phone_number=". $student_number . "&call_date=" . date("Y-m-d", strtotime($session->date_time)),
                'formated_date_time' => $this->DateFormater($session->date_time),
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

    function credits($id)
    {
        $class = Classer::find($id);
        $current = $class->postponed_credits;
        $used = $class->classSession->where("postponed_deduction", 1)->count();
        $array = array(
           // 'remaining' => $remaining,
            "used" => $used,
            'current' => $current
        );

        return $array;
    }

    function updatecredits(Request $request, $id)
    {
        $class = Classer::find($id);
        $class->postponed_credits = $request->credit;
        $class->save();
        if(!$request->ajax()){
            return back();
        }
    }

    function getLogs($id)
    {
        $class = Classer::find($id);
        return $class->class_log()->orderBy('id', 'DESC')->get();
    }

    function updateLogs(Request $request, $class_id, $log_id)
    {
        $class = Classer::find($class_id);
        $log = $class->class_log()->where('id', $log_id)->first();
        $log->note = $request->note;
        $log->save();
        if(!$request->ajax())
        {
            return back();
        }else{
            return $log;
        }
    }

    function deleteLogs(Request $request, $class_id, $log_id)
    {
        $class = Classer::find($class_id);
        $class->class_log()->where('id', $log_id)->delete();

        if(!$request->ajax())
        {
            return back();
        }
    }

    function getNearest($class_id)
    {
       return ClassSession::where('classer_id', $class_id)->whereDate('date_time', '<=', date('Y-m-d'))->count();
    }

    function index($id)
    {
        return Classer::find($id);
    }

    function sessionInfo($id)
    {
        return ClassSession::find($id);
    }

    function submission($id)
    {
        $class = Classer::find($id);
        $session = $class->classSession()->where('sub_id', '!=', null)->get();
        $array = array();
        foreach($session as $session)
        {
            $ar = array(
                'id' => $session->id,
                'date_time' => $session->date_time,
                'teacher'   => $session->sub_id ? Admin::find($session->sub_id)->name : ""
            );

            array_push($array, $ar);
        }
        return $array;
    }

    function StudentRemarks($id)
    {
        $student = User::find($id);
        return $student->remarks;
    }

    function updateStudentRemarks(Request $request, $id)
    {
       $student = User::find($id);
       $student->remarks = $request->remarks;
       $student->save();
    }

    //sessing update
    function updatesessionstatus(Request $request, $id)
    {
        $session = ClassSession::find($id);
        $session->status = $request->status;
        $session->save();
    }

    function updatecomment(Request $request, $id)
    {
        $session = ClassSession::find($id);
        $session->comment = $request->comment;
        $session->save();
        return $session->comment;
    }

    function sessions($id)
    {
       $sessions = ClassSession::where('classer_id', $id)->get();
      
        $session_array = array();
        $lastest = false;
        foreach($sessions as $session)
        {

                if(date('Y-m-d', strtotime($session->date_time)) >= date('Y-m-d') AND $session->status == "ready")
                {
                    if(!$lastest){
                        $selected = true;
                        $lastest = true;
                    }else{
                        $selected = false;
                     
                    }
                }else{
                    $selected = false;
                }

            $data = array(
                'date_time' => $session->date_time,
                'formated_date_time' => $this->DateFormater($session->date_time),
                'id'        => $session->id,
                'status'    => $session->status,
                'selected'  => $selected,
                'sub_id'    => $session->sub_id,
                'comment'    => $session->comment,
                'comprehension'    => $session->comprehension,
                'pronounciation'    => $session->pronounciation,
                'fluency'    => $session->fluency,
                'vocabulary'    => $session->vocabulary,
                'grammar'    => $session->grammar,
            );
            array_push($session_array, $data);
        }
        return $session_array;
    }

    

    function postponedsessions($id)
    {
        $sessions = ClassSession::where('classer_id', $id)->where('status', 'postponed')->orderBy('date_time','DESC')->paginate(7);
        return $sessions;
    }

    function updatecomprehension(Request $request, $id)
    {
        $session = ClassSession::find($id);
        $session->comprehension = $request->comprehension;
        $session->save();
    }

    function updatepronounciation(Request $request, $id)
    {
        $session = ClassSession::find($id);
        $session->pronounciation = $request->pronounciation;
        $session->save();
    }

    function updatefluency(Request $request, $id)
    {
        $session = ClassSession::find($id);
        $session->fluency = $request->fluency;
        $session->save();
    }

    function updatevocabulary(Request $request, $id)
    {
        $session = ClassSession::find($id);
        $session->vocabulary = $request->vocabulary;
        $session->save();
        return $session->vocabulry;
    }
    function updategrammar(Request $request, $id)
    {
        $session = ClassSession::find($id);
        $session->grammar = $request->grammar;
        $session->save();
    }
}
