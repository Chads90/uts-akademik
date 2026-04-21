<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    // Tampilkan semua jurusan + Fitur Search & Pagination
    public function index(Request $request)
    {
        $search = $request->query('search');

        $jurusans = Jurusan::when($search, function ($query, $search) {
            return $query->where('nama_jurusan', 'like', "%{$search}%")
                         ->orWhere('akreditasi', 'like', "%{$search}%");
        })
        ->paginate(5); // Membatasi 5 data per halaman

        return view('jurusan.index', compact('jurusans'));
    }

    public function create()
    {
        return view('jurusan.create');
    }

    public function store(Request $request)
    {
        // Validasi Form 
        $request->validate([
            'nama_jurusan' => 'required',
            'akreditasi' => 'required',
        ]);

        Jurusan::create($request->all());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diupdate!');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus!');
    }
}