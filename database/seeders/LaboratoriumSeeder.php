<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laboratorium; // <-- Wajib ada

class LaboratoriumSeeder extends Seeder
{
    public function run(): void
    {
        Laboratorium::create([
            'nama_lab' => 'Lab Pemrograman Dasar',
            'kapasitas' => 40,
            'fasilitas' => 'PC i7 Generasi Terbaru, OS Multi-Boot (Linux/Win), Proyektor HD',
            'kondisi' => 'baik',
        ]);

        Laboratorium::create([
            'nama_lab' => 'Lab Jaringan & Keamanan',
            'kapasitas' => 25,
            'fasilitas' => 'Router & Switch Cisco, Kabel Jaringan Lengkap, Server Simulasi',
            'kondisi' => 'baik',
        ]);

        Laboratorium::create([
            'nama_lab' => 'Lab Multimedia & Grafis',
            'kapasitas' => 30,
            'fasilitas' => 'PC Workstation High-Spec, Software Editing Lengkap, Monitor Kalibrasi Warna',
            'kondisi' => 'baik',
        ]);

        Laboratorium::create([
            'nama_lab' => 'Lab Data Science',
            'kapasitas' => 20,
            'fasilitas' => 'GPU Accelerated Computing, Akses Cluster Server, Software Analisis Lanjutan',
            'kondisi' => 'baik',
        ]);
    }
}
