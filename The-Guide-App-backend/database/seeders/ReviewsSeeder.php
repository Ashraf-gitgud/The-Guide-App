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
            ['user_id' => 1, 'name' => 'John Smith'],
            ['user_id' => 2, 'name' => 'Maria Garcia'],
            ['user_id' => 3, 'name' => 'Hiroshi Tanaka'],
            ['user_id' => 4, 'name' => 'Sophie Dubois'],
            ['user_id' => 5, 'name' => 'Ahmed Khan'],
            ['user_id' => 6, 'name' => 'Elena Rossi'],
            ['user_id' => 7, 'name' => 'Liam O’Connor'],
            ['user_id' => 8, 'name' => 'Chen Wei'],
        ];

        foreach ($tangierTourists as $tourist) {
            // Review for a hotel (reviewable_id 1–5)
            Reviews::create([
                'reviewable_id' => rand(1, 5), // Tangier hotels
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'user_id' => $tourist['user_id'],
            ]);

            // Review for a restaurant (reviewable_id 1–5)
            Reviews::create([
                'reviewable_id' => rand(1, 5), // Tangier restaurants
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'user_id' => $tourist['user_id'],
            ]);

            // Additional review (hotel or restaurant)
            Reviews::create([
                'reviewable_id' => rand(1, 5),
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'user_id' => $tourist['user_id'],
            ]);
        }

        // Tétouan Reviews (Tourists 9–14, User IDs 9–14)
        $tetouanTourists = [
            ['user_id' => 9, 'name' => 'Emma Müller'],
            ['user_id' => 10, 'name' => 'Carlos Lopez'],
            ['user_id' => 11, 'name' => 'Aisha Patel'],
            ['user_id' => 12, 'name' => 'Lucas Silva'],
            ['user_id' => 13, 'name' => 'Freya Jensen'],
            ['user_id' => 14, 'name' => 'Omar Farooq'],
        ];

        foreach ($tetouanTourists as $tourist) {
            // Review for a hotel (reviewable_id 6–8)
            Reviews::create([
                'reviewable_id' => rand(6, 8), // Tétouan hotels
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'user_id' => $tourist['user_id'],
            ]);

            // Review for a restaurant (reviewable_id 6–8)
            Reviews::create([
                'reviewable_id' => rand(6, 8), // Tétouan restaurants
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'user_id' => $tourist['user_id'],
            ]);

            // Additional review (hotel or restaurant)
            Reviews::create([
                'reviewable_id' => rand(6, 8),
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'user_id' => $tourist['user_id'],
            ]);
        }

        // Chefchaouen Reviews (Tourists 15–20, User IDs 15–20)
        $chefchaouenTourists = [
            ['user_id' => 15, 'name' => 'Isabella Moretti'],
            ['user_id' => 16, 'name' => 'James Carter'],
            ['user_id' => 17, 'name' => 'Mei Ling Wong'],
            ['user_id' => 18, 'name' => 'Hugo Martinez'],
            ['user_id' => 19, 'name' => 'Anya Petrova'],
            ['user_id' => 20, 'name' => 'Sami Al-Nasser'],
        ];

        foreach ($chefchaouenTourists as $tourist) {
            // Review for a hotel (reviewable_id 9–10)
            Reviews::create([
                'reviewable_id' => rand(9, 10), // Chefchaouen hotels
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'user_id' => $tourist['user_id'],
            ]);

            // Review for a restaurant (reviewable_id 9–10)
            Reviews::create([
                'reviewable_id' => rand(9, 10), // Chefchaouen restaurants
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'user_id' => $tourist['user_id'],
            ]);

            // Additional review (hotel or restaurant)
            Reviews::create([
                'reviewable_id' => rand(9, 10),
                'rating' => rand(1, 5),
                'comment' => $comments[array_rand($comments)],
                'user_id' => $tourist['user_id'],
            ]);
        }
    }
}
