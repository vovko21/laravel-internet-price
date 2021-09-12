<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $status;
    private $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($status, $message)
    {
        $this->message = $message;
        $this->status = $status;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
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
            'message' => $this->message,
            'status' => $this->status,
        ];
    }

    /**
     * Получить содержимое почтового уведомления.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $url = url('/orders');

        return (new MailMessage)
            ->greeting('Вітання!')
            ->line($this->message)
            ->action('перейти в замовлення', $url)
            ->line('Дякую за те що обрали нас');
    }
}
