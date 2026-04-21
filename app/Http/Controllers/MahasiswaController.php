<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Tampilkan mahasiswa + relasi jurusan + Search & Pagination
    public function index(Request $request)
    {
        $search = $request->query('search');

        $mahasiswas = Mahasiswa::with('jurusan') // Memanggil relasi Jurusan
            ->when($search, function($query, $search) {
                return $query->where('nama', 'like', "%{$search}%")
                             ->orWhere('nim', 'like', "%{$search}%");
            })
            ->paginate(5); // Membatasi 5 data per halaman

        return view('mahasiswa.index', compact('mahasiswas'));
    }

    public function create()
    {
        $jurusans = Jurusan::all(); // Mengambil data jurusan untuk dropdown
        return view('mahasiswa.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        // Validasi Form 
        $request->validate([
            'nim' => 'required|unique:mahasiswas,nim',
            'nama' => 'required',
            'id_jurusan' => 'required',
        ]);

        Mahasiswa::create($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambah!');
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $jurusans = Jurusan::all();
        return view('mahasiswa.edit', compact('mahasiswa', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());
        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa diperbarui!');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus!');
    }
}