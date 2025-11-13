<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0d6efd;
            --secondary-color: #6c757d;
            --accent-color: #FFD700;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f5f7fa;
        }
        
        .navbar-brand {
            font-weight: 700;
        }
        
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }
        
        .product-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
        
        .product-img-container {
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
            padding: 15px;
            overflow: hidden;
        }
        
        .product-img {
            max-height: 100%;
            max-width: 100%;
            object-fit: contain;
        }
        
        .badge-best-seller {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--accent-color);
            color: black;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 4px;
            z-index: 1;
        }
        
        .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .card-title {
            font-size: 1.1rem;
            line-height: 1.4;
            height: 3rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        .card-text {
            flex: 1;
            min-height: 3rem;
            margin-bottom: 1rem;
        }
        
        .price {
            font-weight: 700;
            color: #000000;
            font-size: 1rem;
        }
        
        .discount {
            text-decoration: line-through;
            color: var(--secondary-color);
            font-size: 0.9rem;
        }
        
        .rating {
            color: #ffc107;
            margin-bottom: 1rem;
        }
        
        .btn-cart {
            background-color: var(--accent-color);
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            color: black;
            width: 100%;
            margin-top: auto;
        }
        
        .btn-cart:hover {
            background-color: #e6c200;
            color: black;
        }
        
        .section-title {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 30px;
            font-weight: 700;
        }
        
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 4px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }
        
        .category-filter {
            margin-bottom: 30px;
        }
        
        .category-btn {
            border-radius: 20px;
            margin: 0 5px;
            padding: 8px 20px;
            font-weight: 500;
        }
        
        .category-btn.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        footer {
            background-color: #212529;
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: 4rem;
        }
        
        .footer-heading {
            font-weight: 600;
            margin-bottom: 1rem;
            font-size: 1.1rem;
        }
        
        .social-icons a {
            color: white;
            font-size: 1.2rem;
            margin-right: 15px;
            transition: color 0.3s;
        }
        
        .social-icons a:hover {
            color: var(--primary-color);
        }
        
        .newsletter-form {
            display: flex;
            margin-top: 10px;
        }
        
        .newsletter-input {
            border-radius: 4px 0 0 4px;
            border: none;
            padding: 10px;
            flex-grow: 1;
        }
        
        .newsletter-btn {
            border-radius: 0 4px 4px 0;
            border: none;
            background-color: var(--primary-color);
            color: white;
            padding: 0 15px;
        }

        /* Menambahkan kelas untuk memastikan konsistensi tinggi card */
        .card-content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .price-container {
            margin-top: auto;
        }
    </style>
</head>
<body>
    

    <!-- Main Content -->
    <div class="container">
        <!-- Best Seller Products -->
        <section class="mb-5">
            <h2 class="section-title">Produk Best Seller</h2>
            <div class="row g-4">
                <!-- Product 1 -->
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card product-card w-100">
                        <div class="position-relative">
                            <span class="badge-best-seller">Best Seller</span>
                            <div class="product-img-container">
                                <img src="{{ asset('assets/customer/images/laptop.jpg') }}" class="product-img" alt="Smartphone X1">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-content-wrapper">
                                <h5 class="card-title">Smartphone X1 Pro</h5>
                                <p class="card-text text-muted small">Layar 6.7", RAM 8GB, Kamera 108MP</p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-muted ms-1">(4.5)</span>
                                </div>
                                <div class="price-container">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="price">Rp 5.999.000</span>
                                        <span class="discount">Rp 6.499.000</span>
                                    </div>
                                    <button class="btn btn-primary w-100">
                                        <i class="fas fa-cart-plus me-1"></i> Tambah ke Keranjang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card product-card w-100">
                        <div class="position-relative">
                            <span class="badge-best-seller">Best Seller</span>
                            <div class="product-img-container">
                                <img src="{{ asset('assets/customer/images/laptop.jpg') }}" class="product-img" alt="Laptop Ultra">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-content-wrapper">
                                <h5 class="card-title">Laptop Ultra Pro 15 dengan Spesifikasi Tinggi</h5>
                                <p class="card-text text-muted small">Intel i7, 16GB RAM, SSD 512GB, GPU Dedicated</p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span class="text-muted ms-1">(5.0)</span>
                                </div>
                                <div class="price-container">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="price">Rp 14.999.000</span>
                                        <span class="discount">Rp 16.999.000</span>
                                    </div>
                                    <button class="btn btn-primary w-100">
                                        <i class="fas fa-cart-plus me-1"></i> Tambah ke Keranjang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card product-card w-100">
                        <div class="position-relative">
                            <span class="badge-best-seller">Best Seller</span>
                            <div class="product-img-container">
                                <img src="{{ asset('assets/customer/images/laptop.jpg') }}" class="product-img" alt="Wireless Earbuds">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-content-wrapper">
                                <h5 class="card-title">Wireless Earbuds Pro</h5>
                                <p class="card-text text-muted small">Noise Cancelling, Baterai 30 jam, Koneksi Bluetooth 5.2</p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                    <span class="text-muted ms-1">(4.0)</span>
                                </div>
                                <div class="price-container">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="price">Rp 1.499.000</span>
                                        <span class="discount">Rp 1.799.000</span>
                                    </div>
                                    <button class="btn btn-primary w-100">
                                        <i class="fas fa-cart-plus me-1"></i> Tambah ke Keranjang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="col-md-6 col-lg-3 d-flex">
                    <div class="card product-card w-100">
                        <div class="position-relative">
                            <span class="badge-best-seller">Best Seller</span>
                            <div class="product-img-container">
                                <img src="{{ asset('assets/customer/images/laptop.jpg') }}" class="product-img" alt="Smart Watch">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-content-wrapper">
                                <h5 class="card-title">Smart Watch Series 5 dengan Fitur Kesehatan Lengkap</h5>
                                <p class="card-text text-muted small">Layar AMOLED, GPS, Monitor Kesehatan, Tahan Air</p>
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                    <span class="text-muted ms-1">(4.5)</span>
                                </div>
                                <div class="price-container">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <span class="price">Rp 2.999.000</span>
                                        <span class="discount">Rp 3.499.000</span>
                                    </div>
                                    <button class="btn btn-primary w-100">
                                        <i class="fas fa-cart-plus me-1"></i> Tambah ke Keranjang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Simple JavaScript for category filter buttons
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('.category-btn');
            
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => btn.classList.remove('active'));
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    
                    // In a real application, you would filter products here
                    // based on the selected category
                });
            });
        });
    </script>
</body>
</html>