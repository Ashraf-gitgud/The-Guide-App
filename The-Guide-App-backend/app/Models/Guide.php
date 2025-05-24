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
        'full_name', 'phone_number', 'rating', 'user_id', 'carte_nationale', 'license_guide', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function reviews()
    {
        return $this->morphMany(Reviews::class, 'reviewable', 'reviewable_type', 'reviewable_id', 'guide_id');
    }

    public function guide_reservations()
    {
        return $this->hasMany(GuideReservation::class, 'guide_id', 'guide_id');
    }
 
}

