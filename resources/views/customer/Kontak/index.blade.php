<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hubungi Kami - Perusahaan Teknologi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary-color: #1a1a2e;
            --secondary-color: #ffd700;
            --accent-color: #ff6b6b;
            --text-light: #f8f9fa;
            --text-dark: #333;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--primary-color);
            color: var(--text-light);
            overflow-x: hidden;
            min-height: 100vh;
        }
        
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            overflow: hidden;
        }
        
        .background-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }
        
        .laptop-bg {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 80%;
            max-width: 900px;
            height: 60%;
            background-image: url('https://images.unsplash.com/photo-1593640408182-31c70c8268f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80');
            background-size: cover;
            background-position: center;
            border-radius: 20px;
            box-shadow: 0 0 50px rgba(255, 215, 0, 0.3);
            z-index: 2;
        }
        
        .smoke-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: 
                radial-gradient(circle at 20% 50%, rgba(255, 215, 0, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 215, 0, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(255, 215, 0, 0.1) 0%, transparent 50%);
            animation: smokeAnimation 15s infinite alternate;
            z-index: 3;
        }
        
        @keyframes smokeAnimation {
            0% {
                background-position: 0% 0%;
            }
            100% {
                background-position: 100% 100%;
            }
        }
        
        .content-container {
            position: relative;
            z-index: 10;
            width: 100%;
        }
        
        .contact-card {
            background: rgba(26, 26, 46, 0.85);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            border: 1px solid rgba(255, 215, 0, 0.2);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.1) 0%, rgba(255, 107, 107, 0.1) 100%);
            border-bottom: 1px solid rgba(255, 215, 0, 0.3);
            padding: 2rem;
        }
        
        .form-control {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 215, 0, 0.3);
            color: var(--text-light);
            padding: 12px 15px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: var(--secondary-color);
            box-shadow: 0 0 0 0.25rem rgba(255, 215, 0, 0.25);
            color: var(--text-light);
        }
        
        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }
        
        .form-label {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .btn-gold {
            background: linear-gradient(135deg, var(--secondary-color), #ffed4e);
            color: var(--primary-color);
            border: none;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .btn-gold:hover {
            background: linear-gradient(135deg, #ffed4e, var(--secondary-color));
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.4);
        }
        
        .contact-info {
            padding: 2rem;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            margin-top: 2rem;
        }
        
        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .info-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--secondary-color);
            font-size: 1.2rem;
        }
        
        .floating-element {
            position: absolute;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
            z-index: 4;
        }
        
        .floating-element:nth-child(1) {
            width: 80px;
            height: 80px;
            top: 10%;
            left: 5%;
            animation-delay: 0s;
        }
        
        .floating-element:nth-child(2) {
            width: 120px;
            height: 120px;
            top: 70%;
            left: 10%;
            animation-delay: 2s;
        }
        
        .floating-element:nth-child(3) {
            width: 60px;
            height: 60px;
            top: 20%;
            right: 10%;
            animation-delay: 4s;
        }
        
        .floating-element:nth-child(4) {
            width: 100px;
            height: 100px;
            top: 60%;
            right: 5%;
            animation-delay: 1s;
        }
        
        @keyframes float {
            0% {
                transform: translateY(0) rotate(0deg);
            }
            50% {
                transform: translateY(-20px) rotate(10deg);
            }
            100% {
                transform: translateY(0) rotate(0deg);
            }
        }
        
        .section-title {
            color: var(--secondary-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            display: inline-block;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 50px;
            height: 3px;
            background: var(--secondary-color);
            border-radius: 3px;
        }
        
        /* PERBAIKAN: Menambahkan style untuk ikon kuning */
        .text-gold {
            color: var(--secondary-color) !important;
        }
        
        /* Style untuk input group agar lebih konsisten */
        .input-group-text {
            border: 1px solid rgba(255, 215, 0, 0.3) !important;
            border-right: none !important;
            background-color: rgba(255, 255, 255, 0.05) !important;
            color: var(--secondary-color) !important;
        }
        
        .border-start-0 {
            border-left: none !important;
        }
        
        @media (max-width: 768px) {
            .laptop-bg {
                width: 95%;
                height: 50%;
            }
            
            .floating-element {
                display: none;
            }
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <!-- Background Elements -->
        <div class="background-container">
            <div class="laptop-bg"></div>
            <div class="smoke-overlay"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
            <div class="floating-element"></div>
        </div>
        
        <!-- Main Content -->
        <div class="container content-container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-8 col-md-10">
                    <div class="contact-card">
                        <div class="card-header text-center">
                            <h1 class="section-title">Hubungi Kami</h1>
                            <p class="mb-0">Tim profesional kami siap membantu mewujudkan solusi teknologi untuk bisnis Anda</p>
                        </div>
                        
                        <div class="card-body p-4 p-md-5">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent border-end-0">
                                                <i class="fas fa-user text-gold"></i>
                                            </span>
                                            <input type="text" class="form-control border-start-0" id="name" placeholder="Masukkan nama lengkap Anda" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12 mb-4">
                                        <label for="email" class="form-label">Alamat Email</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent border-end-0">
                                                <i class="fas fa-envelope text-gold"></i>
                                            </span>
                                            <input type="email" class="form-control border-start-0" id="email" placeholder="nama@contoh.com" required>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mb-4">
                                        <label for="message" class="form-label">Pesan</label>
                                        <div class="input-group">
                                            <span class="input-group-text bg-transparent border-end-0 align-items-start pt-3">
                                                <i class="fas fa-comment text-gold"></i>
                                            </span>
                                            <textarea class="form-control border-start-0" id="message" rows="5" placeholder="Jelaskan kebutuhan atau pertanyaan Anda..." required></textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <button type="submit" class="btn btn-gold">
                                            <i class="fas fa-paper-plane me-2"></i> Kirim Pesan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Form Validation Script -->
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Validasi sederhana
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;
            
            if (name && email && message) {
                // Simulasi pengiriman form
                alert('Terima kasih! Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.');
                document.getElementById('contactForm').reset();
            } else {
                alert('Harap lengkapi semua field yang diperlukan.');
            }
        });
        
        // Efek tambahan untuk input
        const inputs = document.querySelectorAll('.form-control');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                if (this.value === '') {
                    this.parentElement.classList.remove('focused');
                }
            });
        });
    </script>
</body>
</html>