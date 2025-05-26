<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HotelReservation extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'hotel_reservations';

    protected $fillable = [
        'start_date', 'end_date', 'room_type', 'people_number', 'status', 'user_id', 'hotel_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'hotel_id', 'hotel_id');
    }
}
