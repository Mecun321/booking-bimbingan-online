<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Booking Mahasiswa - Sistem Bimbingan</title>
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
        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            border: none;
        }
        .card-header {
            border-radius: 10px 10px 0 0 !important;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            font-weight: 600;
        }
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        .table thead th {
            background-color: #f1f3fa;
            border-bottom: 2px solid #dee2e6;
        }
        .table-hover tbody tr:hover {
            background-color: rgba(102, 126, 234, 0.1);
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
                        <a class="nav-link" href="{{ route('dashboard-dosen') }}">
                            <i class="bi bi-house-door me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jadwal.form') }}">
                            <i class="bi bi-calendar-plus me-1"></i>Atur Jadwal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('jadwal.bookings') }}">
                            <i class="bi bi-list-check me-1"></i>Lihat Booking
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
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-calendar-check me-2"></i>Daftar Booking Mahasiswa</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th><i class="bi bi-person me-1"></i>Nama Mahasiswa</th>
                                <th><i class="bi bi-calendar-date me-1"></i>Tanggal</th>
                                <th><i class="bi bi-clock me-1"></i>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwals as $jadwal)
                                @forelse($jadwal->bookings as $booking)
                                    <tr>
                                        <td>{{ $loop->parent->iteration }}.{{ $loop->iteration }}</td>
                                        <td>{{ $booking->mahasiswa->name }}</td>
                                        <td>{{ $jadwal->tanggal }}</td>
                                        <td>{{ $jadwal->jam }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td colspan="3" class="text-center text-muted">
                                            <i class="bi bi-info-circle me-1"></i>Belum ada mahasiswa booking
                                        </td>
                                    </tr>
                                @endforelse
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">
                                        <i class="bi bi-exclamation-triangle me-1"></i>Tidak ada jadwal tersedia
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>