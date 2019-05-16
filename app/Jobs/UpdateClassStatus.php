<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\ClassSession;

class UpdateClassStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $sessions = ClassSession::where('date_time', '<', Carbon::parse('-24 hours'))->where('status', 'ready')->get();
        foreach($sessions as $session){
            $session_object = ClassSession::find($session->id);
            $session_object->status = "absent";
            $session_object->save();
        }
    }
}
