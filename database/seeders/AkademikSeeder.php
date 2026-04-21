public function run(): void {
    $jurusan = \App\Models\Jurusan::create([
        'nama_jurusan' => 'Teknik Informatika',
        'akreditasi' => 'A'
    ]);

    \App\Models\Mahasiswa::create([
        'nim' => '23552011176',
        'nama' => 'Rosyad',
        'id_jurusan' => $jurusan->id_jurusan
    ]);

    \App\Models\Matakuliah::create([
        'nama_matakuliah' => 'Pemrograman Web 2',
        'sks' => 3,
        'id_jurusan' => $jurusan->id_jurusan
    ]);
}