<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Jurusan') }}
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
                            <i class="bi bi-building me-2 text-primary"></i> Data Jurusan
                        </h4>
                        <a href="{{ route('jurusan.create') }}" class="btn btn-primary text-white shadow-sm rounded-pill px-4 fw-medium">
                            <i class="bi bi-plus-circle me-1"></i> Tambah Jurusan
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
                                    <th scope="col">NAMA JURUSAN</th>
                                    <th scope="col" class="text-center">AKREDITASI</th>
                                    <th scope="col" class="text-center" style="width: 200px;">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jurusans as $index => $jurusan)
                                <tr>
                                    <td class="text-center fw-bold text-muted">{{ (isset($jurusans->firstItem) ? $jurusans->firstItem() : 1) + $index }}</td>
                                    
                                    <td class="fw-medium">{{ $jurusan->nama_jurusan }}</td>
                                    
                                    <td class="text-center">
                                        @if($jurusan->akreditasi == 'Unggul' || $jurusan->akreditasi == 'A')
                                            <span class="badge bg-success px-3 py-2 rounded-pill">{{ $jurusan->akreditasi }}</span>
                                        @elseif($jurusan->akreditasi == 'B')
                                            <span class="badge bg-primary px-3 py-2 rounded-pill">{{ $jurusan->akreditasi }}</span>
                                        @else
                                            <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">{{ $jurusan->akreditasi }}</span>
                                        @endif
                                    </td>
                                    
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('jurusan.edit', $jurusan->id_jurusan ?? $jurusan->id) }}" class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            
                                            <button type="button" class="btn btn-sm btn-outline-danger rounded-pill px-3" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $jurusan->id_jurusan ?? $jurusan->id }}">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                        </div>

                                        <div class="modal fade" id="deleteModal{{ $jurusan->id_jurusan ?? $jurusan->id }}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header border-bottom-0">
                                                        <h5 class="modal-title fw-bold" id="deleteModalLabel">Konfirmasi Hapus</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-center py-4">
                                                        <i class="bi bi-exclamation-circle text-danger mb-3 d-block" style="font-size: 4rem;"></i>
                                                        <h5 class="fw-bold mb-2">Yakin ingin menghapus data ini?</h5>
                                                        <p class="text-muted mb-0">Jurusan <strong>{{ $jurusan->nama_jurusan }}</strong> akan dihapus secara permanen dan tidak dapat dikembalikan.</p>
                                                    </div>
                                                    <div class="modal-footer border-top-0 justify-content-center pb-4">
                                                        <button type="button" class="btn btn-light px-4 rounded-pill border" data-bs-dismiss="modal">Batal</button>
                                                        <form action="{{ route('jurusan.destroy', $jurusan->id_jurusan ?? $jurusan->id) }}" method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger px-4 rounded-pill shadow-sm">Ya, Hapus Data</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if(method_exists($jurusans, 'links'))
                    <div class="mt-4 d-flex justify-content-end">
                        {{ $jurusans->links('pagination::bootstrap-5') }}
                    </div>
                    @endif
                    
                </div>
            </div>
            
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </div>
    </div>
</x-app-layout>