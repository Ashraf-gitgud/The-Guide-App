<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::create([
            'name' => 'mfdal',
            'email' => 'mfdal@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'admin',
            'profile' => 'img.png',
        ]);
        $user2 = User::create([
            'name' => 'achraf',
            'email' => 'achraf@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'admin',
            'profile' => 'img.png',
        ]);
        $user3 = User::create([
            'name' => 'salmane',
            'email' => 'salmane@gmail.com',
            'password' => Hash::make('1234'),
            'role' => 'admin',
            'profile' => 'img.png',
        ]);

        Admin::create([
            "full_name" => "Maadi Mfdal",
            "email" => "mfdal@gmail.com",
            "phone_number" => "0000000000",
            'user_id' => $user1->user_id,
        ]);
        Admin::create([
            "full_name" => "Achraf Khalilou",
            "email" => "achraf@gmail.com",
            "phone_number" => "0000000000",
            'user_id' => $user2->user_id,
        ]);
        Admin::create([
            "full_name" => "Salmane Belhaj Fahsi",
            "email" => "salmane@gmail.com",
            "phone_number" => "0000000000",
            'user_id' => $user3->user_id,
        ]);
    }
}
