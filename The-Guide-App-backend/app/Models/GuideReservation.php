<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuideReservation extends Model
{
    use HasFactory;
    protected $table = 'guide_reservations';

    protected $fillable = [
        'people_number',
        'start_date',
        'end_date', 
        'user_id',
        'guide_id',
        'status'
    ];

    public function guide()
    {
        return $this->belongsTo(Guide::class, 'guide_id', 'guide_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
