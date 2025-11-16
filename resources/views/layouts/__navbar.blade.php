<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ultra Modern Navbar - Stabil & Rapi</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #FFD700;
            --primary-dark: #e6c200;
            --dark: #0a0a0a;
            --dark-light: #1a1a1a;
            --light: #ffffff;
            --gray: #fafafa;
            --gray-light: #f5f5f5;
            --text: #1a1a1a;
            --text-light: #6b7280;
            --border: #f0f0f0;
            --shadow: 0 4px 12px rgba(0,0,0,0.05);
            --shadow-lg: 0 10px 30px rgba(0,0,0,0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            --transition-fast: all 0.2s ease;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Inter', 'Segoe UI', sans-serif;
            background: var(--gray);
            color: var(--text);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
        }

        /* Top Contact Bar */
        .top-bar {
            background: var(--dark);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }

        .top-content {
            max-width: 1440px;
            margin: 0 auto;
            padding: 10px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .contact-info {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .contact-info a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-size: 13px;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
            font-weight: 500;
        }

        .contact-info a:hover {
            color: var(--primary);
        }

        .social-links {
            display: flex;
            gap: 12px;
        }

        .social-links a {
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: var(--transition);
            font-size: 14px;
            background: rgba(255,255,255,0.05);
            color: rgba(255,255,255,0.7);
        }

        .social-links a:hover {
            background: rgba(255,215,0,0.15);
            color: var(--primary);
            transform: translateY(-2px);
        }

        /* Main Navbar */
        .navbar {
            background: rgba(255,255,255,0.95);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            position: sticky;
            top: 0;
            z-index: 1000;
            transition: var(--transition);
            box-shadow: var(--shadow);
        }

        .navbar.scrolled {
            background: rgba(255,255,255,0.98);
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
        }

        .nav-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 16px 32px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 24px;
        }

        /* Logo */
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: var(--transition);
            flex-shrink: 0;
        }

        .brand:hover {
            transform: scale(1.02);
        }

        .brand-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--primary) 0%, #ffed4e 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            color: var(--dark);
            box-shadow: 0 4px 12px rgba(255,215,0,0.3);
        }

        .brand-text {
            font-size: 24px;
            font-weight: 700;
            color: var(--text);
            letter-spacing: -0.5px;
        }

        /* Search */
        .search-container {
            display: flex;
            flex: 1;
            max-width: 600px;
            margin: 0 24px;
        }
        
        .search-box {
            width: 100%;
            max-width: 900px;
            display: flex;
            align-items: center;
            position: relative;
            background: var(--light);
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        .search-box:focus-within {
            box-shadow: 0 0 0 3px rgba(255,215,0,0.2);
            border-color: var(--primary);
        }

        .categories-dropdown {
            position: relative;
            padding: 14px 20px;
            background: var(--dark);
            color: var(--light);
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
            transition: var(--transition);
            min-width: 160px;
            flex-shrink: 0;
        }

        .categories-dropdown:hover {
            background: var(--dark-light);
        }

        .categories-dropdown span {
            margin-right: 8px;
        }

        .categories-dropdown i {
            font-size: 12px;
            transition: var(--transition);
        }

        .categories-dropdown.active i {
            transform: rotate(180deg);
        }

        .categories-menu {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            background: var(--light);
            border-radius: 12px;
            box-shadow: var(--shadow-lg);
            padding: 8px 0;
            margin-top: 8px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: var(--transition);
            z-index: 100;
            border: 1px solid var(--border);
        }

        .categories-dropdown.active .categories-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .categories-menu a {
            display: block;
            padding: 12px 20px;
            color: var(--text);
            text-decoration: none;
            font-size: 14px;
            transition: var(--transition);
        }

        .categories-menu a:hover {
            background: var(--gray-light);
            color: var(--dark);
        }

        .search-box input {
            flex: 1;
            padding: 18px 70px 18px 24px; /* lebih besar & lebih mewah */
            border: 2px solid var(--border);
            border-left: none;
            border-radius: 0 20px 20px 0; /* border lebih smooth */
            font-size: 16px;
            outline: none;
            transition: all 0.3s;
            background: var(--gray);
            color: var(--text);
            min-width: 600px;
        }

        .search-box input:focus {
            background: var(--light);
        }

        .search-box input::placeholder {
            color: var(--text-light);
        }

        .search-btn {
            position: absolute;
            right: 6px;
            top: 50%;
            transform: translateY(-50%);
            width: 44px;
            height: 44px;
            border: none;
            background: var(--dark);
            color: var(--light);
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }

        .search-btn:hover {
            background: var(--primary);
            color: var(--dark);
            transform: translateY(-50%) scale(1.05);
        }

        /* Actions */
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-shrink: 0;
        }

        .action-btn {
            width: 48px;
            height: 48px;
            border: none;
            background: var(--gray);
            border-radius: 12px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: var(--text);
            transition: var(--transition);
            position: relative;
        }

        .action-btn:hover {
            background: var(--dark);
            color: var(--light);
            transform: translateY(-2px);
        }

        .badge {
            position: absolute;
            top: 6px;
            right: 6px;
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%);
            color: white;
            font-size: 10px;
            font-weight: 700;
            min-width: 18px;
            height: 18px;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 5px;
            box-shadow: 0 2px 8px rgba(238,90,111,0.4);
        }

        .menu-btn {
            display: none;
        }

        /* Navigation Menu */
        .nav-menu-wrapper {
            background: var(--light);
            border-bottom: 1px solid var(--border);
            transition: var(--transition);
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
        }

        .nav-menu-container {
            max-width: 1440px;
            margin: 0 auto;
            padding: 0 32px;
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 4px;
            padding: 8px 0;
        }

        .nav-menu a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 24px;
            color: var(--text);
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
            border-radius: 10px;
            transition: var(--transition);
            letter-spacing: -0.2px;
            position: relative;
        }

        .nav-menu a i {
            font-size: 16px;
            opacity: 0.7;
        }

        .nav-menu a:hover {
            background: var(--gray-light);
            color: var(--text);
        }

        .nav-menu a.active {
            background: var(--dark);
            color: var(--light);
        }

        .nav-menu a.active i {
            opacity: 1;
        }

        .nav-menu a.active::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 50%;
            transform: translateX(-50%);
            width: 6px;
            height: 6px;
            background: var(--primary);
            border-radius: 50%;
        }

        /* Hero Section */
        .hero {
            max-width: 1440px;
            margin: 0 auto;
            padding: 120px 32px;
            text-align: center;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 8px 20px;
            background: linear-gradient(135deg, rgba(255,215,0,0.1) 0%, rgba(255,237,78,0.1) 100%);
            border: 1px solid rgba(255,215,0,0.3);
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            color: var(--text);
            margin-bottom: 24px;
        }

        .hero h1 {
            font-size: 64px;
            font-weight: 800;
            color: var(--text);
            margin-bottom: 24px;
            line-height: 1.1;
            letter-spacing: -2px;
        }

        .hero p {
            font-size: 20px;
            color: var(--text-light);
            margin-bottom: 40px;
            line-height: 1.7;
        }

        .cta-group {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            background: var(--dark);
            color: var(--light);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            transition: var(--transition);
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.15);
            background: var(--dark-light);
        }

        .btn-secondary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 16px 32px;
            background: var(--gray);
            color: var(--text);
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            transition: var(--transition);
        }

        .btn-secondary:hover {
            background: var(--gray-light);
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .nav-container {
                gap: 16px;
            }
            
            .search-container {
                max-width: 500px;
            }

            .hero h1 {
                font-size: 48px;
            }
        }

        @media (max-width: 768px) {
            .top-content {
                padding: 10px 20px;
                flex-direction: column;
                gap: 12px;
            }

            .contact-info {
                flex-direction: column;
                gap: 12px;
                text-align: center;
            }

            .nav-container {
                flex-wrap: wrap;
                padding: 16px 20px;
                gap: 16px;
            }
            
            .brand {
                order: 1;
            }
            
            .nav-actions {
                order: 2;
            }
            
            .search-container {
                order: 3;
                margin: 0;
                max-width: 100%;
                flex: 0 0 100%;
            }

            .categories-dropdown {
                min-width: 120px;
                padding: 12px 16px;
                font-size: 13px;
            }

            .menu-btn {
                display: flex;
            }

            .nav-menu-wrapper {
                display: none;
            }

            .nav-menu-wrapper.active {
                display: block;
            }

            .nav-menu {
                flex-direction: column;
                gap: 4px;
                padding: 16px 0;
            }

            .nav-menu a {
                padding: 14px 20px;
            }

            .hero {
                padding: 80px 20px;
            }

            .hero h1 {
                font-size: 36px;
                letter-spacing: -1px;
            }

            .hero p {
                font-size: 18px;
            }

            .cta-group {
                flex-direction: column;
            }

            .btn-primary,
            .btn-secondary {
                width: 100%;
                justify-content: center;
            }
        }

        @media (max-width: 480px) {
            .brand-text {
                font-size: 20px;
            }

            .brand-icon {
                width: 40px;
                height: 40px;
                font-size: 18px;
            }

            .categories-dropdown {
                min-width: 100px;
                padding: 10px 12px;
                font-size: 12px;
            }

            .hero h1 {
                font-size: 32px;
            }
        }
    </style>
</head>
<body>
    <!-- Top Bar -->
    <div class="top-bar">
        <div class="top-content">
            <div class="contact-info">
                <a href="mailto:info@example.com">
                    <i class="fas fa-envelope"></i>
                    info@example.com
                </a>
                <a href="https://wa.me/6281234567890">
                    <i class="fab fa-whatsapp"></i>
                    +62 812-3456-7890
                </a>
            </div>
            <div class="social-links">
                <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
    </div>

    <!-- Main Navbar -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#" class="brand">
                <div class="brand-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <span class="brand-text">BrandName</span>
            </a>

            <div class="search-container">
                <div class="search-box">
                    <div class="categories-dropdown" id="categoriesDropdown">
                        <span>All Categories</span>
                        <i class="fas fa-chevron-down"></i>
                        <div class="categories-menu">
                            <a href="#">Electronics</a>
                            <a href="#">Fashion</a>
                            <a href="#">Home & Garden</a>
                            <a href="#">Beauty & Health</a>
                            <a href="#">Sports</a>
                            <a href="#">Books</a>
                            <a href="#">Toys & Games</a>
                        </div>
                    </div>
                    <input type="text" placeholder="Search products, categories...">
                    <button class="search-btn">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>

            <div class="nav-actions">
                <button class="action-btn" aria-label="Shopping Cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge">3</span>
                </button>
                <button class="action-btn" aria-label="User Account">
                    <i class="fas fa-user"></i>
                </button>
                <button class="action-btn menu-btn" onclick="toggleMenu()" aria-label="Menu">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Navigation Menu -->
    <div class="nav-menu-wrapper" id="navMenu">
        <div class="nav-menu-container">
            <ul class="nav-menu">
                <li><a href="#" class="active"><i class="fas fa-home"></i>Home</a></li>
                <li><a href="#"><i class="fas fa-info-circle"></i>About</a></li>
                <li><a href="#"><i class="fas fa-box"></i>Products</a></li>
                <li><a href="#"><i class="fas fa-tags"></i>Price List</a></li>
                <li><a href="#"><i class="fas fa-phone"></i>Contact</a></li>
            </ul>
        </div>
    </div>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-sparkles"></i>
                New Collection 2024
            </div>
            <h1>Modern Shopping Experience</h1>
            <p>Discover premium quality products with elegant design. Shop with confidence and enjoy exclusive deals on our curated collection.</p>
            <div class="cta-group">
                <a href="#" class="btn-primary">
                    Explore Collection
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="#" class="btn-secondary">
                    <i class="fas fa-play-circle"></i>
                    Watch Video
                </a>
            </div>
        </div>
    </section>

    <script>
        function toggleMenu() {
            const menu = document.getElementById('navMenu');
            menu.classList.toggle('active');
        }

        // Categories dropdown functionality
        const categoriesDropdown = document.getElementById('categoriesDropdown');
        
        categoriesDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            this.classList.toggle('active');
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function() {
            categoriesDropdown.classList.remove('active');
        });

        // Close menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('navMenu');
            const menuBtn = document.querySelector('.menu-btn');
            
            if (!menu.contains(event.target) && !menuBtn.contains(event.target)) {
                menu.classList.remove('active');
            }
        });

        // Active link handling
        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelectorAll('.nav-menu a').forEach(a => a.classList.remove('active'));
                this.classList.add('active');
                
                if (window.innerWidth <= 768) {
                    document.getElementById('navMenu').classList.remove('active');
                }
            });
        });

        // Navbar scroll effect
        const navbar = document.getElementById('navbar');
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>