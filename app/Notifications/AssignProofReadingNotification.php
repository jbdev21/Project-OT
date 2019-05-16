<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\ProofReading;

class AssignProofReadingNotification extends Notification
{
    use Queueable;
    public $proofreading;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(ProofReading $proofreading)
    {
        $this->proofreading = $proofreading;
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
           
        ];
    }
    public function toDatabase($notifiable)
    {
        return [
            'item_ids' => $this->proofreading->id,
            'url' => '/teacher/proofreading/' . $this->proofreading->id,
            'title' => "New Proof Reading",
            'message' => "New Proof reading is assign on you" 
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'item_ids' => $this->proofreading->id,
            'url' => '/teacher/proofreading/' . $this->proofreading->id,
            'title' => "New Proof Reading",
            'message' => "New Proof reading is assign on you" 
        ];
    }
}
