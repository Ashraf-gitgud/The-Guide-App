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

        // Existing Hotel 2
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
            'profile' => 'https://imgs.search.brave.com/8_e9Bdwp9lv_VC5Y5ON5b9wn5Hi_Sqa9DD8zoiZgxhc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vRFN4Wkpj/OHo2TGhxMllDSGE5/VEx2WXhQclREQVFN/eEEtZ2N4Qi1nWjl4/Zy9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlz/WVMxdy9ZV3h2YldF/dGFHOTBaV3d0L2RH/VjBiM1ZoYmk1b2Iz/UmwvYkcxcGVDNXBk/QzlrWVhSaC9MMUJv/YjNSdmN5OVBjbWxu/L2FXNWhiRkJvYjNS/dkx6RXgvTURZM0x6/RXhNRFkzTlRrdi9N/VEV3TmpjMU9URTRO/QzlJL2IzUmxiQzFN/WVMxUVlXeHYvYldF/dFZHVjBiM1ZoYmkx/Ri9lSFJsY21sdmNp/NUtVRVZI',
        ]);

        $user8 = User::create([
            'name' => 'Riad Dar Achaach',
            'email' => 'contact@riad-dar-achaach.com',
            'password' => Hash::make('riad'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/AN5txMogZqNjraaC0aJj3nLqYPM4Ds18VxPXVRqFvkU/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vNmpFR0Rq/bjRYS3FGZWFvbjk4/blpMTU0xUWptcVhK/dnEweG51R2FfYkNM/WS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlq/Wmk1aS9jM1JoZEds/akxtTnZiUzk0L1pH/RjBZUzlwYldGblpY/TXYvYUc5MFpXd3Zi/V0Y0TXpBdy9MelU0/T0RrM056ZzFNUzVx/L2NHY19hejA1TVRR/NVpXRXovTlRZeE0y/VXhOemN3WkdVMS9Z/akV4WkdaaFpqSXlN/RGhoL1kySTJZVE0y/TURrME5tSTQvTmpZ/ME5tUXpOMlU1TlRF/ei9aVGMwWWpFMVpE/TXpKbTg5L0ptaHdQ/VEU',
        ]);

        // Chefchaouen
        $user9 = User::create([
            'name' => 'Lina Ryad & Spa',
            'email' => 'contact@linaryad.com',
            'password' => Hash::make('lina'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/o5yplAfVqLUfdz3cYBc2OQGW8te6ON0Fl4yARKofH8s/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vT01vX28t/VjEwSFZ3VW4ySHB0/aVBudU9JZ3FVMGhN/NnlBaUtHbU5GSEg2/cy9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NRE12/TUdZdk5HRXZNakF2/L2JHbHVZUzF5ZVdG/a0xYTncvWVM1cWNH/Yw',
        ]);

        $user10 = User::create([
            'name' => 'Dar Echchaouen',
            'email' => 'info@darechchaouen.com',
            'password' => Hash::make('dar'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/lLvJZZRpIGpG_nx94Czark7iFGezGk3zH-fUtMUOKMA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vbTB3VGNG/WUhhQ2kxMVhRcVoz/RHpkeE5JTERIa0ZY/S2J1ZWhRM3dSY1Y5/QS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlr/WVhJdC9aV05vWTJo/aGIzVmxiaTFpL1pX/UXRZbkpsWVd0bVlY/TjAvTFdOb1pXWmph/R0Z2ZFdWdS9MbWh2/ZEdWc2JXbDRMbVZ6/L0wyUmhkR0V2VUdo/dmRHOXovTHpjd01I/ZzFNREF2TVRFei9N/ak12TVRFek1qTTBN/Qzh4L01UTXlNelF3/T1RreEwwUmgvY2kx/RlkyaGphR0Z2ZFdW/dS9MVTFoYVhOdmJp/MUVTRzkwL1pYTXRV/bWxoWkMxRGFHVm0v/WTJoaGIzVmxiaTFG/ZUhSbC9jbWx2Y2k1/S1VFVkg',
        ]);

        $user11 = User::create([
            'name' => 'Casa Hassan',
            'email' => 'casahassan@menara.ma',
            'password' => Hash::make('casa'),
            'role' => 'hotel',
            'profile' => 'https://imgs.search.brave.com/HfJAo0OrO6WtVKS_3gEShElGW-A135_jlSDJf7nNfWM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vNDRPR0NK/OFRYOExLd0VPbHA0/Wm9LeGJVNXBBVk83/bVoyazloWW52LUhX/MC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NV0V2/WVRJdlpHSXZNelF2/L1kyRnpZUzFvWVhO/ellXNHUvYW5Cbg',
        ]);

        // Tangier
        Hotel::create([
            'name' => 'El Minzah Hotel',
            'email' => 'info@elminzah.com',
            'phone_number' => '+212539333444',
            'adress' => '85 Rue de la Liberté, Tangier 90000, Morocco',
            'hotel_rating' => '4',
            'rating' => '4.3',
            'position' => json_encode([35.78211084359769, -5.812539404443347]),
            'user_id' => $user1->user_id,
            'position' => json_encode([35.7800,-5.8100])
        ]);

        Hotel::create([
            'name' => 'Fairmont Tazi Palace Tangier',
            'email' => 'reservations.tazipalace@fairmont.com',
            'phone_number' => '+212539378000',
            'adress' => 'Palais Tazi, Route de Malabata, Tangier 90000, Morocco',
            'hotel_rating' => '5',
            'rating' => '4.5',
            'position' => json_encode([35.782043643737474, -5.850734462115117]),
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

        Hotel::create([
            'name' => 'Hilton Tangier Al Houara Resort & Spa',
            'email' => 'tangieralhouara.reservations@hilton.com',
            'phone_number' => '+212539314000',
            'adress' => 'Km 19.8, Route Nationale, Tangier 90000, Morocco',
            'hotel_rating' => '5',
            'rating' => '4.1',
            'position' => json_encode([35.66778215565263, -5.965920331685904]),
            'user_id' => $user3->user_id,
        ]);

        Hotel::create([
            'name' => 'Hotel Nord-Pinus Tanger',
            'email' => 'contact@nord-pinus-tanger.com',
            'phone_number' => '+212661228140',
            'adress' => '11 Rue Riad Sultan, Kasbah, Tangier 90000, Morocco',
            'hotel_rating' => '4',
            'rating' => '4.5',
            'position' => json_encode([35.789558429572125, -5.813438397688616]),
            'user_id' => $user4->user_id,
        ]);

        Hotel::create([
            'name' => 'La Tangerina',
            'email' => 'contact@latangerina.com',
            'phone_number' => '+212539947731',
            'adress' => '19 Riad Sultan, Kasbah, Tangier 90000, Morocco',
            'hotel_rating' => '3',
            'rating' => '4.6',
            'position' => json_encode([35.78908682311634, -5.813603233278922]),
            'user_id' => $user5->user_id,
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
            'user_id' => $user6->user_id,
        ]);

        Hotel::create([
            'name' => 'Hotel La Paloma',
            'email' => 'lapaloma@menara.ma',
            'phone_number' => '+212539990300',
            'adress' => '751 Avenue Moulay Hassan, Tétouan 93000, Morocco',
            'hotel_rating' => '4',
            'rating' => '4.2',
            'position' => json_encode([35.572736625462824, -5.411915040641509]),
            'user_id' => $user7->user_id,
        ]);

        Hotel::create([
            'name' => 'Riad Dar Achaach',
            'email' => 'contact@riad-dar-achaach.com',
            'phone_number' => '+212539967878',
            'adress' => '15 Rue Sidi Mandri, Tétouan 93000, Morocco',
            'hotel_rating' => '3',
            'rating' => '4.5',
            'position' => json_encode([35.551721350508664, -5.3715277909625625]),
            'user_id' => $user8->user_id,
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
            'user_id' => $user9->user_id,
        ]);

        Hotel::create([
            'name' => 'Dar Echchaouen',
            'email' => 'info@darechchaouen.com',
            'phone_number' => '+212539987824',
            'adress' => 'Route Ras El Ma, Chefchaouen 91000, Morocco',
            'hotel_rating' => '3',
            'rating' => '4.5',
            'position' => json_encode([35.16901585046157, -5.256415804473838]),
            'user_id' => $user10->user_id,
        ]);

        Hotel::create([
            'name' => 'Casa Hassan',
            'email' => 'casahassan@menara.ma',
            'phone_number' => '+212539986153',
            'adress' => '22 Rue Targhi, Chefchaouen 91000, Morocco',
            'hotel_rating' => '3',
            'rating' => '4.4',
            'position' => json_encode([35.16954940861697, -5.262046104473854]),
            'user_id' => $user11->user_id,
        ]);
    }
}