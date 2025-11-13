@extends('layouts.master')

    <style>
        .product-image {
            max-height: 500px;
            object-fit: cover;
        }
        .badge-discount {
            font-size: 0.8rem;
        }
        .price-original {
            text-decoration: line-through;
            color: #6c757d;
        }
        .rating i {
            color: #ffc107;
        }
        .product-actions .btn {
            border-radius: 25px;
        }
        .specs-table td {
            padding: 8px 0;
        }
        .specs-table tr:not(:last-child) {
            border-bottom: 1px solid #e9ecef;
        }
        
        /* Gaya untuk ikon kuning */
        .icon-yellow {
            color: #ffc107 !important;
        }
        
        /* Gaya untuk tombol wishlist aktif */
        .btn-wishlist.active {
            color: #ffc107;
            border-color: #ffc107;
        }
        
        /* Gaya untuk ikon tambahan */
        .feature-icon {
            color: #ffc107;
            font-size: 1.2rem;
        }
        
        /* Gaya untuk layout gambar baru */
        .product-images-container {
            display: flex;
            flex-direction: row-reverse; /* Membalik urutan agar thumbnail di kiri */
        }
        .thumbnail-container {
            display: flex;
            flex-direction: column;
            margin-right: 15px;
        }
        .thumbnail {
            width: 80px;
            height: 80px;
            object-fit: cover;
            margin-bottom: 10px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: border-color 0.3s;
        }
        .thumbnail.active {
            border-color: #007bff;
        }
        .main-image-container {
            flex: 1;
        }
    </style>

<body>
    <!-- Product Detail Section -->
    <div class="container my-5 ">
        <div class="row">
            <!-- Product Images -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="product-images-container">
                            <!-- Container untuk gambar utama -->
                            <div class="main-image-container text-center">
                                <img id="mainImage" src="{{ asset('assets/customer/images/laptop.jpg') }}" 
                                     alt="Samsung Galaxy S23 Ultra" class="img-fluid product-image mb-3">
                            </div>
                            
                            <!-- Container untuk thumbnail di sebelah kiri -->
                            <div class="thumbnail-container">
                                <img src="{{ asset('assets/customer/images/wifi.jpg') }}" 
                                     alt="Thumbnail 1" class="thumbnail active" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/wifi.jpg') }}')">
                                <img src="{{ asset('assets/customer/images/cctv.jpg') }}" 
                                     alt="Thumbnail 2" class="thumbnail" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/cctv.jpg') }}')">
                                <img src="{{ asset('assets/customer/images/mentor1.jpeg') }}" 
                                     alt="Thumbnail 3" class="thumbnail" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/mentor1.jpeg') }}')">
                                <img src="{{ asset('assets/customer/images/mentor2.jpeg') }}" 
                                     alt="Thumbnail 4" class="thumbnail" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/mentor2.jpeg') }}')">
                                <img src="{{ asset('assets/customer/images/laptop.jpg') }}" 
                                     alt="Thumbnail 4" class="thumbnail" 
                                     onclick="changeImage(this, '{{ asset('assets/customer/images/laptop.jpg') }}')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="h3"><i class=" "></i>Samsung Galaxy S23 Ultra 5G</h1>
                        <!-- Price -->
                        <div class="mb-3">
                            <span class="h4 text-primary"><i class=""></i>Rp 15.999.000</span>
                            <span class="price-original ms-2">Rp 18.999.000</span>
                            <span class="badge bg-danger badge-discount ms-2">16%</span>
                        </div>
                        <!-- Description -->
                        <p class="mb-4">
                            <i class=""></i>Samsung Galaxy S23 Ultra adalah smartphone flagship dengan kamera 200MP, 
                            chipset Snapdragon 8 Gen 2, dan S Pen terintegrasi. Layar Dynamic AMOLED 2X 6.8" 
                            dengan refresh rate 120Hz memberikan pengalaman visual yang luar biasa.
                        </p>
                        
                        <!-- Variants -->
                        <div class="mb-2">
                            <h6 class="mb-2"><i class=""></i>Warna: Hitam</h6>
                             <h6 class="mb-2"><i class=""></i>Storage: 256 GB</h6>
                        </div>
                        
                        <!-- Action Buttons -->
                        <div class="product-actions">
                            <button class="btn btn-warning btn-lg me-2 mt-1">
                                <i class="fas fa-shopping-cart me-1 txt-dark"></i> Tambah ke Keranjang
                            </button>
                            <button class="btn btn-outline-warning btn-lg btn-wishlist" id="wishlistBtn" onclick="toggleWishlist()">
                                <i class="fas fa-heart me-1"></i> Wishlist
                            </button>
                        </div>
                        
                        <!-- Additional Info -->
                        <div class="mt-4 pt-3 border-top">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-shipping-fast feature-icon me-2"></i>
                                        <small>Gratis Pengiriman</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-undo-alt feature-icon me-2"></i>
                                        <small>Pengembalian 30 Hari</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-shield-alt feature-icon me-2"></i>
                                        <small>Garansi 2 Tahun</small>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="fas fa-credit-card feature-icon me-2"></i>
                                        <small>Cicilan 0%</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to change the main image when a thumbnail is clicked
        function changeImage(element, newImageSrc) {
            // Update the main image
            document.getElementById('mainImage').src = newImageSrc;
            
            // Remove active class from all thumbnails
            const thumbnails = document.querySelectorAll('.thumbnail');
            thumbnails.forEach(thumbnail => {
                thumbnail.classList.remove('active');
            });
            
            // Add active class to the clicked thumbnail
            element.classList.add('active');
        }
        
        // Function to increase quantity
        function increaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue < 15) {
                quantityInput.value = currentValue + 1;
            }
        }
        
        // Function to decrease quantity
        function decreaseQuantity() {
            const quantityInput = document.getElementById('quantity');
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }
        
        // Function to toggle wishlist
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
    </script>
</body>