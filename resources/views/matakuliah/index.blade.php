<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Matakuliah') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border-0" style="border-radius: 15px;">
                <div class="p-6 text-gray-900">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                        <h4 class="mb-0 fw-bold text-dark">
                            <i class="bi bi-journal-bookmark-fill me-2 text-success"></i> Data Matakuliah
                        </h4>
                        <a href="{{ route('matakuliah.create') }}" class="btn btn-success text-white shadow-sm rounded-pill px-4 fw-medium">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Matakuliah
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert bg-white border-0 border-start border-5 border-success shadow-sm mb-4 alert-dismissible fade show d-flex align-items-center p-3 rounded-3" role="alert">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px; min-width: 45px;">
                                <i class="bi bi-check2-all fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 fw-bold text-dark">Berhasil!</h6>
                                <p class="mb-0 text-secondary small">{{ session('success') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-center" style="width: 50px;">NO</th>
                                    <th scope="col">KODE MK</th>
                                    <th scope="col">NAMA MATAKULIAH</th>
                                    <th scope="col">SKS</th>
                                    <!-- PENAMBAHAN KOLOM JURUSAN (Sesuai Soal Poin 4.3) -->
                                    <th scope="col">JURUSAN</th>
                                    <th scope="col" class="text-center" style="width: 180px;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($matakuliahs as $index => $mk)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ $matakuliahs->firstItem() + $index }}</td>
                                    <td><span class="badge bg-dark">{{ $mk->kode_mk ?? 'MK-'.$mk->id_matakuliah }}</span></td>
                                    <td class="fw-medium">{{ $mk->nama_matakuliah }}</td>
                                    <td class="text-center fw-bold">{{ $mk->sks }}</td>
                                    <!-- MENAMPILKAN RELASI JURUSAN -->
                                    <td>
                                        <span class="text-primary fw-medium">
                                            {{ $mk->jurusan->nama_jurusan ?? 'Tidak Ada' }}
                                        </span>
                                    </td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('matakuliah.edit', $mk->id_matakuliah) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <form action="{{ route('matakuliah.destroy', $mk->id_matakuliah) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-4 d-flex justify-content-end">
                        {{ $matakuliahs->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>