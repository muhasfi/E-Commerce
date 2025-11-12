@extends('layouts.master')

@section('title', 'Daftar Akun Pelanggan')

@section('style')
<style>
    .register-page {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        font-family: 'Poppins', sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    /* ===== Background Animation ===== */
    .bg-animation {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }

    .circle {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        animation: float 20s infinite;
    }

    .circle:nth-child(1) { width: 80px; height: 80px; top: 10%; left: 20%; animation-delay: 0s; }
    .circle:nth-child(2) { width: 120px; height: 120px; top: 70%; left: 70%; animation-delay: 2s; }
    .circle:nth-child(3) { width: 60px; height: 60px; top: 40%; left: 80%; animation-delay: 4s; }
    .circle:nth-child(4) { width: 100px; height: 100px; top: 80%; left: 10%; animation-delay: 6s; }
    .circle:nth-child(5) { width: 90px; height: 90px; top: 50%; left: 5%; animation-delay: 3s; }

    @keyframes float {
        0%, 100% { transform: translateY(0) rotate(0deg); opacity: 0.7; }
        50% { transform: translateY(-30px) rotate(180deg); opacity: 0.3; }
    }

    /* ===== Wrapper ===== */
    .register-wrapper {
        display: flex;
        max-width: 1000px;
        width: 100%;
        background: rgba(255, 255, 255, 0.98);
        border-radius: 24px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
        overflow: hidden;
        position: relative;
        z-index: 1;
        animation: slideIn 0.8s ease-out;
        margin: 40px 0;
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ===== Left Side ===== */
    .register-illustration {
        flex: 1;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }

    .register-illustration img {
        width: 220px;
        margin-bottom: 25px;
        animation: floatImage 4s ease-in-out infinite;
        filter: drop-shadow(0 8px 25px rgba(0,0,0,0.3));
    }

    @keyframes floatImage {
        0%,100% { transform: translateY(0px); }
        50% { transform: translateY(-12px); }
    }

    .register-illustration h2 {
        font-size: 28px;
        margin-bottom: 15px;
        font-weight: 700;
    }

    .register-illustration p {
        font-size: 16px;
        opacity: 0.9;
    }

    /* ===== Right Side ===== */
    .register-form-container {
        flex: 1;
        padding: 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        max-height: 90vh;
        overflow-y: auto;
    }

    .form-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .form-logo {
        width: 64px;
        height: 64px;
        margin: 0 auto 18px;
        background: linear-gradient(135deg, #4e54c8 60%, #8f94fb 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(102, 126, 234, 0.7);
        }
        50% {
            transform: scale(1.05);
            box-shadow: 0 0 0 10px rgba(102, 126, 234, 0);
        }
    }

    .form-logo i {
        color: white;
        font-size: 32px;
    }

    .form-header h3 {
        color: #667eea;
        font-size: 28px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .form-header p {
        color: #666;
        font-size: 14px;
    }

    /* ===== Alert ===== */
    .alert {
        padding: 12px 15px;
        margin-bottom: 20px;
        border-radius: 8px;
        font-size: 14px;
    }

    .alert-danger {
        background-color: #f8d7da;
        border: 1px solid #f5c2c7;
        color: #842029;
    }

    .alert ul {
        margin: 0;
        padding-left: 20px;
    }

    .mb-0 {
        margin-bottom: 0;
    }

    /* ===== Form Elements ===== */
    .form-group {
        margin-bottom: 20px;
    }

    .form-label {
        display: block;
        color: #667eea;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 14px;
    }

    .input-wrapper {
        position: relative;
    }

    .input-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #667eea;
        font-size: 16px;
        transition: all 0.3s;
        z-index: 1;
    }

    .form-input {
        width: 100%;
        padding: 12px 20px 12px 45px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        font-size: 14px;
        background: #f8f9fa;
        transition: 0.3s;
        font-family: 'Poppins', sans-serif;
    }

    .form-input:focus {
        outline: none;
        border-color: #667eea;
        background: white;
        box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
    }

    .input-wrapper:focus-within .input-icon {
        color: #764ba2;
    }

    textarea.form-input {
        resize: vertical;
        min-height: 45px;
    }

    /* Error styling */
    .is-invalid {
        border-color: #dc3545;
    }

    .text-danger {
        color: #dc3545;
        font-size: 12px;
        margin-top: 5px;
        display: block;
    }

    /* ===== Button ===== */
    .btn-register {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border: none;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        margin-top: 10px;
        position: relative;
        overflow: hidden;
        font-family: 'Poppins', sans-serif;
    }

    .btn-register:before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
        transition: left 0.5s;
    }

    .btn-register span {
        position: relative;
        z-index: 1;
    }

    .btn-register:hover:before {
        left: 0;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
    }

    .btn-register:active {
        transform: translateY(0);
    }

    /* ===== Link ===== */
    .login-link {
        text-align: center;
        margin-top: 20px;
        color: #666;
        font-size: 14px;
    }

    .login-link a {
        color: #667eea;
        font-weight: 600;
        text-decoration: none;
        transition: 0.3s;
    }

    .login-link a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    .back-home {
        text-align: center;
        margin-top: 15px;
    }

    .back-link {
        color: #ffffff;
        text-decoration: none;
        font-weight: 500;
        font-size: 14px;
    }

    .back-link:hover {
        text-decoration: underline;
    }

    /* ===== Responsive ===== */
    @media (max-width: 768px) {
        .register-wrapper {
            flex-direction: column;
            margin: 20px 0;
        }
        
        .register-illustration {
            padding: 40px 20px;
        }
        
        .register-form-container {
            padding: 40px 30px;
        }
        
        .register-illustration h2 {
            font-size: 24px;
        }
        
        .register-illustration p {
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .register-page {
            padding: 10px;
        }
        
        .register-form-container {
            padding: 30px 20px;
        }
        
        .form-header h3 {
            font-size: 24px;
        }
    }
</style>
@endsection

@section('content')
<div class="register-page">
    <!-- Background Animation -->
    <div class="bg-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <!-- Main Register Container -->
    <div class="register-wrapper">
        <!-- Left Illustration -->
        <div class="register-illustration">
            <img src="https://cdn-icons-png.flaticon.com/512/747/747376.png" alt="Register Illustration">
            <h2>Bergabunglah Dengan Kami!</h2>
            <p>Buat akun pelanggan baru dan nikmati layanan kami</p>
        </div>

        <!-- Right Form -->
        <div class="register-form-container">
            <div class="form-header">
                <div class="form-logo">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3>Daftar Akun Pelanggan</h3>
                <p>Lengkapi formulir di bawah untuk mendaftar</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                
                <!-- Nama Lengkap -->
                <div class="form-group">
                    <label class="form-label" for="name">Nama Lengkap</label>
                    <div class="input-wrapper">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" class="form-input @error('name') is-invalid @enderror" 
                               name="name" id="name" placeholder="Nama lengkap" 
                               value="{{ old('name') }}" required autofocus>
                    </div>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-wrapper">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" class="form-input @error('email') is-invalid @enderror" 
                               name="email" id="email" placeholder="Alamat email" 
                               value="{{ old('email') }}" required>
                    </div>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-input @error('password') is-invalid @enderror" 
                               name="password" id="password" placeholder="Password" required>
                    </div>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div class="form-group">
                    <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                    <div class="input-wrapper">
                        <i class="fas fa-lock input-icon"></i>
                        <input type="password" class="form-input" 
                               name="password_confirmation" id="password_confirmation" 
                               placeholder="Ulangi password" required>
                    </div>
                </div>

                <!-- Nomor Telepon -->
                <div class="form-group">
                    <label class="form-label" for="phone">Nomor Telepon</label>
                    <div class="input-wrapper">
                        <i class="fas fa-phone input-icon"></i>
                        <input type="text" class="form-input @error('phone') is-invalid @enderror" 
                               name="phone" id="phone" placeholder="Nomor telepon" 
                               value="{{ old('phone') }}">
                    </div>
                    @error('phone')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Alamat -->
                <div class="form-group">
                    <label class="form-label" for="address">Alamat</label>
                    <div class="input-wrapper">
                        <i class="fas fa-map-marker-alt input-icon"></i>
                        <textarea class="form-input @error('address') is-invalid @enderror" 
                                  name="address" id="address" rows="2" 
                                  placeholder="Alamat lengkap">{{ old('address') }}</textarea>
                    </div>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Tombol Register -->
                <button type="submit" class="btn-register">
                    <span><i class="fas fa-user-plus"></i> Daftar Sekarang</span>
                </button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>

            <div class="back-home">
                <a href="{{ url('/') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Menghilangkan alert setelah 5 detik
    document.addEventListener('DOMContentLoaded', function() {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            setTimeout(function() {
                alert.style.transition = 'opacity 0.5s ease';
                alert.style.opacity = '0';
                setTimeout(function() {
                    alert.remove();
                }, 500);
            }, 5000);
        });

        // Auto-hide success messages
        const successMessages = document.querySelectorAll('.alert-success');
        successMessages.forEach(function(message) {
            setTimeout(function() {
                message.style.transition = 'opacity 0.5s ease';
                message.style.opacity = '0';
                setTimeout(function() {
                    message.remove();
                }, 500);
            }, 3000);
        });
    });
</script>
@endsection