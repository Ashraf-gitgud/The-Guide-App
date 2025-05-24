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
        // Tangier
        $user1 = User::create([
            'name' => 'El Minzah Hotel',
            'email' => 'info@elminzah.com',
            'password' => Hash::make('minzah'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/Q7WCWDc027hB1c0LqKb7Xorbkh8Tv_ItnNmGQg23ORk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vWE45ZS1T/c0RzWEIyQmZaMF92/aWY1QUdZSEFQMnZK/dW5UaGMteEpmakg5/TS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlq/TG05MC9ZMlJ1TG1O/dmJTOXBiV2RzL2FX/SXZhRzkwWld4bWIz/UnYvY3k4NEx6QTBO/UzlvYjNSbC9iQzFs/YkMxdGFXNTZZV2d0/L2RHRnVaMlZ5TFRJ/d01qUXcvTXpJMk1q/RXlOelUyTlRRMC9O/REF3TG1wd1p3',
        ]);

        $user2 = User::create([
            'name' => 'Fairmont Tazi Palace Tangier',
            'email' => 'reservations.tazipalace@fairmont.com',
            'password' => Hash::make('fairmot'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/3l7OfGpabHOEJylSCU7cMyy3zGkCTYDq-AJF3o6z9PQ/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20veHFPRjBN/MXVUbnNWNmFGOHFl/VjVwdExuTWlmOUps/QmVtWW5rZUk3VFla/Yy9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlt/WVdseS9iVzl1ZEMx/MFlYcHBMWEJoL2JH/RmpaUzEwWVc1bmFX/VnkvTG1odmRHVnNi/V2w0TG1Wei9MMlJo/ZEdFdlVHaHZkRzl6/L0wwOXlhV2RwYm1G/c1VHaHYvZEc4dk1U/WXlORGd2TVRZeS9O/RGcxTXk4eE5qSTBP/RFV6L05EWXlMMFpo/YVhKdGIyNTAvTFZS/aGVta3RVR0ZzWVdO/bC9MVlJoYm1kcFpY/SXRTRzkwL1pXd3RS/WGgwWlhKcGIzSXUv/U2xCRlJ3',
        ]);

        $user3 = User::create([
            'name' => 'Hilton Tangier Al Houara Resort & Spa',
            'email' => 'tangieralhouara.reservations@hilton.com',
            'password' => Hash::make('hilton'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/3KYVYijsTJoO6rdUoQBTknb_YLJLLwgZFq9WfgjVBrk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vcUpQbmdV/RHFFSXFZYWxTRTZH/emN1bDRxWkFyazY3/eFJIM1p1dFlKdmVD/RS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlq/TG05MC9ZMlJ1TG1O/dmJTOXBiV2RzL2FX/SXZhRzkwWld4bWIz/UnYvY3k4NEx6WTNN/aTlvYjNSbC9iQzFv/YVd4MGIyNHRkR0Z1/L1oybGxjaTFoYkMx/b2IzVmgvY21FdGNt/VnpiM0owTFhOdy9Z/UzEwWVc1blpYSXRN/akF5L05EQXlNRGt4/T0RRMk5UWTQvTkRJ/eU1EQXVhbkJu',
        ]);

        $user4 = User::create([
            'name' => 'Hotel Nord-Pinus Tanger',
            'email' => 'contact@nord-pinus-tanger.com',
            'password' => Hash::make('nord'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/Hpq_TakMkvTHwtuukAfsH6JDED0aFJB3xFINuG2_YYU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vbjZTTjAt/VzZKN254U2l1MmV4/ZXRNTFRONW1uNXll/SGo3QUxUSlktWGY5/dy9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NRE12/T1RZdk4ySXZaak12/L2FHOTBaV3d0Ym05/eVpDMXcvYVc1MWN5/MTBZVzVuWlhJdS9h/bkJu',
        ]);

        $user5 = User::create([
            'name' => 'La Tangerina',
            'email' => 'contact@latangerina.com',
            'password' => Hash::make('tangerina'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/-nEJH0fEMeuB7J5cA7crKP4sdkyEayf-MVbtCp_gUIw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vXzdQSDRr/bVkxdGRBSUJ6NDNS/Rkptckc0RHNLazl3/VGpyWnNLM2VXbDk4/NC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlq/Wkc0dS9ZWFZrYkdW/NWRISmhkbVZzL0xt/TnZiUzgzTURBdk5U/QXcvTHpjNUx6Z3dN/VEF5TWpJdC9iR0V0/ZEdGdVoyVnlhVzVo/L0xXaHZkR1ZzTG1w/d1p3',
        ]);

        // Tétouan
        $user6 = User::create([
            'name' => 'Blanco Riad',
            'email' => 'info@blancoriad.com',
            'password' => Hash::make('blanco'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/H9AJwzqM-cDIIy1eUd4ceEzDnVnCsqfQCFM2YD7s5cA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vc0J3YVFV/anRHY2k2bXJ6UVM0/MWVwSlBjcXRZQTdk/eXJwTVBoSkpEaEpX/TS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTkz/ZDNjdS9aM0psWVhS/emJXRnNiR2h2L2RH/VnNjeTVqYjIwdmNH/aHYvZEc5ekx6RXlO/elkyTjE5aS9iR0Z1/WTI4dGNtbGhaRjh1/L2FuQm4',
        ]);

        $user7 = User::create([
            'name' => 'Hotel La Paloma',
            'email' => 'lapaloma@menara.ma',
            'password' => Hash::make('paloma'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        $user8 = User::create([
            'name' => 'Riad Dar Achaach',
            'email' => 'contact@riad-dar-achaach.com',
            'password' => Hash::make('riad'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // Chefchaouen
        $user9 = User::create([
            'name' => 'Lina Ryad & Spa',
            'email' => 'contact@linaryad.com',
            'password' => Hash::make('lina'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        $user10 = User::create([
            'name' => 'Dar Echchaouen',
            'email' => 'info@darechchaouen.com',
            'password' => Hash::make('dar'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        $user11 = User::create([
            'name' => 'Casa Hassan',
            'email' => 'casahassan@menara.ma',
            'password' => Hash::make('casa'),
            'role' => 'hotel',
            'profile' => 'img.png',
        ]);

        // Tangier
        Hotel::create([
            'name' => 'El Minzah Hotel',
            'email' => 'info@elminzah.com',
            'phone_number' => '+212539333444',
            'address' => '85 Rue de la Liberté, Tangier 90000, Morocco',
            'hotel_rating' => '4',
            'rating' => '4.3',
            'user_id' => $user1->user_id,
        ]);

        Hotel::create([
            'name' => 'Fairmont Tazi Palace Tangier',
            'email' => 'reservations.tazipalace@fairmont.com',
            'phone_number' => '+212539378000',
            'address' => 'Palais Tazi, Route de Malabata, Tangier 90000, Morocco',
            'hotel_rating' => '5',
            'rating' => '4.5',
            'user_id' => $user2->user_id,
        ]);

        Hotel::create([
            'name' => 'Hilton Tangier Al Houara Resort & Spa',
            'email' => 'tangieralhouara.reservations@hilton.com',
            'phone_number' => '+212539314000',
            'address' => 'Km 19.8, Route Nationale, Tangier 90000, Morocco',
            'hotel_rating' => '5',
            'rating' => '4.1',
            'user_id' => $user3->user_id,
        ]);

        Hotel::create([
            'name' => 'Hotel Nord-Pinus Tanger',
            'email' => 'contact@nord-pinus-tanger.com',
            'phone_number' => '+212661228140',
            'address' => '11 Rue Riad Sultan, Kasbah, Tangier 90000, Morocco',
            'hotel_rating' => '4',
            'rating' => '4.5',
            'user_id' => $user4->user_id,
        ]);

        Hotel::create([
            'name' => 'La Tangerina',
            'email' => 'contact@latangerina.com',
            'phone_number' => '+212539947731',
            'address' => '19 Riad Sultan, Kasbah, Tangier 90000, Morocco',
            'hotel_rating' => '3',
            'rating' => '4.6',
            'user_id' => $user5->user_id,
        ]);

        // Tétouan Hotels
        Hotel::create([
            'name' => 'Blanco Riad',
            'email' => 'info@blancoriad.com',
            'phone_number' => '+212539704114',
            'address' => '25 Rue Zawiya Kadiria, Tétouan 93000, Morocco',
            'hotel_rating' => '3',
            'rating' => '4.6',
            'user_id' => $user6->user_id,
        ]);

        Hotel::create([
            'name' => 'Hotel La Paloma',
            'email' => 'lapaloma@menara.ma',
            'phone_number' => '+212539990300',
            'address' => '751 Avenue Moulay Hassan, Tétouan 93000, Morocco',
            'hotel_rating' => '4',
            'rating' => '4.2',
            'user_id' => $user7->user_id,
        ]);

        Hotel::create([
            'name' => 'Riad Dar Achaach',
            'email' => 'contact@riad-dar-achaach.com',
            'phone_number' => '+212539967878',
            'address' => '15 Rue Sidi Mandri, Tétouan 93000, Morocco',
            'hotel_rating' => '3',
            'rating' => '4.5',
            'user_id' => $user8->user_id,
        ]);

        // Chefchaouen Hotels
        Hotel::create([
            'name' => 'Lina Ryad & Spa',
            'email' => 'contact@linaryad.com',
            'phone_number' => '+212539989090',
            'address' => 'Avenue Hassan II, Chefchaouen 91000, Morocco',
            'hotel_rating' => '4',
            'rating' => '4.7',
            'user_id' => $user9->user_id,
        ]);

        Hotel::create([
            'name' => 'Dar Echchaouen',
            'email' => 'info@darechchaouen.com',
            'phone_number' => '+212539987824',
            'address' => 'Route Ras El Ma, Chefchaouen 91000, Morocco',
            'hotel_rating' => '3',
            'rating' => '4.5',
            'user_id' => $user10->user_id,
        ]);

        Hotel::create([
            'name' => 'Casa Hassan',
            'email' => 'casahassan@menara.ma',
            'phone_number' => '+212539986153',
            'address' => '22 Rue Targhi, Chefchaouen 91000, Morocco',
            'hotel_rating' => '3',
            'rating' => '4.4',
            'user_id' => $user11->user_id,
        ]);
    }
}