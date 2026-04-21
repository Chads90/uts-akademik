<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Matakuliah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Membuat User Admin untuk Login [cite: 74-76]
        User::factory()->create([
            'name' => 'Rosyad',
            'email' => 'artchads@gmail.com',
            'password' => Hash::make('12345678'), // Password untuk login nanti
        ]);

        // 2. Membuat Data Jurusan (Induk Tabel) [cite: 39-42, 50-53]
        $tif = Jurusan::create([
            'nama_jurusan' => 'Teknik Informatika',
            'akreditasi' => 'A'
        ]);

        $si = Jurusan::create([
            'nama_jurusan' => 'Sistem Informasi',
            'akreditasi' => 'B'
        ]);

        // 3. Membuat Data Mahasiswa (Relasi ke Jurusan) [cite: 24-28, 32-36, 72]
        Mahasiswa::create([
            'nim' => '23552011176',
            'nama' => 'Rosyad',
            'id_jurusan' => $tif->id_jurusan
        ]);

        Mahasiswa::create([
            'nim' => '23552011216',
            'nama' => 'Reza Apriandi',
            'id_jurusan' => $si->id_jurusan
        ]);

        // 4. Membuat Data Matakuliah (Relasi ke Jurusan) [cite: 45-47, 54-56, 73]
        Matakuliah::create([
            'nama_matakuliah' => 'Pemrograman Web 2',
            'sks' => 3,
            'id_jurusan' => $tif->id_jurusan
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Basis Data Dasar',
            'sks' => 2,
            'id_jurusan' => $tif->id_jurusan
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Manajemen Proyek IT',
            'sks' => 3,
            'id_jurusan' => $si->id_jurusan
        ]);
    }
}