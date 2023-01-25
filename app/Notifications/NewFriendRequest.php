<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewFriendRequest extends Notification{
    use Queueable;
    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['broadcast','database'];
    }
    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
//     */
//    to array goes to database and to broadcast goes to broadcast, if I use
//both that s mean the message that want to send to database is different than broadcast
    public function toArray($notifiable)
    {
//        data that will be broadcast to the frontend and also saved in the database
        return [

             'lastname' => $this->user->lastname ,
            'firstname' => $this->user->firstname ,
             'image' => $this->user->image ,
              'username' => $this->user->profile->username ,
              'message' => 'is following you.'
        ];
    }
}
