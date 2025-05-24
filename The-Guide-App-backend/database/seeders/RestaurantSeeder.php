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
        // Tangier
        $user1 = User::create([
            'name' => 'El Morocco Club',
            'email' => 'info@elmoroccoclub.ma',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/ibZohPUcCB-1HnkXGbjwEwWH8b6Xrsu_M1q86v0b5WE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vdk9iT2VC/MmxITmNZU0tHT2dk/TlM3YkpVeDVPUTZZ/UnRtXzh5ZzFNNHJW/Zy9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTkz/ZDNjdS9jSFZ5Ykds/bVpTMXRZWEp2L1l5/NWpiMjB2ZDNBdFky/OXUvZEdWdWRDOTFj/R3h2WVdSei9Mekl3/TWpJdk1ESXZSV3d0/L1RXRnliMk5qYnkx/RGJIVmkvTFZSaGJt/ZGxjaTFRZFhJdC9U/R2xtWlMxTllYSnZZ/eTB6L0xtcHdadw',
        ]);

        $user2 = User::create([
            'name' => 'El Korsan',
            'email' => 'info@korsan.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/td9lrNbYWc0VFiV_2b4kTO1qZnKeN881t0zB5rqjdZI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20va0c2YnhX/OS04TnhTbVFLVGpY/SVBQTnZ4VzJ5Qm1Y/akgzM3FJNzB1UGdU/Yy9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NRFl2/TjJFdlpUVXZPR0V2/L1pHVnpaR1V0Wld3/dFkybGwvYkc4dFpH/VXRkR0Z1WjJWeS9M/bXB3Wnc',
        ]);

        $user3 = User::create([
            'name' => 'Ahlen',
            'email' => 'ahlen.tangier@example.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/VGQoUzYCel6tBaZo7uE0C6xQZir7kNTI4KDL7t-N6wo/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vNDV4QmZ0/MUNwMk9hNGNXRkJS/V3lZczNCbTFXR3JB/RVRGdEowQmx1RWV5/OC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTlw/YldjdS9jbVZ6ZEdG/MWNtRnVkR2QxL2Nu/VXVZMjl0TDJNeE1E/TXQvWkdsemFHVnpM/VkpsYzNSaC9kWEpo/Ym5RdFFXaHNaVzR0/L01pNXFjR2M',
        ]);

        $user4 = User::create([
            'name' => 'Kebdani',
            'email' => 'kebdani.tangier@example.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/wbkvTUQnkW48SZsjGDM7QM3rVku4buz4QdO_i3DG8-g/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vWTNfWThY/YzVLeWgzQ3RpbHJk/SE40bWpHSVBLWDVk/VlZwcGdndUpGRXdS/OC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NalF2/WlRBdk56RXZOVEl2/L2RHRnFhVzVsTFdR/dFlXZHUvWldGMUxt/cHdadw',
        ]);

        $user5 = User::create([
            'name' => 'Dar Harruch',
            'email' => 'darharruch.tangier@example.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/h7xzR_GGb6RmGmW5yoYJS3BAAPsk9G2NsJstrYm-PSM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vSjNyUHRu/Zm95WkpnZWt1cFc5/cHRwemRYdmhvRFFV/UXVkRlJvVno3aGI3/MC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTkz/ZDNjdS9kMmxzYkda/c2VXWnZjbVp2L2Iy/UXVibVYwTDNkd0xX/TnYvYm5SbGJuUXZk/WEJzYjJGay9jeTh5/TURJekx6QTJMM1Jo/L2JtZHBaWEl0Y21W/emRHRjEvY21GdWRI/TXRaR0Z5TFdoaC9j/bkoxWTJnNExtcHda/eTUzL1pXSnc',
        ]);

        // Tétouan
        $user6 = User::create([
            'name' => 'Restaurante El Reducto',
            'email' => 'elreducto.tetouan@gmail.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/cczoC3IYnnfO6ZclLaorghD9Wc0sPpHi001Z3GoEZLk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vbEE0dlRl/Mm11WGhtYU1heEU1/Z3pkVHMtTXlhQmNZ/ZlNPTXUyakI4aWY5/Yy9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NR0V2/TVRNdk1EQXZOamN2/L2NtbGhaQzFsYkMx/eVpXUjEvWTNSdkxt/cHdadw',
        ]);

        $user7 = User::create([
            'name' => 'Blanco Riad Restaurant',
            'email' => 'info@blancoriadrestaurant.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/2niW48hMp5geRoO2tBHL_OswmgzcBwbWHMbEtg6L4I8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vWFI2Uk9E/Uk1tZ1RmWWJuZzVG/RG9feHpUOXliZEs4/T2FZZzJSbmdCQVU5/WS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NRGd2/WWpRdk5EVXZZVFV2/L1lteGhibU52TFhK/cFlXUXQvY21WemRH/RjFjbUZ1ZEM1cS9j/R2M',
        ]);

        $user8 = User::create([
            'name' => 'Restaurant Omar',
            'email' => 'omar.tetouan@example.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/TAkBZ0TA044pwdY0l0ZmTh5wcQjQ5mKMGy0AP7uTR3c/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20velR4OThz/QU1qOG5sN3VyYUg4/UFl6U2hycjN6VERG/ZHZteldkSXZCVXZs/OC9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NVGd2/WkRJdllXSXZPVFl2/L2NHRjBhVzh0YVc1/MFpYSnAvYjNJdGVT/MXlaV05sY0dOcC9i/MjR1YW5Cbg',
        ]);

        // Chefchaouen
        $user9 = User::create([
            'name' => 'Café Clock',
            'email' => 'info@cafeclock.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/euOxonALCm9hUOL0Rin_gEb1oxL0F5kA2VeNxFchkAA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vY2lOdzNT/NmpGV3llZnZuMU5R/U0Y5SWhhM2xlWDd2/Qk5NT21vbWsycEQz/SS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzFqWkc0/dWRISnBjR0ZrL2Rt/bHpiM0l1WTI5dEwy/MWwvWkdsaEwzQm9i/M1J2TFc4di9NVGt2/TTJNdk5ESXZZemt2/L2NHaHZkRzh4YW5C/bkxtcHcvWnc',
        ]);

        $user10 = User::create([
            'name' => 'Restaurant Aladdin',
            'email' => 'aladdin.chefchaouen@example.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/gaskp3L6hekG5wR-U_uiSyBCqn8jeb-7HuUXZA8mXGc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vMWRBV1hh/cjlLOWo2MnpULS1Y/QWFYcEV4V1loS0Z5/c1FQcGpHcnNDd0Vn/Yy9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTkz/ZDNjdS9jbVYyYVdk/dmNtRjBaUzVqL2Iy/MHZhVzFoWjJWekww/Tm8vWlhvdFFXeGha/R1JwYmkxRC9aV1pq/YUdGdmRXVnVMbXB3/L1p3',
        ]);

        $user11 = User::create([
            'name' => 'Sofia Restaurant',
            'email' => 'sofia.chefchaouen@example.com',
            'password' => Hash::make('12345'),
            'role' => 'restaurant',
            'profile' => 'https://imgs.search.brave.com/GEZc2tyt39nCoxt13uYJDOygAssm3u7Wrpq6xCXQmLo/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWdz/LnNlYXJjaC5icmF2/ZS5jb20vVGxSZDBH/ZVlJYXV1X19yam5E/UEk4T2hManBIWkVt/ZHlIOWU4RDc0cjNP/SS9yczpmaXQ6NTAw/OjA6MDowL2c6Y2Uv/YUhSMGNITTZMeTl0/WldScC9ZUzVsZG1W/dVpHOHVZMjl0L0wy/eHZZMkYwYVc5dWN5/MXkvWlhOcGVtVmtM/MUpsYzNSaC9kWEpo/Ym5SSmJXRm5aWE12/L016WXdlREkyTXk4/d05qTmwvTjJOaE9T/MWhOR1U1TFRRNS9Z/amt0T1RkalpTMHhO/RGcxL016aGlPR1Uy/TnpN',
        ]);

        // Tangier 
        Restaurant::create([
            'name' => 'El Morocco Club',
            'email' => 'info@elmoroccoclub.ma',
            'phone_number' => '+212539948139',
            'adress' => '1 Rue Kashla, Kasbah, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.3',
            'position' => json_encode([35.7890288591531, -5.814541233278868]),
            'user_id' => $user1->user_id,
        ]);

        Restaurant::create([
            'name' => 'El Korsan',
            'email' => 'info@korsan.com',
            'phone_number' => '+212539333444',
            'adress' => '85 Rue de la Liberté, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.2',
            'position' => json_encode([35.78215572480191, -5.812094475607398]),
            'user_id' => $user2->user_id,
        ]);

        Restaurant::create([
            'name' => 'Ahlen',
            'email' => 'ahlen.tangier@example.com',
            'phone_number' => '+212661234567',
            'adress' => 'Unnamed Road, Medina, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.4',
            'position' => json_encode([35.785474472577405, -5.809842795999888]),
            'user_id' => $user3->user_id,
        ]);

        Restaurant::create([
            'name' => 'Kebdani',
            'email' => 'kebdani.tangier@example.com',
            'phone_number' => '+212539938745',
            'adress' => '35 Rue Hadj Mohamed Torres, Medina, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.3',
            'position' => json_encode([35.7879449815462, -5.809729935931306]),
            'user_id' => $user4->user_id,
        ]);

        Restaurant::create([
            'name' => 'Dar Harruch',
            'email' => 'darharruch.tangier@example.com',
            'phone_number' => '+212539935627',
            'adress' => '8 Rue de la Kasbah, Tangier 90000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.5',
            'position' => json_encode([35.78684553374611, -5.810418075607219]),
            'user_id' => $user5->user_id,
        ]);

        // Tétouan
        Restaurant::create([
            'name' => 'Restaurante El Reducto',
            'email' => 'elreducto.tetouan@gmail.com',
            'phone_number' => '+212539968120',
            'adress' => '38 Rue Zawiya Kadiria, Tétouan 93000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.4',
            'position' => json_encode([35.57306520764624, -5.370189483022967]),
            'user_id' => $user6->user_id,
        ]);

        Restaurant::create([
            'name' => 'Blanco Riad Restaurant',
            'email' => 'info@blancoriadrestaurant.com',
            'phone_number' => '+212539704114',
            'adress' => '25 Rue Zawiya Kadiria, Tétouan 93000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.3',
            'position' => json_encode([35.57078645532626, -5.3700387467821]),
            'user_id' => $user7->user_id,
        ]);

        Restaurant::create([
            'name' => 'Restaurant Omar',
            'email' => 'omar.tetouan@example.com',
            'phone_number' => '+212539966543',
            'adress' => 'Avenue Al Massira Al Khadra, Tétouan 93000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.2',
            'position' => json_encode([35.571251368639686, -5.377971919797419]),
            'user_id' => $user8->user_id,
        ]);

        // Chefchaouen
        Restaurant::create([
            'name' => 'Café Clock',
            'email' => 'info@cafeclock.com',
            'phone_number' => '+212539989797',
            'adress' => 'Derb El Magana, Chefchaouen 91000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.5',
            'position' => json_encode([35.16976746758482, -5.263051275637951]),
            'user_id' => $user9->user_id,
        ]);

        Restaurant::create([
            'name' => 'Restaurant Aladdin',
            'email' => 'aladdin.chefchaouen@example.com',
            'phone_number' => '+212539989071',
            'adress' => '17 Rue Targui, Chefchaouen 91000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.3',
            'position' => json_encode([35.169227511767254, -5.261826976955539]),
            'user_id' => $user10->user_id,
        ]);

        Restaurant::create([
            'name' => 'Sofia Restaurant',
            'email' => 'sofia.chefchaouen@example.com',
            'phone_number' => '+212539989234',
            'adress' => 'Rue El Kharrazine, Chefchaouen 91000, Morocco',
            'restaurant_rating' => '4',
            'rating' => '4.4',
            'position' => json_encode([35.16936214967713, -5.261208333309762]),
            'user_id' => $user11->user_id,
        ]);
    }
}