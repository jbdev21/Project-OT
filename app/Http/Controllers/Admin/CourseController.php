<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Builder;
use App\Course;
use App\CourseType;
use App\Day;
use Lang;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
         if (request()->ajax()) {
            $courses = Course::all();
            return DataTables::of($courses)
                ->addColumn('action', function ($course) {
                    return '<a href="' . route('admin.course.edit', $course->id) . '" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> '. Lang::get('button.edit') .'</a>';
                })
                ->addColumn('check', function ($course) {
                    return '<input type="checkbox" name="item_checked[]" value="' . $course->id . '" >';
                })
                ->addColumn('type', function ($course) {
                    return $course->coursetype->name;
                })
                ->addColumn('sessions_week', function ($course) {
                    return $course->days_in_week . 'x' ;
                })
                ->addColumn('available', function ($course) {
                    return $course->available ? '<i class="fa fa-check"></i>' : "" ;
                })
                ->addColumn('sessions', function ($course) {
                    $days_per_week = $course->days_in_week;
                    $months  = $course->months;
                    $total_sessions = $days_per_week * $months * 4;
                    return $total_sessions;
                })
                ->addColumn('allowed_days', function ($course) {
                    $days = "";
                    foreach($course->day as $day):
                       $days .= str_limit($day->day_name, 2, '. ');
                    endforeach;
                    return $days;
                })
                ->addColumn('months', function ($course) {
                    $month_html = "1 Month: " . $course->price . " | ";
                    $month_html .= "3 Month: ".  $course->three_percent . "% - " . $course->three_price . " | ";
                    $month_html .= "6 Month: ".  $course->six_percent . "% - " . $course->six_price . " | ";
                    $month_html .= "12 Month: ".  $course->twelve_percent . "% - " . $course->twelve_price . " | ";
                    return $month_html;
                })
                ->rawColumns(['check', 'action','type', 'sessions_week', 'allowed_days','available'])
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
                'data' => 'course_code',
                'name' => 'course_code',
                'title' => Lang::get('label.code')
            ],
            [
                'data' => 'type',
                'name' => 'type',
                'title' => Lang::get('label.type')
            ],
            [
                'data' => 'sessions_week',
                 'name' => 'sessions_week',
                  'title' => Lang::get('label.session_week')
            ],
            [
                'data' => 'allowed_days',
                 'name' => 'allowed_days',
                  'title' => Lang::get('label.allowed_class_days')
            ],
            [
                'data' => 'months',
                 'name' => 'months',
                  'title' => Lang::get('label.months')
            ],
            [
                'data' => 'minutes',
                 'name' => 'minutes',
                  'title' => Lang::get('label.minutes')
            ],
            [
                'data' => 'postponed_credit',
                 'name' => 'postponed_credit',
                  'title' => Lang::get('label.postponed_credits')
            ],
            [
                'data' => 'available',
                 'name' => 'available',
                  'title' => Lang::get('label.status')
            ],
            [
                'data' => 'price',
                 'name' => 'price',
                  'title' => Lang::get('label.price')
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
            ],

        ]);

        return view('admin.course.index', compact('html'));
    }

    function setSelectDefault($id){
        Course::where("id", '>', 0)->update(['selected' => 0]);
        Course::find($id)->update(['selected'=> 1]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $data = array(
            'coursetypes' => CourseType::all(),
            'days'      => Day::all()
        );
        return view('admin.course.create')->with($data);
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
            'coursetype_id' => 'required',
            'days_in_week' => 'required|integer',
            'minutes' => 'required|integer',
           // 'months' => 'required|integer',
            'price' => 'required|integer',
            'three_percent' => 'required|integer',
            'three_price' => 'required|integer',
            'six_percent' => 'required|integer',
            'six_price' => 'required|integer',
            'twelve_percent' => 'required|integer',
            'twelve_price' => 'required|integer',
        ));

        //course coding
        $course_type = CourseType::find($request->coursetype_id);
        $courseTypeCode = $course_type->code();
        $code = $courseTypeCode.''. $request->minutes . '' .
        $request->days_in_week . '' . $request->months;

        $course = new Course;
        $course->course_type_id = $request->coursetype_id;
        $course->course_code = $code;
        $course->days_in_week = $request->days_in_week;
        $course->minutes = $request->minutes;
        $course->price = $request->price;

        $course->postponed_credit = $request->postponed_credit;

        $course->three_percent = $request->three_percent;
        $course->three_price = $request->three_price;

        $course->six_percent = $request->six_percent;
        $course->six_price = $request->six_price;

        $course->twelve_percent = $request->twelve_percent;
        $course->twelve_price = $request->twelve_price;


        $course->available = $request->available ? 1 : 0;
        $course->save();
        $course->day()->attach($request->days);

        if($request->is_default){
            $this->setSelectDefault($course->id);
        }

         return redirect()->route('admin.course.index')->with('message', Lang::get('label.item_saved'));
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
        $data = array(
            'coursetypes' => CourseType::all(),
            'course' => Course::find($id),
            'days'      => Day::all()
        );
        return view('admin.course.edit')->with($data);
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
            'coursetype_id' => 'required',
            'days_in_week' => 'required|integer',
            'minutes' => 'required|integer',
            //'months' => 'required|integer',
            'price' => 'required|integer',
            'postponed_credit' => 'required|integer',
            'three_percent' => 'required|integer',
            'three_price' => 'required|integer',
            'six_percent' => 'required|integer',
            'six_price' => 'required|integer',
            'twelve_percent' => 'required|integer',
            'twelve_price' => 'required|integer',
        ));

        $course = Course::find($id);
        $course->course_type_id = $request->coursetype_id;
        $course->days_in_week = $request->days_in_week;
        $course->minutes = $request->minutes;
        $course->price = $request->price;

        $course->postponed_credit = $request->postponed_credit;
            
        $course->three_percent = $request->three_percent;
        $course->three_price = $request->three_price;

        $course->six_percent = $request->six_percent;
        $course->six_price = $request->six_price;

        $course->twelve_percent = $request->twelve_percent;
        $course->twelve_price = $request->twelve_price;

        $course->available = $request->available ? 1 : 0;


        $course->save();
        $course->day()->detach();
        $course->day()->attach($request->days);

         return redirect()->route('admin.course.index')->with('message', Lang::get('label.item_updated'));
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
                $class = Course::find($id)->delete();
            }

            return redirect()->back()->with('message',Lang::get('label.item_deleted'));

        }

        return redirect()->back();

    }
}
