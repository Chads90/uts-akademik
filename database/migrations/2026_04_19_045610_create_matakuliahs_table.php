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
        Schema::create('matakuliahs', function (Blueprint $table) {
            $table->id('id_matakuliah'); // Primary Key id_matakuliah [cite: 46, 55]
            $table->string('nama_matakuliah'); // Nama mata kuliah [cite: 47, 55]
            $table->integer('sks'); // Jumlah SKS [cite: 55, 62]
            // Menghubungkan matakuliah ke jurusan tertentu [cite: 56, 63, 73]
            $table->foreignId('id_jurusan')->constrained('jurusans', 'id_jurusan')->onDelete('cascade');
            $table->timestamps(); // [cite: 57, 64, 65]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliahs');
    }
};
