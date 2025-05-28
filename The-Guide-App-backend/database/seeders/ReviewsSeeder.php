<?php

namespace Database\Seeders;

use App\Models\Reviews;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            'Fantastic stay, highly recommend!',
            'Good food but service was slow.',
            'Clean rooms, great location.',
            'Amazing traditional Moroccan dishes!',
            'Friendly staff, but a bit pricey.',
            'Loved the ambiance, will return!',
            'Average experience, expected more.',
            'Beautiful views, but noisy at night.',
            'Great value for money!',
            'Disappointed with the cleanliness.',
            'Wonderful hospitality, loved it!',
            'Convenient spot, but small portions.',
            'Comfortable stay, Wi-Fi was spotty.',
            'Perfect for exploring the city!',
            'Food was okay, but overpriced.',
        ];

        // Tangier Reviews (Tourists 1–8, User IDs 1–8)
        $tangierTourists = [
            ['tourist_id' => 1, 'name' => 'John Smith'],
            ['tourist_id' => 2, 'name' => 'Maria Garcia'],
            ['tourist_id' => 3, 'name' => 'Hiroshi Tanaka'],
            ['tourist_id' => 4, 'name' => 'Sophie Dubois'],
            ['tourist_id' => 5, 'name' => 'Ahmed Khan'],
            ['tourist_id' => 6, 'name' => 'Elena Rossi'],
            ['tourist_id' => 7, 'name' => 'Liam O\'Connor'],
            ['tourist_id' => 8, 'name' => 'Chen Wei'],
        ];
        $users = [
            ['user_id' => 44, 'name' => 'El Minzah Hotel', 'role' => 'hotel'],
            ['user_id' => 45, 'name' => 'Fairmont Tazi Palace Tangier', 'role' => 'hotel'],
            ['user_id' => 46, 'name' => 'Hilton Tangier Al Houara Resort & Spa', 'role' => 'hotel'],
            ['user_id' => 47, 'name' => 'Hotel Nord-Pinus Tanger', 'role' => 'hotel'],
            ['user_id' => 48, 'name' => 'La Tangerina', 'role' => 'hotel'],
            ['user_id' => 49, 'name' => 'Blanco Riad', 'role' => 'hotel'],
            ['user_id' => 50, 'name' => 'Hotel La Paloma', 'role' => 'hotel'],
            ['user_id' => 55, 'name' => 'El Morocco Club', 'role' => 'restaurant'],
            ['user_id' => 56, 'name' => 'El Korsan', 'role' => 'restaurant'],
            ['user_id' => 57, 'name' => 'Ahlen', 'role' => 'restaurant'],
            ['user_id' => 58, 'name' => 'Kebdani', 'role' => 'restaurant'],
            ['user_id' => 59, 'name' => 'Dar Harruch', 'role' => 'restaurant'],
            ['user_id' => 60, 'name' => 'Restaurante El Reducto', 'role' => 'restaurant'],
            ['user_id' => 4, 'name' => 'Khalid Bouziane', 'role' => 'transporte'],
            ['user_id' => 5, 'name' => 'Noura El Amine', 'role' => 'transporte'],
            ['user_id' => 6, 'name' => 'Yassine Cherkaoui', 'role' => 'transporte'],
            ['user_id' => 7, 'name' => 'Samira Lahlou', 'role' => 'transporte'],
            ['user_id' => 8, 'name' => 'Rachid Zniber', 'role' => 'transporte'],
            ['user_id' => 9, 'name' => 'Hanan Mounir', 'role' => 'transporte'],
            ['user_id' => 10, 'name' => 'Abdelhak Saidi', 'role' => 'transporte'],
            ['user_id' => 11, 'name' => 'Loubna Essaghir', 'role' => 'transporte'],
            ['user_id' => 24, 'name' => 'Mohammed Amrani', 'role' => 'guide'],
            ['user_id' => 25, 'name' => 'Fatima Zahra', 'role' => 'guide'],
            ['user_id' => 26, 'name' => 'Youssef Bennani', 'role' => 'guide'],
            ['user_id' => 27, 'name' => 'Amina El Idrissi', 'role' => 'guide'],
            ['user_id' => 28, 'name' => 'Hassan Tazi', 'role' => 'guide'],
            ['user_id' => 29, 'name' => 'Khadija Roudani', 'role' => 'guide'],
            ['user_id' => 30, 'name' => 'Omar Laaroussi', 'role' => 'guide'],
            ['user_id' => 31, 'name' => 'Nadia Chafik', 'role' => 'guide'],
        ];

        foreach ($tangierTourists as $tourist) {
            // Review for a hotel (user_id 1–5)
            Reviews::create([
                'user_id' => $users[array_rand($users)]['user_id'],
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'tourist_id' => $tourist['tourist_id'],
            ]);

            // Review for a restaurant (user_id 1–5)
            Reviews::create([
                'user_id' => $users[array_rand($users)]['user_id'],
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'tourist_id' => $tourist['tourist_id'],
            ]);

            // Additional review (hotel or restaurant)
            Reviews::create([
                'user_id' => $users[array_rand($users)]['user_id'],
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'tourist_id' => $tourist['tourist_id'],
            ]);
        }

        // Tétouan Reviews (Tourists 9–14, User IDs 9–14)
        $tetouanTourists = [
            ['tourist_id' => 9, 'name' => 'Emma Müller'],
            ['tourist_id' => 10, 'name' => 'Carlos Lopez'],
            ['tourist_id' => 11, 'name' => 'Aisha Patel'],
            ['tourist_id' => 12, 'name' => 'Lucas Silva'],
            ['tourist_id' => 13, 'name' => 'Freya Jensen'],
            ['tourist_id' => 14, 'name' => 'Omar Farooq'],
        ];

        foreach ($tetouanTourists as $tourist) {
            // Review for a hotel (user_id 6–8)
            Reviews::create([
                'user_id' => $users[array_rand($users)]['user_id'],
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'tourist_id' => $tourist['tourist_id'],
            ]);

            // Review for a restaurant (user_id 6–8)
            Reviews::create([
                'user_id' => $users[array_rand($users)]['user_id'],
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'tourist_id' => $tourist['tourist_id'],
            ]);

            // Additional review (hotel or restaurant)
            Reviews::create([
                'user_id' => $users[array_rand($users)]['user_id'],
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'tourist_id' => $tourist['tourist_id'],
            ]);
        }

        // Chefchaouen Reviews (Tourists 15–20, User IDs 15–20)
        $chefchaouenTourists = [
            ['tourist_id' => 15, 'name' => 'Isabella Moretti'],
            ['tourist_id' => 16, 'name' => 'James Carter'],
            ['tourist_id' => 17, 'name' => 'Mei Ling Wong'],
            ['tourist_id' => 18, 'name' => 'Hugo Martinez'],
            ['tourist_id' => 19, 'name' => 'Anya Petrova'],
            ['tourist_id' => 20, 'name' => 'Sami Al-Nasser'],
        ];

        foreach ($chefchaouenTourists as $tourist) {
            // Review for a hotel (user_id 9–10)
            Reviews::create([
                'user_id' => $users[array_rand($users)]['user_id'],
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'tourist_id' => $tourist['tourist_id'],
            ]);

            // Review for a restaurant (user_id 9–10)
            Reviews::create([
                'user_id' => $users[array_rand($users)]['user_id'],
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'tourist_id' => $tourist['tourist_id'],
            ]);

            // Additional review (hotel or restaurant)
            Reviews::create([
                'user_id' => $users[array_rand($users)]['user_id'],
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'tourist_id' => $tourist['tourist_id'],
            ]);
        }
    }
}
