<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'Driver One',
            'email' => 'driver1@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'img.png',
        ]);

        $user2 = User::create([
            'name' => 'Driver Two',
            'email' => 'driver2@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'img.png',
        ]);

        Driver::create([
            'carte_nationale' => 'D123456',
            'driver_license' => 'DL123456',
            'full_name' => 'Ahmed Ben Ali',
            'email' => 'driver1@example.com',
            'phone_number' => '0612345678',
            'rating' => '4.5',
            'user_id' => $user1->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D654321',
            'driver_license' => 'DL654321',
            'full_name' => 'Youssef El Fassi',
            'email' => 'driver2@example.com',
            'phone_number' => '0623456789',
            'rating' => '4.7',
            'user_id' => $user2->user_id,
        ]);
    }
}
