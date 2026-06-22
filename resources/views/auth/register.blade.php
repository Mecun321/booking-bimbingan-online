<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Sistem Akademik</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .registration-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 100%;
            max-width: 500px;
            position: relative;
            overflow: hidden;
        }

        .registration-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #667eea, #764ba2);
        }

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h2 {
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
        }

        .form-header p {
            color: #666;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
            position: relative;
        }

        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
            display: block;
        }

        .form-control, .form-select {
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus, .form-select:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
            background: white;
        }

        .input-group {
            position: relative;
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            z-index: 10;
        }

        .password-toggle {
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .password-toggle:hover {
            color: #667eea;
        }

        .btn-register {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 10px;
            padding: 15px;
            font-weight: 600;
            font-size: 16px;
            color: white;
            width: 100%;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .btn-register::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-register:hover::before {
            left: 100%;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(102, 126, 234, 0.3);
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid #e1e5e9;
        }

        .login-link a {
            color: #667eea;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        .login-link a:hover {
            color: #764ba2;
        }

        .role-option {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px;
            margin: 5px 0;
            border: 2px solid #e1e5e9;
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .role-option:hover {
            border-color: #667eea;
            background: #f0f2ff;
        }

        .role-option.selected {
            border-color: #667eea;
            background: #f0f2ff;
        }

        .role-icon {
            width: 20px;
            text-align: center;
            color: #667eea;
        }

        @media (max-width: 576px) {
            .registration-container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            .form-header h2 {
                font-size: 24px;
            }
        }

        .loading {
            display: none;
        }

        .btn-register.loading {
            color: transparent;
        }

        .btn-register.loading::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            border: 2px solid transparent;
            border-top-color: white;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>
</head>
<body>
    <div class="registration-container">
        <div class="form-header">
            <h2><i class="fas fa-user-plus"></i> Registrasi Akun</h2>
            <p>Silakan lengkapi formulir untuk membuat akun baru</p>
        </div>

        <form method="POST" action="{{ route('register') }}" id="registrationForm">
            @csrf
            <!-- Nama -->
            <div class="form-group">
                <label for="name" class="form-label">
                    <i class="fas fa-user"></i> Nama Lengkap
                </label>
                <div class="input-group">
                    <input id="name" type="text" class="form-control" name="name" required autofocus placeholder="Masukkan nama lengkap Anda">
                    <div class="input-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email" class="form-label">
                    <i class="fas fa-envelope"></i> Email
                </label>
                <div class="input-group">
                    <input id="email" type="email" class="form-control" name="email" required placeholder="contoh@email.com">
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group">
                <label for="password" class="form-label">
                    <i class="fas fa-lock"></i> Password
                </label>
                <div class="input-group">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="Masukkan password (min. 8 karakter)">
                    <div class="input-icon password-toggle" onclick="togglePassword('password')">
                        <i class="fas fa-eye" id="password-eye"></i>
                    </div>
                </div>
            </div>

            <!-- Konfirmasi Password -->
            <div class="form-group">
                <label for="password_confirmation" class="form-label">
                    <i class="fas fa-lock"></i> Konfirmasi Password
                </label>
                <div class="input-group">
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required placeholder="Ulangi password">
                    <div class="input-icon password-toggle" onclick="togglePassword('password_confirmation')">
                        <i class="fas fa-eye" id="password_confirmation-eye"></i>
                    </div>
                </div>
            </div>

            <!-- Role -->
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-user-tag"></i> Daftar Sebagai
                </label>
                <div class="role-selection">
                    <div class="role-option" onclick="selectRole('mahasiswa')">
                        <div class="role-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <div>
                            <strong>Mahasiswa</strong>
                            <div style="font-size: 12px; color: #666;">Akses ke materi pembelajaran</div>
                        </div>
                        <input type="radio" name="role" value="mahasiswa" style="margin-left: auto;">
                    </div>
                    <div class="role-option" onclick="selectRole('dosen')">
                        <div class="role-icon">
                            <i class="fas fa-chalkboard-teacher"></i>
                        </div>
                        <div>
                            <strong>Dosen</strong>
                            <div style="font-size: 12px; color: #666;">Akses ke pengelolaan kelas</div>
                        </div>
                        <input type="radio" name="role" value="dosen" style="margin-left: auto;">
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-register" id="registerBtn">
                <i class="fas fa-user-plus"></i> Daftar Sekarang
            </button>
        </form>

        <div class="login-link">
            <p>Sudah memiliki akun? <a href="{{ route('login') }}">Masuk di sini</a></p>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        function togglePassword(fieldId) {
            const passwordField = document.getElementById(fieldId);
            const eyeIcon = document.getElementById(fieldId + '-eye');
            
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        function selectRole(role) {
            // Remove selected class from all options
            document.querySelectorAll('.role-option').forEach(option => {
                option.classList.remove('selected');
            });
            
            // Add selected class to clicked option
            event.currentTarget.classList.add('selected');
            
            // Check the radio button
            event.currentTarget.querySelector('input[type="radio"]').checked = true;
        }

        // Form submission with loading state
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const submitBtn = document.getElementById('registerBtn');
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
            
            // Simulate form processing (remove this in actual implementation)
            // setTimeout(() => {
            //     submitBtn.classList.remove('loading');
            //     submitBtn.disabled = false;
            // }, 2000);
        });

        // Password strength indicator
        document.getElementById('password').addEventListener('input', function() {
            const password = this.value;
            const strength = getPasswordStrength(password);
            // You can add password strength indicator here
        });

        function getPasswordStrength(password) {
            let strength = 0;
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            return strength;
        }

        // Form validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('password_confirmation').value;
            
            if (password !== confirmPassword) {
                e.preventDefault();
                alert('Password dan konfirmasi password tidak cocok!');
                return false;
            }
            
            const role = document.querySelector('input[name="role"]:checked');
            if (!role) {
                e.preventDefault();
                alert('Silakan pilih role terlebih dahulu!');
                return false;
            }
        });
    </script>
</body>
</html>