<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\GuideReservation;

class NewGuideReservation extends Notification implements ShouldQueue
{
    use Queueable;

    protected $reservation;

    public function __construct(GuideReservation $reservation)
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
            ->subject('New Guide Reservation Request')
            ->line('You have received a new guide reservation request.')
            ->line('Reservation Details:')
            ->line('Date: ' . 'from ' . $this->reservation->start_date . ' to ' . $this->reservation->end_date)
            ->line('Time: ' . $this->reservation->time)
            ->line('Location: ' . $this->reservation->location)
            ->line('Number of People: ' . $this->reservation->people_number)
            ->action('View Reservation', url('/guide/reservations/' . $this->reservation->id))
            ->line('Please review and confirm or cancel this reservation.');
    }

    public function toArray($notifiable)
    {
        return [
            'reservation_id' => $this->reservation->id,
            'message' => 'New guide reservation request received',
            'start_date' => $this->reservation->start_date,
            'end_date' => $this->reservation->end_date,
            'time' => $this->reservation->time,
            'location' => $this->reservation->location,
            'people_number' => $this->reservation->people_number
        ];
    }
} 