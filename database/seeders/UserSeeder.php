<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema; // Tambahkan ini

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. NONAKTIFKAN FOREIGN KEY CHECKS SEMENTARA
        Schema::disableForeignKeyConstraints();

        // Hapus data user lama untuk menghindari error duplikasi (SQLSTATE: 1062)
        DB::table('users')->truncate(); 

        // 1. Akun Admin (Kunci Akses Utama)
        User::create([
            'name' => 'Admin Labkom Utama',
            'email' => 'admin@labkom.id',
            'password' => Hash::make('Mutiara.js404'), // Password baru Anda
            'role' => 'admin_labkom',
            'nim_nip' => 'ADM001',
            'jurusan' => 'Manajemen Lab',
        ]);

        // 2. Akun Dosen (Untuk Verifikasi Peminjaman)
        User::create([
            'name' => 'Dr. Rina Verifikator',
            'email' => 'dosen@labkom.id',
            'password' => Hash::make('Mutiara.js404'), // Password: Mutiara.js404
            'role' => 'dosen',
            'nim_nip' => 'DSN1987',
            'jurusan' => 'Informatika',
        ]);

        // 3. Akun Mahasiswa (Untuk Pengajuan Peminjaman)
        User::create([
            'name' => 'Andi Mahasiswa',
            'email' => 'mahasiswa@labkom.id',
            'password' => Hash::make('Mutiara.js404'), // Password: Mutiara.js404
            'role' => 'mahasiswa',
            'nim_nip' => 'MHS2023001',
            'jurusan' => 'Sistem Informasi',
        ]);

        // 2. AKTIFKAN KEMBALI FOREIGN KEY CHECKS
        Schema::enableForeignKeyConstraints();
    }
}