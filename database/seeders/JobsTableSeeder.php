<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobsTableSeeder extends Seeder
{
    /**
     * Jalankan seeder.
     */
    public function run(): void
    {
        // Hapus data lama supaya tidak dobel
        DB::table('jobs_list')->truncate();

        // Insert data pekerjaan umum
        DB::table('jobs_list')->insert([
            ['jb' => 'Petani'],
            ['jb' => 'Nelayan'],
            ['jb' => 'Guru'],
            ['jb' => 'Dosen'],
            ['jb' => 'Dokter'],
            ['jb' => 'Perawat'],
            ['jb' => 'Bidan'],
            ['jb' => 'Pegawai Negeri'],
            ['jb' => 'TNI'],
            ['jb' => 'Polri'],
            ['jb' => 'Karyawan Swasta'],
            ['jb' => 'Pegawai BUMN'],
            ['jb' => 'Wiraswasta'],
            ['jb' => 'Pedagang'],
            ['jb' => 'Sopir'],
            ['jb' => 'Ojek Online'],
            ['jb' => 'Buruh'],
            ['jb' => 'Kuli Bangunan'],
            ['jb' => 'Tukang Kayu'],
            ['jb' => 'Tukang Batu'],
            ['jb' => 'Tukang Listrik'],
            ['jb' => 'Mekanik'],
            ['jb' => 'Security'],
            ['jb' => 'Satpam'],
            ['jb' => 'Pembantu Rumah Tangga'],
            ['jb' => 'Ibu Rumah Tangga'],
            ['jb' => 'Mahasiswa'],
            ['jb' => 'Pelajar'],
            ['jb' => 'Seniman'],
            ['jb' => 'Musisi'],
            ['jb' => 'Pelaut'],
            ['jb' => 'Peternak'],
            ['jb' => 'Pengemudi Bentor'], 
            ['jb' => 'Pengemudi Mikrolet'], 
            ['jb' => 'Pendeta'],
            ['jb' => 'Pastor'],
            ['jb' => 'Pengacara'],
            ['jb' => 'Notaris'],
            ['jb' => 'Wartawan'],
            ['jb' => 'Arsitek'],
            ['jb' => 'Desainer'],
            ['jb' => 'IT Programmer'],
            ['jb' => 'Freelancer'],
            ['jb' => 'Pekerjaan Lainnya'],
            ['jb' => 'Tidak Bekerja'],
        ]);
    }
}
