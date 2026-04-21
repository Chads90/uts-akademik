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
        Schema::create('jurusans', function (Blueprint $table) {
            $table->id('id_jurusan'); // Membuat Primary Key dengan nama id_jurusan [cite: 40, 51]
            $table->string('nama_jurusan'); // Kolom untuk nama jurusan [cite: 41, 51]
            $table->string('akreditasi'); // Kolom untuk akreditasi (A/B/C) [cite: 42, 52]
            $table->timestamps(); // Otomatis membuat created_at dan updated_at [cite: 43, 44]
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurusans');
    }
};
