<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Disable foreign key checks supaya truncate tidak error
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('district')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $districts = [
                        ['city_id' => 1, 'district_id' => '71.71.01', 'name' => 'Bunaken'],
                        ['city_id' => 1, 'district_id' => '71.71.02', 'name' => 'Tuminting'],
                        ['city_id' => 1, 'district_id' => '71.71.03', 'name' => 'Singkil'],
                        ['city_id' => 1, 'district_id' => '71.71.04', 'name' => 'Wenang'],
                        ['city_id' => 1, 'district_id' => '71.71.05', 'name' => 'Tikala'],
                        ['city_id' => 1, 'district_id' => '71.71.06', 'name' => 'Sario'],
                        ['city_id' => 1, 'district_id' => '71.71.07', 'name' => 'Wanea'],
                        ['city_id' => 1, 'district_id' => '71.71.08', 'name' => 'Mapanget'],
                        ['city_id' => 1, 'district_id' => '71.71.09', 'name' => 'Malalayang'],
                        ['city_id' => 1, 'district_id' => '71.71.10', 'name' => 'Bunaken Kepulauan'],
                        ['city_id' => 1, 'district_id' => '71.71.11', 'name' => 'Paal Dua'],
                    ];


        foreach ($districts as $district) {
            DB::table('district')->insert([
                'city_id' => $district['city_id'],
                'district_id' => $district['district_id'],
                'name' => $district['name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
