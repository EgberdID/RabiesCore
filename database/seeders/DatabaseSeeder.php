<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Panggil JobSeeder
        $this->call([
            JobsTableSeeder::class,
        ]);
        $this->call([
            DistrictsTableSeeder::class,
        ]);
        $this->call([
           SubDisTableSeeder::class,
        ]);
        $this->call([
           VillageTableSeeder::class,
        ]);
        $this->call([
           UserSeeder::class,
        ]);

        // Kalau masih mau pakai User seeder juga bisa
        // User::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
