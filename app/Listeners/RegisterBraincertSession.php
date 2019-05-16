<?php

namespace App\Listeners;

use App\Events\SessionDayCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Library\Braincert\Braincert;
use App\Notifications\FailedBraincertRequest;
use App\BraincertSchedule;
use App\ClassSession;
use App\Admin;
use Auth;


class RegisterBraincertSession implements ShouldQueue
{
     
   // use InteractsWithQueue;

    protected $endpoint;
    protected $session;
    protected $user;


    public function __construct()
    {
        $this->endpoint = 'https://api.braincert.com/v2';
        $this->task = 'schedule';
    }

    /**
     * Handle the event.
     *
     * @param  SessionDayCreated  $event
     * @return void
     */
    public function handle(SessionDayCreated $event)
    {

        if(setting('default_video_vitual_room') == 'braincert' ){
                $braincert = new Braincert;
                $braincert->setSchedule($event->session->id, 'student');
                // if($braincert->hasFailedRequest)
                // {
                    
                //     $admin_id = setting('admin_to_notify');
                    
                //     $admin = Admin::find($admin_id);
                    
                //     $admin->notify(new FailedBraincertRequest($event->session->id));
                   
                // }
        }
    }


}
