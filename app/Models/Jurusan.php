<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    // Menentukan nama tabel karena kita menggunakan nama custom 'jurusans'
    protected $table = 'jurusans';

    // Menentukan primary key karena bukan 'id' melainkan 'id_jurusan' [cite: 40]
    protected $primaryKey = 'id_jurusan';

    // Kolom yang boleh diisi secara massal [cite: 41, 42]
    protected $fillable = ['nama_jurusan', 'akreditasi'];

    // Relasi: Satu Jurusan memiliki banyak Mahasiswa [cite: 69]
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'id_jurusan', 'id_jurusan');
    }

    // Relasi: Satu Jurusan memiliki banyak Matakuliah [cite: 70]
    public function matakuliahs()
    {
        return $this->hasMany(Matakuliah::class, 'id_jurusan', 'id_jurusan');
    }
}