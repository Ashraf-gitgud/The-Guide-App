<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Guide extends Model
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'guide_id';
    protected $fillable = [
        'carte_nationale',
        'license_guide',
        'full_name',
        'email',
        'phone_number',
        'rating',
        'status',
        'user_id',
    ];
}
