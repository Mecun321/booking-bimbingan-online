<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIBIMA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4361ee;
            --secondary: #3a0ca3;
            --accent: #4cc9f0;
            --light: #f8f9fa;
            --dark: #212529;
        }
        
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        
        .login-container {
            width: 100%;
            max-width: 420px;
        }
        
        .app-title {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .app-title h1 {
            font-weight: bold;
            color: var(--primary);
            font-size: 2rem;
            margin-bottom: 10px;
        }
        
        .app-title p {
            color: #64748b;
            font-size: 1rem;
        }
        
        .login-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: none;
        }
        
        .login-header {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        .login-header h3 {
            font-weight: 600;
            margin-bottom: 0;
        }
        
        .login-body {
            padding: 25px;
        }
        
        .form-control {
            padding: 12px 15px;
            border-radius: 8px;
            border: 1px solid #e2e8f0;
            transition: all 0.3s;
        }
        
        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.15);
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            border: none;
            padding: 12px;
            font-weight: 500;
            width: 100%;
            border-radius: 8px;
            color: white;
            transition: all 0.3s;
            margin-top: 10px;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(67, 97, 238, 0.3);
        }
        
        .form-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 15px;
        }
        
        .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .forgot-password {
            color: var(--primary);
            text-decoration: none;
            font-size: 0.9rem;
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 20px 0;
            color: #94a3b8;
        }
        
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .divider::before {
            margin-right: 10px;
        }
        
        .divider::after {
            margin-left: 10px;
        }
        
        .register-link {
            text-align: center;
            margin-top: 15px;
            color: #64748b;
        }
        
        .register-link a {
            color: var(--primary);
            font-weight: 500;
            text-decoration: none;
        }
        
        .logged-in-box {
            background-color: #f8f9fa;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            text-align: center;
            border: 1px solid #e2e8f0;
        }
        
        .btn-dashboard {
            background: linear-gradient(135deg, #28a745 0%, #218838 100%);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s;
        }
        
        .btn-dashboard:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }
    </style>
</head>
<body>

    <div class="login-container">
        <div class="app-title">
            <h1><i class="bi bi-mortarboard-fill"></i> FTI UNWAHA</h1>
            <p>Sistem Bimbingan Mahasiswa</p>
        </div>
        
        <div class="login-card">
            <div class="login-header">
                <h3><i class="bi bi-box-arrow-in-right"></i> Masuk ke Akun</h3>
            </div>
            <div class="login-body">
                @auth
                    <div class="logged-in-box">
                        <p class="mb-3">Anda sudah login sebagai <strong>{{ Auth::user()->name }}</strong></p>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline me-2">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                        <a href="{{ route('redirect') }}" class="btn btn-dashboard">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </div>
                @endauth
                
                @guest
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" required autofocus placeholder="Masukkan email Anda">
                    </div>
                    
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Masukkan password Anda">
                    </div>
                    
                    <div class="form-footer">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">
                            <label class="form-check-label" for="remember">Ingat saya</label>
                        </div>
                       
                    </div>
                    
                    <button type="submit" class="btn btn-login">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </button>
                    
                    <div class="divider">atau</div>
                    
                    <div class="register-link">
                        Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
                    </div>
                </form>
                @endguest
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>