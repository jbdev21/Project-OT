<?php

namespace App\Notifications\Admin;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Inquiry; 
use Lang;

class NewInquiryNotification extends Notification
{
    use Queueable;
    public $inquiry;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Inquiry $inquiry)
    {
        $this->inquiry = $inquiry;
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
    public function toDatabase($notifiable)
        {
            return [
                'item_id' => $this->inquiry->id,
                'url' => '/admin/inquiry',
                'title' => Lang::get('notification.new_inquiry_message_title'),
                'message' => Lang::get('notification.new_inquiry_message') 
            ];
        }

    public function toBroadcast($notifiable)
        {
            return [
                'item_id' => $this->inquiry->id,
                'url' => '/admin/inquiry',
                'title' => Lang::get('notification.new_inquiry_message_title'),
                'message' => Lang::get('notification.new_inquiry_message') 
            ];
        }
}
