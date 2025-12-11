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
        // Panggil seeder-seeder yang sudah kita buat.
        // Pastikan nama kelas sesuai dengan file di direktori ini.
        $this->call([
            UserSeeder::class,
            LaboratoriumSeeder::class,
            // PeminjamanSeeder::class, // Opsional: jika ingin data dummy peminjaman
        ]);
    }
}