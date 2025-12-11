<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Laboratorium; // <-- Wajib ada

class LaboratoriumSeeder extends Seeder
{
    public function run(): void
    {
        Laboratorium::create([
            'nama_lab' => 'Lab Komputer 1',
            'kapasitas' => 30,
            'fasilitas' => 'PC terbaru, AC, Proyektor',
            'kondisi' => 'baik',
        ]);

        Laboratorium::create([
            'nama_lab' => 'Lab Jaringan',
            'kapasitas' => 20,
            'fasilitas' => 'Router Cisco, Switch, Kabel LAN',
            'kondisi' => 'baik',
        ]);
    }
}