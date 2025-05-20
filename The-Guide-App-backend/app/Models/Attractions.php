<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attractions extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'location',
        'category',
        'image',
        'city',
        'social_hours',
    ];
}
