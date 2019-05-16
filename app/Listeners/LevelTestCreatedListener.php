<?php

namespace App\Listeners;

use App\Events\LevelTestCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Library\Braincert\Braincert;

class LevelTestCreatedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LevelTestCreated  $event
     * @return void
     */
    public function handle(LevelTestCreated $event)
    {
         if(setting('default_video_vitual_room') == 'braincert' ){
                $braincert = new Braincert;
                
                $braincert->setLevelTestSchedule($event->leveltest->id, "new");

                // if($braincert->hasFailedRequest)
                // {
                    
                //     $admin_id = setting('admin_to_notify');
                    
                //     $admin = Admin::find($admin_id);
                    
                //     $admin->notify(new FailedBraincertRequest($event->session->id));
                   
                // }
        }
    }
}
