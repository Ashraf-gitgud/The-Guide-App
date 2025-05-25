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
        'position',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
