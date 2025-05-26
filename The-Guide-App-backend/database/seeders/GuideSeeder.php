<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Guide;
use Illuminate\Support\Facades\Hash;

class GuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTab = [];
        $userTab[] = User::create([
            'name' => 'Mohammed Amrani',
            'email' => 'mohammed.amrani@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://plus.unsplash.com/premium_photo-1689977927774-401b12d137d6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjl8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Fatima Zahra',
            'email' => 'fatima.zahra@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzF8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Youssef Bennani',
            'email' => 'youssef.bennani@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjd8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Amina El Idrissi',
            'email' => 'amina.elidrissi@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1589571894960-20bbe2828d0a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzJ8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Hassan Tazi',
            'email' => 'hassan.tazi@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1529665730773-4f3fda31a5f9?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzR8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Khadija Roudani',
            'email' => 'khadija.roudani@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://plus.unsplash.com/premium_photo-1690407617686-d449aa2aad3c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzd8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Omar Laaroussi',
            'email' => 'omar.laaroussi@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://plus.unsplash.com/premium_photo-1689977807477-a579eda91fa2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDF8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Nadia Chafik',
            'email' => 'nadia.chafik@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzh8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Rachid Mernissi',
            'email' => 'rachid.mernissi@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzV8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Laila Benkirane',
            'email' => 'laila.benkirane@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1525134479668-1bee5c7c6845?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDJ8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Karim Fassi',
            'email' => 'karim.fassi@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1540569014015-19a7be504e3a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mzl8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Zineb Ouazzani',
            'email' => 'zineb.ouazzani@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1529626455594-4ff0802cfb7e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDR8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Said Belhaj',
            'email' => 'said.belhaj@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1539571696357-5a69c17a67c6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDh8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Meryem Kabbaj',
            'email' => 'meryem.kabbaj@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://plus.unsplash.com/premium_photo-1689551670902-19b441a6afde?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDV8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Ibrahim Choukri',
            'email' => 'ibrahim.choukri@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1633332755192-727a05c4013d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTB8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Sanaa El Amrani',
            'email' => 'sanaa.elamrani@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1525875975471-999f65706a10?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDd8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Abdelilah Riffi',
            'email' => 'abdelilah.riffi@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1628499636754-3162d34ca39c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTV8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Hafsa Bennouna',
            'email' => 'hafsa.bennouna@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1542596768-5d1d21f1cf98?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjB8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Mustafa Zeroual',
            'email' => 'mustafa.zeroual@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://plus.unsplash.com/premium_photo-1674777843203-da3ebb9fbca0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDl8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Aicha El Haddad',
            'email' => 'aicha.elhaddad@example.com',
            'password' => Hash::make('password'),
            'role' => 'guide',
            'profile' => 'https://images.unsplash.com/photo-1531123414780-f74242c2b052?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTh8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        Guide::create([
            'carte_nationale' => 'D123456',
            'license_guide' => 'DL123456',
            'full_name' => 'Mohammed Amrani',
            'email' => 'mohammed.amrani@example.com',
            'phone_number' => '+212612345678',
            'rating' => '4.5',
            'user_id' => $userTab[0]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D123457',
            'license_guide' => 'DL123457',
            'full_name' => 'Fatima Zahra',
            'email' => 'fatima.zahra@example.com',
            'phone_number' => '+212612345679',
            'rating' => '4.7',
            'user_id' => $userTab[1]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D123458',
            'license_guide' => 'DL123458',
            'full_name' => 'Youssef Bennani',
            'email' => 'youssef.bennani@example.com',
            'phone_number' => '+212612345680',
            'rating' => '4.6',
            'user_id' => $userTab[2]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D123459',
            'license_guide' => 'DL123459',
            'full_name' => 'Amina El Idrissi',
            'email' => 'amina.elidrissi@example.com',
            'phone_number' => '+212612345681',
            'rating' => '4.8',
            'user_id' => $userTab[3]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D123460',
            'license_guide' => 'DL123460',
            'full_name' => 'Hassan Tazi',
            'email' => 'hassan.tazi@example.com',
            'phone_number' => '+212612345682',
            'rating' => '4.4',
            'user_id' => $userTab[4]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D123461',
            'license_guide' => 'DL123461',
            'full_name' => 'Khadija Roudani',
            'email' => 'khadija.roudani@example.com',
            'phone_number' => '+212612345683',
            'rating' => '4.9',
            'user_id' => $userTab[5]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D123462',
            'license_guide' => 'DL123462',
            'full_name' => 'Omar Laaroussi',
            'email' => 'omar.laaroussi@example.com',
            'phone_number' => '+212612345684',
            'rating' => '4.5',
            'user_id' => $userTab[6]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D123463',
            'license_guide' => 'DL123463',
            'full_name' => 'Nadia Chafik',
            'email' => 'nadia.chafik@example.com',
            'phone_number' => '+212612345685',
            'rating' => '4.7',
            'user_id' => $userTab[7]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D654321',
            'license_guide' => 'DL654321',
            'full_name' => 'Rachid Mernissi',
            'email' => 'rachid.mernissi@example.com',
            'phone_number' => '+212623456789',
            'rating' => '4.6',
            'user_id' => $userTab[8]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D654322',
            'license_guide' => 'DL654322',
            'full_name' => 'Laila Benkirane',
            'email' => 'laila.benkirane@example.com',
            'phone_number' => '+212623456790',
            'rating' => '4.8',
            'user_id' => $userTab[9]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D654323',
            'license_guide' => 'DL654323',
            'full_name' => 'Karim Fassi',
            'email' => 'karim.fassi@example.com',
            'phone_number' => '+212623456791',
            'rating' => '4.5',
            'user_id' => $userTab[10]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D654324',
            'license_guide' => 'DL654324',
            'full_name' => 'Zineb Ouazzani',
            'email' => 'zineb.ouazzani@example.com',
            'phone_number' => '+212623456792',
            'rating' => '4.7',
            'user_id' => $userTab[11]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D654325',
            'license_guide' => 'DL654325',
            'full_name' => 'Said Belhaj',
            'email' => 'said.belhaj@example.com',
            'phone_number' => '+212623456793',
            'rating' => '4.4',
            'user_id' => $userTab[12]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D654326',
            'license_guide' => 'DL654326',
            'full_name' => 'Meryem Kabbaj',
            'email' => 'meryem.kabbaj@example.com',
            'phone_number' => '+212623456794',
            'rating' => '4.9',
            'user_id' => $userTab[13]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D987654',
            'license_guide' => 'DL987654',
            'full_name' => 'Ibrahim Choukri',
            'email' => 'ibrahim.choukri@example.com',
            'phone_number' => '+212634567890',
            'rating' => '4.6',
            'user_id' => $userTab[14]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D987655',
            'license_guide' => 'DL987655',
            'full_name' => 'Sanaa El Amrani',
            'email' => 'sanaa.elamrani@example.com',
            'phone_number' => '+212634567891',
            'rating' => '4.8',
            'user_id' => $userTab[15]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D987656',
            'license_guide' => 'DL987656',
            'full_name' => 'Abdelilah Riffi',
            'email' => 'abdelilah.riffi@example.com',
            'phone_number' => '+212634567892',
            'rating' => '4.5',
            'user_id' => $userTab[16]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D987657',
            'license_guide' => 'DL987657',
            'full_name' => 'Hafsa Bennouna',
            'email' => 'hafsa.bennouna@example.com',
            'phone_number' => '+212634567893',
            'rating' => '4.7',
            'user_id' => $userTab[17]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D987658',
            'license_guide' => 'DL987658',
            'full_name' => 'Mustafa Zeroual',
            'email' => 'mustafa.zeroual@example.com',
            'phone_number' => '+212634567894',
            'rating' => '4.4',
            'user_id' => $userTab[18]->user_id,
        ]);

        Guide::create([
            'carte_nationale' => 'D987659',
            'license_guide' => 'DL987659',
            'full_name' => 'Aicha El Haddad',
            'email' => 'aicha.elhaddad@example.com',
            'phone_number' => '+212634567895',
            'rating' => '4.9',
            'user_id' => $userTab[19]->user_id,
        ]);
    }
}