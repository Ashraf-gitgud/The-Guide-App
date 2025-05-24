<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'review_id';

    protected $fillable = [
        'rating', 'comment', 'user_id', 'reviewable_type', 'reviewable_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function reviewable()
    {
        return $this->morphTo('reviewable', 'reviewable_type', 'reviewable_id');
    }
}
