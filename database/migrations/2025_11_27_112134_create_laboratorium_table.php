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
        Schema::create('laboratorium', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lab', 100)->unique();
            $table->integer('kapasitas');

            // Kolom Tambahan sesuai ERD:
            $table->text('fasilitas')->nullable();
            // Enum untuk kondisi lab, sesuai "laboratorium_kondisi_enum E" di ERD
            $table->enum('kondisi', ['baik', 'perbaikan', 'rusak'])->default('baik');

            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laboratorium');
    }
};