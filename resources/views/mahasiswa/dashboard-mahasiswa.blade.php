<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Mahasiswa - Sistem Bimbingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { 
            font-family: 'Segoe UI', sans-serif; 
            background-color: #f8f9fa; 
        }
        .navbar-brand { 
            font-weight: bold; 
            font-size: 1.4rem; 
        }
        .nav-link.active { 
            font-weight: bold; 
            background-color: rgba(255,255,255,0.1);
            border-radius: 5px;
        }
        .welcome-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 15px;
            padding: 30px;
            margin-bottom: 30px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: none;
        }
        .card-title {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-mortarboard-fill me-2"></i>FTI UNWAHA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard-mahasiswa') }}">
                            <i class="bi bi-house-door me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mahasiswa.jadwal') }}">
                            <i class="bi bi-calendar-check me-1"></i>Lihat Jadwal
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>{{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="bi bi-box-arrow-right me-2"></i>Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div class="container mt-4">
        <!-- Welcome Section -->
        <div class="welcome-card">
            <h3><i class="bi bi-hand-thumbs-up me-2"></i>Selamat datang, {{ Auth::user()->name }}!</h3>
            <p class="mb-0">Kelola jadwal bimbingan Anda dengan mudah melalui sistem ini.</p>
        </div>

        <div class="row">
            <!-- Main Content -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <h5 class="card-title">
                                    <i class="bi bi-info-circle me-2 text-primary"></i>Informasi
                                </h5>
                                <p class="card-text">
                                    Silakan buka menu <strong>Lihat Jadwal</strong> untuk booking jadwal bimbingan.
                                </p>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="{{ route('mahasiswa.jadwal') }}" class="btn btn-primary">
                                    <i class="bi bi-calendar-plus me-2"></i>Lihat Jadwal
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>