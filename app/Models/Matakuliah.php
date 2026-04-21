<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    protected $table = 'matakuliahs';
    protected $primaryKey = 'id_matakuliah'; //

    // Kolom yang wajib diisi sesuai soal + Tambahan kode_mk
    protected $fillable = [
        'kode_mk', 
        'nama_matakuliah', 
        'sks', 
        'id_jurusan'
    ];

    // Relasi: Matakuliah dimiliki oleh satu Jurusan
    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'id_jurusan', 'id_jurusan');
    }
}