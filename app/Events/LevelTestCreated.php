<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\LevelTest;

class LevelTestCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $leveltest;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(LevelTest $leveltest)
    {
       
        $this->leveltest = $leveltest;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('leveltest');
    }
}
