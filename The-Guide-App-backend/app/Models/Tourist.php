<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Tourist extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'tourist_id';

    protected $fillable = [
        'full_name', 'phone_number', 'tourist_rating', 'user_id'
    ];

    protected $casts = [
        'tourist_rating' => 'array'
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($tourist) {
            if (empty($tourist->tourist_rating)) {
                $tourist->tourist_rating = ['good'];
            }
        });
    }

    protected function tourist_rating(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true) ?? ['good'],
            set: fn ($value) => json_encode($value)
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}


