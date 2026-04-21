<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('matakuliahs', function (Blueprint $table) {
            // Menambahkan kolom kode_mk setelah id_matakuliah
            $table->string('kode_mk')->nullable()->after('id_matakuliah');
        });
    }

    public function down(): void
    {
        Schema::table('matakuliahs', function (Blueprint $table) {
            $table->dropColumn('kode_mk');
        });
    }
};