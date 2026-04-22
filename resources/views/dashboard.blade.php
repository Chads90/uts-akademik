<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
            
            <style>
                .menu-card {
                    transition: all 0.3s ease;
                    border: 1px solid rgba(0,0,0,0.05);
                    border-radius: 15px;
                }
                .menu-card:hover {
                    transform: translateY(-7px);
                    box-shadow: 0 15px 30px rgba(0, 51, 102, 0.1) !important;
                    border-color: #003366;
                }
                .icon-box {
                    width: 60px;
                    height: 60px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                    margin: 0 auto 10px auto;
                    background-color: rgba(0, 51, 102, 0.05);
                    color: #003366;
                }
                .welcome-banner {
                    background: linear-gradient(135deg, #003366 0%, #004080 100%);
                    border-radius: 15px;
                }
                .news-card {
                    border: none;
                    border-radius: 12px;
                    overflow: hidden;
                    transition: 0.3s;
                }
                .news-card:hover {
                    opacity: 0.9;
                }
                .news-badge {
                    position: absolute;
                    top: 10px;
                    left: 10px;
                    font-size: 0.7rem;
                    z-index: 10;
                }
                .news-img {
                    height: 180px;
                    width: 100%;
                    object-fit: cover;
                }
                .search-bar-container {
                    border-radius: 50px;
                    background-color: #ffffff;
                }
                .search-input:focus {
                    box-shadow: none;
                    border-color: transparent;
                }
            </style>

            <div class="welcome-banner text-white p-4 mb-4 shadow-sm d-flex align-items-center gap-4">
                <div class="d-none d-md-block"> 
                    @if(Auth::user()->photo)
                        <img src="{{ asset('storage/' . Auth::user()->photo) }}" alt="Profile" style="width: 80px; height: 80px; object-fit: cover;" class="rounded-circle border border-3 border-white shadow-sm">
                    @else
                        <div class="rounded-circle bg-white text-primary d-flex align-items-center justify-content-center shadow-sm" style="width: 80px; height: 80px;">
                            <i class="bi bi-mortarboard-fill fs-1"></i>
                        </div>
                    @endif
                </div>
                <div>
                    <h4 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</h4>
                    <p class="mb-0 text-white-50 small">Sistem Informasi Akademik Terpadu. Kelola data kampus Anda dengan lebih mudah hari ini.</p>
                </div>
            </div>

            <div class="row g-3 mb-5">
                <div class="col-md-4">
                    <div class="card h-100 bg-white menu-card shadow-sm p-4 text-center">
                        <div class="icon-box"><i class="bi bi-building fs-3"></i></div>
                        <h6 class="fw-bold text-dark mb-2">Data Jurusan</h6>
                        <p class="text-muted mb-3 small">Kelola program studi, fakultas, dan akreditasi.</p>
                        <a href="{{ route('jurusan.index') }}" class="btn btn-outline-primary mt-auto rounded-pill btn-sm fw-medium">Masuk Modul →</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 bg-white menu-card shadow-sm p-4 text-center">
                        <div class="icon-box"><i class="bi bi-people-fill fs-3"></i></div>
                        <h6 class="fw-bold text-dark mb-2">Data Mahasiswa</h6>
                        <p class="text-muted mb-3 small">Kelola data induk, NIM, dan penempatan.</p>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-primary mt-auto rounded-pill btn-sm fw-medium">Masuk Modul →</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 bg-white menu-card shadow-sm p-4 text-center">
                        <div class="icon-box"><i class="bi bi-journal-bookmark-fill fs-3"></i></div>
                        <h6 class="fw-bold text-dark mb-2">Data Matakuliah</h6>
                        <p class="text-muted mb-3 small">Kelola kurikulum, SKS, dan relasi mk.</p>
                        <a href="{{ route('matakuliah.index') }}" class="btn btn-outline-primary mt-auto rounded-pill btn-sm fw-medium">Masuk Modul →</a>
                    </div>
                </div>
            </div>

            <div class="mb-3 d-flex align-items-center justify-content-between border-bottom pb-2">
                <h5 class="fw-bold text-dark mb-0"><i class="bi bi-newspaper me-2 text-primary"></i> Berita Pendidikan</h5>
                <a href="#" class="text-primary small text-decoration-none">Lihat Semua</a>
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="card news-card shadow-sm h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?q=80&w=400&auto=format&fit=crop" class="news-img" alt="Wisuda">
                            <span class="badge bg-primary news-badge">Info Kampus</span>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-muted mb-1 small"><i class="bi bi-calendar3 me-1"></i> 19 April 2026</p>
                            <h6 class="fw-bold mb-2">Persiapan Wisuda Gelombang I Tahun Akademik 2025/2026</h6>
                            <p class="text-muted small mb-0">Pendaftaran wisuda resmi dibuka bagi mahasiswa yang telah menyelesaikan sidang akhir.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card news-card shadow-sm h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=400&auto=format&fit=crop" class="news-img" alt="Belajar">
                            <span class="badge bg-success news-badge">Beasiswa</span>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-muted mb-1 small"><i class="bi bi-calendar3 me-1"></i> 18 April 2026</p>
                            <h6 class="fw-bold mb-2">Beasiswa Unggulan Mahasiswa Berprestasi Kembali Dibuka</h6>
                            <p class="text-muted small mb-0">Cek syarat dan ketentuan pendaftaran beasiswa untuk semester ganjil mendatang.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card news-card shadow-sm h-100">
                        <div class="position-relative">
                            <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=400&auto=format&fit=crop" class="news-img" alt="Seminar">
                            <span class="badge bg-warning text-dark news-badge">Event</span>
                        </div>
                        <div class="card-body p-3">
                            <p class="text-muted mb-1 small"><i class="bi bi-calendar3 me-1"></i> 17 April 2026</p>
                            <h6 class="fw-bold mb-2">Workshop: Implementasi Teknologi AI dalam Pendidikan Modern</h6>
                            <p class="text-muted small mb-0">Ikuti diskusi seru bersama para ahli teknologi mengenai masa depan dunia akademik.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>