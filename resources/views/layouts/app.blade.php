<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Sistem Akademik UTB') }}</title>

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

        <style>
            :root {
                --campus-blue: #003366;
                --campus-blue-light: #004080;
                --campus-accent: #ffc107; /* Gold/Yellow accent */
                --bg-light: #f8f9fa;
            }

            body { 
                font-family: 'Inter', sans-serif; 
                background-color: var(--bg-light); 
                color: #333;
            }

            /* Perbaikan Navbar & Header */
            .navbar-campus { 
                background: linear-gradient(135deg, var(--campus-blue) 0%, var(--campus-blue-light) 100%);
                border-bottom: 3px solid var(--campus-accent);
            }

            .header-title {
                background: white;
                border-bottom: 1px solid #dee2e6;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            }

            /* Styling Kartu (Cards)  */
            .card { 
                border: none; 
                border-radius: 15px; 
                box-shadow: 0 10px 25px rgba(0,0,0,0.05);
                transition: transform 0.3s ease;
            }

            .card:hover {
                transform: translateY(-5px);
            }

            /* Tombol & Aksi  */
            .btn-primary { 
                background-color: var(--campus-blue); 
                border: none;
                padding: 8px 20px;
                border-radius: 8px;
                font-weight: 500;
            }

            .btn-primary:hover {
                background-color: var(--campus-blue-light);
                box-shadow: 0 4px 12px rgba(0,51,102,0.3);
            }

            /* Tabel UI  */
            .table-container {
                background: white;
                border-radius: 12px;
                overflow: hidden;
            }

            .table thead {
                background-color: var(--campus-blue);
                color: white;
            }

            .table-hover tbody tr:hover {
                background-color: rgba(0,51,102,0.03);
            }

            /* Badge & Status */
            .badge-akreditasi {
                padding: 6px 12px;
                border-radius: 20px;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.75rem;
            }
        </style>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-50">
            @include('layouts.navigation')

            @isset($header)
                <header class="header-title py-4 mb-4">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 d-flex align-items-center">
                        <i class="bi bi-mortarboard-fill fs-3 text-primary me-3"></i>
                        <div class="fw-bold text-dark fs-4">
                            {{ $header }}
                        </div>
                    </div>
                </header>
            @endisset

            <main class="container-fluid max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                {{ $slot }}
            </main>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>