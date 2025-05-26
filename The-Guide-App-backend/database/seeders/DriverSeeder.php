<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Driver;
use Illuminate\Support\Facades\Hash;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userTab = [];
        $userTab[] = User::create([
            'name' => 'Khalid Bouziane',
            'email' => 'khalid.bouziane@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://plus.unsplash.com/premium_photo-1678197937465-bdbc4ed95815?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8cGVyc29ufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Noura El Amine',
            'email' => 'noura.elamine@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVyc29ufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Yassine Cherkaoui',
            'email' => 'yassine.cherkaoui@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1599566150163-29194dcaad36?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cGVyc29ufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Samira Lahlou',
            'email' => 'samira.lahlou@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://plus.unsplash.com/premium_photo-1690407617542-2f210cf20d7e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8cGVyc29ufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Rachid Zniber',
            'email' => 'rachid.zniber@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8N3x8cGVyc29ufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Hanan Mounir',
            'email' => 'hanan.mounir@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cGVyc29ufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Abdelhak Saidi',
            'email' => 'abdelhak.saidi@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1552058544-f2b08422138a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Loubna Essaghir',
            'email' => 'loubna.essaghir@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1521566652839-697aa473761a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cGVyc29ufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Mounir El Kadi',
            'email' => 'mounir.elkadi@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://plus.unsplash.com/premium_photo-1664536392896-cd1743f9c02c?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8cGVyc29ufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Zahra Bennis',
            'email' => 'zahra.bennis@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1445053023192-8d45cb66099d?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8cGVyc29ufGVufDB8fDB8fHww',
        ]);

        $userTab[] = User::create([
            'name' => 'Ilyas Toumi',
            'email' => 'ilyas.toumi@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://plus.unsplash.com/premium_photo-1671656349322-41de944d259b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Fatima-Zohra Kettani',
            'email' => 'fatima.kettani@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Adil Chraibi',
            'email' => 'adil.chraibi@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTJ8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Sofia Benali',
            'email' => 'sofia.benali@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTZ8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Brahim Rahmouni',
            'email' => 'brahim.rahmouni@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://plus.unsplash.com/premium_photo-1689539137236-b68e436248de?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTd8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Amina Chaoui',
            'email' => 'amina.chaoui@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTh8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Reda El Yazidi',
            'email' => 'reda.elyazidi@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://plus.unsplash.com/premium_photo-1675130119373-61ada6685d63?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjF8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Kenza Bouzidi',
            'email' => 'kenza.bouzidi@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1526413232644-8a40f03cc03b?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjN8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Hamid El Ouardi',
            'email' => 'hamid.elouardi@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://images.unsplash.com/photo-1521119989659-a83eee488004?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjZ8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        $userTab[] = User::create([
            'name' => 'Rania Benjelloun',
            'email' => 'rania.benjelloun@example.com',
            'password' => Hash::make('password'),
            'role' => 'transporter',
            'profile' => 'https://plus.unsplash.com/premium_photo-1664541336692-e931d407ba88?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjV8fHBlcnNvbnxlbnwwfHwwfHx8MA%3D%3D',
        ]);

        Driver::create([
            'carte_nationale' => 'D123456',
            'driver_license' => 'DL123456',
            'full_name' => 'Khalid Bouziane',
            'email' => 'khalid.bouziane@example.com',
            'phone_number' => '+212612345678',
            'rating' => '4.5',
            'user_id' => $userTab[0]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D123457',
            'driver_license' => 'DL123457',
            'full_name' => 'Noura El Amine',
            'email' => 'noura.elamine@example.com',
            'phone_number' => '+212612345679',
            'rating' => '4.7',
            'user_id' => $userTab[1]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D123458',
            'driver_license' => 'DL123458',
            'full_name' => 'Yassine Cherkaoui',
            'email' => 'yassine.cherkaoui@example.com',
            'phone_number' => '+212612345680',
            'rating' => '4.6',
            'user_id' => $userTab[2]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D123459',
            'driver_license' => 'DL123459',
            'full_name' => 'Samira Lahlou',
            'email' => 'samira.lahlou@example.com',
            'phone_number' => '+212612345681',
            'rating' => '4.8',
            'user_id' => $userTab[3]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D123460',
            'driver_license' => 'DL123460',
            'full_name' => 'Rachid Zniber',
            'email' => 'rachid.zniber@example.com',
            'phone_number' => '+212612345682',
            'rating' => '4.4',
            'user_id' => $userTab[4]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D123461',
            'driver_license' => 'DL123461',
            'full_name' => 'Hanan Mounir',
            'email' => 'hanan.mounir@example.com',
            'phone_number' => '+212612345683',
            'rating' => '4.9',
            'user_id' => $userTab[5]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D123462',
            'driver_license' => 'DL123462',
            'full_name' => 'Abdelhak Saidi',
            'email' => 'abdelhak.saidi@example.com',
            'phone_number' => '+212612345684',
            'rating' => '4.5',
            'user_id' => $userTab[6]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D123463',
            'driver_license' => 'DL123463',
            'full_name' => 'Loubna Essaghir',
            'email' => 'loubna.essaghir@example.com',
            'phone_number' => '+212612345685',
            'rating' => '4.7',
            'user_id' => $userTab[7]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D654321',
            'driver_license' => 'DL654321',
            'full_name' => 'Mounir El Kadi',
            'email' => 'mounir.elkadi@example.com',
            'phone_number' => '+212623456789',
            'rating' => '4.6',
            'user_id' => $userTab[8]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D654322',
            'driver_license' => 'DL654322',
            'full_name' => 'Zahra Bennis',
            'email' => 'zahra.bennis@example.com',
            'phone_number' => '+212623456790',
            'rating' => '4.8',
            'user_id' => $userTab[9]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D654323',
            'driver_license' => 'DL654323',
            'full_name' => 'Ilyas Toumi',
            'email' => 'ilyas.toumi@example.com',
            'phone_number' => '+212623456791',
            'rating' => '4.5',
            'user_id' => $userTab[10]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D654324',
            'driver_license' => 'DL654324',
            'full_name' => 'Fatima-Zohra Kettani',
            'email' => 'fatima.kettani@example.com',
            'phone_number' => '+212623456792',
            'rating' => '4.7',
            'user_id' => $userTab[11]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D654325',
            'driver_license' => 'DL654325',
            'full_name' => 'Adil Chraibi',
            'email' => 'adil.chraibi@example.com',
            'phone_number' => '+212623456793',
            'rating' => '4.4',
            'user_id' => $userTab[12]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D654326',
            'driver_license' => 'DL654326',
            'full_name' => 'Sofia Benali',
            'email' => 'sofia.benali@example.com',
            'phone_number' => '+212623456794',
            'rating' => '4.9',
            'user_id' => $userTab[13]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D987654',
            'driver_license' => 'DL987654',
            'full_name' => 'Brahim Rahmouni',
            'email' => 'brahim.rahmouni@example.com',
            'phone_number' => '+212634567890',
            'rating' => '4.6',
            'user_id' => $userTab[14]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D987655',
            'driver_license' => 'DL987655',
            'full_name' => 'Amina Chaoui',
            'email' => 'amina.chaoui@example.com',
            'phone_number' => '+212634567891',
            'rating' => '4.8',
            'user_id' => $userTab[15]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D987656',
            'driver_license' => 'DL987656',
            'full_name' => 'Reda El Yazidi',
            'email' => 'reda.elyazidi@example.com',
            'phone_number' => '+212634567892',
            'rating' => '4.5',
            'user_id' => $userTab[16]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D987657',
            'driver_license' => 'DL987657',
            'full_name' => 'Kenza Bouzidi',
            'email' => 'kenza.bouzidi@example.com',
            'phone_number' => '+212634567893',
            'rating' => '4.7',
            'user_id' => $userTab[17]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D987658',
            'driver_license' => 'DL987658',
            'full_name' => 'Hamid El Ouardi',
            'email' => 'hamid.elouardi@example.com',
            'phone_number' => '+212634567894',
            'rating' => '4.4',
            'user_id' => $userTab[18]->user_id,
        ]);

        Driver::create([
            'carte_nationale' => 'D987659',
            'driver_license' => 'DL987659',
            'full_name' => 'Rania Benjelloun',
            'email' => 'rania.benjelloun@example.com',
            'phone_number' => '+212634567895',
            'rating' => '4.9',
            'user_id' => $userTab[19]->user_id,
        ]);
    }
}