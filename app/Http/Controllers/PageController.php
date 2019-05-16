<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use App\Events\SessionDayCreated;
use GuzzleHttp\Client;
use App\Notice;
use App\CourseType;
use App\Course;
use Session;
use App\ClassSession;
use App\PopUp;
use App\Banner;
use App\Blog;

class PageController extends Controller
{

    function __construct()
    {
        date_default_timezone_set(setting('student_timezone'));
    }
   
    function index()
    {
        $past5days = date("Y-m-d", strtotime("-5days"));
        
        $notices = Notice::orderby('id', 'DESC')->limit(5)->get();
        $new_notices = Notice::whereDate("created_at",'>', $past5days)->count();    

        $popup = PopUp::where('show', 1)
                ->where('position','center')
                ->whereDate('date_start','<=', date('Y-m-d'))
                ->where(function($q){
                    $q->where('date_end', '>=', date('Y-m-d'))
                      ->orWhereNull('date_end');
                })
                ->first();

        $banners = Banner::where('is_show', 1)
                ->whereDate('date_start','<=', date('Y-m-d'))
                ->where(function($q){
                    $q->where('date_end', '>=', date('Y-m-d'))
                      ->orWhereNull('date_end');
                })
                ->take(2)->get();

        

        $noti_top = PopUp::where('show', 1)
                ->where('position','top')
                ->whereDate('date_start','<=', date('Y-m-d'))
                ->where(function($q){
                    $q->where('date_end', '>=', date('Y-m-d'))
                      ->orWhereNull('date_end');
                })
                ->first();

        
        $blogs = Blog::orderby('id', 'DESC')->limit(5)->get(); 
        $new_blogs = Blog::whereDate("created_at",'>', $past5days)->count(); 

        $postponeds = ClassSession::where('status', 'postponed')->whereDate('date_time','>=', Date('Y-m-d'))->orderBy('date_time', 'ASC')->take(5)->get();       
        $new_postponeds = ClassSession::where('status', 'postponed')->whereDate('date_time','>=', $past5days)->count(); 
        
        return view(theme('home'), compact('notices', "new_notices",  'popup', 'noti_top','banners', 'blogs', 'new_blogs', 'postponeds', 'new_postponeds'));
    }


    /*
    * page function is only use to cater a static page
    * 
    */
    function page($page)
    {
        return view(theme('page.'. $page));
    }

    
    function postponed()
    {
        $sessions = ClassSession::where('status', 'postponed')->whereDate('date_time','>=', Date('Y-m-d'))->orderBy('date_time', 'ASC')->paginate(12);
        return view('template.bernas.page.postponed', compact('sessions'));
    }




    function course(Request $request)
    {
    	$coursetypes = CourseType::all();
    	return view('template.course', compact('coursetypes'));
    }

    public function getMonths($couretype_id)
    {
        return Course::where('course_type_id', $couretype_id)->groupby('months')->get();
    }

    public function daysweek($couretype_id)
    {
        return Course::where('course_type_id', $couretype_id)->groupby('days_in_week')->get();
    }

    public function getminutes($coursetype_id){
        return Course::where('course_type_id', $coursetype_id)->groupby('minutes')->get();
    }

    public function minutes($couretype_id, $months)
    {
        return Course::where('course_type_id', $couretype_id)->where('months', $months)->groupby('months')->get();
    }


    public function getCourse($couretype_id, $daysweek, $minutes)
    {
        return Course::where('course_type_id', $couretype_id)->where('days_in_week', $daysweek)->where('minutes', $minutes)->first();
    }

    function coursequery(Request $request)
    {
        //return $request->all();
        $type_id = $request->type;
        $no_of_month = $request->month;
        $no_of_minutes = $request->minute;
        $days_in_week = $request->days_in_week;

        $results = Course::where('course_type_id', $type_id)
                        //->where('months', $no_of_month)
                        ->where('minutes', $no_of_minutes)
                        ->get();
        $recommendations = Course::where('course_type_id', $type_id)
                        //->OrWhere('months', $no_of_month)
                        ->OrWhere('minutes', $no_of_minutes)
                        ->limit('10')
                        ->get();
        return view('template.course_result', compact('results', 'recommendations'));
    }

    function select($id, $price)
    {

        Session::forget('selectedCourse.id');
        Session::forget('enrolled_classer_id');
        Session::push('selectedCourse.id', $id);
        Session::push('selectedCourse.price', $price);
        return redirect('enrollment');
    }
}
