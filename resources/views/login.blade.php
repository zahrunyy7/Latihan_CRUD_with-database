<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Etalase Parfum</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Miss+Fajardose&display=swap" rel="stylesheet">
    
    <style>
        /* Definisi Palet Warna */
        :root {
            --color-dark: #59322B;      /* Coklat Tua (Teks) */
            --color-tosca: #59322B;     /* Hijau Tosca (Tombol) */
            --color-light: #FFFCC7;     /* Krem Pucat (Background) */
        }
        
        /* Styling Umum */
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--color-light) !important; /* Background Krem Pucat */
            color: var(--color-dark);
            min-height: 100vh;
        }
        .card {
            color: var(--color-dark);
            border-radius: 1rem;
            border: none;
        }
        .header-font {
            font-family: 'Miss Fajardose', cursive;
            font-size: 2.5rem;
            font-weight: 400;
            letter-spacing: 2px;
            color: var(--color-dark);
        }
        /* Override Tombol Primary dengan warna Tosca */
        .btn-primary {
            background-color: var(--color-tosca);
            border-color: var(--color-tosca);
        }
        .btn-primary:hover {
            background-color: #d18840; /* Tosca sedikit lebih gelap saat hover */
            border-color: #d18840;
        }
    </style>
</head>
<body class="bg-light d-flex align-items-center justify-content-center" style="height:100vh;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="text-center mb-4 header-font">Login Admin</h4>

                    @if(session('error'))
                        <div class="alert alert-danger text-center py-2">{{ session('error') }}</div>
                    @endif

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
            <p class="text-center mt-3" style="color: var(--color-dark);">Sistem CRUD Parfum</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>