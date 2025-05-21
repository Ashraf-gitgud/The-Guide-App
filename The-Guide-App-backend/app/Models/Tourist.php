<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tourist extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'tourist_id';
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        "user_id"
    ];

}
