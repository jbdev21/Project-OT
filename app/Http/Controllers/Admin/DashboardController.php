<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Http\Controllers\Controller;
use App\ClassSession;
use App\Classer;
use App\User;
use Lang;

class DashboardController extends Controller
{
    function __construct()
    {
        date_default_timezone_set(setting('admin_timezone'));
    }


    public function index(Request $request)
    {	
        fixMissingSession();
    	$ongoing_class = Classer::where('status', 'ongoing')->get();
    	$postponed = ClassSession::where('status', 'postponed')->whereDate('date_time', date('Y-m-d') )->get();
    	$new_registered = User::whereDate('created_at', '=', date('Y-m-d') )->get();

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

        return view('admin.dashboard.index', compact('ongoing_class', 'postponed', 'new_registered','allclasses'));

    	if(request()->ajax()) {
            
                return DataTables::of($classes)
                     ->addColumn('edit', function ($class) {
                        $near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
                        if($near_session){
                            return '<a href="' . route('admin.classer.show', $class->id) . '?session='. $near_session->id .'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>                            ';

                        }else{
                            return '<a href="' . route('admin.classer.show', $class->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye-open"></i> '. Lang::get('button.more') .'</a>';
                        }
                        
                     })

                     ->addColumn('check', function ($class) {
                        return '<input type="checkbox" name="item_checked[]" value="' . $class->id . '" >';
                     })

                     ->addColumn('username', function ($class) {
                        if($class->user){
                            return $this->checkDuplication($class->user_id, $class->id) . '' .  $class->user->username;
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
                        $total .= '/' . $class->total_sessions;
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
                            return "wla";
                        }
                     })
                    ->rawColumns(['name',  'edit','phones', 'check', 'time', 'day', 'duration', 'teacher', 'username', 'total_sessions', 'payment_method', 'last_session'])
                    //->orderColumn('last_session', 'last_session $1')
                    ->make(true);
        }

         $html = $builder
                    ->parameters([
                        'language' => [
                            'url' => asset('js/dataTables/' . config('app.locale') .'.json'),
                        ],
                        'order' => [ [9, 'DESC'] ],
                        'pageLength' => 25
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


    	return view('admin.dashboard.index', compact('ongoing_class', 'postponed', 'new_registered','html'));
    }

    private function checkDuplication($user, $class_id){
        $class = Classer::where('user_id', $user)->where('status', 'ongoing');
        $count = $class->count();
        $counter = 1;
        if($count > 1){
            return '<span style="color:blue">[' . $count . ']</span> ';
            // foreach($class->get() as $classer){
            //     if($classer->id == $class_id){
            //         return $counter . '/' . $count . '- ' ;
            //     }
            //     $counter++; 
            // }
        }else{
            return "";
        }
    }
}
