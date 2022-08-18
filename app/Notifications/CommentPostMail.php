<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CommentPostMail extends Notification
{
    use Queueable;

    private $detalle;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($detalle)
    {
        $this->detalle = $detalle;

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
        return (new MailMessage)
                    ->subject('Nuevo Comentario')
                    ->greeting('Hola, '.$this->detalle['greeting'])
                    ->line('Tu post:')
                    ->line($this->detalle['bodypost'])
                    ->line('Ha recibido un comentario nuevo:')
                    ->line($this->detalle['bodycomment'])
                    ->line($this->detalle['lastline'])
                    ->salutation('Del equipo de Celaque Social');

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
