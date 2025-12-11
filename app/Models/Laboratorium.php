<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laboratorium extends Model
{
    use HasFactory;
    protected $table = 'laboratorium'; // Agar eksplisit

    protected $fillable = [
        'nama_lab',
        'kapasitas',
        'fasilitas', // Ditambahkan sesuai ERD
        'kondisi',   // Ditambahkan sesuai ERD
    ];

    // Relasi ke Peminjaman
    public function peminjaman()
    {
        // Relasi menggunakan 'lab_id' sebagai Foreign Key (sesuai migrasi/ERD)
        return $this->hasMany(Peminjaman::class, 'lab_id');
    }
}