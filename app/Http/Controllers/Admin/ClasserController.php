<?php

namespace App\Http\Controllers\Admin;

use DB;
use Auth;
use Lang;
use App\Day;
use App\Book;
use App\User;
use App\Admin;
use App\Course;
use App\Classer;
use App\Holiday;
use App\ClassLog;
use Carbon\Carbon;
use App\CourseType;
use App\ClassSession;
use App\Events\FireEvent;
use Illuminate\Http\Request;
use App\FailedBraincertRequest;
use App\Jobs\UpdateClassStatus;
use Yajra\DataTables\DataTables;
use App\Events\SessionDayCreated;
use Yajra\DataTables\Html\Builder;
use App\Events\TeacherClassAssigned;
use App\Http\Controllers\Controller;
use App\Library\Braincert\Braincert;
use App\Notifications\SampleNotification;
use App\Notifications\Admin\PostponedClass;
use App\Notifications\ChangeTimeNotification;
use App\Notifications\AssignClassNotification;
use App\Notifications\AssignSubClassNotification;

class ClasserController extends Controller
{

    function __construct()
    {
        date_default_timezone_set(setting('admin_timezone'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $classes = Classer::where('status', 'ongoing')->where('admin_id', '!=', null)->where('user_id', '!=', null);
        
        if($request->q){

            $allclasses = $classes->whereHas("user", function($query) use ($request){
                $query->where("username", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("korean_name", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("name", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("contact_number", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("contact_number1", 'LIKE',  '%' . $request->q . '%');
            })->orWhereHas("admin", function($e) use ($request){
                $e->where("name", 'LIKE',  '%' . $request->q . '%');
            })->orWhere("type", 'LIKE', '%' . $request->q . '%')->get()->sortBy(function($e){
                if($e->getLastSession()){
                    return $e->getLastSession()->date_time;
                }
            })->where('status', 'ongoing')->paginate(25);

        }else{

            $allclasses = $classes->get()->sortBy(function($e){
                if($e->getLastSession()){
                    return $e->getLastSession()->date_time;
                }
            })->where('status', 'ongoing')->paginate(25);

        }

         if($request->q){
            $allclasses = $classes->whereHas("user", function($query) use ($request){
                $query->where("username", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("korean_name", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("name", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("contact_number", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("contact_number1", 'LIKE',  '%' . $request->q . '%');
            })->orWhereHas("admin", function($e) use ($request){
                $e->where("name", 'LIKE',  '%' . $request->q . '%');
            })->orWhere("type", 'LIKE', '%' . $request->q . '%')->get()->sortBy(function($e){
                if($e->getLastSession()){
                    return $e->getLastSession()->date_time;
                }
            })->where('status', 'ongoing')->paginate(25);
        }else{
            $allclasses = $classes->get()->sortBy(function($e){
                if($e->getLastSession()){
                    return $e->getLastSession()->date_time;
                }
            })->where('status', 'ongoing')->paginate(25);
        }

        return view('admin.class.all', compact('allclasses'));

        if(request()->ajax()) {
            $classes = Classer::where('status', 'ongoing')->where('admin_id', '!=', null)->where('user_id', '!=', null)->get();
                return DataTables::of($classes)
                     ->addColumn('edit', function ($class) {
                        $near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
                        if($near_session){
                            return '<a href="' . route('admin.classer.show', $class->id) . '?session='. $near_session->id .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>'
                                    .'<button data-username="'. $class->user->username .'" data-url="' . route('admin.classer.show', $class->id) . '?session='. $near_session->id .'&modal=1" class="btn btn-xs btn-primary iframe-modal"><i class="glyphicon glyphicon-eye-open"></i> 팝업</button>';
                        }else{
                            return '<a href="' . route('admin.classer.show', $class->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>'
                                    .'<button  data-username="'. $class->user->username .'" data-url="' . route('admin.classer.show', $class->id) . '?modal=1" class="btn btn-xs btn-primary iframe-modal"><i class="glyphicon glyphicon-eye-open"></i> 팝업</button>';
                        }
                        
                     })

                     ->addColumn('check', function ($class) {
                        return '<input type="checkbox" name="item_checked[]" value="' . $class->id . '" >';
                     })

                     ->addColumn('username', function ($class) {
                        if($class->user){
                            return $this->checkDuplication($class->user_id, $class->id) . '' . $class->user->username;
                        }
                     })

                     ->addColumn('attendance', function ($class) {
                          //  return $class->classSession ? $class->classSession()->whereDate('date_time', '=', date('Y-m-d'))->first() :  "";
                            if($class->classSession){
                                $today = $class->classSession()->whereDate('date_time', '=', date('Y-m-d'));
                                if($today->count()){
                                    if($today->first()->status == "absent"){
                                        return "<span style='color:red'>결석</span>";
                                    }else if($today->first()->status == "postponed"){
                                        return "<span style='color:orange'>연기</span>";
                                    }else if($today->first()->status == "present"){
                                        return "<span style='color:blue'>출석</span>";
                                    }else{
                                        return "<span>대기</span>";
                                    }
                                }else{
                                    return "--";
                                }
                            }else{
                                return "--";
                            }
                    })

                     ->addColumn('phones', function ($class) {
                        if($class->user){
                            
                            $phones = "";
                            $phones .=  $class->user->contact_number . "<br>";

                            if($class->user->contact_number1)
                            {
                                $phones .= $class->user->contact_number1;
                            }else{
                                $phones .= 'n/a';
                            }
                            return $phones;
                        }
                     })

                    ->addColumn('total_sessions', function ($class) {
                        $total = count($class->getRemainingSession()) ? count($class->getRemainingSession()) : "<span style='color:red'>". count($class->getRemainingSession()) ."</span>" ;
                        $total .= '/' . $class->classSession()->where('status', '!=', 'postponed')->count();
                        return $total;
                     })

                    ->addColumn('time', function ($class) {
                        return "<b style='color:green'>" . date('A h:i', strtotime($class->time)) . "</b>";
                     })
                     
                     ->addColumn('payment_method', function ($class) {
                        $text =  $class->payment_method == "bank" ? "<img class='img-responsive' src='" . asset('image/icons/bank.png') . "'>" : "<img class='img-responsive' src='" . asset('image/icons/credit-card.png') . "'>";
                        $text .= number_format($class->payment_price) . Lang::get('label.won');
                        return $text;
                    })

                     ->addColumn('day', function ($class) {
                        $days = "";

                        foreach($class->day as $day):
                            $days .= Lang::get('label.'. strtolower(str_limit($day->day_name, 3, ''))) . ", ";
                        endforeach;

                        return $days;
                     })

                    ->addColumn('teacher', function ($class) {
                        if($class->admin){
                            return $class->admin->name;
                        }else{
                            return "";
                        }
                     })

                    ->addColumn('duration', function ($class) {
                        $first_session = $class->getFirstSession();
                        if($first_session){
                            return date_formater('date_format', $first_session->date_time);
                        }
                    })

                    ->addColumn('last_session', function ($class) {
                        $last_session = $class->getLastSession();
                        if($last_session){
                            return date_formater('date_format', $last_session->date_time);
                        }
                    })
                     //query for name
                     ->addColumn('name', function ($class) {
                        if($class->user){
                            return $class->user->name . '<br>' . $class->user->korean_name;
                        }else{
                            return "";
                        }
                     })
                    ->rawColumns(['name',  'edit','phones', 'check', 'time', 'day','attendance', 'duration', 'teacher', 'username', 'total_sessions', 'payment_method', 'last_session'])
                    //->orderColumn('last_session', 'last_session $1')
                    ->make(true);
        }

         $html = $builder
                    ->parameters([
                        'language' => [
                            'url' => asset('js/dataTables/' . config('app.locale') .'.json'),
                        ],
                        'order' => [ [10, 'DESC'] ],
                        'pageLength' => 25,
                    ])
                    ->columns([
                        [ 
                            'data' => 'check',
                            'name' => '',
                            'title' => '<input type="checkbox" id="checkAll" >',
                            'render'         => null,
                            'orderable'      => false,
                            'searchable'     => false,
                            'exportable'     => false,
                            'printable'      => true,
                        ],
                        [
                             'data'         => 'username',
                             'name'         => 'username',
                             'title' => Lang::get('label.username'),
                        ],
                        [
                             'data' => 'name',
                             'name' => 'name',
                             'title' => Lang::get('label.name'),
                             'orderable'    => true,
                             'searchable'   => true,
                        ],
                        [
                             'data' => 'phones',
                             'name' => 'phones',
                             'render'  => Null,
                             'title' => Lang::get('label.contact_number')
                        ],
                        [
                             'data' => 'type',
                             'name' => 'type',
                             'title' => Lang::get('label.type')
                        ],
                        
                        [
                            'data' => 'time',
                            'name' => 'time',
                            'title' => Lang::get('label.time')
                        ],
                         [
                            'data' => 'minutes',
                            'name' => 'minutes',
                            'title' => Lang::get('label.minutes')
                        ],
                        [
                            'data' => 'day',
                            'name' => 'day',
                            'title' => Lang::get('label.day')
                        ],
                        [
                            'data' => 'attendance',
                            'name' => 'attendance',
                            'title' => "상태"
                        ],
                        
                        [
                            'data' => 'duration',
                            'name' => 'duration',
                            'title' => '시작일'
                        ],
                         
                        [
                            'data' => 'last_session',
                            'name' => 'last_session',
                            'title' => "종료일"
                        ],
                        [
                            'data' => 'total_sessions',
                            'name' => 'total_sessions',
                            'title' => Lang::get('label.sessions')
                        ],
                        [
                            'data' => 'payment_method',
                            'name' => 'payment_method',
                            'title' => Lang::get('label.payment_method')
                        ],
                        [
                            'data' => 'teacher',
                            'name' => 'teacher',
                            'title' => Lang::get('label.teacher')
                        ],
                        [
                            'defaultContent' => '',
                            'data'           => 'edit',
                            'name'           => 'edit',
                            'title'          => '',
                            'render'         => null,
                            'orderable'      => false,
                            'searchable'     => true,
                            'exportable'     => false,
                            'printable'      => true,
                            'footer'         => '',
                        ],
                ]);

    return view('admin.class.index', compact('html'));

    }

    private function checkDuplication($user, $class_id){
        $class = Classer::where('user_id', $user)->where('status', 'ongoing');
        $count = $class->count();
        $counter = 1;
        if($count > 1){
            return '<span style="color:blue">[' . $count . ']</span> ';
        }else{
            return "";
        }
    }

    public function allClass(Request $request)
    { 
    
        $classes = Classer::where('admin_id', '!=', null)->where('user_id', '!=', null);

        if($request->q){

            $allclasses = $classes->whereHas("user", function($query) use ($request){
                $query->where("username", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("korean_name", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("name", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("contact_number", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("contact_number1", 'LIKE',  '%' . $request->q . '%');
            })->orWhereHas("admin", function($e) use ($request){
                $e->where("name", 'LIKE',  '%' . $request->q . '%');
            })->orWhere("type", 'LIKE', '%' . $request->q . '%')->get()->sortByDesc(function($e){
                if($e->getLastSession()){
                    return $e->getLastSession()->date_time;
                }
            })->paginate(25);

        }else{

            $allclasses = $classes->get()->sortByDesc(function($e){
                if($e->getLastSession()){
                    return $e->getLastSession()->date_time;
                }
            })->paginate(25);

        }

        return view('admin.class.all', compact('allclasses'));

    }




    public function ended(Request $request)
    {
        $classes = Classer::where('status', 'ended')->with('admin')->with('user');

        if($request->q){

            $allclasses = $classes->whereHas("user", function($query) use ($request){
                $query->where("username", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("korean_name", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("name", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("contact_number", 'LIKE',  '%' . $request->q . '%')
                        ->orWhere("contact_number1", 'LIKE',  '%' . $request->q . '%');
            })->orWhereHas("admin", function($e) use ($request){
                $e->where("name", 'LIKE',  '%' . $request->q . '%');
            })->orWhere("type", 'LIKE', '%' . $request->q . '%')->get()->sortByDesc(function($e){
                if($e->getLastSession()){
                    return $e->getLastSession()->date_time;
                }
            })->paginate(25);

        }else{
            $allclasses = $classes->get()->sortByDesc(function($e){
                if($e->getLastSession()){
                    return $e->getLastSession()->date_time;
                }
            })->paginate(25);
        }
    
        return view('admin.class.all', compact('allclasses'));

    }




    public function today(Builder $builder, Request $request)
    {
        $datevalue = $request->date ? $request->date : date('Y-m-d');
        if (request()->ajax()) {

            $sessions = ClassSession::where('admin_id','!=', Null)->whereDate('date_time', $datevalue)->orderBy('date_time','ASC')->with("admin")->get();
        
            return DataTables::of($sessions)
                ->addColumn('show', function ($session) {

                $buttons = "";
                
                $buttons .= '<a href="' . route('admin.classer.show', $session->classer->id) . '?session='. $session->id . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.more') .'</a>';
                    
                if(!Auth::user()->academy){
                    $buttons  .= '<button data-url="' . route('admin.classer.show', $session->classer->id) . '?session='. $session->id .'&modal=1" class="btn btn-xs btn-primary iframe-modal"><i class="glyphicon glyphicon-eye-open"></i> 팝업</button>';
                }

                return $buttons;
                })
                
                ->addColumn('username', function ($session) {
                return $session->classer->user ? $session->classer->user->username : "";
                })

                ->addColumn('type', function ($session) {
                return $session->classer->type;
                })

                ->addColumn('minutes', function ($session) {
                return $session->classer->minutes;
            })
                
                ->addColumn('phones', function ($session) {
                if($session->classer->user){
                    
                    $phones = "";
                    $phones .=  $session->classer->user->contact_number . "<br>";

                    if($session->classer->user->contact_number1)
                    {
                        $phones .= $session->classer->user->contact_number1;
                    }else{
                        $phones .= 'n/a';
                    }
                    return $phones;
                }
                })

            ->addColumn('total_sessions', function ($session) {
                $total = count($session->classer->getRemainingSession()) ? count($session->classer->getRemainingSession()) : "<span style='color:red'>". count($session->classer->getRemainingSession()) ."</span>" ;
                $total .= '/' . $session->classer->total_sessions;
                return $total;
                })

            ->addColumn('time', function ($session) {
                return "<b style='color:green'>" . date('A h:i', strtotime($session->date_time)) . "</b>";
                })
                
                ->addColumn('payment_method', function ($session) {
                $text =  $session->classer->payment_method == "bank" ? "<img class='img-responsive' src='" . asset('image/icons/bank.png') . "'>" : "<img class='img-responsive' src='" . asset('image/icons/credit-card.png') . "'>";
                $text .= number_format($session->classer->payment_price) . Lang::get('label.won');
                return $text;
            })

                ->addColumn('day', function ($session) {
                $days = "";

                foreach($session->classer->day as $day):
                    $days .= Lang::get('label.'. strtolower(str_limit($day->day_name, 3, ''))) . ", ";
                endforeach;

                return $days;
                })

            ->addColumn('teacher', function ($session) {
                if($session->classer->admin){
                    return $session->classer->admin->name;
                }else{
                    return "";
                }
                })

                ->addColumn('status', function ($session) {
                if($session->status == "absent"){
                    return "<span style='color:red'>결석</span>";
                }else if( $session->status == "postponed"){
                    return "<span style='color:orange'>연기</span>";
                }else if($session->status == "present"){
                    return "<span style='color:blue'>출석</span>";
                }else{
                    return "<span>대기</span>";
                }
                })

            ->addColumn('duration', function ($session) {
                $first_session = $session->classer->getFirstSession();
                if($first_session){
                    return date_formater('date_format', $first_session->date_time);
                }
            })

            ->addColumn('last_session', function ($session) {
                $last_session = $session->classer->getLastSession();
                if($last_session){
                    return date_formater('date_format', $last_session->date_time);
                }
            })

            

                //query for name
                ->addColumn('name', function ($session) {
                if($session->classer->user){
                    return $session->classer->user->name . '<br>' . $session->classer->user->korean_name;
                }else{
                    return "wla";
                }
                })
            ->rawColumns(['show','name',  'edit','phones', 'time', 'day','status', 'duration', 'teacher', 'username', 'total_sessions', 'payment_method', 'last_session'])
            //->orderColumn('last_session', 'last_session $1')
            ->make(true);
        }

        $html = $builder
                    ->parameters([
                        'language' => [
                            'url' => asset('js/dataTables/' . config('app.locale') .'.json'),
                        ],
                        'order' => [ [4, 'ASC'] ]
                    ])
                    ->columns([
                        [
                             'data'         => 'username',
                             'name'         => 'username',
                             'title' => Lang::get('label.username'),
                        ],
                        [
                             'data' => 'name',
                             'name' => 'name',
                             'title' => Lang::get('label.name'),
                             'orderable'    => true,
                             'searchable'   => true,
                        ],
                        [
                             'data' => 'phones',
                             'name' => 'phones',
                             'render'  => Null,
                             'title' => Lang::get('label.contact_number')
                        ],
                        [
                             'data' => 'type',
                             'name' => 'type',
                             'title' => Lang::get('label.type')
                        ],
                        
                        [
                            'data' => 'time',
                            'name' => 'time',
                            'title' => Lang::get('label.time')
                        ],
                         [
                            'data' => 'minutes',
                            'name' => 'minutes',
                            'title' => Lang::get('label.minutes')
                        ],
                        [
                            'data' => 'day',
                            'name' => 'day',
                            'title' => Lang::get('label.day')
                        ],
                        [
                            'data' => 'status',
                            'name' => 'status',
                            'title' => "상태"
                        ],
                        
                        [
                            'data' => 'duration',
                            'name' => 'duration',
                            'title' => '시작일'
                        ],
                        [
                            'data' => 'last_session',
                            'name' => 'last_session',
                            'title' => "종료일"
                        ],
                        [
                            'data' => 'total_sessions',
                            'name' => 'total_sessions',
                            'title' => Lang::get('label.sessions')
                        ],
                        [
                            'data' => 'payment_method',
                            'name' => 'payment_method',
                            'title' => Lang::get('label.payment_method')
                        ],
                        [
                            'data' => 'teacher',
                            'name' => 'teacher',
                            'title' => Lang::get('label.teacher')
                        ],
                        [
                            'defaultContent' => '',
                            'data'           => 'show',
                            'name'           => 'show',
                            'title'          => '',
                            'render'         => null,
                            'orderable'      => false,
                            'searchable'     => true,
                            'exportable'     => false,
                            'printable'      => true,
                            'footer'         => '',
                        ],
                ]);

        return view('admin.class.today', compact('html', 'datevalue'));
    }

    
    public function getNew()
    {
        $admin = Auth::user();
        $noti = $admin->notifications()->where('type', 'App\Notifications\Admin\NewClassNotification')->get();
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }

        $teachers = Admin::where('type', 'teacher')->where("is_active", 1)->get();
        $classes = Classer::where('status', "pending")->has("user")->orderBy('id','DESC')->paginate(25);
        return view('admin.class.new', compact('classes', 'teachers'));
    }

    public function postponed(Request $request)
    {
        $admin = Auth::user();
        $noti = $admin->notifications()->where('type', 'App\Notifications\Admin\PostponedClassNotification')->get();
        foreach($noti as $noti)
        {
            $noti->markAsRead();
        }

        $notis = $admin->notifications()->where('type', 'App\Notifications\Admin\NewReEnrollClassNotification')->get();
        foreach($notis as $notis)
        {
            $notis->markAsRead();
        }
        
       $sessions = ClassSession::where('status', 'postponed')->whereDate('date_time','>=', date('Y-m-d'))->orderBy('date_time', 'ASC');
       
       if($request->q){

            $classes = $sessions->whereHas("classer", function($query) use ($request){
                    $query->whereHas("user", function($e) use ($request) {
                        $e->where("username", 'LIKE',  '%' . $request->q . '%')
                            ->orWhere("korean_name", 'LIKE',  '%' . $request->q . '%')
                            ->orWhere("name", 'LIKE',  '%' . $request->q . '%')
                            ->orWhere("contact_number", 'LIKE',  '%' . $request->q . '%')
                            ->orWhere("contact_number1", 'LIKE',  '%' . $request->q . '%');
                    })->orWhereHas("admin", function($e) use ($request){
                        $e->where("name", 'LIKE',  '%' . $request->q . '%');
                    });
            })->orWhereHas("classer", function($q) use ($request) {
                $q->where("type", 'LIKE', '%' . $request->q . '%');
            })->orderBy("date_time", 'ASC')->paginate(25);
            
        }else{
            $classes = $sessions->orderBy("date_time", 'ASC')->paginate(25);
        }

       return view('admin.class.postponed', compact('classes'));
    }

    public function assign(Request $request, $id)
    {
        $this->validate($request, [
            'teacher_id' => 'required'
        ]);
        
        $class = Classer::find($id);
        $class->admin_id = $request->teacher_id;
        $class->status = 'ongoing';
        $class->save();
        
        ClassSession::where("classer_id", $id)->update(['admin_id'=> $request->teacher_id]);    
        // $class_session = ClassSession::where('classer_id', $id)->get();

        // foreach($class_session as $ses)
        // {
        //     $ses->admin_id = $request->teacher_id;
        //     $ses->save();
        // }
        
        $teacher = Admin::find($request->teacher_id);

        $teacher->notify(new AssignClassNotification($class));

       //event(new TeacherClassAssigned($class));

        return redirect()->back()->with('message', '배정되었습니다.'); //Assigning Teacher Saved!
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = User::all();
        $teachers = Admin::where('type', 'teacher')->where("is_active")->get();
        $course_types = CourseType::all();
        return view('admin.class.create', compact('students', 'course_types', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ini_set('memory_limit', '1024M');
        $this->validate($request, [
            'days' => 'required',
            'month' => 'required'
        ]);
       // return $request->all();
        //getting price
       // return $request->teacher_id;
        $course = Course::find($request->course_id);
        if($request->month == 1)
        {
            $price = $course->price;
        }else if($request->month == 3){
            $price = $course->three_price;
        }else if($request->month == 6){
            $price = $course->six_price;
        }else if($request->month == 12)
            $price = $course->twelve_price;
        {

        if($request->status == "paid"){
            $status = 'ongoing';
           
        }else{
           $status = 'pending';
        }

        $total_sessions = ($course->days_in_week * $request->month) * 4;

        $class = new Classer;
        $class->class_code = time();
        $class->course_id = $request->course_id;
        $class->type = $course->coursetype->name;
        $class->user_id = $request->student_id;
        $class->total_sessions = $total_sessions;
        $class->minutes = $request->minutes;
        $class->days_in_week = $course->days_in_week;
        $class->num_months = $request->month;
        $class->postponed_credits = $course->postponed_credit * $request->month;
        $class->start_date = $request->start_date;
        $class->time = date('H:i:s', strtotime($request->time));
        $class->admin_id = $request->teacher_id;
        $class->payment_price = $price;
        $class->status = $status;
        $class->payment_method = "bank";
//        $class->is_new = $is_new;
        $class->payment_status = $request->status ? $request->status : "pending";

        $class->save();

        //loooping for adding sessions to a class
        $class_id = $class->id;
        $class->day()->attach($request->days);


        $total_session = $total_sessions;
        $date = date("Y-m-d", strtotime($request->start_date));
        $loop = true;
        $found_date = 1;
        $i = 0;
        while ($loop) {
            if ($found_date <= $total_session) {
                $added_date = date("Y-m-d", strtotime("+$i day", strtotime($date)));
                $day_num = date('N', strtotime($added_date));
                if (in_array($day_num, $request->days)) {
                    if (!in_array($added_date, arrayHolidayDates())) {

                        $found_date++;
                        $date_time = $added_date . " " . date('H:i', strtotime($request->time));
                        $class_session = new ClassSession;
                        $class_session->date_time = $date_time;
                        $class_session->status = 'ready';
                        $class_session->admin_id = $request->teacher_id;
                        $class_session->classer_id = $class_id;
                        $class_session->save();

                        event( new SessionDayCreated($class_session));
                    }
                }
            } else {
                $loop = false;
                break;
            }
            $i++;
        }

        return redirect()->route('admin.classer.index');

        }
    }

    function reEnroll(Request $request, $id)
    {
        $classer = Classer::find($id);
        $class_day = $classer->day()->pluck('day_number')->toArray();
        
        $class = new Classer;
        $class->class_code = time();
        $class->course_id = $classer->course_id;
        $class->type = $classer->type;
        $class->user_id = $classer->user_id;
        $class->total_sessions = $classer->total_sessions;
        $class->minutes = $classer->minutes;
        $class->days_in_week = $classer->days_in_week;
        $class->num_months = $classer->num_months;
        $class->postponed_credits = getPostponedCreditByCourse($classer->course_id);
        $class->start_date = $request->start_date;
        $class->time = date('H:i:s', strtotime($request->time));
        $class->admin_id = $classer->admin_id;
        $class->status = $request->status;
        $class->payment_price = $classer->payment_price;
        $class->book_id = $classer->book_id;
        $class->page = $classer->page;
        $class->payment_method = "bank";
        //$class->is_new = $is_new;
        $class->payment_status = $request->status ? $request->status : "pending";

        $class->save();

        //loooping for adding sessions to a class
        $class_id = $class->id;
        $class->day()->attach($class_day);


        $total_session = $classer->total_sessions;
        $date = date("Y-m-d", strtotime($request->start_date));
        $loop = true;
        $found_date = 1;
        $i = 0;
        while ($loop) {
            if ($found_date <= $total_session) {
                $added_date = date("Y-m-d", strtotime("+$i day", strtotime($date)));
                $day_num = date('N', strtotime($added_date));
                if (in_array($day_num, $class_day)) {
                    if (!in_array($added_date, arrayHolidayDates())) {

                        $found_date++;
                        $date_time = $added_date . " " . date('H:i', strtotime($request->time));
                        $class_session = new ClassSession;
                        $class_session->date_time = $date_time;
                        $class_session->status = 'ready';
                        $class_session->admin_id = $classer->admin_id;
                        $class_session->classer_id = $class_id;
                        $class_session->save();

                        event( new SessionDayCreated($class_session));
                    }
                }
            } else {
                $loop = false;
                break;
            }
            $i++;
        }

        return back()->with('message', Lang::get('label.saved'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

 
    function show(Request $request, $id)
    {
         
       
        //if($request->view == 'calendar'){
            // $present_color = "#7bf7ab";
            // $postponed_color = "#f48c42";
            // $absend_color = "#7b7187";
            
            $present_color = setting('present_color');
            $postponed_color = setting('postponed_color');
            $absend_color = setting('absend_color');
            $holiday_color = setting('holiday_color');

            $array_days = array();

            $class_object = Classer::find($id);
            
            if($request->read)
            {
                if(!$class_object)
                {
                    Auth::user()->notifications()->where('id', $request->read)->first()->delete();
                    return redirect()->route('admin.classer.index');
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
                        $label = Lang::get('button.present');
                        break;
                    case "absent":
                        $color  = $absend_color;
                        $label = Lang::get('button.absent');
                        break;
                    case "postponed":
                        $color  = $postponed_color;
                        $label = Lang::get('button.postpone_calendar');
                        break;
                    case "ready":
                        $color  = "";
                        $label = Lang::get('button.ready');
                        $description = "";
                        break;
                    case "delay":
                        $color  = "";
                        $label = Lang::get('button.class_delay');
                        $description = "";
                        break;
                }
                $array = array(
                    "title" => $label,
                    "start" => date('Y-m-d H:i:s',strtotime($session->date_time)),
                    "end" => date('Y-m-d H:i:s',strtotime($session->date_time . "+". $class_object->minutes ." minutes")),
                    "backgroundColor" => $color,
                    "all-day" => false
                );
                array_push($array_days, $array);
            }


            $holidays = Holiday::All();


            foreach ($holidays as $holiday ){
                $array = array(
                    "title" => $holiday->holiday_name,
                    "start" => $holiday->date,
                    "backgroundColor" => $holiday_color,
                    "all-day" => true
                );
                array_push($array_days, $array);
            }

         

            if($request->session)
            {
                $session = ClassSession::find($request->session);
            }else{
                $session = Null;
            }

           // return  $class_object->classSession()->paginate(10);
            $data = array(
                'class' => $class_object,
                'sessions' => $class_sessions,
                'session_info' => $session,
                'session_list' => $class_object->classSession()->paginate(10),
                'postponed_sessions' => $class_sessions->where('status', 'postponed'),
                'submissions' => $class_sessions->where('sub_id', '!=', Null),
                'users' => Admin::where('type', 'teacher')->get(),
                'holidays' => json_encode($array_days),
                'books' => Book::all()
            );
           
            
               
            if($request->modal){
                return view('admin.class.showiframe')->with($data);
            }else{
                return view('admin.class.show_list')->with($data);
            }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Admin::where('type', 'teacher')->where("is_active", 1)->get();
        $class = Classer::find($id);
        $class_day = Classer::find($id)->day->pluck('id');
        $course_types = CourseType::all();
        $days = Day::all();

        //get duration
        $first_session = $class->getFirstSession();
        $last_session = $class->getLastSession();

        if($first_session && $last_session){
            $duration = date_formater('date_format', $first_session->date_time). ' - ' . date_formater('date_format', $last_session->date_time);
        }else{
            $duration = "";
        }

        $total_sessions =  count($class->classSession()->where('status', 'ready')->get()) ;
        $total_sessions .= '/' . $class->total_sessions;
        
        if(request()->modal){
            return view('admin.class.editiframe', compact('class', 'teachers', 'days', 'course_types', 'class_day', 'duration', 'total_sessions'));
        }else{
            return view('admin.class.edit', compact('class', 'teachers', 'days', 'course_types', 'class_day', 'duration', 'total_sessions'));
        }
        
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
        // for now no further updating here
        $class = Classer::find($id);

        $class->classSession()->where('date_time', '>=', Carbon::now())->update(['admin_id' => $request->teacher]);


        $class->admin_id = $request->teacher;

        $class->status = $request->status;

        $class->classSession()->update(['admin_id' => $request->teacher]);

        if($request->status == "ended")
        {
            $class->classSession()->where('date_time', '>=', Carbon::now())->update(['status' => "absent"]);
        //    $class->classSession()->update(['status' => "absent"]);
        }else if($request->status == "ongoing")
        {
             //$class->classSession()->where('date_time', '>=', Carbon::now())->update(['status' => "ready"]);
        }

        $class->save();
        if($request->modal){
            return redirect('/admin/classer/' . $class->id . "?modal=1 ")->with('message', Lang::get('label.item_updated'));
        }else{
            return redirect()->route('admin.classer.show', $class->id)->with('message', Lang::get('label.item_updated'));
        }
        
    }

    public function changetime(Request $request, $id)
    {
        $affected_date = $request->efffected_date;
        $time = date('H:i:s', strtotime($request->time));
        $sessions = ClassSession::whereDate('date_time', ">=" , $affected_date)->where('classer_id', $id)->where('status', 'ready')->get();
        
        foreach( $sessions as $session)
        {
            $date = date('Y-m-d', strtotime($session->date_time));
            $classSession = ClassSession::find($session->id);
            $classSession->date_time = $date . " " .  $time;
            $classSession->save();
        }

        $class = Classer::find($id);
        $old_time = $class->time;
        $class->time = $time;
        $class->save();


        $noti_message = "시간변경 from " . date_formater('time_format', $old_time) . " to " . date_formater('time_format', $request->time);
        $classlog = new ClassLog;
        $classlog->classer_id = $class->id;
        $classlog->type = "change_time";
        $classlog->content = $noti_message;
        $classlog->save();
        
        if($class->admin_id){   
            $teacher = Admin::find($class->admin_id);
            $teacher->notify( new ChangeTimeNotification($class, $noti_message) );
        }

        return back()->with('message', Lang::get('label.item_updated'));

    }

    function changeDays(Request $request, $id)
    {
        $affected_date  = $request->affected_date;
        $classer = Classer::find($id);
        $classer->day()->detach();
        $classer->day()->attach($request->days);
        
        
        $total_session = $classer->total_sessions;
    
      
        $remaining = $classer->classSession()->whereDate('date_time', '>=', $affected_date)->count();

        $classer->classSession()->whereDate('date_time', '>=', $affected_date)->delete();

        $this->sessionAdd($classer, $remaining, $affected_date);
            
        $classer->save();

        return back()->with('message', Lang::get('label.item_updated'));
    }

    public function changestartdate(Request $request, $id)
    {
        $start_date  = $request->start_date;
        
        $classer = Classer::find($id);
        $total_session = $classer->total_sessions;
    
        if($request->only_remaining)
        {
            // clear session
            
            $remaining = $classer->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->count();

            $classer->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->delete();

            $this->sessionAdd($classer, $remaining, $start_date);
        }else{

            $classer->classSession()->delete();
            $this->sessionAdd($classer, $total_session, $start_date);
        }

        $classer->start_date = $start_date;
        $classer->save();

        return back()->with('message', Lang::get('label.item_updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
         $ids = $request->item_checked;
        if(count($ids)){
            foreach($ids as $id){
                $class = Classer::find($id);
                $class->classSession()->delete();
                $class->delete();
            }

            return redirect()->back()->with('message', Lang::get('label.item_deleted'));

        }else{
            return redirect()->back();
        }

    }

    //Other Functions
    public function postpone(Request $request, $id)
    {
        $classer = Classer::find($id);
        $student =  User::find($classer->user_id);
        if($request->type == 'date'){
            //this is for selected dates
            $days = $request->dates;

        }else{
            $ranges = explode(' - ', $request->range);
            $d1 = str_replace('.', '/', $ranges[0]);
            $d2 = str_replace('.', '/', $ranges[1]);
            $first_date = date('Y-m-d', strtotime($d1));
            $second_date = date('Y-m-d',strtotime($d2));

            $days = $classer->classSession()->whereDate('date_time','>=', $first_date)->whereDate('date_time', '<=', $second_date)->where('status','ready')->pluck('id');
        }

        if(count($days))
        {
            $array_days = array();
            // if($request->deduction){
            //     $current = $classer->postponed_credits;
            //     // $subtracted = $current - count($days);
            //     // $classer->postponed_credits = $subtracted;
            //     // $classer->save();
            // }

            foreach($classer->day as $classer_days)
            {
                array_push($array_days, $classer_days->day_number);
            }

            foreach($days as $day){
                $class_session = ClassSession::find($day);
                $class_session->status = "postponed";
                $class_session->reason = $request->reason;
                $class_session->postponed_timestamp = date('Y-m-d H:i:s');
                $class_session->postponed_apply = "Admin";
                if($request->deduction){
                    $class_session->postponed_deduction = 1;
                }
                
                $class_session->save();
                
                if($class_session->admin_id)
                {
                    $teacher = Admin::find($class_session->admin_id);
                    $teacher->notify(new \App\Notifications\Teacher\PostponedClassNotification($student, true, $class_session));
                }
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

                            event( new SessionDayCreated($class_session));
                        }
                    }

                } else {
                    $loop = false;
                    break;
                }
                $i++;
            }
            if(!$request->ajax())
            {
                return redirect()->back()->with('message', Lang::get('label.item_saved'));
            }else {
                return $classer->postponed_credits;
            }
        }

    }

     public function editpostpone(Request $request)
    {
        $session = ClassSession::find($request->id);
        $classer = Classer::find($session->classer_id);

        $current_credit = $classer->postponed_credits;
        $current_credit = $classer->postponed_credits;
        if($request->deduction_number == 1){
            if($request->deduction){
                $session->reason = $request->reason;
                $session->save();
                $result = "with deduction : yes";
            }else{
                $session->postponed_deduction = null;
                $session->reason = $request->reason;
                $session->save();

                $sum = $current_credit + 1;
                $classer->postponed_credits = $sum;
                $classer->save();
                $result = $sum;
            }
        }else{
            if($request->deduction){
                $session->postponed_deduction = 1;
                $session->reason = $request->reason;

                $session->save();
                $subtracted = $current_credit - 1;
                $classer->postponed_credits = $subtracted;
                $classer->save();
                $result = "subtracted";
            }else{
                $session->reason = $request->reason;

                $session->save();
                $result = "no deduction : no";
            }
        }


        return redirect()->back();
    }


    public function cancelPostpone(Request $request, $id)
    {
        //Request of dates
       // return $request;
        $days = $request->postponed;

        if(is_array($days))
        {
            foreach($days as $day){
                //finding specific session
                $class_session = ClassSession::where('id', $id)->whereDate('date_time',$day)->first();
                $class_session->status = "ready";

                    // //checking if with deduction
                    // if($class_session->postponed_deduction == 1){
                        
                    //     $classer = Classer::find($id);
                    //     $current_credit = $classer->postponed_credits;
                    //     $classer->postponed_credits = $current_credit + 1;
                    //     $classer->save();
                    // }
                    // //update specific session
                
                $class_session->postponed_deduction = 0;
                $class_session->reason = "";
                $class_session->postponed_timestamp = null;
                $class_session->postponed_apply = "";
                $class_session->save();

                
                $teacher = Admin::find($class_session->admin_id);
                
                $student = User::find($class_session->classer->user_id);
                if($teacher)
                {
                    $teacher->notify(new \App\Notifications\Teacher\PostponedClassNotification($student, false, $class_session));
                }

                //finding class then fetch last session preparing to delete
                $class = Classer::find($id);
                $last_session = $class->classSession()->orderBy('id','DESC')->first();
                $session = ClassSession::find($last_session->id);
                $session->delete();


            }
        }else{
             //finding specific session
            $class_session = ClassSession::find($days);
            $class_session->status = "ready";

                // //checking if with deduction
                // if($class_session->postponed_deduction == 1){
                    
                //     $classer = Classer::find($id);
                //     $current_credit = $classer->postponed_credits;
                //     $classer->postponed_credits = $current_credit + 1;
                //     $classer->save();
                    
                // }
                // //update specific session
                
            $class_session->postponed_deduction = 0;
            $class_session->reason = "";
            $class_session->postponed_timestamp = null;
            $class_session->postponed_apply = "";
            $class_session->save();
             
            $teacher = Admin::find($class_session->admin_id);
                
            $student = User::find($class_session->classer->user_id);

            if($teacher)
            {
                $teacher->notify(new \App\Notifications\Teacher\PostponedClassNotification($student, false, $class_session));
            }

            //finding class then fetch last session preparing to delete
            $class = Classer::find($id);
            $last_session = $class->classSession()->orderBy('id','DESC')->first();
            $session = ClassSession::find($last_session->id);
            $session->delete();

        }
        if(!$request->ajax()){
            return redirect()->back()->with('message', Lang::get('label.saved'));

        }
    }

    function submission(Request $request)
    {
        $this->validate($request,[
            'dates' => 'required',
            'teacher_id' => 'required'
        ]);
        
        $session_array = array();
        foreach($request->dates as $date_id)
        {
            
            $class_session = ClassSession::find($date_id);
            $class_session->sub_id = $request->teacher_id;

            $class_session->save();
            $array = array(
                'id' => $class_session->id,
                'date_time' => $class_session->date_time,
                'admin' => array(['name' => Admin::find($class_session->sub_id)->name])
            );

            array_push($session_array, $array);
            //notify teacher
            $teacher = Admin::find($request->teacher_id);
            $teacher->notify( new AssignSubClassNotification($class_session));
        }

        if($request->ajax())
        {
            return $session_array;
        //    $session = $class_session->with('admin');
        //    return $session;
        }else{
           
            return redirect()->back()->with('message', Lang::get('label.saved'));
        }
    }

    function cancelsubmission(Request $request, $id)
    {
      
        $class_session = ClassSession::find($id);
        $sub_id = $class_session->sub_id;
        $class_session->sub_id = Null;
        $class_session->save();

        if(!$request->ajax())
        {
            return redirect()->back()->with('message', Lang::get('label.saved'));
        }
    }

    function failedRequest()
    {
        DB::table('failed_braincert_requests')->update(array('seen' => 1));
        $fails = FailedBraincertRequest::paginate(10);
        return view('admin.class.failedrequest.index', compact('fails'));
    }

    function requestSchedule($failed_id)
    {
        $fail = FailedBraincertRequest::find($failed_id);

        $braincert = new Braincert;
        if($fail->failedbraincertable == "App\Leveltest"){
            $braincert->setLevelTestSchedule($fail->failedbraincertable->id, 'student', 'old');
        }else{
            $braincert->setSchedule($fail->failedbraincertable->id, 'student', 'old');
        }
        $status = $braincert->get();

        if($braincert->response->status == "ok"){
             $fail->delete();
            return ['status' => 'ok'];
        }else{
            return ['status' => 'error', 'error' => $braincert->response->error];
        }
    }

    function addsession(Request $request)
    {
        $classer = Classer::find($request->class_id);
        $count = $request->number;

        $array_days = array();

        foreach($classer->day as $classer_days)
        {
            array_push($array_days, $classer_days->day_number);
        }

        //while loop for adding new day
        $last_session = $classer->classSession()->orderBy('id','DESC')->first();
        $date = date("Y-m-d", strtotime($last_session->date_time));
        $loop = true;
        $found_date = 1;
        $i = 1;
        while ($loop) {

            if ($found_date <= $count) {
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

                        event( new SessionDayCreated($class_session));
                    }
                }

            } else {
                $loop = false;
                break;
            }
            $i++;
        }

        $classlog = new ClassLog;
        $classlog->classer_id = $classer->id;
        $classlog->type= "session_add";
        $classlog->content  = Lang::get('label.classlog_add_content', ['number' => $request->number]);
        $classlog->note = $request->note;
        $classlog->save();
        
        return redirect()->back()->with('message', Lang::get('label.saved'));
    }

    

    function sessionAdd(Classer $classer, $count, $start)
    {

        $array_days = array();

        foreach($classer->day as $classer_days)
        {
            array_push($array_days, $classer_days->day_number);
        }


        $loop = true;
        $found_date = 1;
        $i = 0;
        $is_first = true;
        while ($loop) {

            if ($found_date <= $count) {
                $added_date = date("Y-m-d", strtotime("+$i day", strtotime($start)));
              
                $day_num = date('N', strtotime($added_date));
                if (in_array($day_num, $array_days)) {
                    if (!in_array($added_date, arrayHolidayDates())) {

                        $found_date++;
                        $date_time = $added_date . " " . date('H:i', strtotime($classer->time));

                        $class_session = new ClassSession;
                        $class_session->date_time = $date_time;
                        $class_session->status = 'ready';
                        $class_session->classer_id = $classer->id;
                        $class_session->admin_id = $classer->admin_id;
                        $class_session->save();

                    }
                }

            } else {
                $loop = false;
                break;
            }
            $i++;
        }
    }

    function deductsession(Request $request)
    {
       
        $classer = Classer::find($request->class_id);
        $count = $request->number;

        for($i = 0; $count > $i; $i++)
        {
            $last_session = $classer->classSession()->orderBy('id','DESC')->first();
            $last_session->delete();
        }

        $classlog = new ClassLog;
        $classlog->classer_id = $classer->id;
        $classlog->type= "session_deduct";
        $classlog->content  = Lang::get('label.classlog_deduction_content', ['number' => $request->number]);
        $classlog->note = $request->note;
        $classlog->save();

        return redirect()->back();
    }

    function fixSessionTeacher()
    {
        $sessions = ClassSession::where('admin_id', null)->get();

        foreach($sessions as $session)
        {
            $teacher_id = $session->classer->admin_id;
            $s = ClassSession::find($session->id);
            $s->admin_id = $teacher_id;
            $s->save();
        }

        return "fix";
    }
}
