<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\HotelReservation;

class NewHotelReservation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $reservation;

    public function __construct(HotelReservation $reservation)
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
            ->subject('New Hotel Reservation Request')
            ->line('You have received a new hotel reservation request.')
            ->line('Reservation Details:')
            ->line('Check-in Date: ' . $this->reservation->start_date)
            ->line('Check-out Date: ' . $this->reservation->end_date)
            ->line('Number of Guests: ' . $this->reservation->people_number)
            ->line('Room Type: ' . $this->reservation->room_type)
            ->action('View Reservation', url('/hotel/reservations/' . $this->reservation->id))
            ->line('Please review and confirm or cancel this reservation.');
    }

    public function toArray($notifiable)
    {
        return [
            'reservation_id' => $this->reservation->id,
            'message' => 'New hotel reservation request received',
            'check_in_date' => $this->reservation->start_date,
            'check_out_date' => $this->reservation->end_date,
            'guests_number' => $this->reservation->people_number,
            'room_type' => $this->reservation->room_type
        ];
    }
} 