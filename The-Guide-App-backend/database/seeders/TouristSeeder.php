<?php

namespace Database\Seeders;

use App\Models\Tourist;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class TouristSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTab = [];
        $userTab[] = User::create([
            'name' => 'John Smith',
            'email' => 'john.smith@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8bWFufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Maria Garcia',
            'email' => 'maria.garcia@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://plus.unsplash.com/premium_photo-1683121771856-3c3964975777?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cG9ydHJhaXR8ZW58MHx8MHx8fDA%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Hiroshi Tanaka',
            'email' => 'hiroshi.tanaka@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1542909168-82c3e7fdca5c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mjh8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Sophie Dubois',
            'email' => 'sophie.dubois@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1526510747491-58f928ec870f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Ahmed Khan',
            'email' => 'ahmed.khan@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1500832333538-837287aad2b6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjR8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Elena Rossi',
            'email' => 'elena.rossi@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1568038479111-87bf80659645?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjZ8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Liam O’Connor',
            'email' => 'liam.oconnor@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://plus.unsplash.com/premium_photo-1722859288966-b00ef70df64b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NDV8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Chen Wei',
            'email' => 'chen.wei@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1540569014015-19a7be504e3a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTA3fHxwb3J0cmFpdHxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        // Tétouan Tourists
        $userTab[] = User::create([
            'name' => 'Emma Müller',
            'email' => 'emma.muller@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1521146764736-56c929d59c83?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTB8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Carlos Lopez',
            'email' => 'carlos.lopez@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1596075780750-81249df16d19?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTl8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Aisha Patel',
            'email' => 'aisha.patel@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1536766768598-e09213fdcf22?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjZ8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Lucas Silva',
            'email' => 'lucas.silva@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://plus.unsplash.com/premium_photo-1707932495000-5748b915e4f2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NjV8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Freya Jensen',
            'email' => 'freya.jensen@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1609505848912-b7c3b8b4beda?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Njh8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Omar Farooq',
            'email' => 'omar.farooq@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1535643302794-19c3804b874b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nzl8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        // Chefchaouen Tourists
        $userTab[] = User::create([
            'name' => 'Isabella Moretti',
            'email' => 'isabella.moretti@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1492106087820-71f1a00d2b11?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NzR8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'James Carter',
            'email' => 'james.carter@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1529111290557-82f6d5c6cf85?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODJ8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Mei Ling Wong',
            'email' => 'mei.wong@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1504834636679-cd3acd047c06?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTJ8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Hugo Martinez',
            'email' => 'hugo.martinez@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1516914943479-89db7d9ae7f2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODZ8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Anya Petrova',
            'email' => 'anya.petrova@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://images.unsplash.com/photo-1524504388940-b1c1722653e1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODd8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Sami Al-Nasser',
            'email' => 'sami.alnasser@example.com',
            'password' => Hash::make('password'),
            'role' => 'tourist',
            'profile' => 'https://plus.unsplash.com/premium_photo-1682096249692-4ac8fc1c1823?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8ODl8fHBvcnRyYWl0fGVufDB8fDB8fHww',
        ]);

        // Tangier Tourists
        Tourist::create([
            'full_name' => 'John Smith',
            'email' => 'john.smith@example.com',
            'phone_number' => '+12025550123',
            'user_id' => $userTab[0]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Maria Garcia',
            'email' => 'maria.garcia@example.com',
            'phone_number' => '+34612345678',
            'user_id' => $userTab[1]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Hiroshi Tanaka',
            'email' => 'hiroshi.tanaka@example.com',
            'phone_number' => '+81312345678',
            'user_id' => $userTab[2]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Sophie Dubois',
            'email' => 'sophie.dubois@example.com',
            'phone_number' => '+33123456789',
            'user_id' => $userTab[3]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Ahmed Khan',
            'email' => 'ahmed.khan@example.com',
            'phone_number' => '+923001234567',
            'user_id' => $userTab[4]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Elena Rossi',
            'email' => 'elena.rossi@example.com',
            'phone_number' => '+390612345678',
            'user_id' => $userTab[5]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Liam O’Connor',
            'email' => 'liam.oconnor@example.com',
            'phone_number' => '+447911123456',
            'user_id' => $userTab[6]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Chen Wei',
            'email' => 'chen.wei@example.com',
            'phone_number' => '+8613812345678',
            'user_id' => $userTab[7]->user_id,
        ]);

        // Tétouan Tourists
        Tourist::create([
            'full_name' => 'Emma Müller',
            'email' => 'emma.muller@example.com',
            'phone_number' => '+4917612345678',
            'user_id' => $userTab[8]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Carlos Lopez',
            'email' => 'carlos.lopez@example.com',
            'phone_number' => '+34912345678',
            'user_id' => $userTab[9]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Aisha Patel',
            'email' => 'aisha.patel@example.com',
            'phone_number' => '+919876543210',
            'user_id' => $userTab[10]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Lucas Silva',
            'email' => 'lucas.silva@example.com',
            'phone_number' => '+5511987654321',
            'user_id' => $userTab[11]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Freya Jensen',
            'email' => 'freya.jensen@example.com',
            'phone_number' => '+45212345678',
            'user_id' => $userTab[12]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Omar Farooq',
            'email' => 'omar.farooq@example.com',
            'phone_number' => '+971501234567',
            'user_id' => $userTab[13]->user_id,
        ]);

        // Chefchaouen Tourists
        Tourist::create([
            'full_name' => 'Isabella Moretti',
            'email' => 'isabella.moretti@example.com',
            'phone_number' => '+390612345679',
            'user_id' => $userTab[14]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'James Carter',
            'email' => 'james.carter@example.com',
            'phone_number' => '+12025550124',
            'user_id' => $userTab[15]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Mei Ling Wong',
            'email' => 'mei.wong@example.com',
            'phone_number' => '+85291234567',
            'user_id' => $userTab[16]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Hugo Martinez',
            'email' => 'hugo.martinez@example.com',
            'phone_number' => '+34612345679',
            'user_id' => $userTab[17]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Anya Petrova',
            'email' => 'anya.petrova@example.com',
            'phone_number' => '+74951234567',
            'user_id' => $userTab[18]->user_id,
        ]);

        Tourist::create([
            'full_name' => 'Sami Al-Nasser',
            'email' => 'sami.alnasser@example.com',
            'phone_number' => '+966501234567',
            'user_id' => $userTab[19]->user_id,
        ]);

    }
}
