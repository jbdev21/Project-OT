<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\CourseType;
use App\Coupon;
use Lang;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        if (request()->ajax()) {

                $coupons = Coupon::has('classer')->get();

                return DataTables::of($coupons)
                    ->addColumn('username', function ($coupon) {
                        if($coupon->classer){
                            return $coupon->classer->user->username;
                        }
                     })

                     ->addColumn('phones', function ($coupon) {
                        if($coupon->classer){
                            
                            $phones = "";
                            $phones .=  $coupon->classer->user->contact_number . "<br>";

                            if($coupon->classer->user->contact_number1)
                            {
                                $phones .= $coupon->classer->user->contact_number1;
                            }else{
                                $phones .= 'n/a';
                            }
                            return $phones;
                        }
                     })

                    ->addColumn('total_sessions', function ($coupon) {
                         if($coupon->classer){
                            return count($coupon->classer->classSession()->where('status', 'ready')->get()) .'/' . $coupon->classer->total_sessions;
                         }
                     })

                     ->addColumn('minutes', function ($coupon) {
                         if($coupon->classer){
                            return $coupon->classer->minutes;
                         }
                     })


                    ->addColumn('time', function ($coupon) {
                         if($coupon->classer){

                             return date_formater('time_format', $coupon->classer->time);
                         }
                     })
                     
                     ->addColumn('payment_method', function ($coupon) {
                         if($coupon->classer){
                             return $coupon->classer->payment_method == "bank" ? "<img class='img-responsive' src='" . asset('image/icons/bank.png') . "'>" : "<img class='img-responsive' src='" . asset('image/icons/credit-card.png') . "'>";
                         }
                     })

                     ->addColumn('class_type', function ($coupon) {
                         if($coupon->classer){
                             return $coupon->classer->type;
                         }
                     })

                     ->addColumn('day', function ($coupon) {
                        $days = "";
                        if($coupon->classer){
                            foreach($coupon->classer->day as $day):
                                $days .= Lang::get('label.'. strtolower(str_limit($day->day_name, 3, ''))) . ", ";
                            endforeach;
                        }
                            
                        return $days;
                     })

                    ->addColumn('teacher', function ($coupon) {
                        if($coupon->classer){
                            if($coupon->classer->admin){
                                return $coupon->classer->admin->name;
                            }
                        }else{
                            return "";
                        }
                     })

                    ->addColumn('duration', function ($coupon) {
                        if($coupon->classer){
                            $first_session = $coupon->classer->getFirstSession();
                            $last_session = $coupon->classer->getLastSession();
                            if($first_session && $last_session){
                                return date_formater('date_format', $first_session->date_time). ' - ' . date_formater('date_format', $last_session->date_time);
                            }
                        }
                    })

                     //query for name
                     ->addColumn('name', function ($coupon) {
                        if($coupon->classer){
                            return $coupon->classer->user->name . '<br>' . $coupon->classer->user->korean_name;
                        }
                     })
                     ->addColumn('type', function ($coupon) {
                         return $coupon->type == "discount" ? Lang::get('label.discount') : Lang::get('label.free_coupon_class');
                     })
                     ->addColumn('info', function ($coupon) {
                            if($coupon->type == "discount"){
                                return $coupon->amount . Lang::get('label.won');
                            }else{
                                $text = "";
                                $json = json_decode($coupon->class_info);
                                
                                $text .= Lang::get('label.type') . ': '. CourseType::find($json->courseType_id)->name .  "<br>" ;
                                $text .= $json->months . Lang::get('label.months') . "<br>" ;
                                $text .= $json->minutes . Lang::get('label.min') . "<br>" ;
                                $text .= $json->days_in_a_week . '회/주' . "<br>" ;
                                
                                if(isset($json->number_of_sessions))
                                {
                                    if($json->number_of_sessions > 0){
                                        $text .=  '총'.$json->number_of_sessions . '회' . "<br>" ;
                                    }
                                }

                                return $text;
                            }
                     })
                    ->rawColumns(['name',  'edit','phones', 'info', 'time', 'day', 'duration', 'teacher', 'username', 'total_sessions'])
                    ->make(true);
        }

         $html = $builder
                    ->parameters([
                        'language' => [
                            'url' => asset('js/dataTables/' . config('app.locale') .'.json')
                        ],
                        'pageLength' => 25,
                    ])
                    ->columns([
                        [
                             'data' => 'username',
                             'name' => 'username',
                             'title' => Lang::get('label.username')
                        ],
                        [
                             'data' => 'name',
                             'name' => 'name',
                             'title' => Lang::get('label.name')
                        ],
                        [
                             'data' => 'phones',
                             'name' => 'phones',
                             'render'  => Null,
                             'title' => Lang::get('label.contact_number')
                        ],
                        [
                             'data' => 'class_type',
                             'name' => 'class_type',
                             'title' => Lang::get('label.type')
                        ],
                        [
                            'data' => 'day',
                            'name' => 'day',
                            'title' => Lang::get('label.day')
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
                            'data' => 'total_sessions',
                            'name' => 'total_sessions',
                            'title' => Lang::get('label.sessions')
                        ],
                        [
                            'data' => 'duration',
                            'name' => 'duration',
                            'title' => Lang::get('label.duration')
                        ],
                        [
                            'data' => 'teacher',
                            'name' => 'teacher',
                            'title' => Lang::get('label.teacher')
                        ],
                        [
                            'data' => 'code',
                            'name' => 'code',
                            'title' => Lang::get('label.code')
                        ],
                        [
                            'data' => 'type',
                            'name' => 'type',
                            'title' => Lang::get('label.type')
                        ],
                        [
                            'data' => 'type',
                            'name' => 'type',
                            'title' => Lang::get('label.type')
                        ],
                        
                        [
                            'data' => 'expiry',
                            'name' => 'expiry',
                            'title' => Lang::get('label.expiry')
                        ],
                        
                ]);

    
    
     return view('admin.coupon.index', compact('html'));
    }

    public function unused(Builder $builder)
    {
       if (request()->ajax()) {

                $coupons = Coupon::query()->doesntHave('classer');

                return DataTables::of($coupons)
                    
                     ->addColumn('check', function ($coupon) {
                        return '<input type="checkbox" name="item_checked[]" value="' . $coupon->id . '" >';
                     })
                    
                     ->addColumn('type', function ($coupon) {
                        return strtoupper($coupon->type);
                     })
                      ->addColumn('info', function ($coupon) {
                            if($coupon->type == "discount"){
                                return $coupon->amount . Lang::get('label.won');
                            }else{
                                $text = "";
                                $json = json_decode($coupon->class_info);
                                
                                $text .= Lang::get('label.type') . ': '. CourseType::find($json->courseType_id)->name .  "<br>" ;
                                $text .= $json->months . Lang::get('label.months') . "<br>" ;
                                $text .= $json->minutes . Lang::get('label.min') . "<br>" ;
                                $text .= $json->days_in_a_week . '회/주' . "<br>" ;
                                
                                if(isset($json->number_of_sessions))
                                {
                                    if($json->number_of_sessions > 0){
                                        $text .=  '총'.$json->number_of_sessions . '회' . "<br>" ;
                                    }
                                }

                                 
                                return $text;
                            }
                     })
                     ->addColumn('type', function ($coupon) {
                         return $coupon->type == "discount" ? Lang::get('label.discount') : Lang::get('label.free_coupon_class');
                     })
                    ->rawColumns(['check', 'info'])
                    ->make(true);
        }

         $html = $builder
                    ->parameters([
                        'language' => [
                            'url' => asset('js/dataTables/' . config('app.locale') .'.json')
                        ],
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
                            'data' => 'code',
                            'name' => 'code',
                            'title' => Lang::get('label.code')
                        ],
                        [
                            'data' => 'type',
                            'name' => 'type',
                            'title' => Lang::get('label.type')
                        ],
                        [
                            'data' => 'info',
                            'name' => 'info',
                            'title' => Lang::get('label.info')
                        ],
                        [
                            'data' => 'expiry',
                            'name' => 'expiry',
                            'title' => Lang::get('label.expiry')
                        ],
                        
                ]);

     //   $classes = Classer::where('status','ongoing')->where('admin_id', '!=', null)->orderBy('id','DESC')->paginate(25);
    
     return view('admin.coupon.unused', compact('html'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course_types = CourseType::all();
        return view('admin.coupon.create', compact('course_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $codes = $request->codes;
        
        foreach ($codes as $code) {
            $coupon = new Coupon;
            $coupon->expiry = $request->expiry;
            $coupon->type = $request->type;
            $coupon->code = $code;
            
            if($request->type == "free_class")
            {
              
                $array = array(
                    'courseType_id' => $request->coursetype,
                    'minutes'   => $request->minutes,
                    'days_in_a_week' => $request->daysweeks,
                    'months'    => $request->month,
                    'number_of_sessions' => $request->number_of_session ? $request->number_of_session : 0 
                );

                $coupon->class_info = json_encode($array);

            }else{
                $coupon->amount = $request->amount;
            }

            $coupon->save();
        }

        return redirect()->route('admin.coupon.unused');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function getCode()
    {
        $exist = false;

        $code = $this->generateCode();
        $check = Coupon::where('code', $code)->exists();

        if($check){
           $exist = true;
           while($exist){
               $code = $this->generateCode(); 
               $checkAgain = Coupon::where('code', $code)->exists();
               if(!$checkAgain)
               {
                   break;
                   $exist = false;
               }
               
           }
        }

        return $code;
    }

    function getGenatedCode($no)
    {
        $codes = array();

        for($i = 0; $no > $i; $i++)
        {
            array_push($codes, $this->getCode());
        }

        return $codes;
      
    }

    public function generateCode()
    {
        //generator

        $chars = "023456789ABCDEFGHJKLMNOPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz";
        $res = "";
        for ($i = 0; $i < 10; $i++) {
           $res .= $chars[mt_rand(0, strlen($chars)-1)]; 
        }

        return $res;
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
        foreach($ids as $id)
        {
            Coupon::find($id)->delete();
        }

        if(!$request->ajax())
        {
            return back();
        }
    }
}
