<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\LevelTest;
use Lang;

class NewLeveltestNotification extends Notification
{
    use Queueable;
    public $leveltest;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(LevelTest $leveltest)
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

    
    public function toArray($notifiable)
    {
        return [
            'leveltest' => $this->leveltest
        ];
    }



    public function toDatabase($notifiable)
    {
        return [
            'item_id' => $this->leveltest->id,
            'url' => '/admin/leveltest/new',
            'title' => Lang::get('notification.new_leveltest_message_title'),
            'message' => Lang::get('notification.new_leveltest_message') 
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'item_id' => $this->leveltest->id,
            'url' => '/admin/leveltest/new',
            'title' => Lang::get('notification.new_leveltest_message_title'),
            'message' => Lang::get('notification.new_leveltest_message') 
        ];
    }
}
