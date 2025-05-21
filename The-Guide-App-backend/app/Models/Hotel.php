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
        'status',
        'user_id',
    ];
}
