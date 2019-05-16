<?php

namespace App\Notifications\Teacher;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\ClassSession;
use App\Admin;
use App\User;
use Lang;

class PostponedClassNotification extends Notification
{
    use Queueable;
    public $is_postpone;
    public $student;
    public $session;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $student, $is_postpone, $session)
    {
        $this->is_postpone = $is_postpone;
        $this->session = $session;
        $this->student = $student;
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
            ''
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'item_id' => 1,
            'url' => '/teacher/session/' . $this->session->id,
            'title' => $this->is_postpone ? "Session Postpone" : "Session Postponed Cancel",
            'message' => $this->student->username . " " . $this->student->korean_name//$this->is_postpone ? $this->student->username . ': ' . Lang::get('notification.new_postponed_message') : $this->student->username . ': ' . Lang::get('notification.postpone_cancel_message')
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'item_id' => 1,
            'url' => '/teacher/session/' . $this->session->id,
            'title' => $this->is_postpone ? "Session Postpone" : "Session Postponed Cancel",
            'message' => $this->student->username . " " . $this->student->korean_name//$this->is_postpone ? $this->student->username . ': ' . Lang::get('notification.new_postponed_message') : $this->student->username . ': ' . Lang::get('notification.postpone_cancel_message')
        ];
    }
}
