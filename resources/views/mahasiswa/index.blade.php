<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Mahasiswa') }}
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
                            <i class="bi bi-people-fill me-2 text-success"></i> Data Mahasiswa
                        </h4>
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-success shadow-sm rounded-pill px-4 fw-medium">
                            <i class="bi bi-person-plus-fill me-1"></i> Tambah Mahasiswa
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="alert bg-white border-0 border-start border-5 border-success shadow-sm mb-4 alert-dismissible fade show d-flex align-items-center p-3 rounded-3" role="alert">
                            <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center me-3 shadow-sm" style="width: 45px; height: 45px; min-width: 45px;">
                                <i class="bi bi-check2-all fs-4"></i>
                            </div>
                            <div>
                                <h6 class="mb-1 fw-bold text-dark" style="font-size: 1.05rem;">Berhasil!</h6>
                                <p class="mb-0 text-secondary" style="font-size: 0.95rem;">{{ session('success') }}</p>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="text-center" style="width: 50px;">NO</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">NAMA MAHASISWA</th>
                                    <th scope="col">JURUSAN</th>
                                    <th scope="col" class="text-center" style="width: 200px;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswas as $index => $mahasiswa)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ $mahasiswas->firstItem() + $index }}</td>
                                    
                                    <td><span class="badge bg-secondary">{{ $mahasiswa->nim ?? '-' }}</span></td>
                                    <td class="fw-medium">{{ $mahasiswa->nama ?? '-' }}</td>
                                    
                                    <td>
                                        <span class="text-success fw-semibold">
                                            {{ $mahasiswa->jurusan->nama_jurusan ?? 'Belum Pilih Jurusan' }}
                                        </span>
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('mahasiswa.edit', $mahasiswa->id_mahasiswa) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('mahasiswa.destroy', $mahasiswa->id_mahasiswa) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                                    <i class="bi bi-trash"></i> Hapus
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
                        {{ $mahasiswas->links('pagination::bootstrap-5') }}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>