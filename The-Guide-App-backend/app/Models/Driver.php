<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'driver_id';

    protected $fillable = [
        'carte_nationale',
        'driver_license',
        'full_name',
        'email',
        'phone_number',
        'rating',
        'status',
        'user_id',
];

    public function reviews()
    {
        return $this->morphMany(Reviews::class, 'reviewable', 'reviewable_type', 'reviewable_id', 'driver_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function driver_reservations()
    {
        return $this->hasMany(DriverReservation::class, 'driver_id', 'driver_id');
    }

}
