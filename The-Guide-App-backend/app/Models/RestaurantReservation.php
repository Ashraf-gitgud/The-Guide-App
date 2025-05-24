<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RestaurantReservation extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'restaurant_reservations';

    protected $fillable = [
        'date', 'time' , 'people_number', 'status', 'user_id', 'restaurant_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, 'restaurant_id', 'restaurant_id');
    }
}
