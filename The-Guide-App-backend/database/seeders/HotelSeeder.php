<?php

// namespace Database\Seeders;

// use App\Models\Hotel;
// use Illuminate\Database\Seeder;

// class HotelSeeder extends Seeder
// {
//     /**
//      * Run the database seeds.
//      */
//     public function run(): void
//     {
//         Hotel::factory()->count(20)->create();
        
//     }
// } 


namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get existing hotel users
        $hotelUsers = User::where('role', 'hotel')->get();

      // Tangier
      Hotel::create([
        'name' => 'El Minzah Hotel',
        'email' => 'info@elminzah.com',
        'phone_number' => '+212539333444',
        'adress' => '85 Rue de la Liberté, Tangier 90000, Morocco',
        'hotel_rating' => '4',
        'rating' => '4.3',
        'position' => json_encode([35.78211084359769, -5.812539404443347]),
        'user_id' => $hotelUsers[0]->user_id,
    ]);

    Hotel::create([
        'name' => 'Fairmont Tazi Palace Tangier',
        'email' => 'reservations.tazipalace@fairmont.com',
        'phone_number' => '+212539378000',
        'adress' => 'Palais Tazi, Route de Malabata, Tangier 90000, Morocco',
        'hotel_rating' => '5',
        'rating' => '4.5',
        'position' => json_encode([35.782043643737474, -5.850734462115117]),
        'user_id' => $hotelUsers[1]->user_id,
    ]);

    Hotel::create([
        'name' => 'Hilton Tangier Al Houara Resort & Spa',
        'email' => 'tangieralhouara.reservations@hilton.com',
        'phone_number' => '+212539314000',
        'adress' => 'Km 19.8, Route Nationale, Tangier 90000, Morocco',
        'hotel_rating' => '5',
        'rating' => '4.1',
        'position' => json_encode([35.66778215565263, -5.965920331685904]),
        'user_id' => $hotelUsers[2]->user_id,
    ]);

    Hotel::create([
        'name' => 'Hotel Nord-Pinus Tanger',
        'email' => 'contact@nord-pinus-tanger.com',
        'phone_number' => '+212661228140',
        'adress' => '11 Rue Riad Sultan, Kasbah, Tangier 90000, Morocco',
        'hotel_rating' => '4',
        'rating' => '4.5',
        'position' => json_encode([35.789558429572125, -5.813438397688616]),
        'user_id' => $hotelUsers[3]->user_id,
    ]);

    Hotel::create([
        'name' => 'La Tangerina',
        'email' => 'contact@latangerina.com',
        'phone_number' => '+212539947731',
        'adress' => '19 Riad Sultan, Kasbah, Tangier 90000, Morocco',
        'hotel_rating' => '3',
        'rating' => '4.6',
        'position' => json_encode([35.78908682311634, -5.813603233278922]),
        'user_id' => $hotelUsers[4]->user_id,
    ]);

    // Tétouan
    Hotel::create([
        'name' => 'Blanco Riad',
        'email' => 'info@blancoriad.com',
        'phone_number' => '+212539704114',
        'adress' => '25 Rue Zawiya Kadiria, Tétouan 93000, Morocco',
        'hotel_rating' => '3',
        'rating' => '4.6',
        'position' => json_encode([35.57226745466351, -5.3702267541403295]),
        'user_id' => $hotelUsers[5]->user_id,
    ]);

    Hotel::create([
        'name' => 'Hotel La Paloma',
        'email' => 'lapaloma@menara.ma',
        'phone_number' => '+212539990300',
        'adress' => '751 Avenue Moulay Hassan, Tétouan 93000, Morocco',
        'hotel_rating' => '4',
        'rating' => '4.2',
        'position' => json_encode([35.572736625462824, -5.411915040641509]),
        'user_id' => $hotelUsers[6]->user_id,
    ]);

    Hotel::create([
        'name' => 'Riad Dar Achaach',
        'email' => 'contact@riad-dar-achaach.com',
        'phone_number' => '+212539967878',
        'adress' => '15 Rue Sidi Mandri, Tétouan 93000, Morocco',
        'hotel_rating' => '3',
        'rating' => '4.5',
        'position' => json_encode([35.551721350508664, -5.3715277909625625]),
        'user_id' => $hotelUsers[7]->user_id,
    ]);

    // Chefchaouen
    Hotel::create([
        'name' => 'Lina Ryad & Spa',
        'email' => 'contact@linaryad.com',
        'phone_number' => '+212539989090',
        'adress' => 'Avenue Hassan II, Chefchaouen 91000, Morocco',
        'hotel_rating' => '4',
        'rating' => '4.7',
        'position' => json_encode([35.174719350058446, -5.2600657237243]),
        'user_id' => $hotelUsers[8]->user_id,
    ]);

    Hotel::create([
        'name' => 'Dar Echchaouen',
        'email' => 'info@darechchaouen.com',
        'phone_number' => '+212539987824',
        'adress' => 'Route Ras El Ma, Chefchaouen 91000, Morocco',
        'hotel_rating' => '3',
        'rating' => '4.5',
        'position' => json_encode([35.16901585046157, -5.256415804473838]),
        'user_id' => $hotelUsers[9]->user_id,
    ]);

    Hotel::create([
        'name' => 'Casa Hassan',
        'email' => 'casahassan@menara.ma',
        'phone_number' => '+212539986153',
        'adress' => '22 Rue Targhi, Chefchaouen 91000, Morocco',
        'hotel_rating' => '3',
        'rating' => '4.4',
        'position' => json_encode([35.16954940861697, -5.262046104473854]),
        'user_id' => $hotelUsers[10]->user_id,
    ]);

    }
}
