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
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id('id_mahasiswa'); // Primary Key id_mahasiswa [cite: 33]
            $table->string('nim')->unique(); // NIM harus unik [cite: 34]
            $table->string('nama'); // Nama mahasiswa [cite: 35]
            // Menghubungkan ke id_jurusan di tabel jurusans [cite: 36, 63]
            $table->foreignId('id_jurusan')->constrained('jurusans', 'id_jurusan')->onDelete('cascade');
            $table->timestamps(); // [cite: 37, 38]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};
