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
        // Existing Restaurant 1
        $user1 = User::create([
            'name' => 'Resto One',
            'email' => 'restaurant1@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        // Existing Restaurant 2
        $user2 = User::create([
            'name' => 'Resto Two',
            'email' => 'restaurant2@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        // New Restaurant 3
        $user3 = User::create([
            'name' => 'Café Hafa',
            'email' => 'cafehafa@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        // New Restaurant 4
        $user4 = User::create([
            'name' => 'Restaurant Al Kasbah',
            'email' => 'alkasbah@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        // New Restaurant 5
        $user5 = User::create([
            'name' => 'Chez Hassan',
            'email' => 'chezhassan@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        // New Restaurant 6
        $user6 = User::create([
            'name' => 'Restaurant L’Ocean',
            'email' => 'locean@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        // New Restaurant 7
        $user7 = User::create([
            'name' => 'Riad Al Andalous',
            'email' => 'alandalous@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        // New Restaurant 8
        $user8 = User::create([
            'name' => 'Dar Al Maghreb',
            'email' => 'darmaghreb@example.com',
            'password' => Hash::make('password'),
            'role' => 'restaurant',
            'profile' => 'img.png',
        ]);

        Restaurant::create([
            'name' => 'Ahmed Ben Ali',
            'email' => 'restaurant1@example.com',
            'phone_number' => '0612345678',
            'adress' => 'm3a dora, Tangier',
            'restaurant_rating' => '4',
            'rating' => '4.5',
            'user_id' => $user1->user_id,
            'position' => json_encode([35.7800,-5.8100])
        ]);

        Restaurant::create([
            'name' => 'Youssef El Fassi',
            'email' => 'restaurant2@example.com',
            'phone_number' => '0623456789',
            'adress' => 'm3a dora, Tangier',
            'restaurant_rating' => '5',
            'rating' => '4.7',
            'user_id' => $user2->user_id,
            'position' => json_encode([35.7750,-5.8050])
        ]);

        Restaurant::create([
            'name' => 'Café Hafa',
            'email' => 'cafehafa@example.com',
            'phone_number' => '0634567890',
            'adress' => 'Rue Hafa, Tangier',
            'restaurant_rating' => '4',
            'rating' => '4.4',
            'user_id' => $user3->user_id,
            'position' => json_encode([35.7869,-5.8408])
        ]);

        Restaurant::create([
            'name' => 'Restaurant Al Kasbah',
            'email' => 'alkasbah@example.com',
            'phone_number' => '0645678901',
            'adress' => 'Place Uta el-Hammam, Chefchaouen',
            'restaurant_rating' => '4',
            'rating' => '4.3',
            'user_id' => $user4->user_id,
            'position' => json_encode([35.1689,-5.2639])
        ]);

        Restaurant::create([
            'name' => 'Chez Hassan',
            'email' => 'chezhassan@example.com',
            'phone_number' => '0656789012',
            'adress' => 'Rue Mohammed V, Tetouan',
            'restaurant_rating' => '3',
            'rating' => '4.1',
            'user_id' => $user5->user_id,
            'position' => json_encode([35.5700,-5.3750])
        ]);

        Restaurant::create([
            'name' => 'Restaurant L’Ocean',
            'email' => 'locean@example.com',
            'phone_number' => '0667890123',
            'adress' => 'Plage Quemado, Al Hoceima',
            'restaurant_rating' => '4',
            'rating' => '4.5',
            'user_id' => $user6->user_id,
            'position' => json_encode([35.2500,-3.9333])
        ]);

        Restaurant::create([
            'name' => 'Riad Al Andalous',
            'email' => 'alandalous@example.com',
            'phone_number' => '0678901234',
            'adress' => 'Rue de la Medina, Asilah',
            'restaurant_rating' => '4',
            'rating' => '4.2',
            'user_id' => $user7->user_id,
            'position' => json_encode([35.4650,-6.0350])
        ]);

        Restaurant::create([
            'name' => 'Dar Al Maghreb',
            'email' => 'darmaghreb@example.com',
            'phone_number' => '0689012345',
            'adress' => 'Avenue Hassan II, Larache',
            'restaurant_rating' => '3',
            'rating' => '4.0',
            'user_id' => $user8->user_id,
            'position' => json_encode([35.1930,-6.1500])
        ]);
    }
}