<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            
            // Foreign Keys: user_id (peminjam) dan lab_id (lab yang dipinjam)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('lab_id')->constrained('laboratorium')->onDelete('cascade'); // Menggunakan 'lab_id' sesuai ERD

            // Waktu Peminjaman (dipisah sesuai ERD)
            $table->date('tanggal');
            $table->time('jam_mulai');
            $table->time('jam_selesai');

            $table->text('keperluan');

            // Status Peminjaman (peminjaman_status_enum E)
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('keterangan_dosen')->nullable(); // Kolom untuk feedback/alasan dari dosen

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};