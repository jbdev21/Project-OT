<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\Admin\PostponedClassNotification;
use \Illuminate\Pagination\Paginator;
use App\Classer;
use App\Admin;
use App\User;
use App\ClassSession;
use Auth;
use Carbon\Carbon;
use Lang;

class ClassController extends Controller
{
    function __construct()
    {
        date_default_timezone_set(setting('student_timezone'));
    }
    
    public function index()
    {
       // return today_classroom();
        $notEnded = Auth::user()->classer()
                ->where('deleted_at', Null)->where('status', '!=', 'ended')
                ->orderby('start_date','DESC')->get()
                ->sortByDesc(function($last){
                    return $last->getLastSession();
                });
        $ended = Auth::user()->classer()->where('deleted_at', Null)->where('status','ended')->orderby('start_date','DESC')->get();
        $classes = $notEnded->merge($ended);
        return view('student.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $per_page = 15;
        $class = Classer::find($id);
       
        $all_sessions = $class->classSession;
        $postponed_sessions = $class->classSession()->where('status', 'postponed')->get();
        $latest_session = $class->classSession()->where('status', 'ready')->whereDate('date_time', '>=', date('Y-m-d') )->first();
        $selected_session = ClassSession::find($request->session);

        //algorithm for paging
         if(!$request->page){
            $current_slot = $this->getNearest($id);
            $current = ceil(round($current_slot / $per_page, 1));

            $currentPage = $current > 0 ? $current : 1;
            Paginator::currentPageResolver(function () use ($currentPage) {
                return $currentPage;
            });
        }

        $sessions = $class->classSession()->orderby('date_time', 'ASC')->paginate($per_page);

        $pages = count($all_sessions) / 10;
        if($pages > 1)
        {

        }else{
            
        }
        return view('student.class.show', compact('class', 'sessions','postponed_sessions','all_sessions', 'selected_session', 'videoware_url', 'latest_session'));
    }

    function getNearest($class_id)
    {
       return ClassSession::where('classer_id', $class_id)->whereDate('date_time', '<=', date('Y-m-d'))->count();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function postpone(Request $request, $id)
    {
        $classer = Classer::find($id);
        $days = $request->dates;


       $array_days = array();

        // $current = $classer->postponed_credits;
        // $subtracted = $current - count($days);
        // $classer->postponed_credits = $subtracted;
        // $classer->save();


        foreach($classer->day as $classer_days)
        {
            array_push($array_days, $classer_days->day_number);
        }

        foreach($days as $day){
            $class_session = ClassSession::find($day);
            $class_session->status = "postponed";
            $class_session->reason = $request->reason;
            $class_session->postponed_timestamp = date('Y-m-d H:i:s');
            $class_session->postponed_apply = "student";
            $class_session->postponed_deduction = 1;
            $class_session->save();
        }


        //while loop for adding new day
        $last_session = $classer->classSession()->orderBy('id','DESC')->first();
        $date = date("Y-m-d", strtotime($last_session->date_time));
        $loop = true;
        $found_date = 1;
        $i = 1;
        while ($loop) {
            if ($found_date <= count($days)) {
                $added_date = date("Y-m-d", strtotime("+$i day", strtotime($date)));
                $day_num = date('N', strtotime($added_date));
                if (in_array($day_num, $array_days)) {
                    if (!in_array($added_date, arrayHolidayDates())) {
                        $found_date++;
                        $date_time = $added_date . " " . date('H:i', strtotime($classer->time));
                        $class_session = new ClassSession;
                        $class_session->date_time = $date_time;
                        $class_session->status = 'ready';
                        $class_session->admin_id = $classer->admin_id;
                        $class_session->classer_id = $classer->id;
                        $class_session->save();
                    }
                }

            } else {
                $loop = false;
                break;
            }
            $i++;
        }

        $admins = Admin::where('type', 'administrator')->get();
        $student = User::find(Auth::user()->id);
        foreach($admins as $admin)
        {
            $admin->notify(new PostponedClassNotification($student, true));
        }
        

        if(!$request->ajax())
        {
            return redirect()->back()->with('message', Lang::get('label.item_updated'));
        }else{
            return $classer->getRemainingCredits();
        }

    }

    public function cancelPostpone(Request $request, $id)
    {
        $class_session = ClassSession::find($id);
        $class_session->status = "ready";

     
            $class_session->postponed_deduction = 0;
            $class_session->reason = "";
            $class_session->postponed_timestamp = null;
            $class_session->postponed_apply = "";
            $class_session->save();

            //finding class then fetch last session preparing to delete
            $class = Classer::find($class_session->classer_id);
            $last_session = $class->classSession()->orderBy('id','DESC')->first();
            $session = ClassSession::find($last_session->id);
            $session->delete();
        
         $admins = Admin::where('type', 'administrator')->get();
         $student = User::find(Auth::user()->id);
        foreach($admins as $admin)
        {
            $admin->notify(new PostponedClassNotification($student, false));
        }

        if(!$request->ajax())
        {
            return redirect()->back()->with('message', Lang::get('label.item_updated'));
        }else{
            return $class->getRemainingCredits();
        }
    }

}
