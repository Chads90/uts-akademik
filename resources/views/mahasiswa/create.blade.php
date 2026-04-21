<x-app-layout>
    <x-slot name="header"><h2 class="font-semibold text-xl text-gray-800">Tambah Mahasiswa</h2></x-slot>
    <div class="py-12"><div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control" placeholder="Contoh: 23552011176" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Mahasiswa</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select name="id_jurusan" class="form-select" required>
                        <option value="">-- Pilih Jurusan --</option>
                        @foreach($jurusans as $j)
                            <option value="{{ $j->id_jurusan }}">{{ $j->nama_jurusan }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Simpan Mahasiswa</button>
            </form>
        </div>
    </div></div>
</x-app-layout>