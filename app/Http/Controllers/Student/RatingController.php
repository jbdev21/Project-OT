<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Classer;
use App\User;
use App\Comment;
use App\ClassSession;
use Auth;
use Carbon\Carbon;
use Lang;

class RatingController extends Controller
{
    function __construct()
    {
        date_default_timezone_set(setting('student_timezone'));
    }

    public function index(Request $request)
    {   
        $dataSets = [];
        $user = User::find(Auth::user()->id);
        $month = $request->month ? $request->month : date("Y-m");

        $monthlyAverage = $this->monthlyAverage($user, $month);
        $monthlyAverageAll = $this->monthlyAverageAll($month);

        $myProgress = array(
            'label' => Lang::get('label.my_progress'),
            'borderColor' => "#0d4296",
            'backgroundColor' => "transparent",
            'pointBorderColor' => "rgba(38, 185, 154, 0.7)",
            'pointBackgroundColor' => "rgba(38, 185, 154, 0.7)",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor' => "rgba(220,220,220,1)",
            'pointBorderWidth' => 1,
            'data' => $monthlyAverage['dataSet']
        );


        array_push($dataSets, $myProgress);

        $otherstudent = array(
            'label' => Lang::get('label.all_students'),
            'borderColor' => "#a50808",
            'backgroundColor' => "transparent",
            'pointBorderColor' => "rgba(38, 185, 154, 0.7)",
            'pointBackgroundColor' => "rgba(38, 185, 154, 0.7)",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor' => "rgba(220,220,220,1)",
            'pointBorderWidth' => 1,
            'data' => $monthlyAverageAll['dataSet']
        );

        array_push($dataSets, $otherstudent);
        
        $labels = $monthlyAverage['labels'];
        $overall = $monthlyAverage['overall'];
    
        $comments = Auth::user()->comments()->where('month', $request->month)->get(); 

        return view('student.rating.index', compact('dataSets','labels', 'overall','comments'));
    }

    public function year(Request $request)
    {   
       $dataSets = [];
       $user = User::find(Auth::user()->id);
       //return $this->yealyAverage($user, date('Y'));
       $year  = $request->year ? $request->year : date('Y');
  
        $yealyAverage = $this->yealyAverage($user, $year);
        $yealyAverageAll = $this->yealyAverageAll($year);


        $myProgress = array(
            'label' => Lang::get('label.my_progress'),
            'borderColor' => "#0d4296",
            'backgroundColor' => "transparent",
            'pointBorderColor' => "rgba(38, 185, 154, 0.7)",
            'pointBackgroundColor' => "rgba(38, 185, 154, 0.7)",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor' => "rgba(220,220,220,1)",
            'pointBorderWidth' => 1,
            'data' => $yealyAverage['dataSet']
        );
        array_push($dataSets, $myProgress);

        $otherstudent = array(
            'label' =>  Lang::get('label.all_students'),
            'borderColor' => "#a50808",
            'backgroundColor' => "transparent",
            'pointBorderColor' => "rgba(38, 185, 154, 0.7)",
            'pointBackgroundColor' => "rgba(38, 185, 154, 0.7)",
            'pointHoverBackgroundColor' => "#fff",
            'pointHoverBorderColor' => "rgba(220,220,220,1)",
            'pointBorderWidth' => 1,
            'data' => $yealyAverageAll['dataSet']
        );
        array_push($dataSets, $otherstudent);
        
        $labels = $yealyAverage['labels'];
        $overall = $yealyAverage['overall'];
        
        $comments = Auth::user()->comments()->where('month', date('Y-m'))->get(); 
        
        return view('student.rating.year', compact('dataSets','labels', 'overall','comments'));
    }


    public function monthlyAverage(User $user, $month)
    {
        $data = [];
        $number_of_days = Carbon::parse($month)->daysInMonth;
        $montlyData = $user->monthRate($month, "present", true);
        $labels = [];
        $dates = [];
        
        for($i=1; $i < $number_of_days + 1;$i++)
        {   
            $day = date('d', strtotime($month . '-' . $i));
            $month_day = date('Y-m-d', strtotime($month . '-'. $i));
            $session = $user->classSession()->where("date_time",'LIKE', '%' . $month_day . '%')->first();
            if($session){
                $comprehension = $session->comprehension;
                $pronounciation = $session->pronounciation;
                $fluency = $session->fluency;
                $vocabulary = $session->vocabulary;
                $grammar = $session->grammar;
                $av = ($comprehension + $pronounciation + $fluency + $vocabulary + $grammar) / 5;
                array_push($data, $av);
            }else{
                array_push($data, 0);
            }
            array_push($labels, $day);
        }

        $overall = array(
            $montlyData['comprehension_total'],
            $montlyData['pronounciation_total'],
            $montlyData['fluency_total'],
            $montlyData['vocabulary_total'],
            $montlyData['grammar_total']
        );
       
        
       // return $dates;
        return  array(
            'labels' => $labels,
            'dataSet'  => $data,
            'overall' => $overall
        );

    }

    public function monthlyAverageAll($month)
    {

        $data = [];
        $number_of_days =  Carbon::parse($month)->daysInMonth;

        $labels = [];
        $comprehension_total = 0;
        $pronounciation_total = 0;
        $fluency_total = 0;
        $vocabulary_total = 0;
        $grammar_total = 0;

        for($i=1; $i < $number_of_days + 1;$i++)
        {   
            $day = date('d-D', strtotime($month . '-' . $i));
            array_push($labels, $day);

            $date = date('Y-m-d', strtotime($month . '-' . $i));

            $sessions = ClassSession::whereDate('date_time', $date)
                        ->get(); 
            if(count($sessions) > 0)
            {   
               // return $date;
                $divident = 0;
                $divident2 = 0;
                $total = 0;

                    foreach($sessions as $session)
                    {   
                        if($session->status == 'present' AND $session->classer->user_id != Auth::user()->id)
                            {
                                $divident++;

                                $total  +=  $session->comprehension + 
                                            $session->pronounciation +
                                            $session->fluency +
                                            $session->vocabulary + 
                                            $session->grammar;
                                
                                $comprehension_total += $session->comprehension;
                                $pronounciation_total += $session->pronounciation;
                                $fluency_total += $session->fluency;
                                $vocabulary_total += $session->vocabulary;
                                $grammar_total += $session->grammar;
                            
                            }
                    }

                    $divident == 0 ? $div = 1 : $div = $divident;
                    array_push($data, round(($total / 5) / $div) );

                }else{
                    
                     array_push($data, 0);
                }

        }
            
    

        $overall = array(
                $comprehension_total ? round($comprehension_total / count($divident), 1) : 0,
                $pronounciation_total ? round($pronounciation_total / count($divident), 1) : 0,
                $fluency_total ? round($fluency_total / count($divident), 1) : 0,
                $vocabulary_total ? round($vocabulary_total / count($divident), 1) : 0,
                $grammar_total ? round($grammar_total / count($divident), 1) : 0
            );  

        return  array(
            'labels' => $labels,
            'dataSet'  => $data,
            'overall' => $overall
        );
    }

    public function yealyAverage(User $user, $year)
    {
     
        $data = [];
        $labels = [
            date('M', mktime(0,0,0,1)),
            date('M', mktime(0,0,0,2)),
            date('M', mktime(0,0,0,3)),
            date('M', mktime(0,0,0,4)),
            date('M', mktime(0,0,0,5)),
            date('M', mktime(0,0,0,6)),
            date('M', mktime(0,0,0,7)),
            date('M', mktime(0,0,0,8)),
            date('M', mktime(0,0,0,9)),
            date('M', mktime(0,0,0,10)),
            date('M', mktime(0,0,0,11)),
            date('M', mktime(0,0,0,12)),
        ];

        $comprehension_total = 0;
        $pronounciation_total = 0;
        $fluency_total = 0;
        $vocabulary_total = 0;
        $grammar_total = 0;


        $divident = 0;
        for($i=1; $i<13;$i++){
            $month = date('Y-m', strtotime($year.'-'. $i));
            $montlyData = Auth::user()->monthRate($month, "present", true);
            array_push($data, round($montlyData['overall'], 1));    

            $comprehension_total += $montlyData['comprehension'];
            $pronounciation_total += $montlyData['pronounciation'];
            $fluency_total += $montlyData['fluency'];
            $vocabulary_total += $montlyData['vocabulary'];
            $grammar_total += $montlyData['grammar'];

        } 

        $overall = array(
                $comprehension_total,
                $pronounciation_total,
                $fluency_total,
                $vocabulary_total,
                $grammar_total,
            );  

        return  array(
            'labels' => $labels,
            'dataSet'  => $data,
            'overall' => $overall
        );

    }

    public function yealyAverageAll($year)
    {
        $data = [];
        $labels = [
            date('M', mktime(0,0,0,1)),
            date('M', mktime(0,0,0,2)),
            date('M', mktime(0,0,0,3)),
            date('M', mktime(0,0,0,4)),
            date('M', mktime(0,0,0,5)),
            date('M', mktime(0,0,0,6)),
            date('M', mktime(0,0,0,7)),
            date('M', mktime(0,0,0,8)),
            date('M', mktime(0,0,0,9)),
            date('M', mktime(0,0,0,10)),
            date('M', mktime(0,0,0,11)),
            date('M', mktime(0,0,0,12)),
        ];

        $comprehension_total = 0;
        $pronounciation_total = 0;
        $fluency_total = 0;
        $vocabulary_total = 0;
        $grammar_total = 0;


        $divident = 0;
        for($i=1; $i<13;$i++){
            $month = date('Y-m', strtotime($year.'-'. $i));
            $montlyData = $this->getAllMonthData($month, "present", true);
            array_push($data, round($montlyData['overall'], 1));
            
            $comprehension_total += $montlyData['comprehension'];
            $pronounciation_total += $montlyData['pronounciation'];
            $fluency_total += $montlyData['fluency'];
            $vocabulary_total += $montlyData['vocabulary'];
            $grammar_total += $montlyData['grammar'];

        } 

        $overall = array(
                $comprehension_total,
                $pronounciation_total,
                $fluency_total,
                $vocabulary_total,
                $grammar_total,
            );  

        return  array(
            'labels' => $labels,
            'dataSet'  => $data,
            'overall' => $overall
        );

    }

    function getAllMonthData($month, $status = 'present'){
            $sessions = ClassSession::where("date_time", 'LIKE', '%' . $month . '%')->where("status", $status);
            
            if($sessions->count()){

                $comprehensions  = $sessions->avg("comprehension");
                $pronounciation =  $sessions->avg("pronounciation");
                $fluency =  $sessions->avg("fluency");
                $vocabulary =  $sessions->avg("vocabulary");
                $grammar =  $sessions->avg("grammar");

                $overall = $comprehensions + $pronounciation + $fluency + $vocabulary + $grammar;
                $overall = $overall ? $overall : 0;

                return [
                    'comprehension'    => $comprehensions,
                    'pronounciation'    => $pronounciation,
                    'fluency'           => $fluency,
                    'vocabulary'        => $vocabulary,
                    'grammar'           => $grammar,
                    'overall'           => round($overall / 5)
                ];
               
            }else{
                return [
                    'comprehension'    => 0,
                    'pronounciation'    => 0,
                    'fluency'           => 0,
                    'vocabulary'        => 0,
                    'grammar'           => 0,
                    'overall'           => 0,
                ];
               
            }
    }

}
