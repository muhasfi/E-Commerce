<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami - Toko Elektronik</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-x: hidden;
            background-color: #1a1a2e;
            color: #333;
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
            background: 
                linear-gradient(rgba(255, 215, 0, 0.1), rgba(255, 215, 0, 0.2)),
                url('https://images.unsplash.com/photo-1550009158-9ebf69173e03?ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }
        
        .smoke-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255, 215, 0, 0.15) 0%, rgba(255, 215, 0, 0.05) 100%);
            z-index: 2;
        }
        
        .content-container {
            position: relative;
            z-index: 3;
            padding: 3rem 0;
        }
        
        .about-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        
        .store-image {
            height: 100%;
            background: url('https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') center/cover;
            border-radius: 0 15px 15px 0;
            min-height: 400px;
        }
        
        .about-content {
            padding: 3rem;
        }
        
        .section-title {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 10px;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background: #ffc107;
            border-radius: 2px;
        }
        
        .feature-list {
            list-style: none;
            padding-left: 0;
        }
        
        .feature-list li {
            margin-bottom: 10px;
            padding-left: 30px;
            position: relative;
        }
        
        .feature-list li:before {
            content: '\f058';
            font-family: 'Font Awesome 5 Free';
            font-weight: 900;
            color: #ffc107;
            position: absolute;
            left: 0;
        }
        
        /* Animasi Bubble */
        .bubbles {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 2;
            overflow: hidden;
            top: 0;
            left: 0;
        }
        
        .bubble {
            position: absolute;
            bottom: -100px;
            width: 40px;
            height: 40px;
            background: rgba(255, 215, 0, 0.1);
            border-radius: 50%;
            opacity: 0.5;
            animation: rise 10s infinite ease-in;
        }
        
        .bubble:nth-child(1) {
            width: 40px;
            height: 40px;
            left: 10%;
            animation-duration: 8s;
        }
        
        .bubble:nth-child(2) {
            width: 20px;
            height: 20px;
            left: 20%;
            animation-duration: 5s;
            animation-delay: 1s;
        }
        
        .bubble:nth-child(3) {
            width: 50px;
            height: 50px;
            left: 35%;
            animation-duration: 7s;
            animation-delay: 2s;
        }
        
        .bubble:nth-child(4) {
            width: 80px;
            height: 80px;
            left: 50%;
            animation-duration: 11s;
            animation-delay: 0s;
        }
        
        .bubble:nth-child(5) {
            width: 35px;
            height: 35px;
            left: 55%;
            animation-duration: 6s;
            animation-delay: 1s;
        }
        
        .bubble:nth-child(6) {
            width: 45px;
            height: 45px;
            left: 65%;
            animation-duration: 8s;
            animation-delay: 3s;
        }
        
        .bubble:nth-child(7) {
            width: 25px;
            height: 25px;
            left: 75%;
            animation-duration: 7s;
            animation-delay: 2s;
        }
        
        .bubble:nth-child(8) {
            width: 80px;
            height: 80px;
            left: 80%;
            animation-duration: 6s;
            animation-delay: 1s;
        }
        
        .bubble:nth-child(9) {
            width: 15px;
            height: 15px;
            left: 70%;
            animation-duration: 9s;
            animation-delay: 0s;
        }
        
        .bubble:nth-child(10) {
            width: 50px;
            height: 50px;
            left: 85%;
            animation-duration: 5s;
            animation-delay: 3s;
        }
        
        @keyframes rise {
            0% {
                bottom: -100px;
                transform: translateX(0);
            }
            50% {
                transform: translate(100px, -100px);
            }
            100% {
                bottom: 1080px;
                transform: translateX(-200px);
            }
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .store-image {
                border-radius: 0 0 15px 15px;
                min-height: 300px;
            }
            
            .about-content {
                padding: 2rem;
            }
        }
    </style>
</head>
<body>
    <section class="hero-section">
        <!-- Background dengan gambar elektronik -->
        <div class="background-container"></div>
        
        <!-- Efek smoke kuning -->
        <div class="smoke-overlay"></div>
        
        <!-- Animasi bubble -->
        <div class="bubbles">
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
            <div class="bubble"></div>
        </div>
        
        <!-- Konten utama -->
        <div class="container content-container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="about-card">
                        <div class="row g-0">
                            <div class="col-lg-7">
                                <div class="about-content">
                                    <h2 class="section-title">Tentang Kami</h2>
                                    <p class="lead">Selamat datang di <strong>TechHub Elektronik</strong>, destinasi terpercaya untuk semua kebutuhan elektronik Anda sejak 2010.</p>
                                    <p>Kami berkomitmen untuk menyediakan produk elektronik berkualitas tinggi dengan harga yang kompetitif. Dengan pengalaman lebih dari satu dekade, kami telah melayani ribuan pelanggan dengan produk-produk terbaik dari merek ternama.</p>
                                    
                                    <h5 class="mt-4 mb-3">Mengapa Memilih Kami?</h5>
                                    <ul class="feature-list">
                                        <li>Produk berkualitas dengan garansi resmi</li>
                                        <li>Layanan purna jual yang terpercaya</li>
                                        <li>Staf profesional dan berpengalaman</li>
                                        <li>Harga kompetitif dan promo menarik</li>
                                        <li>Kemudahan pembelian online dan offline</li>
                                    </ul>
                                    
                                    <div class="row mt-4">
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="bg-warning rounded-circle p-3 me-3">
                                                    <i class="fas fa-shield-alt fa-2x text-white"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Garansi Resmi</h6>
                                                    <small>Semua produk bergaransi resmi</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-3">
                                                <div class="bg-warning rounded-circle p-3 me-3">
                                                    <i class="fas fa-shipping-fast fa-2x text-white"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">Gratis Pengiriman</h6>
                                                    <small>Untuk pembelian di atas Rp 1.000.000</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <button class="btn btn-warning btn-lg px-4">
                                            <i class="fas fa-store me-2"></i>Kunjungi Toko Kami
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 d-none d-lg-block">
                                <div class="store-image"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>