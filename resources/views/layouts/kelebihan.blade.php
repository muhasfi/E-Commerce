<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelebihan Toko Kami</title>
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Font Awesome untuk icon -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"> -->
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: #333;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #FFD700, #FFA500);
        }
        .feature-card {
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #FFD700; /* Warna kuning */
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        .card-text {
            color: #666;
            line-height: 1.6;
        }
        .card-body {
            padding: 2rem 1.5rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="section-title">Kenapa harus membeli di Barcom? </h2>
        
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h5 class="card-title">Pengiriman Cepat</h5>
                        <p class="card-text">
                            Kami menyediakan layanan pengiriman cepat ke seluruh Indonesia. 
                            Pesanan Anda akan sampai dalam waktu 1-3 hari kerja.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5 class="card-title">Garansi 100%</h5>
                        <p class="card-text">
                            Semua produk kami dilengkapi dengan garansi 100% kepuasan. 
                            Jika tidak puas, Anda dapat mengembalikan produk dengan mudah.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5 class="card-title">Layanan 24/7</h5>
                        <p class="card-text">
                            Tim customer service kami siap membantu Anda 24 jam sehari, 
                            7 hari seminggu melalui chat, telepon, atau email.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h5 class="card-title">Harga Terjangkau</h5>
                        <p class="card-text">
                            Kami menawarkan produk berkualitas dengan harga yang kompetitif 
                            dan terjangkau untuk semua kalangan.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h5 class="card-title">Kualitas Terjamin</h5>
                        <p class="card-text">
                            Semua produk kami melalui proses quality control yang ketat 
                            untuk memastikan kualitas terbaik untuk pelanggan.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h5 class="card-title">Pembayaran Aman</h5>
                        <p class="card-text">
                            Sistem pembayaran kami terjamin keamanannya dengan enkripsi 
                            terbaru untuk melindungi data pribadi Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>