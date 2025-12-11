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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 255);

            // Kolom Tambahan dari ERD:
            $table->string('nim_nip', 50)->nullable()->unique(); // NIM/NIP, boleh kosong
            $table->string('jurusan', 100)->nullable();

            // Kolom Role (users_role_enum E)
            $table->enum('role', ['mahasiswa', 'dosen', 'admin_labkom'])->default('mahasiswa');

            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};