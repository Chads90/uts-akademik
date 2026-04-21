<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    // Tampilkan matakuliah + relasi jurusan + Search
    public function index(Request $request)
    {
        $search = $request->query('search');

        $matakuliahs = Matakuliah::with('jurusan')
            ->when($search, function($query, $search) {
                return $query->where('nama_matakuliah', 'like', "%{$search}%")
                             ->orWhere('kode_mk', 'like', "%{$search}%");
            })
            // UBAH BAGIAN INI:
            ->paginate(5); 

        return view('matakuliah.index', compact('matakuliahs'));
    }

    public function create()
    {
        $jurusans = Jurusan::all(); //
        return view('matakuliah.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        // Validasi Form + Tambahan wajib isi kode_mk
        $request->validate([
            'kode_mk' => 'required|string|max:50',
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer',
            'id_jurusan' => 'required'
        ]);

        Matakuliah::create($request->all()); //
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah berhasil ditambah!');
    }

    public function edit($id)
    {
        $matakuliah = Matakuliah::findOrFail($id); //
        $jurusans = Jurusan::all();
        return view('matakuliah.edit', compact('matakuliah', 'jurusans'));
    }

    public function update(Request $request, $id)
    {
        // Validasi Form Update + Tambahan wajib isi kode_mk
        $request->validate([
            'kode_mk' => 'required|string|max:50',
            'nama_matakuliah' => 'required|string|max:255',
            'sks' => 'required|integer',
            'id_jurusan' => 'required'
        ]);

        $matakuliah = Matakuliah::findOrFail($id);
        $matakuliah->update($request->all()); //
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah diperbarui!');
    }

    public function destroy($id)
    {
        Matakuliah::destroy($id); //
        return redirect()->route('matakuliah.index')->with('success', 'Matakuliah dihapus!');
    }
}