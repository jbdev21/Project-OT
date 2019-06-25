<?php

namespace App\Notifications\Admin;


use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewStudentCreated extends Notification
{
    use Queueable;
    public $student;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $student)
    {
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
            //
        ];
    }

    public function toDatabase($notifiable)
    {
        return [
            'item_ids' => $this->student->id,
            'url' => '/admin/student/'. $this->student->id . '/edit',
            'title' => "신규학생 등록",
            'message' => $this->student->name . " " . $this->student->korean_name // Lang::get('notification.new_class_message') 
        ];
    }

    public function toBroadcast($notifiable)
    {
        return [
            'item_ids' => $this->student->id,
            'url' => '/admin/student/'. $this->student->id . '/edit',
            'title' => "신규학생 등록",
            'message' => $this->student->name . " " . $this->student->korean_name // Lang::get('notification.new_class_message') 
        ];
    }
}
