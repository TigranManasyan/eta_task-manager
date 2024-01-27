<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CustomNotification extends Notification
{
    public function toMail($notifiable)
    {
        $userEmail = $notifiable->email; // Получаем адрес электронной почты пользователя
        return (new MailMessage)
            ->to($userEmail) // Указываем адрес получателя
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            // добавьте свои собственные данные, которые вы хотите передать в уведомление
        ];
    }

    public function via($notifiable)
    {
        return ['mail']; // Указываем, что уведомление будет отправлено по электронной почте
    }
}
