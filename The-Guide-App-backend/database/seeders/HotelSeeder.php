<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hotel;
use Illuminate\Support\Facades\Hash;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Hotel One',
            'email' => 'hotel1@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        $user2 = User::create([
            'name' => 'Hotel Two',
            'email' => 'hotel2@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        Hotel::create([
            'name' => 'Ahmed Ben Ali',
            'email' => 'hotel1@example.com',
            'phone_number' => '0612345678',
            'adress' => "m3a dora",
            'hotel_rating' => "4",
            'rating' => '4.5',
            'user_id' => $user1->user_id,
        ]);

        Hotel::create([
            'name' => 'Youssef El Fassi',
            'email' => 'hotel2@example.com',
            'phone_number' => '0623456789',
            'adress' => "m3a dora",
            'hotel_rating' => "5",
            'rating' => '4.7',
            'user_id' => $user2->user_id,
        ]);
    }
}
