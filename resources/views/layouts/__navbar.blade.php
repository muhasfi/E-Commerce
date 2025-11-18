<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paham Pajak - Modern Navbar</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
    
    <style>
        :root {
            --primary: #f59e0b;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary: #64748b;
            --accent: #f59e0b;
            --success: #10b981;
            --danger: #ef4444;
            --purple: #8b5cf6;
            --pink: #ec4899;
            --teal: #14b8a6;
            --background: rgba(255, 255, 255, 0.95);
            --text: #1e293b;
            --text-light: #ffffff;
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            --radius: 12px;
            --transition: all 0.3s ease;
            --nav-height: 80px;
            --mobile-nav-height: 70px;
        }

        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
            line-height: 1.6;
            color: var(--text);
            background: #f8fafc;
            padding-top: var(--nav-height);
        }

        /* Header & Navigation */
        header {
            background: #ffffff;
            box-shadow: var(--shadow);
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        /* Padding untuk body agar konten tidak tertutup header */
        body {
            padding-top: var(--nav-height);
        }

        .nav-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: var(--nav-height);
            position: relative;
            background: #ffffff;
        }

        /* Logo Modern & Elegan */
        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            transition: transform 0.2s ease;
            line-height: 1;
            position: relative;
            z-index: 1002;
            background: #ffffff;
            padding: 4px 8px 4px 0;
        }

        .logo:hover {
            transform: translateY(-1px);
        }

        .logo-icon {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: var(--text-light);
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            box-shadow: 0 4px 8px rgba(59, 130, 246, 0.2);
        }

        .logo-text {
            display: flex;
            flex-direction: column;
            line-height: 1.2;
        }

        .logo-main {
            font-size: 1.5rem;
            font-weight: 800;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            letter-spacing: -0.5px;
        }

        .logo-sub {
            font-size: 0.75rem;
            font-weight: 500;
            color: var(--secondary);
            letter-spacing: 0.5px;
        }

        /* Navigation Menu */
        .nav-menu {
            display: flex;
            list-style: none;
            align-items: center;
            gap: 4px;
            /* MODIFIKASI: Menambahkan properti untuk menyelaraskan menu dengan logo */
            height: 100%;
        }

        .nav-item {
            position: relative;
            /* MODIFIKASI: Menambahkan properti untuk menyelaraskan menu dengan logo */
            display: flex;
            align-items: center;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            text-decoration: none;
            color: #000000;
            font-weight: 500;
            transition: var(--transition);
            border-radius: var(--radius);
            white-space: nowrap;
            position: relative;
            overflow: hidden;
            font-size: 0.95rem;
            /* MODIFIKASI: Menambahkan properti untuk menyelaraskan menu dengan logo */
            height: fit-content;
        }

        /* Efek hover orange untuk menu utama */
        .nav-link:hover {
            background-color: #f59e0b;
            color: white;
        }

        .login-btn {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            text-decoration: none;
            color: var(--text-light) !important;
            font-weight: 600;
            transition: var(--transition);
            border-radius: var(--radius);
            white-space: nowrap;
            background: #f5b444f5;
            box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
            /* MODIFIKASI: Menambahkan properti untuk menyelaraskan menu dengan logo */
            height: fit-content;
        }

        .login-btn:hover {
            background: #f59e0b;
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(7, 8, 8, 0.3);
        }

        .logout-item {
            color: var(--danger) !important;
        }

        .logout-item:hover {
            background: #fee2e2 !important;
            color: var(--danger) !important;
        }

        .logout-item i {
            background: var(--danger) !important;
        }

        .nav-link.active {
            color: var(--primary);
            background: #eff6ff;
        }

        .nav-link i,
        .login-btn i {
            margin-right: 8px;
            font-size: 1.05rem;
            width: 18px;
            text-align: center;
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            flex-direction: column;
            justify-content: space-between;
            width: 32px;
            height: 24px;
            cursor: pointer;
            position: relative;
            z-index: 1001;
            background: none;
            border: none;
            padding: 0;
        }

        .mobile-menu-btn span {
            display: block;
            height: 2.5px;
            width: 100%;
            background: #000000;
            border-radius: 3px;
            transition: var(--transition);
            transform-origin: center;
        }

        .mobile-menu-btn.active span:nth-child(1) {
            transform: translateY(10.5px) rotate(45deg);
        }

        .mobile-menu-btn.active span:nth-child(2) {
            opacity: 0;
            transform: scaleX(0);
        }

        .mobile-menu-btn.active span:nth-child(3) {
            transform: translateY(-10.5px) rotate(-45deg);
        }

        /* Sidebar Overlay */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
            z-index: 998;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            body {
                padding-top: var(--mobile-nav-height);
            }

            .mobile-menu-btn {
                display: flex;
            }

            .nav-menu {
                position: fixed;
                top: var(--mobile-nav-height);
                left: 0;
                width: 340px;
                max-width: 85vw;
                height: calc(100vh - var(--mobile-nav-height));
                background: white;
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
                transform: translateX(-100%);
                transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                overflow-y: auto;
                overflow-x: hidden;
                z-index: 999;
                box-shadow: 0 0 40px rgba(0, 0, 0, 0.1);
                gap: 2px;
            }

            .nav-menu.active {
                transform: translateX(0);
            }

            .nav-item {
                width: 100%;
                margin-bottom: 0;
            }

            .nav-link {
                width: 100%;
                justify-content: flex-start;
                padding: 14px 16px;
                border-radius: 10px;
                font-size: 0.95rem;
                color: #000000;
                gap: 0;
            }

            .login-btn {
                width: 100%;
                color: var(--text-light) !important;
                justify-content: center;
                margin-top: 0;
                padding: 14px 20px;
                border-radius: 10px;
                font-size: 0.95rem;
            }

            .nav-container {
                padding: 0 20px;
                height: var(--mobile-nav-height);
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 60px;
            }

            .nav-container {
                padding: 0 16px;
                height: 60px;
            }

            .logo-icon {
                width: 36px;
                height: 36px;
                font-size: 0.9rem;
            }

            .nav-menu {
                width: 300px;
                max-width: 80vw;
                padding: 16px;
                top: 60px;
                height: calc(100vh - 60px);
            }

            .logo-main {
                font-size: 1.3rem;
            }

            .mobile-menu-btn {
                width: 28px;
                height: 20px;
            }

            .mobile-menu-btn span {
                height: 2px;
            }

            .mobile-menu-btn.active span:nth-child(1) {
                transform: translateY(9px) rotate(45deg);
            }

            .mobile-menu-btn.active span:nth-child(3) {
                transform: translateY(-9px) rotate(-45deg);
            }

            .nav-link {
                padding: 12px 14px;
                font-size: 0.9rem;
            }

            .login-btn {
                padding: 12px 18px;
                font-size: 0.9rem;
                margin-top: 12px;
            }
        }

        @media (max-width: 480px) {
            body {
                padding-top: 56px;
            }

            .nav-container {
                padding: 0 12px;
                height: 56px;
            }

            .logo-icon {
                width: 32px;
                height: 32px;
                font-size: 0.85rem;
                margin-right: 10px;
            }

            .logo-main {
                font-size: 1.2rem;
            }

            .nav-menu {
                width: 280px;
                padding: 14px;
                top: 56px;
                height: calc(100vh - 56px);
            }

            .nav-link {
                padding: 11px 12px;
                font-size: 0.875rem;
            }

            .nav-link i,
            .login-btn i {
                font-size: 0.95rem;
                width: 16px;
            }

            .login-btn {
                padding: 11px 16px;
                font-size: 0.875rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="nav-container">
            <a href="/" class="logo">
                <div class="logo-icon">
                    <i class="fas fa-calculator"></i>
                </div>
                <div class="logo-text">
                    <span class="logo-main">Paham Pajak</span>
                </div>
            </a>

            <ul class="nav-menu">
                <!-- Menu Home -->
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        <i class=""></i> Home
                    </a>
                </li>

                <!-- Menu Produk -->
                <li class="nav-item">
                    <a href="/kategori-produk" class="nav-link">
                        <i class=""></i> Produk
                    </a>
                </li>

                <!-- Menu Tentang Kami -->
                <li class="nav-item">
                    <a href="/tentang" class="nav-link">
                        <i class=""></i> Tentang Kami
                    </a>
                </li>

                <!-- Menu Hubungi Kami -->
                <li class="nav-item">
                    <a href="/hubungi-kami" class="nav-link">
                        <i class=""></i> Hubungi Kami
                    </a>
                </li>

                <!-- Profil / Login -->
                <li class="nav-item">
                @guest
                    <a href="{{ route('login') }}" class="login-btn">
                        <i class="fas fa-right-to-bracket"></i> Login
                    </a>
                @endguest
                @auth
                    <a href="{{ route('profile.index') }}" class="nav-link">
                        <i class="fas fa-user-circle"></i> Profile
                    </a>
                @endauth
                </li>
            </ul>

            <button class="mobile-menu-btn" aria-label="Toggle Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileBtn = document.querySelector('.mobile-menu-btn');
            const navMenu = document.querySelector('.nav-menu');
            const sidebarOverlay = document.querySelector('.sidebar-overlay');

            // Toggle mobile menu
            mobileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                this.classList.toggle('active');
                navMenu.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');
            });

            // Close menu when clicking on overlay
            sidebarOverlay.addEventListener('click', function() {
                mobileBtn.classList.remove('active');
                navMenu.classList.remove('active');
                this.classList.remove('active');
            });

            // Handle resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 1024) {
                    mobileBtn.classList.remove('active');
                    navMenu.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                }
            });
        });
    </script>
</body>
</html>