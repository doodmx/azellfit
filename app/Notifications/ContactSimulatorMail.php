<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ContactSimulatorMail extends Notification implements ShouldQueue
{
    use Queueable;

    private $contact;

    /**
     * Create a new notification instance.
     * @return void
     */
    public function __construct($contact)
    {
        $this->contact = $contact;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('AzellFT - Lead AzellFT "Acceso a Simulador"')
            ->from($this->contact['email'], 'Lead AzellFT')
            ->line('El siguiente usuario se puso en contacto con nosotros, para conocer el "simulador de Inversión."')
            ->line('La información de contacto es la siguiente:')
            ->line('Email: ' . $this->contact['email'])
            ->line('WhatsApp: ' . $this->contact['whatsapp'])
            ->line('Ponte en contacto con el para determinar el acceso al simulador.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
