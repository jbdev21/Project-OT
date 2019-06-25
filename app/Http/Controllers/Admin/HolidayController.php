<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Holiday;
use App\Classer;
use App\ClassSession;
use Lang;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {

        if($request->year){
            $holidays = Holiday::whereYear('date',  $request->year)->orderby('Date','ASC')->get();
            $currentyear = $request->year;
        }else{
            $holidays = Holiday::whereYear('date', date('Y'))->orderby('id','DESC')->orderby('Date','ASC')->get();
            $currentyear = date('Y');
        }

        $years =  $this->makeDropDownYears($currentyear);

        if (request()->ajax()) {
            return DataTables::of($holidays)
                ->addColumn('action', function ($holiday) {
                    $button = "";
                    // $button .= '<a href="' . route('admin.holiday.show', $holiday->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-eye"></i> '. Lang::get('button.show') .'</a>';
                    $button .= '<a href="' . route('admin.holiday.edit', $holiday->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.edit') .'</a>';
                    return $button;
                })
                ->addColumn('check', function ($holiday) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $holiday->id . '" >';
                })
                ->addColumn('date', function ($holiday) {
                    return date_formater('date_format', $holiday->date);
                })
                ->rawColumns(['check', 'action', 'date'])
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
                'data' => 'holiday_name', 
                'holiday_name' => 'name', 
                'title' => Lang::get('label.holiday_name')
            ],
            [
                'data' => 'date', 
                'name' => 'date', 
                'title' => Lang::get('label.date')
            ],
            [
                'data' => 'description', 
                'name' => 'description', 
                'title' => Lang::get('label.description')
            ],
            [
                'defaultContent' => '',
                'data'           => 'action',
                'name'           => 'action',
                'title'          => '',
                'render'         => null,
                'orderable'      => false,
                'searchable'     => false,
                'exportable'     => false,
                'printable'      => true,
                'footer'         => '',
                'class'         => 'text-right'
            ],

        ]);

       // $holidays = Holiday::orderby('id','DESC')->paginate(15);

        return view('admin.holiday.index', compact('html', 'currentyear', 'years'));
        
    }

    function makeDropDownYears($current)
    {
        $array = array();
        for($i=1; $i < 3;$i++)
        {
            $deducted_date = date('Y', strtotime("-$i years", strtotime($current)));
            array_unshift ($array, $deducted_date);
        }

        for($i=0; $i < 6;$i++)
        {
            $added_date = date('Y', strtotime("+$i years", strtotime($current)));
            array_push($array, $added_date);
        }

        return $array;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.holiday.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $this->validate($request, array(
            'holiday_name' => 'required|max:255',
            'date' => 'date|required',
        ));

        $holiday = new Holiday;
        $holiday->holiday_name = $request->holiday_name;
        $holiday->date = $request->date;
        $holiday->description = $request->description;
        $holiday->save();

        if($request->apply_to_current_class)
        {
            $this->apply_to_current_class($request->date);
        }
        
        if($request->is_life_time)
        {
            for($i=1; $i < 20; $i++)
            {
                
                $added_date = date('Y-m-d', strtotime(" + $i years", strtotime($request->date)));
                
                $check = Holiday::where('holiday_name', $request->holiday_name)->where('date', $added_date)->count();
                
                if(!$check)
                {
                    $holiday = new Holiday;
                    $holiday->holiday_name = $request->holiday_name;
                    $holiday->date = $added_date;
                    $holiday->description = $request->description;
                    $holiday->save();
                }
            }
        }

        

        return redirect('admin/holiday');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $holiday = Holiday::find($id);
        $day_num = date('N', strtotime($holiday->date));
        $classes = Classer::where('status', 'ongoing')->get()->filter(function($q) use ($holiday){
            return date('Y-m-d', strtotime($q->getLastSession()->date_time))  >= $holiday->date;
        })->filter(function($q) use ($holiday){
            return date('Y-m-d', strtotime($q->getFirstSession()->date_time))  <= $holiday->date;
        });
        return $classes;
        return $holiday;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday = Holiday::find($id);
        return view('admin.holiday.edit', compact('holiday'));
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
        $this->validate($request, array(
            'holiday_name' => 'required|max:255',
            'date' => 'date|required',

        ));

        $holiday = Holiday::find($id);
        $holiday->holiday_name = $request->holiday_name;
        $holiday->date = $request->date;
        $holiday->description = $request->description;
        $holiday->save();

        return redirect('admin/holiday');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if($request->item_checked){
            foreach($request->item_checked as $id)
            {
                Holiday::find($id)->delete();
            }
        }

        return back();
    }


/*
Formula
    - get first the session objects
    - extract the class id in each session
    - get the last class session of the class
    - get the Selected Days of the class
    - loop from the last session and + 1 day in each loop and add 1 day in the session in a correct day
    - delete the active session class within that holiday
*/
    function apply_to_current_class($date)
    {
        $sessions = ClassSession::where('date_time' ,'LIKE', '%' . $date . '%')->where('status', 'ready')->get();
        $class_ids = array();
        foreach($sessions as $session)
        {
            if(!in_array($session->classer->id, $class_ids))
            {
                $class_id = $session->classer->id;
                $class = Classer::find($class_id);
                array_push($class_ids, $class_id);

            //get class day use
                $days = $class->day;
                $day_numbers = array();
                foreach($days as $day_number)
                {
                    array_push($day_numbers, $day_number->day_number);
                }

            //get last class session of a class
                $last_session = $class->classSession()->orderby('id','DESC')->first();

            //start adding day to the last session
                $loop = true;
                $found_date = 0;
                $i = 1;
                
                while ($loop) {
                    if ($found_date < 1) {
                        $added_date = date("Y-m-d", strtotime("+$i day", strtotime($last_session->date_time)));

                        $day_num = date('N', strtotime($added_date));
                    
                        if (in_array($day_num, $day_numbers)){
                            if (!in_array($added_date, arrayHolidayDates())) {
                                $found_date++;
                                $date_time = $added_date . " " . date('H:i', strtotime($class->time));
                                if($class->classSession()->where("date_time", $date_time)->count() < 1){
                                   $class_session = new ClassSession;
                                    $class_session->date_time = $date_time;
                                    $class_session->status = 'ready';
                                    $class_session->admin_id = $class->admin_id;
                                    $class_session->classer_id = $class_id;
                                    $class_session->save();
                                }
                            }
                        }
                    } else {
                        $loop = false;
                        break;
                    }
                    $i++;
                }

            $sessions = ClassSession::where('date_time' ,'LIKE', '%' . $date . '%')->where('status', 'ready')->delete();
            //then +1 according to the days selected on a class                
            }
        }
    }

    
}
