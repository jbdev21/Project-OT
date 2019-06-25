<?php
namespace App\Observers;

use App\Classer;
use App\Holiday;
use App\ClassSession;

class HolidayObserver
{
    public function created(Holiday $holiday){
        //logic if holiday is created
        
    }

    public function updated(Holiday $holiday)
    {
        //logic if holiday is updated


    }

    public function deleted(Holiday $holiday){
        if($holiday->date >= date("Y-m-d")){
            $classes = Classer::where('status', 'ongoing')->get()->filter(function($q) use ($holiday){
                return date('Y-m-d', strtotime($q->getLastSession()->date_time))  >= $holiday->date;
            })->filter(function($q) use ($holiday){
                return date('Y-m-d', strtotime($q->getFirstSession()->date_time))  <= $holiday->date;
            });
          
            foreach($classes as $class){
                $array_days = array();
                foreach($class->day as $classer_days)
                {
                    array_push($array_days, $classer_days->day_number);
                }

                $day_num = date('N', strtotime($holiday->date));
                if (in_array($day_num, $array_days)) {
                    if($class->classSession()->whereDate("date_time", $holiday->date)->count() < 1){

                        $class->getLastSession()->delete();
                        
                        $class_session = new ClassSession;
                        $class_session->date_time = $holiday->date . " " . $class->time;
                        $class_session->status = 'ready';
                        $class_session->classer_id = $class->id;
                        $class_session->admin_id = $class->admin_id;
                        $class_session->save();
                    }
                }
            }
        }
    }

    


}