<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;
use Illuminate\Support\Facades\Hash;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Resto One',
            'email' => 'restaurant1@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        $user2 = User::create([
            'name' => 'Resto Two',
            'email' => 'restaurant2@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        Restaurant::create([
            'name' => 'Ahmed Ben Ali',
            'email' => 'restaurant1@example.com',
            'phone_number' => '0612345678',
            'adress' => "m3a dora",
            'restaurant_rating' => "4",
            'rating' => '4.5',
            'user_id' => $user1->user_id,
        ]);

        Restaurant::create([
            'name' => 'Youssef El Fassi',
            'email' => 'restaurant2@example.com',
            'phone_number' => '0623456789',
            'adress' => "m3a dora",
            'restaurant_rating' => "5",
            'rating' => '4.7',
            'user_id' => $user2->user_id,
        ]);
    }
}
