<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\DriverReservation;

class NewDriverReservation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $reservation;

    public function __construct(DriverReservation $reservation)
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
            ->subject('New Driver Reservation')
            ->greeting('Hello ' . $notifiable->name)
            ->line('You have received a new driver reservation.')
            ->line('Reservation Details:')
            ->line('Date: ' . $this->reservation->date)
            ->line('Time: ' . $this->reservation->time)
            ->line('Number of Hours: ' . $this->reservation->number_of_hours)
            ->line('Number of Passengers: ' . $this->reservation->number_of_passengers)
            ->line('Pickup Location: ' . $this->reservation->pickup_location)
            ->line('Dropoff Location: ' . $this->reservation->dropoff_location)
            ->action('View Reservation', url('/driver/reservations/' . $this->reservation->id))
            ->line('Thank you for using our service!');
    }

    public function toArray($notifiable)
    {
        return [
            'reservation_id' => $this->reservation->id,
            'message' => 'New driver reservation received',
            'date' => $this->reservation->date,
            'time' => $this->reservation->time,
            'number_of_hours' => $this->reservation->number_of_hours,
            'number_of_passengers' => $this->reservation->number_of_passengers,
            'pickup_location' => $this->reservation->pickup_location,
            'dropoff_location' => $this->reservation->dropoff_location
        ];
    }
} 