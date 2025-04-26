<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends Model
{
    use HasFactory, Notifiable;
    protected $primaryKey = 'admin_id';
    protected $fillable = [
        'full_name',
        'email',
        'phone_number',
        'user_id',
    ];
}
