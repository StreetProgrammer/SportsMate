<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ClubAccountRejected extends Notification
{
    use Queueable;

    public $rejectmsgs ;

    public $name ;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($name, $rejectmsgs)
    {
        $this->rejectmsgs   = $rejectmsgs ;
        $this->name         = $name ;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)->view('club.emails.ClubAccountRejected', ['name' => $this->name, 'rejectmsgs' => $this->rejectmsgs]) ;
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
}
