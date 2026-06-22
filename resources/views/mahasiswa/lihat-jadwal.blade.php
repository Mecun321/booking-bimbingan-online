<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lihat Jadwal Bimbingan - Mahasiswa</title>
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
        .table-responsive {
            border-radius: 8px;
        }
        .btn-booking {
            transition: all 0.3s;
        }
        .btn-booking:hover {
            transform: translateY(-1px);
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
                        <a class="nav-link" href="{{ route('dashboard-mahasiswa') }}">
                            <i class="bi bi-house-door me-1"></i>Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('mahasiswa.jadwal') }}">
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
            <h4><i class="bi bi-calendar-week me-2"></i>Jadwal Bimbingan</h4>
            <p class="mb-0">Pilih jadwal kosong yang tersedia untuk booking bimbingan dengan dosen.</p>
        </div>

        <!-- Alert Messages -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-exclamation-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
        @endif

        <!-- Jadwal Table -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">
                    <i class="bi bi-calendar-event me-2"></i>Jadwal Kosong Dosen
                </h5>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="text-center">No</th>
                                <th><i class="bi bi-person-badge me-1"></i>Dosen</th>
                                <th><i class="bi bi-bookmark me-1"></i>Nama Bimbingan</th>
                                <th><i class="bi bi-calendar-date me-1"></i>Tanggal</th>
                                <th><i class="bi bi-clock me-1"></i>Jam</th>
                                <th class="text-center"><i class="bi bi-gear me-1"></i>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($jadwals as $jadwal)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person-circle text-primary me-2"></i>
                                        <span>{{ $jadwal->dosen->name }}</span>
                                    </div>
                                </td>
                                <td>{{ $jadwal->nama_bimbingan }}</td>
                                <td>
                                    <span class="badge bg-light text-dark">
                                        <i class="bi bi-calendar-date me-1"></i>{{ $jadwal->tanggal }}
                                    </span>
                                </td>
                                <td>
                                    <span class="badge bg-light text-dark">
                                        <i class="bi bi-clock me-1"></i>{{ $jadwal->jam }}
                                    </span>
                                </td>
                                <td class="text-center">
                                    <form action="{{ route('booking.store') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="jadwal_id" value="{{ $jadwal->id }}">
                                        <button type="submit" 
                                                class="btn btn-sm btn-success btn-booking" 
                                                onclick="return confirm('Yakin ingin booking jadwal ini?')">
                                            <i class="bi bi-calendar-plus me-1"></i>Booking
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <div class="text-muted">
                                        <i class="bi bi-calendar-x fs-1 d-block mb-2"></i>
                                        <h6>Tidak ada jadwal tersedia</h6>
                                        <small>Silakan cek kembali nanti atau hubungi admin.</small>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Info Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle me-2"></i>
                    <strong>Catatan:</strong> Setelah booking berhasil, Anda akan mendapat konfirmasi melalui sistem. Pastikan hadir tepat waktu sesuai jadwal yang telah dibooking.
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>