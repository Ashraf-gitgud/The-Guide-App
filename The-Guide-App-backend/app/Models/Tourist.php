<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
    public function reviews()
    {
        return $this->hasMany(Reviews::class, 'tourist_id', 'tourist_id');
    }
}


