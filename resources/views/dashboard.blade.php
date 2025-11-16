<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Etalase Parfum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Miss+Fajardose&display=swap" rel="stylesheet">

    <style>
        /* Definisi Palet Warna */
        :root {
            --color-dark: #59322B;      /* Coklat Tua */
            --color-tosca: #59322B;     /* Hijau Tosca */
            --color-light: #F9F9F9;     /* Krem Pucat */
            --color-orange: #EF9A48;    /* Oranye (Logout) */
        }
        
        /* Styling Umum */
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--color-light); 
            color: var(--color-dark);
            min-height: 100vh;
        }

        /* Navbar Custom */
        .navbar-primary {
            background-color: var(--color-tosca) !important;
        }
        
        /* Tombol Utama */
        .btn-success {
            background-color: var(--color-tosca);
            border-color: var(--color-tosca);
        }
        .btn-success:hover {
            background-color: #d18840; /* Tosca sedikit lebih gelap saat hover */
            border-color: #d18840;
        }

        /* Link Logout (Menggunakan Oranye) */
        .nav-link.text-warning {
            color: var(--color-orange) !important;
            font-weight: 600;
        }

        /* Card Konten */
        .card {
            border-radius: 1rem;
            border: none;
        }

        /* === KELAS KHUSUS FONT MISS FAJARDOSE === */
        .header-font {
            font-family: 'Miss Fajardose', cursive;
            font-size: 3rem; 
            font-weight: 400;
            letter-spacing: 2px;
            color: var(--color-dark);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-primary">
    <div class="container-fluid container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Etalase Parfum</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('parfums.index') }}">Katalog Parfum</a></li>
                <li class="nav-item"><a class="nav-link text-warning fw-bold" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container py-5 text-center">
    <div class="card shadow-lg border-0 rounded-4 p-5">
        
        <h2 class="mb-3 header-font">Selamat Datang, {{ session('user') }}</h2>
        
        <p class="text-muted">Anda berhasil login ke sistem Etalase Parfum berbasis Database.</p>
        
        <a href="{{ route('parfums.index') }}" class="btn btn-success mt-3 w-50 mx-auto">Masuk ke Katalog Parfum</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>