<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\DatabaseNotification;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    protected $table = 'users';
    protected $primaryKey = 'user_id';




    public function reviews()
    {
        return $this->morphMany(Reviews::class, 'user_id', 'user_id');
    }

    public function tourist()
    {
        return $this->hasOne(Tourist::class, 'user_id', 'user_id');
    }

    public function driver()
    {
        return $this->hasOne(Driver::class, 'user_id', 'user_id');
    }

    public function guide()
    {
        return $this->hasOne(Guide::class, 'user_id', 'user_id');
    }

    public function admin()
    {
        return $this->hasOne(Admin::class, 'user_id', 'user_id');
    }

    public function hotel()
    {
        return $this->hasOne(Hotel::class, 'user_id', 'user_id');
    }

    public function restaurant()
    {
        return $this->hasOne(Restaurant::class, 'user_id', 'user_id');
    }

    public function hotel_reservations()
    {
        return $this->hasMany(HotelReservation::class, 'author', 'user_id');
    }

    public function restaurant_reservations()
    {
        return $this->hasMany(RestaurantReservation::class, 'user_id', 'user_id');
    }

    public function guide_reservations()
    {
        return $this->hasMany(GuideReservation::class, 'user_id', 'user_id');
    }

    public function driver_reservations()
    {
        return $this->hasMany(DriverReservation::class, 'user_id', 'user_id');
    }

    public function notifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->orderBy('created_at', 'desc');
    }

    public function unreadNotifications()
    {
        return $this->morphMany(DatabaseNotification::class, 'notifiable')->whereNull('read_at')->orderBy('created_at', 'desc');
    }




    public function getAuthIdentifierName()
    {
        return 'user_id';
    }

    public function getAuthIdentifier()
    {
        return $this->user_id;
    }





    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'profile',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
