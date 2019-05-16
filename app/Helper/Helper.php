
<?php
/**
 * Created by PhpStorm.
 * User: JOFIEBERNAS
 * Date: 7/26/2017
 * Time: 3:54 PM
 */
use App\Course;
use App\Classer;
use App\ClassSession;
use App\TeacherProfile;
use Jenssegers\Agent\Agent;
use App\FailedBraincertRequest;
use App\Library\Braincert\Braincert;
use App\Library\Videoware\Videoware;


if(!function_exists('getPostponedCreditByCourse')){
    function getPostponedCreditByCourse($course_id){
           $course = Course::find($course_id);
           if($course){
               return $course->postponed_credit;
           }else{
               return Null;
           }
    }
}

function fixMissingSession(){
    $sessions = ClassSession::where('admin_id', NULL)->whereHas('classer', function($class){
        $class->where("admin_id", '>', "0");
    })->where("status", 'ready')->get();
                            // ->orWhereDate('created_at','LIKE', '2018-12-05')
                            // ->orWhereDate('created_at','LIKE', '2018-01-02')->get();
                            
    foreach($sessions as $session){
        $class = Classer::find($session->classer_id);
        if($class->admin_id){
            $session->admin_id = $class->admin_id;
            $session->save();
        }
    }
}

function hasTeacherProfile($id){
    return TeacherProfile::find($id) == Null ? false : true;
}

if(!function_exists('today_attendance')){
    function today_attendance($class_id){
        $class = Classer::find($class_id);
        $session = $class->classSession()->whereDate('date_time', '=', date('Y-m-d'))->first();
        if($session){
            if($session->status == "absent"){
                return "<span style='color:red'>결석</span>";
            }else if( $session->status == "postponed"){
                return "<span style='color:orange'>연기</span>";
            }else if($session->status == "present"){
                return "<span style='color:blue'>출석</span>";
            }else{
                return "<span>대기</span>";
            }
        }else{
            return "<span>NC</span>";
        }
    }
}

if(!function_exists('is_desktop'))
{
    function is_desktop()
    {
        $agent = new Agent;
        return $agent->isDesktop();
    }
}




if(!function_exists('checkDuplication')){
    function checkDuplication($user, $class_id){
        $class = Classer::where('user_id', $user)->where('status', 'ongoing');
        $count = $class->count();
        $counter = 1;
        if($count > 1){
            return '<span style="color:blue">[' . $count . ']</span> ';
        }else{
            return "";
        }
    }
}


if(!function_exists('theme')){
    function theme($view){
        $theme = 'template.' . config('theme.name'). '.' . $view;

        return $theme;
    }
}

if(!function_exists('video_url')){
    function video_url($session_id, $type)
    {
        if(setting('default_video_vitual_room') == "videoware"){
            $videoware = new Videoware;
            return $videoware->url($session_id, $type);
        }else{
            $braincert = new Braincert;
            return $braincert->url($session_id, $type, true);
        }
    }
}


if(!function_exists('get_percentage')){
    function get_discount($price)
    {
        $user = App\User::find(Auth::user()->id);
        
        $amount = $user->discount_amount;
        if($user->discount_type == "fixed")
        {
            return $price - $amount;
        }else{
             $discount = $price * $amount / 100;
             return $price - $discount;
        }
        
    }

}

if(!function_exists('today_classroom')){
    function today_classroom()
    {
        $results = Array();
      
        $classes = Auth::user()->classer()->where('status', 'ongoing')->orderby('time','ASC')->get();    
        foreach($classes as $class)
        {
           //$session = $class->classSession()->whereDate('date_time', date('Y-m-d'))->where('status', 'ready')->orderBy('date_time', 'DESC')->first();
            if(setting('default_video_vitual_room') == "videoware"){
                $videoware = new Videoware;
                if($class->admin){
                    $url = $videoware->url($class->id, 'student');
                }else{
                    $url = "";
                }
            }else{
                $braincert = new Braincert;
                $url = $braincert->url($class->id, $type, true);
            }

            $data = [
                'url' => $url,
                'time' => date('h:iA',strtotime($class->time)) . '-' .date('h:iA',strtotime($class->time . "+". $class->minutes ." minutes")),
            ];

                array_push($results, $data);
        } 
    
        //    if($session) 
        //    {
        //     if(setting('default_video_vitual_room') == "videoware"){
        //             $videoware = new Videoware;
        //             if($session->admin){
        //                 $url = $videoware->url($session->id, 'student');
        //             }else{
        //                 $url = "";
        //             }
        //         }else{
        //             $braincert = new Braincert;
        //             $url = $braincert->url($session->id, $type, true);
        //         }

        //         $session = [
        //             'url' => $url,
        //             'time' => date('h:iA',strtotime($session->date_time)) . '-' .date('h:iA',strtotime($session->date_time . "+". $session->classer->minutes ." minutes")),
        //         ];

        //         array_push($results, $session);
        //     }
        // }
        
        return $results;
    }
}


if(!function_exists('postponed_managers'))
{
    function postponed_managers()
    {
        $classes = Auth::user()->classer()->where('status', 'ongoing')->orderby('time','ASC')->get();
        $items = array();
        foreach($classes as $class)
        {
            if($class->status != 'pending')
            {
                $near_session = $class->classSession()->whereDate('date_time', '>=', date('Y-m-d'))->first();
                $sufix = $near_session ? '?session=' . $near_session->id . "&modal=1" : "&modal=1";
                $item = array(
                    'url' => route('dashboard.class.show', $class->id) . $sufix,
                    'label' => date('h:iA',strtotime($class->time)) . '-' .date('h:iA',strtotime($class->time . "+". $class->minutes ." minutes"))
                );
                
                array_push($items, $item);
            }
        }

        return $items;
    }
}

if(!function_exists('leveltest_video_url')){
    function leveltest_video_url($leveltest_id, $type)
    {
        if(setting('default_video_vitual_room') == "videoware"){
            $videoware = new Videoware;
            return $videoware->url($leveltest_id, $type, true);
        }else{
            $braincert = new Braincert;
            return $braincert->url($leveltest_id, $type, true);
        }
    }
}


function arrayHolidayDates()
{
    $holidays = App\Holiday::all();
    $date_array = array();
    if(count($holidays)) {

        foreach ($holidays as $holiday) {
            $date = $holiday->date;
            array_push($date_array, $date);
        }
    }
    return $date_array;
}

function getAvailableTeacher($days, $time)
{
    return $days;
}


function getNewClass()
{
    $class =  App\Classer::where('status','unassigned')->get();
    return $class;
}

function getUnreadInquiry()
{
    $inquiry =  App\Inquiry::where('seen', 0)->get();
    return $inquiry;
}

function getAge($dob)
{
    $birthDate = date('m/d/Y', strtotime($dob));
   // $birthDate = "12/17/1983";
    //explode the date to get month, day and year
    $birthDate = explode("/", $birthDate);
    //get age from date or birthdate
    $age = (date("md", date("U", mktime(0, 0, 0, $birthDate[0], $birthDate[1], $birthDate[2]))) > date("md")
        ? ((date("Y") - $birthDate[2]) - 1)
        : (date("Y") - $birthDate[2]));
    return  $age;
}


function failedBraincertRequest()
{
    return FailedBraincertRequest::where('seen', 0)->count();
}

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\Setting();
        }

        if (is_array($key)) {
            return \App\Setting::set($key[0], $key[1]);
        }

        $value = \App\Setting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}

if (!function_exists('get_new_class')) {
    function get_new_class(){
        return count(App\Classer::where('admin_id', Null)->get()) ? count(App\Classer::where('admin_id', Null)->get()) : 0;
    }
}

if (!function_exists('get_new_leveltest')) {
    function get_new_leveltest(){
        return count(App\LevelTest::where('admin_id', null)->get());
    }
}


if (!function_exists('date_formater')) {
    function date_formater($format, $value){
        return date(setting($format), strtotime($value));
    }
}


if(!function_exists('getClassSessionAverage')){
     function getClassSessionAverage($class_id, $user_id){
        $class = Classer::where('user_id', $user_id)->where('id', $class_id)->first();
        $sessions = $class->classSession()->where('status', 'present')->get();
        $num  = count($sessions);
        $sum = 0;

        foreach($sessions as $session){
            $session_sum = 0;
            $session_sum += $session->comprehesion;
            $session_sum += $session->pronounciation;
            $session_sum += $session->fluency;
            $session_sum += $session->vocabulary;
            $session_sum += $session->grammar;

            $sum += $session_sum / 10;
        }

        if($sum < 1){
            return 0;
        }
        $divide_to = $num = 0 ? 1 : $num;

        $average = $sum / $divide_to;

        return round($average, 2);

    }
}


if(!function_exists('getClassComponentAverages')){
    function getClassComponentAverages($class_id, $user_id){
        
        $comprehesion = 0;
        $pronounciation = 0;
        $fluency = 0;
        $vocabulary = 0;
        $grammar = 0;

        $data = array();

        $class = Classer::where('user_id', $user_id)->where('id', $class_id)->first();
        $sessions = $class->classSession()->where('status', 'present')->get();
        $num  = count($sessions);
        $sum = 0;

        foreach($sessions as $session){
            $comprehesion += $session->comprehesion;
            $pronounciation += $session->pronounciation;
            $fluency += $session->fluency;
            $vocabulary += $session->vocabulary;
            $grammar += $session->grammar;
        }

        array_push($data, array('label' => 'comprehesion','y' =>round($comprehesion / 10, 2)));
        array_push($data, array('label' => 'pronounciation','y' =>round($pronounciation / 10, 2)));
        array_push($data, array('label' => 'fluency','y' =>round($fluency / 10, 2)));
        array_push($data, array('label' => 'vocabulary','y' =>round($vocabulary / 10, 2)));
        array_push($data, array('label' => 'grammar','y' =>round($grammar / 10, 2)));

        return $data;
        //return $class->id;
        //return round($data);

    }

}


if(!function_exists('monthlyComment')){

    function monthlyComment($student_id, $teacher_id, $month){
        /* 
        Note!
          Rely on sessions not on class
          Based it via month
          @return Array
        */  
        $results['valid'] = false;
        $results['comments'] = 0;
        $results['is_this_month'] = false;

        $student = App\User::find($student_id);
        if($teacher_id == "all"){
            $session = $student->classSession()
                ->where('class_sessions.status', '!=', 'postponed')
                ->whereYear('date_time', date('Y', strtotime($month)))
                ->whereMonth('date_time', date('m', strtotime($month)))
                ->orderBy('date_time','DESC')
                ->first();
        }else{
            $session = $student->classSession()
                ->whereHas('admin', function($query) use ($teacher_id) {
                        $query->where('id', $teacher_id);
                })
                ->where('class_sessions.status', '!=', 'postponed')
                ->whereYear('date_time', date('Y', strtotime($month)))
                ->whereMonth('date_time', date('m', strtotime($month)))
                ->orderBy('date_time','DESC')
                ->first();
        }
        
        
        //tolink
        if(count($session)){
            if(date('Y-m-d', strtotime($session->date_time)) >= date('Y-m-d', strtotime($month . "+15days")))
            {
                $results['valid'] = true;
            }

            if($student->comments()->where('month', $month)->count())
            {
                $results['comments'] = $student->comments()->where('month', $month)->count();  
            }

            if($month <= date('Y-m'))
            {
                 $results['is_this_month'] = true;
            }

        }
        
    
        
        return $results;

    }

    function getTeacher($ids)
    {
        $teachers = App\Admin::find($ids);
        return $teachers;
    }


    function filterImage($string)
    {
        return preg_replace("/<img[^>]+\>/i", "<i class='fa fa-image'></i> ", $string); 
    }

    function textbreak($string)
    {
        return strip_tags($string, '<img>'); 
    }
}

if(!function_exists('time_select'))
{
    function time_select()
    {
        	$hour = 06;
            $min = 30;
            $end = 24;

            $result_array = array();

            for($hour; $end > $hour; $hour++)
            {
                    for($i = 0; $i < 6; $i++)
                    {
                        $min =  $i * 10;
                        if($min == 0)
                        {
                            $min = "00";
                        }

                        $time = $hour . ":". $min  . ":00";
                       	
                        if($hour + 1 >= $end)
                        {
                            $last_time =  $hour . ":00:00";
                            array_push($result_array, $last_time);
                       		break;
                        }else{
                            array_push($result_array, $time);
                        }
                    }
                
                
            }

            return $result_array;
    }
}

if(!function_exists('str_limit_wrap'))
{
    function str_limit_wrap($string,$limit)
    {
        $trimed = str_replace('\n', '-*space*-', $string);
        $limit = str_limit($trimed, $limit);
        return str_replace('-*space*-', '\n', $limit);
    }
}