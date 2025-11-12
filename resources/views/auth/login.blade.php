@extends('layouts.master')

@section('title', 'Login Customer')

@section('style')
<style>
    /* === RESET & BASE === */
    .login-page {
        background: linear-gradient(120deg, #4e54c8 0%, #fdfdff 100%);
        min-height: 100vh;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    /* === BACKGROUND ANIMATION === */
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

    .circle:nth-child(1) {
        width: 80px;
        height: 80px;
        top: 10%;
        left: 20%;
        animation-delay: 0s;
    }

    .circle:nth-child(2) {
        width: 120px;
        height: 120px;
        top: 70%;
        left: 70%;
        animation-delay: 2s;
    }

    .circle:nth-child(3) {
        width: 60px;
        height: 60px;
        top: 40%;
        left: 80%;
        animation-delay: 4s;
    }

    .circle:nth-child(4) {
        width: 100px;
        height: 100px;
        top: 80%;
        left: 10%;
        animation-delay: 6s;
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0) rotate(0deg);
            opacity: 0.7;
        }
        50% {
            transform: translateY(-30px) rotate(180deg);
            opacity: 0.3;
        }
    }

    /* === MAIN CONTAINER === */
    .login-wrapper {
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
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* === LEFT SIDE - ILLUSTRATION === */
    .login-illustration {
        flex: 1;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 60px 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .person-container {
        position: relative;
        width: 200px;
        height: 250px;
        margin-bottom: 30px;
    }

    .person {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }

    /* Person - Head */
    .person-head {
        width: 60px;
        height: 60px;
        background: #ffd89b;
        border-radius: 50%;
        margin: 0 auto 5px;
        animation: nod 2s ease-in-out infinite;
        position: relative;
    }

    .person-eyes {
        display: flex;
        gap: 12px;
        justify-content: center;
        margin-top: 20px;
    }

    .eye {
        width: 8px;
        height: 8px;
        background: #333;
        border-radius: 50%;
        animation: blink 3s infinite;
    }

    @keyframes blink {
        0%, 96%, 100% {
            transform: scaleY(1);
        }
        98% {
            transform: scaleY(0.1);
        }
    }

    .person-smile {
        width: 20px;
        height: 10px;
        border: 2px solid #333;
        border-top: none;
        border-radius: 0 0 20px 20px;
        position: absolute;
        bottom: 12px;
        left: 50%;
        transform: translateX(-50%);
    }

    /* Person - Body */
    .person-body {
        width: 80px;
        height: 100px;
        background: #fff;
        border-radius: 40px 40px 0 0;
        margin: 0 auto;
        position: relative;
    }

    .person-arms {
        position: absolute;
        width: 120px;
        top: 20px;
        left: -20px;
    }

    .arm {
        width: 35px;
        height: 12px;
        background: #ffd89b;
        border-radius: 10px;
        position: absolute;
    }

    .arm-left {
        left: 0;
        transform-origin: right center;
        animation: typeLeft 1.5s ease-in-out infinite;
    }

    .arm-right {
        right: 0;
        transform-origin: left center;
        animation: typeRight 1.5s ease-in-out infinite;
    }

    @keyframes typeLeft {
        0%, 100% {
            transform: rotate(-20deg);
        }
        50% {
            transform: rotate(-35deg);
        }
    }

    @keyframes typeRight {
        0%, 100% {
            transform: rotate(20deg);
        }
        50% {
            transform: rotate(35deg);
        }
    }

    @keyframes nod {
        0%, 100% {
            transform: rotate(0);
        }
        50% {
            transform: rotate(-3deg);
        }
    }

    /* Laptop */
    .laptop {
        width: 100px;
        height: 60px;
        background: #34495e;
        border-radius: 5px 5px 0 0;
        margin-top: 10px;
    }

    .laptop-screen {
        width: 90px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 3px;
        margin: 5px auto;
        overflow: hidden;
    }

    .code-line {
        height: 3px;
        background: rgba(255, 255, 255, 0.6);
        margin: 5px 8px;
        border-radius: 2px;
        animation: typing 2s ease-in-out infinite;
    }

    .code-line:nth-child(1) {
        width: 60%;
        animation-delay: 0s;
    }

    .code-line:nth-child(2) {
        width: 80%;
        animation-delay: 0.5s;
    }

    .code-line:nth-child(3) {
        width: 70%;
        animation-delay: 1s;
    }

    @keyframes typing {
        0%, 100% {
            opacity: 0.3;
        }
        50% {
            opacity: 1;
        }
    }

    .welcome-text {
        text-align: center;
        color: white;
    }

    .welcome-text h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    .welcome-text p {
        font-size: 16px;
        opacity: 0.9;
    }

    /* === RIGHT SIDE - FORM === */
    .login-form-container {
        flex: 1;
        padding: 60px 50px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .form-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .login-logo {
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

    .login-logo i {
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
        font-size: 15px;
    }

    /* Form Elements */
    .form-group {
        margin-bottom: 25px;
    }

    .form-label {
        display: block;
        color: #4e54c8;
        font-weight: 600;
        margin-bottom: 6px;
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
    }

    .form-input {
        width: 100%;
        padding: 14px 20px 14px 45px;
        border: 2px solid #e1e8ed;
        border-radius: 12px;
        font-size: 15px;
        transition: all 0.3s;
        background: #f8f9fa;
    }

    .form-input:focus {
        border-color: #4e54c8;
        box-shadow: 0 0 0 2px rgba(78, 84, 200, 0.15);
        outline: none;
    }

    .btn-login {
        width: 100%;
        padding: 14px;
        background: linear-gradient(90deg, #4e54c8, #8f94fb);
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
    }

    .btn-login span {
        position: relative;
        z-index: 1;
    }

    .btn-login:hover {
        background: linear-gradient(90deg, #8f94fb, #4e54c8);
        box-shadow: 0 6px 18px rgba(78, 84, 200, 0.18);
    }

    .btn-login:active {
        transform: translateY(2px);
    }

    /* Register Link */
    .register-link {
        text-align: center;
        margin-top: 25px;
        color: #666;
        font-size: 14px;
    }

    .register-link a {
        color: #4e54c8;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s;
    }

    .register-link a:hover {
        color: #764ba2;
        text-decoration: underline;
    }

    /* Alert */
    .alert {
        padding: 12px 20px;
        border-radius: 10px;
        margin-bottom: 20px;
        text-align: center;
        animation: shake 0.5s;
    }

    .alert-danger {
        background: #fee;
        border: 1px solid #fcc;
        color: #c33;
    }

    @keyframes shake {
        0%, 100% {
            transform: translateX(0);
        }
        25% {
            transform: translateX(-10px);
        }
        75% {
            transform: translateX(10px);
        }
    }

    .text-danger {
        color: #c33;
        font-size: 0.875rem;
        margin-top: 0.25rem;
        display: block;
    }

    .mt-1 {
        margin-top: 0.25rem;
    }

    .mt-3 {
        margin-top: 1rem;
    }

    .mb-3 {
        margin-bottom: 1rem;
    }

    .back-home {
        text-align: center;
        margin-top: 1rem;
        
    }

    .back-link {
        color: #ffffff;
        text-decoration: none;
        font-weight: 500;
        
    }

    .back-link:hover {
        text-decoration: underline;
    }

    /* === RESPONSIVE === */
    @media (max-width: 768px) {
        .login-wrapper {
            flex-direction: column;
            margin: 20px 0;
        }

        .login-illustration {
            padding: 40px 20px;
        }

        .login-form-container {
            padding: 40px 30px;
        }

        .person-container {
            transform: scale(0.8);
        }

        .welcome-text h2 {
            font-size: 24px;
        }

        .welcome-text p {
            font-size: 14px;
        }
    }

    @media (max-width: 480px) {
        .login-page {
            padding: 10px;
        }

        .login-form-container {
            padding: 30px 20px;
        }

        .form-header h3 {
            font-size: 24px;
        }
    }
</style>
@endsection

@section('content')
<div class="login-page">
    <!-- Background Animation -->
    <div class="bg-animation">
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
        <div class="circle"></div>
    </div>

    <!-- Main Login Container -->
    <div class="login-wrapper">
        <!-- Left Illustration -->
        <div class="login-illustration">
            <div class="person-container">
                <div class="person">
                    <div class="person-head">
                        <div class="person-eyes">
                            <div class="eye"></div>
                            <div class="eye"></div>
                        </div>
                        <div class="person-smile"></div>
                    </div>
                    <div class="person-body">
                        <div class="person-arms">
                            <div class="arm arm-left"></div>
                            <div class="arm arm-right"></div>
                        </div>
                    </div>
                </div>
                <div class="laptop">
                    <div class="laptop-screen">
                        <div class="code-line"></div>
                        <div class="code-line"></div>
                        <div class="code-line"></div>
                    </div>
                </div>
            </div>
            <div class="welcome-text">
                <h2>Selamat Datang Kembali!</h2>
                <p>Masuk untuk melanjutkan perjalanan Anda</p>
            </div>
        </div>

        <!-- Right Form -->
        <div class="login-form-container">
            <div class="form-header">
                <div class="login-logo">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h3>Login Customer</h3>
                <p>Masukkan kredensial Anda untuk melanjutkan</p>
            </div>

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                {{-- Alert error umum --}}
                @if ($errors->any())
                    <div class="alert alert-danger mb-3">
                        <ul style="margin: 0; padding-left: 1.2rem;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Input Email --}}
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-wrapper">
                        <input 
                            type="email" 
                            name="email" 
                            id="email" 
                            class="form-input @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            placeholder="customer@example.com" 
                            required 
                            autofocus
                        >
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                    @error('email')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Input Password --}}
                <div class="form-group">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-wrapper">
                        <input 
                            type="password" 
                            name="password" 
                            id="password" 
                            class="form-input @error('password') is-invalid @enderror"
                            placeholder="Masukkan password" 
                            required
                        >
                        <i class="fas fa-lock input-icon"></i>
                    </div>
                    @error('password')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Tombol Login --}}
                <button type="submit" class="btn-login">
                    <span><i class="fas fa-sign-in-alt"></i> Masuk Sekarang</span>
                </button>
            </form>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar Sekarang</a>
            </div>
            <div class="back-home mt-3">
                <a href="{{ url('/') }}" class="back-link">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- Tambahkan script tambahan jika diperlukan -->
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
    });
</script>
@endsection