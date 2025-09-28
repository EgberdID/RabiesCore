<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    public function run(): void
    {
         // ambil password dari .env atau generate random
        $plain = env('ADMIN_DEFAULT_PASS', Str::random(18));
        $hashed = Hash::make($plain);
        // ✅ Superadmin
       $sup = User::create([
            'name' => 'Super Admin',
            'email' => 'SA25@gmail.com',
            'password' => $hashed,
            'role' => 'superadmin',
        ]);
        // tampilkan password di console/log (sekali saja)
        $this->command->info("Super Admin created: {$sup->email}");
        $this->command->info("Super Admin password: {$plain}");

        // ✅ 16 Admin berbeda
       $admins = [
                    'Puskesmas Bahu',
                    'Puskesmas Minanga',
                    'Puskesmas Ranotana Weru',
                    'Puskesmas Sario',
                    'Puskesmas Teling Atas',
                    'Puskesmas Wenang',
                    'Puskesmas Ranomuut',
                    'Puskesmas Tikala Baru',
                    'Puskesmas Paniki Bawah',
                    'Puskesmas Bengkol',
                    'Puskesmas Kombos',
                    'Puskesmas Wawonasa',
                    'Puskesmas Tuminting',
                    'Puskesmas Bailang',
                    'Puskesmas Tongkaina',
                    'Puskesmas Bunaken',
                    //rsud
                    'RSUD Kota Manado',
                    'RSUD Prov SULUT',
                    'RSUP Kandou',
                    'RS Kita Waya'
                ];

  foreach ($admins as $index => $name) {
            // buat angka random 4 digit
            $randomNumber = mt_rand(1000, 9999);

            // gabungkan menjadi password plain
            $passwordPlain = 'RaCore' . $randomNumber . str_replace(' ', '', $name);
            $email = 'AdminRabiesCore' . ($index + 1) . '@gmail.com';

            User::create([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($passwordPlain),
                'role' => 'admin',
            ]);

            $this->command->line("Admin: {$email} | Password asli: $passwordPlain");
        }
    }
}