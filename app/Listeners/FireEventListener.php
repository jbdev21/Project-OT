<?php

namespace App\Listeners;

use App\Events\FireEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FireEventListener
{
    public $message;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->message = "hello";
    }

    /**
     * Handle the event.
     *
     * @param  FireEvent  $event
     * @return void
     */
    public function handle(FireEvent $event)
    {
        //
    }
}
