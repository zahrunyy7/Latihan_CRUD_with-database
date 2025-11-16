<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etalase Parfum - Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Miss+Fajardose&display=swap" rel="stylesheet">

    <style>
        /* Definisi Palet Warna */
        :root {
            --color-dark: #59322B;
            --color-tosca: #59322B;
            --color-light: #F9F9F9;
            --color-orange: #EF9A48;
            --color-maroon: #D54751;
        }
        
        /* Styling Umum */
        body {
            font-family: 'Inter', sans-serif;
            
            /* === KODE BACKGROUND GAMBAR/PATTERN (SATU KALI) === */
            background-image: url("/tekstur.png");
            background-repeat: repeat; 
            background-attachment: fixed; 
            background-color: var(--color-light); /* Warna cadangan */
            /* ================================================= */

            color: var(--color-dark);
            min-height: 100vh;
        }

        /* === KELAS KHUSUS FONT MISS FAJARDOSE === */
        .header-font {
            font-family: 'Miss Fajardose', cursive;
            font-size: 2.5rem;
            font-weight: 400;
            letter-spacing: 2px;
            color: var(--color-dark);
        }

        .app-title {
            font-weight: 700;
            color: var(--color-dark);
            margin-bottom: 30px;
            border-bottom: 4px solid var(--color-tosca);
            display: inline-block;
            padding-bottom: 8px;
        }

        /* Modifikasi Tombol Bootstrap (Override) */
        .btn-primary, .btn-success { background-color: var(--color-tosca); border-color: var(--color-tosca); }
        .btn-primary:hover, .btn-success:hover { background-color: #4a2923; border-color: #4a2923; }
        .btn-warning { background-color: var(--color-orange); border-color: var(--color-orange); }
        .btn-warning:hover { background-color: #d18840; border-color: #d18840; }
        .btn-danger { background-color: var(--color-maroon); border-color: var(--color-maroon); }
        .btn-danger:hover { background-color: #b03a45; border-color: #b03a45; }

        .card { border-radius: 1rem; border: none; }
        .alert-success {
            position: fixed; top: 20px; right: 20px; z-index: 1050; 
            min-width: 350px; border-radius: 0.5rem; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            animation: slideIn 0.5s forwards; background-color: var(--color-tosca);
            color: white; border: none;
        }
        @keyframes slideIn { from { right: -400px; opacity: 0; } to { right: 20px; opacity: 1; } }
    </style>
</head>
<body>

<div class="container">
    <h2 class="app-title text-center mx-auto header-font">Etalase Parfum</h2>
    
    @if(session('success'))
        <div id="alertMessage" class="alert alert-success alert-dismissible fade show" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill me-2" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022l-3.473 4.29-1.993-1.994a.75.75 0 0 0-1.06 1.06L6.877 11.21a.75.75 0 0 0 1.079.02l4.496-5.499a.75.75 0 0 0-.022-1.08z"/>
            </svg>
            {{ session('success') }}
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

        <script>
            setTimeout(() => {
                const alertBox = document.getElementById('alertMessage');
                if (alertBox) {
                    alertBox.classList.remove('show');
                    setTimeout(() => alertBox.remove(), 500); 
                }
            }, 3000); 
        </script>
    @endif
    
    @yield('content')

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 