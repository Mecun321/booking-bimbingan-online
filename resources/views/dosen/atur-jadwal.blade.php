<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Atur Jadwal Kosong - Sistem Bimbingan</title>
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
        .form-control, .form-select {
            border-radius: 8px;
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
        }
        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
        }
        .btn-success {
            background-color: #28a745;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 500;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .table thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%) !important;
            color: #fff;
        }
        .table th, .table td {
            vertical-align: middle;
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
                        <a class="nav-link active" href="{{ route('jadwal.form') }}">
                            <i class="bi bi-calendar-plus me-1"></i>Atur Jadwal
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jadwal.bookings') }}">
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
        <!-- FORM TAMBAH -->
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0"><i class="bi bi-calendar-plus me-2"></i>Atur Jadwal Kosong</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('jadwal.store') }}" method="POST">
                    @csrf
                    <div class="row g-4">
                        <div class="col-md-4">
                            <label for="tanggal" class="form-label fw-semibold">
                                <i class="bi bi-calendar-date me-1"></i>Tanggal
                            </label>
                            <input type="date" name="tanggal" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="jam" class="form-label fw-semibold">
                                <i class="bi bi-clock me-1"></i>Jam
                            </label>
                            <input type="time" name="jam" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="nama_bimbingan" class="form-label fw-semibold">
                                <i class="bi bi-card-text me-1"></i>Nama Bimbingan
                            </label>
                            <input type="text" name="nama_bimbingan" class="form-control" placeholder="Masukkan nama bimbingan" required>
                        </div>
                        <div class="col-md-4 d-flex align-items-end">
                            <button class="btn btn-success w-100">
                                <i class="bi bi-check-circle me-1"></i>Atur Jadwal
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- TABEL JADWAL -->
<div class="card mt-5">
    <div class="card-header">
        <h5 class="mb-0"><i class="bi bi-calendar3 me-2"></i>Daftar Jadwal Anda</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle shadow-sm mb-0">
                <thead class="text-center text-white" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                    <tr>
                        <th style="width: 5%">#</th>
                        <th style="width: 25%">Tanggal</th>
                        <th style="width: 20%">Jam</th>
                        <th>Nama Bimbingan</th>
                        <th style="width: 15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($jadwals as $jadwal)
                    <tr>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($jadwal->tanggal)->translatedFormat('l, d F Y') }}</td>
                        <td>{{ $jadwal->jam }}</td>
                        <td>{{ $jadwal->nama_bimbingan }}</td>
                        <td class="text-center">
                            <a href="{{ route('jadwal.edit', $jadwal->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <form action="{{ route('jadwal.destroy', $jadwal->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus jadwal ini?')" title="Hapus">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Belum ada jadwal yang ditambahkan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
