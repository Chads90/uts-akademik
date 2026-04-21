<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $primaryKey = 'id_mahasiswa'; // [cite: 33]

    // Kolom yang wajib diisi sesuai soal [cite: 34, 35, 36]
    protected $fillable = ['nim', 'nama', 'id_jurusan'];

    // Relasi: Mahasiswa dimiliki oleh satu Jurusan [cite: 72]
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
}