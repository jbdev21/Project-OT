<?php

namespace App\Http\Controllers\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\ClassSession;
use App\Book;
use App\Holiday;
use App\Mistake;
use Carbon\Carbon;
use Auth;

class SessionController extends Controller
{
   function __construct()
    {
        date_default_timezone_set(setting('teacher_timezone'));
    }
    
    public function index(Builder $builder)
    {   
        $teacher = Auth::user();
        $noti = $teacher->notifications()->where('type', 'App\Notifications\AssignClassNotification')->get();
        
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }
        
         if (request()->ajax()) {
            $sessions = Auth::user()->session()->whereHas('classer', function($query){
                $query->where('status', 'ongoing')->where("admin_id", Auth::user()->id)->has("user");
            })->limit(300)->get();
            return DataTables::of($sessions)
                ->addColumn('show', function ($session) {
                        return '<a href="' . route('teacher.session.show', $session->id) . '" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i> View</a>';
                })

                ->addColumn('username', function ($session) {
                        return $session->classer->user->username;
                })

                ->addColumn('name', function ($session) {
                        return $session->classer->user->name . '<br>' . $session->classer->user->korean_name;
                })
                ->addColumn('minutes', function ($session) {
                        return $session->classer->minutes . 'min.';
                })
                ->addColumn('date_time', function ($session) {
                    return date_formater('date_time_format',$session->date_time);
                })
                ->addColumn('status', function ($session) {
                    return ucfirst($session->status);
                })
                ->addColumn('total_sessions', function ($session) {
                        return $session->classer->total_sessions;
                })
                ->addColumn('time', function ($session) {
                        return date('h:iA', strtotime($session->classer->time));
                })
                ->addColumn('type', function ($session) {
                    return ucfirst($session->classer->type);
                })
                ->addColumn('contact_numbers', function ($session) {
                        if($session->classer->user){
                            return $session->classer->user->contact_number . '<br>' . $session->classer->user->contact_number1;
                        }else{
                            return "wla";
                        }   
                })
                ->addColumn('comment', function ($session) {
                    return strlen($session->comment);
                })

                ->addColumn('duration', function ($session) {
                        $first_session = $session->classer->getFirstSession();
                        $last_session = $session->classer->getLastSession();
                        if($first_session)
                        {
                            return date_formater('date_format', $first_session->date_time). ' / ' . date_formater('date_format', $last_session->date_time);
                        }
                })
                ->addColumn('day', function ($session) {
                    $days = "";
                    
                    foreach($session->classer->day as $day):
                        $days .= str_limit($day->day_name, 2, '.');
                    endforeach;

                    return $days;
                })

                ->rawColumns(['show','name', 'date_time', 'comment', 'status', 'day', 'duration', 'contact_numbers'])
                ->make(true);
        }

        $html = $builder
                ->parameters([
                    'ordering' => true,
                    'order' => [
                        1 => 'ASC',
                    ]
                ])->columns([
                        [
                             'data' => 'username',
                             'name' => 'username',
                             'title' => 'Username'
                        ],
                        [
                             'data' => 'name',
                             'name' => 'name',
                             'title' => 'Name'
                        ],
                        [
                             'data' => 'contact_numbers',
                             'name' => 'contact_numbers',
                             'title' => 'Contact Numbers'
                        ],
                        [
                            'data' => 'type',
                             'name' => 'type',
                             'title' => 'Type',
                        ],
                        [
                            'data' => 'day',
                            'name' => 'day',
                            'title' => 'Day'
                        ],
                        [
                            'data' => 'time',
                            'name' => 'time',
                            'title' => 'Time'
                        ],
                         [
                            'data' => 'minutes',
                            'name' => 'minutes',
                            'title' => 'Minutes'
                        ],
                         [
                            'data' => 'total_sessions',
                            'name' => 'total_sessions',
                            'title' => 'Sessions'
                        ],
                        [
                            'data' => 'duration',
                            'name' => 'duration',
                            'title' => 'Duration'
                        ],
                        [
                            'defaultContent' => '',
                            'data'           => 'show',
                            'name'           => 'show',
                            'title'          => '',
                            'render'         => null,
                            'orderable'      => false,
                            'searchable'     => false,
                            'exportable'     => false,
                            'printable'      => true,
                            'footer'         => '',
                        ],
                ]);

         return view('teacher.session.index', compact('today_sessions', 'html'));
    }
        
    function today()
    {
        //  $today_sessions = Auth::user()->session()->where('status', 'ready')
         
        $today_sessions = Auth::user()->session()->whereHas('classer', function($query){
                    $query->where('status', 'ongoing')->where("admin_id", Auth::user()->id)->has("user");
                })  
                ->whereDate('date_time', date('Y-m-d'))->orderby('date_time','ASC')->get();
        return view('teacher.session.today', compact('today_sessions'));
    }

    public function saveMistake(Request $request)
    {
        $this->validate($request, [
            'mistake_body' => 'required|string',
            'correction' => 'required|string',
        ]);

        $mistake = new Mistake;
        $mistake->mistake_body = $request->mistake_body;
        $mistake->correction = $request->correction;
        $mistake->class_session_id = $request->class_session_id;
        $mistake->save();

        return redirect()->back();
    }

    public function deleteMistake(Request $request, $id)
    {
        Mistake::find($id)->delete();

        if(!$request->ajax())
        {
            return back();
        }
    }
   

    public function show($id)
    {
        $books = Book::all();
        $session = ClassSession::find($id);
        $is_today = date('Y-m-d', strtotime($session->date_time)) == date('Y-m-d');
        return view('teacher.session.show', compact('session', 'books', 'is_today'));
    }


    public function update(Request $request, $id)
    {
        
        $session = ClassSession::find($id);
        $session->status = $request->status;
        $session->comment = $request->comment;
        $session->pronounciation = $request->pronounciation;
        $session->comprehension = $request->comprehension;
        $session->fluency = $request->fluency;
        $session->vocabulary = $request->vocabulary;
        $session->grammar = $request->grammar;

        $session->save();

        return redirect()->back()->with('message','Changes Saved!');
    }

    public function calendar()
    {
        $class_sessions = Auth::user()->session()->whereHas('classer', function($query){
            $query->where('status', 'ongoing')->where("admin_id", Auth::user()->id)->has("user");
         })->get();

            $present_color = setting('present_color');
            $postponed_color =  setting('postponed_color');
            $absend_color =  setting('absend_color');
            $holiday_color =  setting('holiday_color');

            $array_days = array();


            //
            $label = "";
            $color = '';

            foreach ($class_sessions as $session){

                switch ($session->status) {
                    case "present":
                        $color  = $present_color;
                        $label = $session->classer->user->name;
                        break;
                    case "absent":
                        $color  = $absend_color;
                        $label = $session->classer->user->name;
                        break;
                    case "postponed":
                        $color  = $postponed_color;
                        $label = $session->classer->user->name;
                        break;
                    case "ready":
                        $color  = "";
                        $label =  $session->classer->user->name;
                        $description = "";
                        break;
                    case "delay":
                        $color  = $postponed_color;
                        $label = $session->classer->user->name;
                        break;
                }
                $array = array(
                    "title" => $label .': '. date('h:iA',strtotime($session->date_time)),
                    "start" => date('Y-m-d H:i:s',strtotime($session->date_time)),
                    "end" => date('Y-m-d H:i:s',strtotime($session->date_time . "+". $session->classer->minutes ." minutes")),
                    "backgroundColor" => $color,
                    "url" => route('teacher.session.show', $session->id),
                    "all-day" => false
                );
                array_push($array_days, $array);
            }

            //for leveltest
            foreach(Auth::user()->leveltests()->where('is_done', 0)->get() as $leveltest)
            {
                 $array = array(
                    "title" => 'Level Test:' . $leveltest->name,
                    "start" => date('Y-m-d H:i:s',strtotime($leveltest->date .'' .  $leveltest->time)),
                    "end" => date('Y-m-d H:i:s',strtotime($leveltest->date . '' .  $leveltest->time . "+". setting('braincert_leveltest_minutes', 20) ." minutes")),
                    "backgroundColor" => $color,
                    "url" => route('teacher.leveltest.show', $leveltest->id),
                    "all-day" => false
                );  

                array_push($array_days, $array); 
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
            
        $sessions = json_encode($array_days);
        return view('teacher.session.calendar', compact('sessions'));
    }


}
