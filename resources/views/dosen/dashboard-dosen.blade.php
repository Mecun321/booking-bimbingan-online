<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dosen - Sistem Bimbingan</title>
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
        .stat-card {
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
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
                        <a class="nav-link active" href="{{ route('dashboard-dosen') }}">
                            <i class="bi bi-house-door me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jadwal.form') }}">
                            <i class="bi bi-calendar-plus me-1"></i>Atur Jadwal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jadwal.bookings') }}">
                            <i class="bi bi-list-check me-1"></i>Daftar Booking
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

        <div class="row g-4">
            <!-- Stat Cards -->
            <div class="col-md-4">
                <div class="card stat-card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="bi bi-calendar-week me-2"></i>Total Jadwal
                        </h5>
                        <p class="display-5 fw-bold text-primary">{{ $totalJadwal }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title text-success">
                            <i class="bi bi-bookmark-check me-2"></i>Total Booking
                        </h5>
                        <p class="display-5 fw-bold text-success">{{ $totalBooking }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card stat-card text-center h-100">
                    <div class="card-body">
                        <h5 class="card-title text-warning">
                            <i class="bi bi-people me-2"></i>Jumlah Mahasiswa
                        </h5>
                        <p class="display-5 fw-bold text-warning">{{ $totalMahasiswa }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>