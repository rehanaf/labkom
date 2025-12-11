<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table = 'peminjaman';

    protected $fillable = [
        'user_id',
        'lab_id', // Menggunakan 'lab_id' sesuai ERD/migrasi terbaru
        'tanggal',
        'jam_mulai',
        'jam_selesai',
        'keperluan',
        'status',
        'keterangan_dosen',
    ];

    // Relasi ke User (Mahasiswa)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Laboratorium
    public function laboratorium()
    {
        // Relasi menggunakan 'lab_id' sebagai Foreign Key (sesuai migrasi/ERD)
        return $this->belongsTo(Laboratorium::class, 'lab_id');
    }
}