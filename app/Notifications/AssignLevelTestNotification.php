<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\levelTest;

class AssignLevelTestNotification extends Notification 
{
    use Queueable;
    
    public $leveltest;
    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public function __construct(levelTest $leveltest)
    {
        $this->leveltest = $leveltest;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */

     public function toArray($notifiable)
     {

     }

    public function toDatabase($notifiable)
    {
        return [
            'item_ids' => $this->leveltest->id,
            'url' => '/teacher/leveltest/' . $this->leveltest->id,
            'title' => "New Class Leveltest Assign",
            'message' => "New Class is assign on you" 
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'item_ids' => $this->leveltest->id,
            'url' => '/teacher/leveltest/' . $this->leveltest->id,
            'title' => "New Class Leveltest Assign",
            'message' => "New Class is assign on you" 
        ];
    }
}
