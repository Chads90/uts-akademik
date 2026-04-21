<x-guest-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .login-wrapper {
            background: linear-gradient(135deg, #f4f7f6 0%, #e0eaf5 100%);
            min-height: 100vh;
            /* Trik agar menutupi layout bawaan tailwind */
            position: fixed;
            top: 0; left: 0; width: 100%; height: 100%;
            z-index: 9999;
        }
        .login-card {
            max-width: 420px;
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 51, 102, 0.1);
            animation: fadeIn 0.6s ease-in-out;
        }
        .brand-icon {
            font-size: 3.5rem;
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

    <div class="login-wrapper d-flex justify-content-center align-items-center">
        <div class="card login-card border-0 p-5 bg-white">

            <div class="text-center mb-4">
                <i class="bi bi-mortarboard-fill brand-icon mb-2 d-block"></i>
                <h4 class="fw-bold mb-1" style="color: #003366;">Sistem Akademik Sederhana</h4>
                <p class="text-muted small">Silakan login untuk mengakses data kampus</p>
            </div>

            <x-auth-session-status class="mb-4 alert alert-info p-2 text-center small" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label fw-semibold text-secondary small mb-1">Alamat Email</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                        <input id="email" class="form-control border-start-0 ps-0 @error('email') is-invalid @enderror" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" placeholder="admin@kampus.ac.id">
                    </div>
                    @error('email')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label fw-semibold text-secondary small mb-1">Password</label>
                    <div class="input-group">
                        <span class="input-group-text border-end-0"><i class="bi bi-lock text-muted"></i></span>
                        <input id="password" class="form-control border-start-0 ps-0 @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="••••••••">
                    </div>
                    @error('password')
                        <div class="text-danger small mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check">
                        <input id="remember_me" type="checkbox" class="form-check-input shadow-sm" name="remember">
                        <label for="remember_me" class="form-check-label text-muted small">Ingat Saya</label>
                    </div>
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none small fw-medium" style="color: #003366;" href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <div class="d-grid mt-2">
                    <button type="submit" class="btn btn-login text-white rounded-pill py-2 fw-bold shadow-sm">
                        Masuk <i class="bi bi-box-arrow-in-right ms-1"></i>
                    </button>
                </div>
                
            </form>
        </div>
    </div>
</x-guest-layout>