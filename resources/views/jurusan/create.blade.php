<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Jurusan Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-0" style="border-radius: 15px;">
                <div class="p-6 text-gray-900">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                        <h4 class="mb-0 fw-bold text-dark">Form Input Jurusan</h4>
                        <a href="{{ route('jurusan.index') }}" class="btn btn-secondary btn-sm rounded-pill px-3">Kembali</a>
                    </div>

                    <form action="{{ route('jurusan.store') }}" method="POST">
                        @csrf 
                        <div class="mb-4">
                            <label for="nama_jurusan" class="form-label fw-bold">Nama Jurusan</label>
                            <input type="text" class="form-control @error('nama_jurusan') is-invalid @enderror" id="nama_jurusan" name="nama_jurusan" value="{{ old('nama_jurusan') }}" placeholder="Contoh: Teknik Informatika" required>
                            @error('nama_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="akreditasi" class="form-label fw-bold">Akreditasi</label>
                            <select class="form-select @error('akreditasi') is-invalid @enderror" id="akreditasi" name="akreditasi" required>
                                <option value="">-- Pilih Akreditasi --</option>
                                <option value="A" {{ old('akreditasi') == 'A' ? 'selected' : '' }}>A</option>
                                <option value="B" {{ old('akreditasi') == 'B' ? 'selected' : '' }}>B</option>
                                <option value="C" {{ old('akreditasi') == 'C' ? 'selected' : '' }}>C</option>
                                <option value="Unggul" {{ old('akreditasi') == 'Unggul' ? 'selected' : '' }}>Unggul</option>
                            </select>
                            @error('akreditasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-success px-4 rounded-pill">Simpan Data</button>
                            <button type="reset" class="btn btn-warning px-4 rounded-pill ms-2">Reset</button>
                            <a href="{{ route('jurusan.index') }}" class="btn btn-outline-secondary px-4 rounded-pill ms-2">Batal</a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>