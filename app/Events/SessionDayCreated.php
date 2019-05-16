<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\ClassSession;
use App\User;
use Auth; 

class SessionDayCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $session;
    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ClassSession $session)
    {
        $user = User::find(Auth::user()->id);
        $this->session = $session;
        $this->user = $user;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
