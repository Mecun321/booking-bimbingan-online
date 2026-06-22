<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Jadwal - Sistem Bimbingan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f8f9fa;
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
        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
        }
        .form-control:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.25rem rgba(102, 126, 234, 0.25);
        }
        .btn-primary {
            background-color: #4e73df;
            border: none;
            border-radius: 8px;
        }
        .btn-secondary {
            border-radius: 8px;
        }
    </style>
</head>
<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-pencil-square me-2"></i>Edit Jadwal</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('jadwal.update', $jadwal->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ $jadwal->tanggal }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Jam</label>
                        <input type="time" name="jam" class="form-control" value="{{ $jadwal->jam }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nama Bimbingan</label>
                        <input type="text" name="nama_bimbingan" class="form-control" value="{{ $jadwal->nama_bimbingan }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">
                        <i class="bi bi-save me-1"></i>Simpan Perubahan
                    </button>
                    <a href="{{ route('jadwal.form') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Batal
                    </a>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
