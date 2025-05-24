<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\RestaurantReservation;

class NewRestaurantReservation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $reservation;

    public function __construct(RestaurantReservation $reservation)
    {
        $this->reservation = $reservation;
    }

    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Restaurant Reservation Request')
            ->line('You have received a new restaurant reservation request.')
            ->line('Reservation Details:')
            ->line('Date: ' . $this->reservation->date)
            ->line('Time: ' . $this->reservation->time)
            ->line('Number of People: ' . $this->reservation->people_number)
            ->action('View Reservation', url('/restaurant/reservations/' . $this->reservation->id))
            ->line('Please review and confirm or cancel this reservation.');
    }

    public function toArray($notifiable)
    {
        return [
            'reservation_id' => $this->reservation->id,
            'message' => 'New restaurant reservation request received',
            'date' => $this->reservation->date,
            'time' => $this->reservation->time,
            'people_number' => $this->reservation->people_number
        ];
    }
} 