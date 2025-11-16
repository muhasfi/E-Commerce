@extends('layouts.master')

<style>
    :root {
        --primary-color:  #FFA500;
        --secondary-color: #fbbf24;
        --danger-color: #ef4444;
        --success-color: #10b981;
        --text-dark: #1f2937;
        --text-gray: #6b7280;
        --border-color: #e5e7eb;
    }

    .breadcrumb-nav {
        background: #f9fafb;
        padding: 1rem 0;
        margin-bottom: 2rem;
    }

    .breadcrumb-nav .breadcrumb {
        margin: 0;
        background: transparent;
    }

    .product-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        z-index: 10;
    } */

    /* .product-badge .badge {
        padding: 0.5rem 0.75rem;
        font-size: 0.875rem;
        font-weight: 600;
        margin-right: 0.5rem;
    }

    /* Image Gallery Styles - MODIFIED */
    .product-images-container {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .main-image-container {
        background: #f9fafb;
        border-radius: 12px;
        padding: 2rem;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 400px; /* Fixed height to match product info card */
    }

    .main-image-container img {
        max-height: 100%;
        width: auto;
        max-width: 100%;
        object-fit: contain;
        border-radius: 8px;
    }

    .thumbnail-container {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .thumbnail {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: all 0.3s ease;
    }

    .thumbnail:hover {
        border-color: var(--primary-color);
        transform: scale(1.05);
    }

    .thumbnail.active {
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    /* Product Info Styles */
    .product-category {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-color);
        font-weight: 500;
        font-size: 0.875rem;
        margin-bottom: 0.5rem;
    }

    .product-brand {
        display: inline-block;
        background:   #FFA500;
        padding: 0.25rem 0.75rem;
        border-radius: 6px;
        font-size: 0.875rem;
        color:   #3b3b3a;
        margin-bottom: 1rem;
    }

    .product-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1rem;
        line-height: 1.3;
    }

 
    .price-container {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 0.75rem;
    }

    .current-price {
        font-size: 2rem;
        font-weight: 700;
        color:   #0a0a0aff;
    }

    .original-price {
        text-decoration: line-through;
        color: var(--text-gray);
        font-size: 1.25rem;
    }

    .discount-badge {
        display: inline-block;
        background: var(--danger-color);
        color: white;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .savings-text {
        color: var(--success-color);
        font-size: 0.875rem;
        font-weight: 600;
        margin-top: 0.5rem;
    }

 
    
    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
    }

    .btn-primary-custom {
        flex: 1;
        padding: 1rem;
        background: var(--primary-color);
        color: white;
        border: none;
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .btn-primary-custom:hover {
        /* background: #1d4ed8; */
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(37, 99, 235, 0.3);
    }

    .btn-secondary-custom {
        flex: 1;
        padding: 1rem;
        background: white;
        color: var(--primary-color);
        border: 2px solid var(--primary-color);
        border-radius: 10px;
        font-weight: 600;
        font-size: 1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

   
    .btn-wishlist {
        width: 50px;
        height: 50px;
        background: white;
        border: 2px solid var(--border-color);
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        color: var(--text-gray);
    }

    .btn-wishlist:hover {
        border-color: #ef4444;
        color: #ef4444;
    }

    .btn-wishlist.active {
        background: #fef2f2;
        border-color: #ef4444;
        color: #ef4444;
    }

    /* Features Section */
    .features-section {
        background: #f9fafb;
        padding: 1.5rem;
        border-radius: 12px;
        margin-top: 1.5rem;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1rem;
    }

    .feature-item {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .feature-icon {
        width: 40px;
        height: 40px;
        background: white;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--primary-color);
        font-size: 1.1rem;
    }

    .feature-text {
        flex: 1;
    }

    .feature-text strong {
        display: block;
        color: var(--text-dark);
        font-size: 0.875rem;
        margin-bottom: 0.125rem;
    }

    .feature-text small {
        color: var(--text-gray);
        font-size: 0.75rem;
    }

    /* Description Section (Modified to be always visible) */
    .description-section {
        margin-top: 2rem;
        padding: 2rem 0;
        border-top: 1px solid var(--border-color);
    }

    .description-header {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        margin-bottom: 1.5rem;
    }

    .description-icon {
        width: 40px;
        height: 40px;
        background: #FFA500;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.1rem;
    }

    .description-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin: 0;
    }

    .description-content {
        background: #f9fafb;
        border-radius: 12px;
        padding: 2rem;
    }

    .description-content h5 {
        color: var(--text-dark);
        margin-bottom: 1rem;
        font-weight: 600;
    }

    .description-content h6 {
        color: var(--text-dark);
        margin: 1.5rem 0 0.75rem;
        font-weight: 600;
    }

    .description-content p {
        color: var(--text-gray);
        line-height: 1.7;
        margin-bottom: 1rem;
    }

    /* Related Products Section */
    .related-products-section {
        margin-top: 3rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 1.5rem;
        position: relative;
        padding-bottom: 0.5rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 3px;
        background: var(--primary-color);
        border-radius: 2px;
    }

    .product-card {
        border: none;
        border-radius: 12px;
        overflow: hidden;
        transition: all 0.3s ease;
        height: 100%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .product-card-img {
        height: 200px;
        object-fit: cover;
        width: 100%;
        background: #f9fafb;
        padding: 1rem;
    }

    .product-card-body {
        padding: 1.25rem;
    }

    .product-card-title {
        font-size: 1rem;
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.5rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-card-price {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--primary-color);
        margin-bottom: 0.25rem;
    }

    .product-card-original-price {
        text-decoration: line-through;
        color: var(--text-gray);
        font-size: 0.875rem;
    }

    .product-card-discount {
        display: inline-block;
        background: var(--danger-color);
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 4px;
        font-size: 0.75rem;
        font-weight: 600;
        margin-left: 0.5rem;
    }

    .product-card-rating {
        display: flex;
        align-items: center;
        gap: 0.25rem;
        margin-bottom: 0.75rem;
    }

    .product-card-rating .stars {
        font-size: 0.875rem;
    }

    .product-card-rating-text {
        color: var(--text-gray);
        font-size: 0.75rem;
    }

    .product-card-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 10;
    }

    .product-card-badge .badge {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* Reviews Section with Consistent Photo Sizes */
    .reviews-section {
        margin-top: 2rem;
    }

    .review-card {
        border: 1px solid var(--border-color);
        border-radius: 12px;
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 1rem;
    }

    .reviewer-info {
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .reviewer-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        object-fit: cover;
    }

    .reviewer-name {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 0.25rem;
    }

    .review-date {
        color: var(--text-gray);
        font-size: 0.875rem;
    }

    .review-rating {
        display: flex;
        align-items: center;
        gap: 0.25rem;
    }

    .review-rating .stars {
        font-size: 1rem;
    }

    .review-content {
        color: var(--text-dark);
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    .review-photos {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 0.75rem;
        margin-top: 1rem;
    }

    .review-photo {
        width: 100%;
        height: 120px;
        object-fit: cover;
        border-radius: 8px;
        cursor: pointer;
        transition: transform 0.3s ease;
    }

    .review-photo:hover {
        transform: scale(1.05);
    }

    @media (max-width: 768px) {
        .product-images-container {
            flex-direction: column;
        }

        .thumbnail-container {
            flex-direction: row;
            width: 100%;
            overflow-x: auto;
        }

        .action-buttons {
            flex-direction: column;
        }

        .feature-grid {
            grid-template-columns: 1fr;
        }

        .review-photos {
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        }

        .review-photo {
            height: 100px;
        }
    }
</style>

<body>
    <!-- Breadcrumb Navigation -->
    <div class="breadcrumb-nav">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Elektronik</a></li>
                    <li class="breadcrumb-item"><a href="#">Smartphone</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Samsung Galaxy S23 Ultra 5G</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Product Detail Section -->
    <div class="container my-5">
        <div class="row">
            <!-- Product Images - MODIFIED LAYOUT -->
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-3">
                        <div class="product-images-container mt-1">
                            <!-- Main Image Container -->
                            <div class="main-image-container">
                                <img id="mainImage" src="{{ asset('assets/customer/images/laptop.jpg') }}" 
                                     alt="Samsung Galaxy S23 Ultra" class="img-fluid">
                            </div>
                            
                            <!-- Thumbnail Container - NOW BELOW MAIN IMAGE -->
                            <div class="thumbnail-container">
                                <img src="{{ asset('assets/customer/images/laptop.jpg') }}" 
                                     alt="Thumbnail 1" class="thumbnail active" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/laptop.jpg') }}')">
                                <img src="{{ asset('assets/customer/images/wifi.jpg') }}" 
                                     alt="Thumbnail 2" class="thumbnail" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/wifi.jpg') }}')">
                                <img src="{{ asset('assets/customer/images/cctv.jpg') }}" 
                                     alt="Thumbnail 3" class="thumbnail" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/cctv.jpg') }}')">
                                <img src="{{ asset('assets/customer/images/laptop.jpg') }}" 
                                     alt="Thumbnail 4" class="thumbnail" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/laptop.jpg') }}')">
                                <img src="{{ asset('assets/customer/images/wifi.jpg') }}" 
                                     alt="Thumbnail 5" class="thumbnail" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/wifi.jpg') }}')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body p-2">
                        <!-- Category & Brand -->
                        <div class="product-category">
                            <i class="fas fa-folder"></i>
                            <span>Elektronik > Smartphone > Samsung</span>
                        </div>
                        <span class="product-brand">
                            <i class="fas fa-shield-alt"></i> Official Samsung Store
                        </span>

                        <!-- Product Title -->
                        <h1 class="product-title">Samsung Galaxy S23 Ultra 5G</h1>
                        
                      
                        <!-- Price Section -->
                        <div class="price-section">
                            <div class="price-container">
                                <span class="current-price">Rp 15.999.000</span>
                                <span class="original-price">Rp 18.999.000</span>
                                <span class="discount-badge">16% OFF</span>
                            </div>

                        </div>
                        <!-- Action Buttons -->
                        <div class="action-buttons mt-3">
                            <button class="btn-primary-custom">
                                <i class="fas fa-shopping-cart"></i>
                                Tambah ke Keranjang
                            </button>
                        
                        </div>
                        
                        <!-- Features Section -->
                        <div class="features-section">
                            <div class="feature-grid">
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-shipping-fast"></i>
                                    </div>
                                    <div class="feature-text">
                                        <strong>Gratis Ongkir</strong>
                                        <small>Untuk pembelian pertama</small>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-undo-alt"></i>
                                    </div>
                                    <div class="feature-text">
                                        <strong>Pengembalian Mudah</strong>
                                        <small>Dalam 30 hari</small>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-shield-alt"></i>
                                    </div>
                                    <div class="feature-text">
                                        <strong>Garansi Resmi</strong>
                                        <small>2 tahun dari Samsung</small>
                                    </div>
                                </div>
                                <div class="feature-item">
                                    <div class="feature-icon">
                                        <i class="fas fa-credit-card"></i>
                                    </div>
                                    <div class="feature-text">
                                        <strong>Cicilan 0%</strong>
                                        <small>Hingga 12 bulan</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Description Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <div class="description-section">
                            <div class="description-header">
                                <div class="description-icon">
                                    <i class="fas fa-align-left"></i>
                                </div>
                                <h3 class="description-title">Deskripsi Detail Produk</h3>
                            </div>
                            
                            <div class="description-content">
                                <h5>Tentang Produk</h5>
                                <p>Samsung Galaxy S23 Ultra adalah smartphone flagship terbaru dari Samsung yang menghadirkan inovasi teknologi terdepan untuk pengalaman pengguna yang luar biasa.</p>
                                
                                <h6>Kamera Revolusioner 200MP</h6>
                                <p>Dilengkapi dengan sensor kamera utama 200MP yang menghasilkan foto dengan detail yang sangat tajam. Sistem quad camera memungkinkan Anda mengambil foto dengan berbagai perspektif, dari ultra-wide hingga telephoto 10x optical zoom.</p>
                                
                                <h6>Performa Maksimal</h6>
                                <p>Ditenagai oleh chipset Snapdragon 8 Gen 2 yang dirancang khusus untuk Galaxy, memberikan performa gaming dan multitasking yang sangat smooth. RAM 12GB memastikan semua aplikasi berjalan lancar.</p>
                                
                                <h6>S Pen Terintegrasi</h6>
                                <p>S Pen yang sudah terintegrasi dalam bodi memberikan pengalaman menulis dan menggambar yang natural. Sempurna untuk produktivitas dan kreativitas.</p>
                                
                                <h6>Layar Premium</h6>
                                <p>Layar Dynamic AMOLED 2X 6.8 inci dengan refresh rate 120Hz adaptif memberikan pengalaman visual yang memukau dengan warna yang akurat dan tajam.</p>
                                
                                <h6>Baterai Tahan Lama</h6>
                                <p>Baterai 5000mAh dengan dukungan fast charging 45W dan wireless charging 15W memastikan perangkat tetap aktif sepanjang hari.</p>
                                
                                <h6>Spesifikasi Lengkap</h6>
                                <ul>
                                    <li>Layar: 6.8" Dynamic AMOLED 2X, 120Hz</li>
                                    <li>Chipset: Snapdragon 8 Gen 2 for Galaxy</li>
                                    <li>RAM: 12GB</li>
                                    <li>Storage: 256GB/512GB/1TB</li>
                                    <li>Kamera: 200MP (utama) + 12MP (ultrawide) + 10MP (tele 3x) + 10MP (tele 10x)</li>
                                    <li>Baterai: 5000mAh</li>
                                    <li>OS: Android 13 dengan One UI 5.1</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Change main image when thumbnail is clicked
        function changeImage(element, newImageSrc) {
            document.getElementById('mainImage').src = newImageSrc;
            
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumbnail => {
                thumbnail.classList.remove('active');
            });
            
            element.classList.add('active');
        }
        
        // Select variant option
        function selectVariant(element) {
            const siblings = element.parentElement.querySelectorAll('.variant-option');
            siblings.forEach(sibling => {
                sibling.classList.remove('active');
            });
            element.classList.add('active');
        }
        
        // Increase quantity
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue < 15) {
                quantityInput.value = currentValue + 1;
            }
        }
        
        // Decrease quantity
        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
        
        // Toggle wishlist
        function toggleWishlist() {
            const wishlistBtn = document.getElementById('wishlistBtn');
            const heartIcon = wishlistBtn.querySelector('i');
            
            if (wishlistBtn.classList.contains('active')) {
                wishlistBtn.classList.remove('active');
                heartIcon.classList.remove('fas');
                heartIcon.classList.add('far');
            } else {
                wishlistBtn.classList.add('active');
                heartIcon.classList.remove('far');
                heartIcon.classList.add('fas');
            }
        }
        
        // Add smooth scroll animation
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Image zoom on hover (optional enhancement)
        const mainImage = document.getElementById('mainImage');
        mainImage.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.1)';
            this.style.transition = 'transform 0.3s ease';
        });
        
        mainImage.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    </script>
</body>