<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // ✅ Superadmin
        User::create([
            'name' => 'Super Admin',
            'email' => 'SA25@RabiesCore.com',
            'password' => Hash::make('gWSqcdgu4PdnQCd'),
            'role' => 'superadmin',
        ]);

        // ✅ 16 Admin berbeda
       $admins = [
                    'Puskesmas Sario',
                    'Puskesmas Tuminting',
                    'Puskesmas Bahu',
                    'Puskesmas Ranomuut',
                    'Puskesmas Tikala Baru',
                    'Puskesmas Wenang',
                    'Puskesmas Wawonasa',
                    'Puskesmas Singkil',
                    'Puskesmas Malalayang',
                    'Puskesmas Paal Dua',
                    'Puskesmas Mapanget',
                    'Puskesmas Bunaken',
                    'Puskesmas Bunaken Kepulauan',
                    'Puskesmas Teling',
                    'Puskesmas Paniki Bawah',
                    'Puskesmas Paniki Atas',
                    'RSUD Manado',
                    'RSUD SULUT',
                    'RSUP Kandou',
                    'RS Khusus Infeksi'
                ];

  foreach ($admins as $index => $name) {
            // buat angka random 4 digit
            $randomNumber = mt_rand(1000, 9999);

            // gabungkan menjadi password plain
            $passwordPlain = 'RaCore' . $randomNumber . str_replace(' ', '', $name);

            User::create([
                'name' => $name,
                'email' => 'admin' . ($index + 1) . '@RabiesCore.com',
                'password' => Hash::make($passwordPlain),
                'role' => 'admin',
            ]);

            echo "Admin: $name, Password asli: $passwordPlain\n"; // optional, untuk catatan
        }
    }
}