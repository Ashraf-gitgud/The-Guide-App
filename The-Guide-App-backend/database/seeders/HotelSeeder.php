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
        // Existing Hotel 1
        $user1 = User::create([
            'name' => 'Hotel One',
            'email' => 'hotel1@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // Existing Hotel 2
        $user2 = User::create([
            'name' => 'Hotel Two',
            'email' => 'hotel2@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // New Hotel 3
        $user3 = User::create([
            'name' => 'Riad Dar Tangier',
            'email' => 'riaddartangier@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // New Hotel 4
        $user4 = User::create([
            'name' => 'Hotel Continental',
            'email' => 'continental@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // New Hotel 5
        $user5 = User::create([
            'name' => 'Riad Arous Chamel',
            'email' => 'arouschamel@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // New Hotel 6
        $user6 = User::create([
            'name' => 'Hotel Sofitel Tamuda Bay',
            'email' => 'sofiteltamuda@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // New Hotel 7
        $user7 = User::create([
            'name' => 'Hotel Al Hoceima Bay',
            'email' => 'alhoceimabay@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // New Hotel 8
        $user8 = User::create([
            'name' => 'Riad Asilah',
            'email' => 'riadasilah@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // New Hotel 9
        $user9 = User::create([
            'name' => 'Hotel Lixus Larache',
            'email' => 'lixuslarache@example.com',
            'password' => Hash::make('password'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        Hotel::create([
            'name' => 'Ahmed Ben Ali',
            'email' => 'hotel1@example.com',
            'phone_number' => '0612345678',
            'adress' => 'm3a dora, Tangier',
            'hotel_rating' => '4',
            'rating' => '4.5',
            'user_id' => $user1->user_id,
            'position' => json_encode([35.7800,-5.8100])
        ]);

        Hotel::create([
            'name' => 'Youssef El Fassi',
            'email' => 'hotel2@example.com',
            'phone_number' => '0623456789',
            'adress' => 'm3a dora, Tangier',
            'hotel_rating' => '5',
            'rating' => '4.7',
            'user_id' => $user2->user_id,
            'position' => json_encode([35.7750,-5.8050])
        ]);

        Hotel::create([
            'name' => 'Riad Dar Tangier',
            'email' => 'riaddartangier@example.com',
            'phone_number' => '0634567890',
            'adress' => 'Rue de la Kasbah, Tangier',
            'hotel_rating' => '4',
            'rating' => '4.3',
            'user_id' => $user3->user_id,
            'position' => json_encode([35.7850,-5.8130])
        ]);

        Hotel::create([
            'name' => 'Hotel Continental',
            'email' => 'continental@example.com',
            'phone_number' => '0645678901',
            'adress' => '36 Rue Dar Baroud, Tangier',
            'hotel_rating' => '3',
            'rating' => '4.0',
            'user_id' => $user4->user_id,
            'position' => json_encode([35.7840,-5.8110])
        ]);

        Hotel::create([
            'name' => 'Riad Arous Chamel',
            'email' => 'arouschamel@example.com',
            'phone_number' => '0656789012',
            'adress' => '16 Place Uta el-Hammam, Chefchaouen',
            'hotel_rating' => '4',
            'rating' => '4.6',
            'user_id' => $user5->user_id,
            'position' => json_encode([35.1688,-5.2635])
        ]);

        Hotel::create([
            'name' => 'Hotel Sofitel Tamuda Bay',
            'email' => 'sofiteltamuda@example.com',
            'phone_number' => '0667890123',
            'adress' => 'Route de Sebta, M’diq, Tetouan',
            'hotel_rating' => '5',
            'rating' => '4.8',
            'user_id' => $user6->user_id,
            'position' => json_encode([35.6160,-5.3000])
        ]);

        Hotel::create([
            'name' => 'Hotel Al Hoceima Bay',
            'email' => 'alhoceimabay@example.com',
            'phone_number' => '0678901234',
            'adress' => 'Plage Quemado, Al Hoceima',
            'hotel_rating' => '4',
            'rating' => '4.4',
            'user_id' => $user7->user_id,
            'position' => json_encode([35.2500,-3.9350])
        ]);

        Hotel::create([
            'name' => 'Riad Asilah',
            'email' => 'riadasilah@example.com',
            'phone_number' => '0689012345',
            'adress' => 'Rue de la Medina, Asilah',
            'hotel_rating' => '3',
            'rating' => '4.2',
            'user_id' => $user8->user_id,
            'position' => json_encode([35.4650,-6.0350])
        ]);

        Hotel::create([
            'name' => 'Hotel Lixus Larache',
            'email' => 'lixuslarache@example.com',
            'phone_number' => '0690123456',
            'adress' => 'Avenue Mohammed V, Larache',
            'hotel_rating' => '4',
            'rating' => '4.3',
            'user_id' => $user9->user_id,
            'position' => json_encode([35.1930,-6.1500])
        ]);
    }
}