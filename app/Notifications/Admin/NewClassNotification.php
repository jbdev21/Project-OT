<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Classer;
use Lang;

class NewClassNotification extends Notification
{
    use Queueable;
    public $class;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Classer $class)
    {
        $this->class = $class;
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
        return [
            'class' => $this->class
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'item_ids' => $this->class->id,
            'url' => '/admin/classer/new',
            'title' => Lang::get('notification.new_class_message_title') ,
            'message' => $this->class->user->username . " " . $this->class->user->korean_name // Lang::get('notification.new_class_message') 
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'item_ids' => $this->class->id,
            'url' => '/admin/classer/new',
            'title' => Lang::get('notification.new_class_message_title') ,
            'message' => $this->class->user->username . " " . $this->class->user->korean_name //Lang::get('notification.new_class_message') 
        ];
    }
}
