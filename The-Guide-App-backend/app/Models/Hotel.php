<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'hotel_id';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'adress',
        'hotel_rating',
        'rating',
        'position',
        'status',
    ];

    public function reviews()
    {
        return $this->morphMany(Reviews::class, 'reviewable', 'reviewable_type', 'reviewable_id', 'hotel_id');
    }

    public function hotel_reservations()
    {
        return $this->hasMany(HotelReservation::class, 'hotel_id', 'hotel_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}
