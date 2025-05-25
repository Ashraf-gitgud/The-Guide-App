<?php

// namespace Database\Seeders;

// use App\Models\Restaurant;
// use Illuminate\Database\Seeder;

// class RestaurantSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         Restaurant::factory()->count(30)->create();
        
//     }
// }



namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing restaurant users
        $restaurantUsers = User::where('role', 'restaurant')->get();

        // Tangier 
        Restaurant::create([
            'name' => 'El Morocco Club',
            'phone_number' => '+212539948139',
            'adress' => '1 Rue Kashla, Kasbah, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.3',
            'status' => 'active',
            'position' => json_encode([35.7890288591531, -5.814541233278868]),
            'user_id' => $restaurantUsers[0]->user_id,
        ]);

        Restaurant::create([
            'name' => 'El Korsan',
            'phone_number' => '+212539333444',
            'adress' => '85 Rue de la Liberté, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.2',
            'status' => 'active',
            'position' => json_encode([35.78215572480191, -5.812094475607398]),
            'user_id' => $restaurantUsers[1]->user_id,
        ]);

        Restaurant::create([
            'name' => 'Ahlen',
            'phone_number' => '+212661234567',
            'adress' => 'Unnamed Road, Medina, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.4',
            'status' => 'active',
            'position' => json_encode([35.785474472577405, -5.809842795999888]),
            'user_id' => $restaurantUsers[2]->user_id,
        ]);

        Restaurant::create([
            'name' => 'Kebdani',
            'phone_number' => '+212539938745',
            'adress' => '35 Rue Hadj Mohamed Torres, Medina, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.3',
            'status' => 'active',
            'position' => json_encode([35.7879449815462, -5.809729935931306]),
            'user_id' => $restaurantUsers[3]->user_id,
        ]);

        Restaurant::create([
            'name' => 'Dar Harruch',
            'phone_number' => '+212539935627',
            'adress' => '8 Rue de la Kasbah, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.5',
            'status' => 'active',
            'position' => json_encode([35.78684553374611, -5.810418075607219]),
            'user_id' => $restaurantUsers[4]->user_id,
        ]);

        // Tétouan
        Restaurant::create([
            'name' => 'Restaurante El Reducto',
            'phone_number' => '+212539968120',
            'adress' => '38 Rue Zawiya Kadiria, Tétouan 93000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.4',
            'status' => 'active',
            'position' => json_encode([35.57306520764624, -5.370189483022967]),
            'user_id' => $restaurantUsers[5]->user_id,
        ]);

        Restaurant::create([
            'name' => 'Blanco Riad Restaurant',
            'phone_number' => '+212539704114',
            'adress' => '25 Rue Zawiya Kadiria, Tétouan 93000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.3',
            'status' => 'active',
            'position' => json_encode([35.57078645532626, -5.3700387467821]),
            'user_id' => $restaurantUsers[6]->user_id,
        ]);

        Restaurant::create([
            'name' => 'Restaurant Omar',
            'phone_number' => '+212539966543',
            'adress' => 'Avenue Al Massira Al Khadra, Tétouan 93000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.2',
            'status' => 'active',
            'position' => json_encode([35.571251368639686, -5.377971919797419]),
            'user_id' => $restaurantUsers[7]->user_id,
        ]);

        // Chefchaouen
        Restaurant::create([
            'name' => 'Café Clock',
            'phone_number' => '+212539989797',
            'adress' => 'Derb El Magana, Chefchaouen 91000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.5',
            'status' => 'active',
            'position' => json_encode([35.16976746758482, -5.263051275637951]),
            'user_id' => $restaurantUsers[8]->user_id,
        ]);

        Restaurant::create([
            'name' => 'Restaurant Aladdin',
            'phone_number' => '+212539989071',
            'adress' => '17 Rue Targui, Chefchaouen 91000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.3',
            'status' => 'active',
            'position' => json_encode([35.169227511767254, -5.261826976955539]),
            'user_id' => $restaurantUsers[9]->user_id,
        ]);

        Restaurant::create([
            'name' => 'Sofia Restaurant',
            'phone_number' => '+212539989234',
            'adress' => 'Rue El Kharrazine, Chefchaouen 91000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.4',
            'status' => 'active',
            'position' => json_encode([35.16936214967713, -5.261208333309762]),
            'user_id' => $restaurantUsers[10]->user_id,
        ]);
    }
}
