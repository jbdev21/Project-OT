<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Classer;

class ChangeTimeNotification extends Notification
{
    use Queueable;
    public $class;
    public $message;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Classer $class, $message)
    {
        $this->class = $class;
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast', 'database'];
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
        return [
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'item_ids' => $this->class->id,
            'url' => '/teacher/classer/' . $this->class->id,
            'title' => "Class Time Changes",
            'message' => $this->message 
        ];
    }
    
    public function toBroadcast($notifiable)
    {
        return [
            'item_ids' => $this->class->id,
            'url' => '/teacher/classer/' . $this->class->id,
            'title' => "Class Time Changes",
            'message' => $this->message 
        ];
    }
}
