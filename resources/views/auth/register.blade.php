<x-guest-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .login-wrapper {
            background: linear-gradient(135deg, #f4f7f6 0%, #e0eaf5 100%);
            min-height: 100vh;
            /* Trik agar menutupi layout bawaan tailwind dan bisa di-scroll jika layar kecil */
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 9999;
            overflow-y: auto;
            padding: 40px 0;
        }
        .login-card {
            max-width: 450px; /* Sedikit lebih lebar dari halaman login */
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 51, 102, 0.1);
            animation: fadeIn 0.6s ease-in-out;
            margin: auto;
        }
        .brand-icon {
            font-size: 3rem;
            color: #003366;
        }
        .btn-login {
            background-color: #003366;
            border-color: #003366;
            transition: all 0.3s;
        }
        .btn-login:hover {
            background-color: #002244;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 51, 102, 0.3);
        }
        .input-group-text {
            background-color: #f8f9fa;
        }
        .form-control:focus {
            border-color: #003366;
            box-shadow: none;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>

    <div class="login-wrapper d-flex align-items-center">
        <div class="card login-card border-0 p-5 bg-white">

            <div class="text-center mb-4">
                <i class="bi bi-mortarboard-fill brand-icon mb-2 d-block"></i>
                <h4 class="fw-bold mb-1" style="color: #003366;">Pendaftaran Akun</h4>
                <p class="text-muted small">Silakan lengkapi data untuk membuat akun baru</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold text-secondary small mb-1">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0"><i class="bi bi-person text-muted"></i></span>
                        <input id="name" class="form-control border-start-0 ps-0 @error('name') is-invalid @enderror" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Masukkan nama lengkap">
                    </div>
                    @error('name')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold text-secondary small mb-1">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                        <input id="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" placeholder="email@kampus.ac.id">
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label fw-semibold text-secondary small mb-1">Password</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0"><i class="bi bi-lock text-muted"></i></span>
                        <input id="password" class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="new-password" placeholder="Minimal 8 karakter">
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label fw-semibold text-secondary small mb-1">Konfirmasi Password</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0"><i class="bi bi-shield-lock text-muted"></i></span>
                        <input id="password_confirmation" class="form-control border-start-0 ps-0 @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Ulangi password di atas">
                    </div>
                    @error('password_confirmation')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid mt-2 mb-4">
                    <button type="submit" class="btn btn-login text-white rounded-pill py-2 fw-bold shadow-sm">
                        Daftar Akun <i class="bi bi-person-plus ms-1"></i>
                    </button>
                </div>

                <div class="text-center">
                    <span class="text-muted small">Sudah punya akun?</span>
                    <a class="text-decoration-none small fw-medium" style="color: #003366;" href="{{ route('login') }}">
                        Masuk di sini
                    </a>
                </div>

            </form>
        </div>
    </div>
</x-guest-layout>