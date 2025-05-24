<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DriverReservation extends Model
{
    use HasFactory;
    protected $table = 'driver_reservations';

    protected $fillable = [
       'people_number', 'date', 'time', 'start_place', 'end_place', 'status', 'user_id', 'driver_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'driver_id', 'driver_id');
    }
}
