<?php

namespace App\Http\Controllers\Teacher;

use Auth;
use App\Admin;
use App\Classer;
use App\Holiday;
use App\ClassSession;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;

class ClasserController extends Controller
{

    function __construct()
    {
        date_default_timezone_set(setting('teacher_timezone'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        $teacher = Auth::user();
        $noti = $teacher->notifications()->where('type', 'App\Notifications\AssignClassNotification')->get();
        
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }

        if (request()->ajax()) {
                 $classes = Auth::user()->classer()->where('status', 'ongoing')->has("user")->orderby('id','DESC')->get();
                    return DataTables::of($classes)
                     ->addColumn('edit', function ($class) {
                        $near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
                        if(!$near_session){
                            return '<a href="' . route('teacher.classer.show', $class->id) .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> More</a>';    
                        }else{
                            return '<a href="' . route('teacher.classer.show', $class->id) . '?session='. $near_session->id .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> More</a>';
                        }
                     })
                    ->addColumn('time', function ($class) {
                        return date('A h:i', strtotime($class->time));
                     })

                     ->addColumn('minutes', function ($class) {
                        return $class->minutes . 'min';
                     })
                     
                     ->addColumn('username', function ($class) {
                        return $class->user->username;
                     })
                     
                     ->addColumn('day', function ($class) {
                        $days = "";
                        
                        foreach($class->day as $day):
                            $days .= str_limit($day->day_name, 2, '.');
                        endforeach;

                        return $days;
                     })
                    ->addColumn('duration', function ($class) {
                        $first_session = $class->getFirstSession();
                        $last_session = $class->getLastSession();
                        if($first_session)
                        {
                            return date_formater('date_format', $first_session->date_time). ' / ' . date_formater('date_format', $last_session->date_time);
                        }
                    })

                     //query for name
                     ->addColumn('name', function ($class) {
                        if($class->user){
                            return $class->user->name . '<br>' . $class->user->korean_name;
                        }else{
                            return "wla";
                        }   
                     })

                     ->addColumn('contact_numbers', function ($class) {
                        if($class->user){
                            return $class->user->contact_number . '<br>' . $class->user->contact_number1;
                        }else{
                            return "wla";
                        }   
                     })
                    ->rawColumns(['name', 'edit', 'check', 'time','day', 'duration', 'contact_numbers'])
                    ->make(true);
        }

         $html = $builder
                        ->parameters([
                            'order' => [ [5, 'DESC'] ]
                        ])
                        ->columns([
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
                            'data'           => 'edit',
                            'name'           => 'edit',
                            'title'          => '',
                            'render'         => null,
                            'orderable'      => false,
                            'searchable'     => false,
                            'exportable'     => false,
                            'printable'      => true,
                            'footer'         => '',
                        ],



                ]);
         //$classes = Auth::user()->classer()->paginate(10);
        return view('teacher.class.index', compact('html'));
    }

    function today()
    {

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

            $present_color = setting('present_color');
            $postponed_color =  setting('postponed_color');
            $absend_color =  setting('absend_color');
            $holiday_color =  setting('holiday_color');


            $array_days = array();

            $class_object = Classer::find($id);

         
            if($request->read)
            {
                if(!$class_object)
                {
                    Auth::user()->notifications()->where('id', $request->read)->first()->delete();
                    return redirect()->route('teacher.classer.index');
                }    
            }

             $class_sessions = $class_object->classSession;

         
            //
            $label = "";
            $color = '';

            foreach ($class_sessions as $session){

                switch ($session->status) {
                    case "present":
                        $color  = $present_color;
                        $label = "PRESENT";
                        break;
                    case "absent":
                        $color  = $absend_color;
                        $label = "ABSENT";
                        break;
                    case "postponed":
                        $color  = $postponed_color;
                        $label = "POSTPONED";
                        break;
                    case "ready":
                        $color  = "";
                        $label = "READY";
                        $description = "";
                        break;
                    case "delay":
                        $color  = $postponed_color;
                        $label = "DELAY";
                        $description = "";
                        break;
                }

                
                $array = array(
                    "title" => $label,
                    "start" => date('Y-m-d H:i:s',strtotime($session->date_time)),
                    "end" => date('Y-m-d H:i:s',strtotime($session->date_time . "+". $class_object->minutes ." minutes")),
                    "backgroundColor" => $color,
                    "url" => route('teacher.session.show', $session->id),
                    "all-day" => false
                );
                array_push($array_days, $array);
            }

             $holidays = Holiday::All();


            foreach ($holidays as $holiday ){
                $array = array(
                    "title" => "Holiday",
                    "start" => $holiday->date,
                    "end" => $holiday->date,
                    "backgroundColor" => $holiday_color,
                    "url" => "#",
                    "all-day" => true
                );
                array_push($array_days, $array);
            }


            $data = array(
                'class' => $class_object,
                'class_sessions' => json_encode($array_days),
                'postponed_sessions' => $class_sessions->where('status', 'postponed'),
                'users' => Admin::where('type', 'teacher')->get(),
                'session' => ClassSession::where('date_time', '>=', date('Y-m-d'))->where('status', 'ready')->first()
            );
            return view('teacher.class.show')->with($data);
     //   return view('teacher.class.show', compact('class'));
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

    public function changebook(Request $request)
    {
        $class = Classer::find($request->class_id);
        $class->book_id = $request->book_id;
        $class->page = $request->page;
        $class->save();
        return redirect()->back();
    }
}
