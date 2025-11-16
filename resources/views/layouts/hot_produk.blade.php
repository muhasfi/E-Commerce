<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore - Premium Electronics</title>
    <!-- Bootstrap 5 CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- Font Awesome -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
    <!-- Google Fonts -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"> -->
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-dark: #1e40af;
            --secondary-color: #10b981;
            --accent-color: #f59e0b;
            --accent-hover: #d97706;
            --light-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-primary: #0f172a;
            --text-secondary: #64748b;
            --border-color: #e2e8f0;
            --success-color: #10b981;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        }
        
        body {
            background-color: var(--light-bg);
            color: var(--text-primary);
            line-height: 1.6;
        }

        /* Navigation */
        .navbar {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: var(--shadow-sm);
            padding: 1rem 0;
            border-bottom: 1px solid var(--border-color);
        }
        
        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary-color);
            letter-spacing: -0.5px;
        }

        .navbar-brand i {
            margin-right: 8px;
        }

        .nav-link {
            font-weight: 500;
            color: var(--text-primary);
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .nav-link:hover {
            color: var(--primary-color);
            background-color: rgba(37, 99, 235, 0.05);
        }

        .nav-link.active {
            color: var(--primary-color);
            background-color: rgba(37, 99, 235, 0.1);
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: var(--accent-color);
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Hero Section */
        .hero-section {
            background: var(--gradient);
            color: white;
            padding: 4rem 0;
            margin-bottom: 3rem;
            position: relative;
            overflow: hidden;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="1"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
            opacity: 0.3;
        }

        .hero-content {
            position: relative;
            z-index: 1;
        }

        .hero-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
            letter-spacing: -1px;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            opacity: 0.95;
            font-weight: 400;
            margin-bottom: 2rem;
        }

        .btn-hero {
            background: rgba(255, 255, 255, 0.2);
            border: 2px solid rgba(255, 255, 255, 0.3);
            color: white;
            padding: 12px 30px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .btn-hero:hover {
            background: rgba(255, 255, 255, 0.3);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
            color: white;
        }

        /* Section Title */
        .section-header {
            margin-bottom: 3rem;
            text-align: center;
        }

        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 0.5rem;
            letter-spacing: -0.5px;
        }

        .section-subtitle {
            color: var(--text-secondary);
            font-size: 1.1rem;
            font-weight: 400;
        }

        /* Product Cards - Menggunakan model dari kode kedua */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }

        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            height: 100%;
            display: flex;
            flex-direction: column;
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: var(--shadow-xl);
        }
        
        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--secondary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
            z-index: 2;
        }

        .product-image {
            height: 220px;
            background: linear-gradient(135deg, #f5f7fa 0%, #e2e8f0 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.5s ease;
            padding: 1rem;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.1);
        }
        
        .product-actions {
            position: absolute;
            bottom: 1rem;
            right: 1rem;
            display: flex;
            gap: 0.5rem;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s;
        }
        
        .product-card:hover .product-actions {
            opacity: 1;
            transform: translateY(0);
        }
        
        .action-btn {
            background: white;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            transition: all 0.3s;
        }
        
        .action-btn:hover {
            background: var(--primary-color);
            color: white;
            transform: scale(1.1);
        }
        
        .product-info {
            padding: 1.25rem;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .product-category {
            color: var(--primary-color);
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 700;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }
        
        .product-title {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 0.75rem;
            color: var(--text-primary);
            line-height: 1.4;
            height: 3rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
        
        .product-features {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 1rem;
            flex-wrap: wrap;
        }
        
        .feature-tag {
            background: #f1f5f9;
            padding: 0.25rem 0.5rem;
            border-radius: 5px;
            font-size: 0.75rem;
            color: #475569;
        }
        
        .rating {
            color: var(--accent-color);
            margin-bottom: 1rem;
            font-size: 0.9rem;
        }

        .rating i {
            margin-right: 2px;
        }

        .rating-text {
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--border-color);
            margin-top: auto;
        }
        
        .product-price {
            font-size: 1.4rem;
            font-weight: 800;
            color:  #0f0f0eff;
        }
        
        .discount {
            text-decoration: line-through;
            color: var(--text-secondary);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .add-to-cart {
            background:  #d97706;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .add-to-cart:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .add-to-cart:active {
            transform: translateY(0);
        }

        .add-to-cart i {
            margin-right: 8px;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: 5rem;
            border-top: 3px solid var(--primary-color);
        }
        
        .footer-heading {
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
            letter-spacing: -0.3px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
        }

        .footer-links li {
            margin-bottom: 0.75rem;
        }

        .footer-links a {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .footer-links a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-radius: 50%;
            margin-right: 10px;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        
        .social-icons a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin-top: 2rem;
            padding-top: 1.5rem;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .product-card {
            animation: fadeInUp 0.6s ease backwards;
        }

        .product-card:nth-child(1) { animation-delay: 0.1s; }
        .product-card:nth-child(2) { animation-delay: 0.2s; }
        .product-card:nth-child(3) { animation-delay: 0.3s; }
        .product-card:nth-child(4) { animation-delay: 0.4s; }

        /* Ripple effect */
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.6);
            transform: scale(0);
            animation: ripple 0.6s linear;
        }

        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2rem;
            }

            .hero-subtitle {
                font-size: 1rem;
            }

            .section-title {
                font-size: 1.5rem;
            }

            .product-image {
                height: 200px;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <div class="container">
        <!-- Best Seller Products -->
        <section class="mb-5">
            <div class="section-header">
                <h2 class="section-title">Produk Best Seller</h2>
            </div>
            
            <div class="products-grid">
                <!-- Product 1 -->
                <div class="product-card">
                    <div class="product-badge">Best Seller</div>
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400" alt="Smartphone X1">
                        <div class="product-actions">
                            <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                            <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Smartphone</div>
                        <h3 class="product-title">Smartphone X1 Pro</h3>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas a, est a
                            speriores ratione molestiae minima impedit laboriosam dolores, totam repellat voluptatem 
                            vero deserunt inventore beatae vitae culpa error esse illum.</p>
                        <div class="product-features">
                            <span class="feature-tag">Layar 6.7"</span>
                            <span class="feature-tag">RAM 8GB</span>
                            <span class="feature-tag">Kamera 108MP</span>
                        </div>
                        
                        <div class="product-footer">
                            <div>
                                <div class="product-price">Rp 5.999.000</div>
                                <div class="discount">Rp 6.499.000</div>
                            </div>
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="product-card">
                    <div class="product-badge">Best Seller</div>
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400" alt="Laptop Ultra">
                        <div class="product-actions">
                            <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                            <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Laptop</div>
                        <h3 class="product-title">Laptop Ultra Pro 15</h3>
                           <p class>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas a, est a
                            speriores ratione molestiae minima impedit laboriosam dolores, totam repellat voluptatem 
                            vero deserunt inventore beatae vitae culpa error esse illum.</p>
                        <div class="product-features">
                            <span class="feature-tag">Intel i7</span>
                            <span class="feature-tag">16GB RAM</span>
                            <span class="feature-tag">SSD 512GB</span>
                        </div>
                        
                        <div class="product-footer">
                            <div>
                                <div class="product-price">Rp 14.999.000</div>
                                <div class="discount">Rp 16.999.000</div>
                            </div>
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>Keranjang
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="product-card">
                    <div class="product-badge">Best Seller</div>
                    <div class="product-image">
                        <img src="https://images.unsplash.com/photo-1590658268037-6bf12165a8df?w=400" alt="Wireless Earbuds">
                        <div class="product-actions">
                            <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                            <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">Audio</div>
                        <h3 class="product-title">Wireless Earbuds Pro</h3>
                             <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quas a, est a
                            speriores ratione molestiae minima impedit laboriosam dolores, totam repellat voluptatem 
                            vero deserunt inventore beatae vitae culpa error esse illum.</p>
                        <div class="product-features">
                            <span class="feature-tag">Noise Cancelling</span>
                            <span class="feature-tag">Baterai 30 jam</span>
                            <span class="feature-tag">Bluetooth 5.2</span>
                        </div>
                     
                        <div class="product-footer">
                            <div>
                                <div class="product-price">Rp 1.499.000</div>
                                <div class="discount">Rp 1.799.000</div>
                            </div>
                            <button class="add-to-cart">
                                <i class="fas fa-shopping-cart"></i>Keranjang
                            </button>
                        </div>
                    </div>
                </div>
            
            </div>
        </section>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Smooth scroll animation
        document.addEventListener('DOMContentLoaded', function() {
            // Add to cart animation
            const cartButtons = document.querySelectorAll('.add-to-cart');
            
            cartButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    // Create ripple effect
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;
                    
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');
                    
                    this.appendChild(ripple);
                    
                    // Visual feedback
                    const originalText = this.innerHTML;
                    this.innerHTML = '<i class="fas fa-check me-2"></i>Ditambahkan!';
                    this.style.background = 'linear-gradient(135deg, var(--secondary-color), #059669)';
                    
                    setTimeout(() => {
                        this.innerHTML = originalText;
                        this.style.background = 'linear-gradient(135deg, var(--primary-color), var(--primary-dark))';
                        ripple.remove();
                    }, 2000);
                });
            });

            // Lazy loading images
            const images = document.querySelectorAll('.product-image img');
            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.style.opacity = '0';
                        img.style.transition = 'opacity 0.5s ease';
                        setTimeout(() => {
                            img.style.opacity = '1';
                        }, 100);
                        observer.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
        });
    </script>
</body>
</html>