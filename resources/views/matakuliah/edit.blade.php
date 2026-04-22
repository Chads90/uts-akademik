<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Matakuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-0" style="border-radius: 15px;">
                <div class="p-6 text-gray-900">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                        <h4 class="mb-0 fw-bold text-dark">Form Edit Matakuliah</h4>
                        <a href="{{ route('matakuliah.index') }}" class="btn btn-light border shadow-sm rounded-pill px-4 fw-medium text-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </a>
                    </div>

                    <form action="{{ route('matakuliah.update', $matakuliah->id_matakuliah ?? $matakuliah->id) }}" method="POST">
                        @csrf 
                        @method('PUT')

                        <div class="mb-4">
                            <label for="kode_mk" class="form-label fw-bold">Kode Matakuliah</label>
                            <input type="text" class="form-control @error('kode_mk') is-invalid @enderror" id="kode_mk" name="kode_mk" value="{{ old('kode_mk', $matakuliah->kode_mk) }}" required>
                            @error('kode_mk')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="nama_matakuliah" class="form-label fw-bold">Nama Matakuliah</label>
                            <input type="text" class="form-control @error('nama_matakuliah') is-invalid @enderror" id="nama_matakuliah" name="nama_matakuliah" value="{{ old('nama_matakuliah', $matakuliah->nama_matakuliah) }}" required>
                            @error('nama_matakuliah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="sks" class="form-label fw-bold">SKS</label>
                            <input type="number" class="form-control @error('sks') is-invalid @enderror" id="sks" name="sks" value="{{ old('sks', $matakuliah->sks) }}" required>
                            @error('sks')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="id_jurusan" class="form-label fw-bold">Jurusan</label>
                            <select class="form-select @error('id_jurusan') is-invalid @enderror" id="id_jurusan" name="id_jurusan" required>
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach($jurusans as $j)
                                    <option value="{{ $j->id_jurusan ?? $j->id }}" {{ (old('id_jurusan', $matakuliah->id_jurusan) == ($j->id_jurusan ?? $j->id)) ? 'selected' : '' }}>
                                        {{ $j->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-5 d-flex gap-2">
                            <button type="submit" class="btn btn-success px-4 rounded-pill fw-medium shadow-sm">
                                <i class="bi bi-save me-1"></i> Update Data
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>