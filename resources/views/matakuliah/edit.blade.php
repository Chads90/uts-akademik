<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">Edit Matakuliah</h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                <form action="{{ route('matakuliah.update', $matakuliah->id_matakuliah) }}" method="POST">
                    @csrf 
                    @method('PUT')
                    
                    <div class="mb-4">
                        <label for="kode_mk" class="form-label fw-bold">Kode Matakuliah</label>
                        <input type="text" class="form-control @error('kode_mk') is-invalid @enderror" id="kode_mk" name="kode_mk" value="{{ old('kode_mk', $matakuliah->kode_mk) }}" placeholder="Contoh: INF-101" required>
                        @error('kode_mk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Nama Matakuliah</label>
                        <input type="text" name="nama_matakuliah" class="form-control" value="{{ old('nama_matakuliah', $matakuliah->nama_matakuliah) }}" required>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">SKS</label>
                        <input type="number" name="sks" class="form-control" value="{{ old('sks', $matakuliah->sks) }}" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="form-label fw-bold">Jurusan</label>
                        <select name="id_jurusan" class="form-select" required>
                            @foreach($jurusans as $j)
                                <option value="{{ $j->id_jurusan }}" {{ $matakuliah->id_jurusan == $j->id_jurusan ? 'selected' : '' }}>
                                    {{ $j->nama_jurusan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                    <a href="{{ route('matakuliah.index') }}" class="btn btn-secondary ms-2">Batal</a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>