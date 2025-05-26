<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'restaurant_id';

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'adress',
        'restaurant_rating',
        'rating',
        'position',
        'status',
        'user_id',
    ];


    public function reviews()
    {
        return $this->morphMany(Reviews::class, 'reviewable', 'reviewable_type', 'reviewable_id', 'restaurant_id');
    }

    public function restaurant_reservations()
    {
        return $this->hasMany(RestaurantReservation::class, 'restaurant_id', 'restaurant_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}
