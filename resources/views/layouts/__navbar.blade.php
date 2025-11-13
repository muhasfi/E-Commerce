<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paham Pajak - Modern Navbar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #2563eb;
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
        }

        .nav-item {
            position: relative;
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
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            box-shadow: 0 2px 4px rgba(37, 99, 235, 0.2);
        }

        .login-btn:hover {
            background: linear-gradient(135deg, var(--primary-dark), #1e40af);
            transform: translateY(-1px);
            box-shadow: 0 4px 8px rgba(37, 99, 235, 0.3);
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

        .nav-link:hover {
            background: #f1f5f9;
            color: var(--primary);
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

        /* Clean Dropdown Icons */
        .nav-link .dropdown-chevron {
            margin-left: 6px;
            font-size: 0.7rem;
            transition: transform 0.3s ease;
            color: #94a3b8;
        }

        .nav-item:hover .nav-link .dropdown-chevron {
            transform: rotate(180deg);
            color: var(--primary);
        }

        /* Dropdown Styles */
        .dropdown {
            position: absolute;
            top: calc(100% + 10px);
            left: 0;
            width: 100%;
            min-width: 280px;
            background: white;
            box-shadow: var(--shadow-lg);
            border-radius: var(--radius);
            opacity: 0;
            visibility: hidden;
            transform: translateY(12px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 999;
            padding: 12px 0;
            border: 1px solid #f1f5f9;
            pointer-events: none;
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            pointer-events: auto;
            transition-delay: 0.1s;
        }

        .dropdown:hover {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            pointer-events: auto;
        }

        .nav-item::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 20px;
            background: transparent;
            z-index: 998;
        }

        .dropdown-grid {
            display: grid;
            gap: 4px;
            padding: 4px 12px;
        }

        .two-columns {
            grid-template-columns: 1fr 1fr;
        }

        .dropdown-column {
            display: flex;
            flex-direction: column;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            text-decoration: none;
            color: var(--text);
            border-radius: 8px;
            transition: var(--transition);
            font-size: 0.9rem;
            position: relative;
        }

        .dropdown-item:hover {
            background: #eff6ff;
            color: var(--primary);
            transform: translateX(4px);
        }

        .dropdown-item.active {
            background: #eff6ff;
            color: var(--primary);
        }

        /* Styling untuk Icon dengan Background Warna */
        .dropdown-item i {
            margin-right: 12px;
            width: 32px;
            height: 32px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.9rem;
            transition: var(--transition);
        }

        /* Warna Background untuk Setiap Icon */
        .dropdown-item i.fa-book { background: var(--primary); }
        .dropdown-item i.fa-calculator { background: var(--success); }
        .dropdown-item i.fa-file-invoice-dollar { background: var(--accent); }
        .dropdown-item i.fa-file-contract { background: var(--purple); }
        .dropdown-item i.fa-receipt { background: var(--pink); }
        .dropdown-item i.fa-file-alt { background: var(--danger); }
        .dropdown-item i.fa-user-graduate { background: var(--primary); }
        .dropdown-item i.fa-microphone { background: var(--success); }
        .dropdown-item i.fa-users { background: var(--accent); }
        .dropdown-item i.fa-building { background: var(--purple); }
        .dropdown-item i.fa-clipboard-list { background: var(--pink); }
        .dropdown-item i.fa-chart-line { background: var(--success); }
        .dropdown-item i.fa-gavel { background: var(--danger); }
        .dropdown-item i.fa-search-dollar { background: var(--accent); }
        .dropdown-item i.fa-exchange-alt { background: var(--purple); }
        .dropdown-item i.fa-comments { background: var(--pink); }
        .dropdown-item i.fa-comment-dots { background: var(--primary); }
        .dropdown-item i.fa-id-badge { background: var(--teal); }
        .dropdown-item i.fa-cart-shopping { background: var(--accent); }
        .dropdown-item i.fa-clock-rotate-left { background: var(--purple); }
        .dropdown-item i.fa-right-from-bracket { background: var(--danger); }

        .dropdown-item:hover i {
            transform: scale(1.1);
        }

        /* Badge for New Items */
        .dropdown-badge {
            background: var(--success);
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
            margin-left: auto;
            font-weight: 600;
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

            .nav-item::after {
                display: none;
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

            .nav-link .dropdown-chevron {
                margin-left: auto;
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

            .dropdown {
                position: static;
                width: 100%;
                box-shadow: none;
                border-radius: 10px;
                border: 1px solid #e2e8f0;
                background: #f8fafc;
                opacity: 1;
                visibility: visible;
                transform: none;
                max-height: 0;
                overflow: hidden;
                transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), padding 0.3s ease;
                padding: 0;
                margin-top: 6px;
                margin-bottom: 6px;
                pointer-events: auto;
            }

            .dropdown.active {
                max-height: 600px;
                padding: 8px 0;
            }

            .dropdown-grid {
                padding: 4px 8px;
                gap: 2px;
            }

            .dropdown-grid.two-columns {
                grid-template-columns: 1fr;
            }

            .dropdown-item {
                padding: 12px 14px;
                border-radius: 8px;
                font-size: 0.9rem;
            }

            .dropdown-item i {
                width: 30px;
                height: 30px;
                margin-right: 10px;
                font-size: 0.85rem;
            }

            .dropdown-item:last-child {
                border-bottom: none;
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

            .dropdown-item {
                padding: 10px 12px;
                font-size: 0.85rem;
            }

            .dropdown-item i {
                width: 28px;
                height: 28px;
                margin-right: 10px;
                font-size: 0.8rem;
            }

            .dropdown-badge {
                font-size: 0.65rem;
                padding: 1px 5px;
            }
        }

        @media (min-width: 1025px) {
            .dropdown {
                width: auto;
                min-width: 300px;
            }

            .dropdown-grid.two-columns {
                min-width: 520px;
            }

            .nav-item {
                transition: all 0.2s ease;
            }

            .nav-item:nth-child(5) .dropdown {
                left: auto;
                right: 0;
            }

            .nav-item:nth-child(7) .dropdown {
                left: 0;       
                right: auto;    
                min-width: 240px;
            }
            .nav-item:nth-child(8) .dropdown {
                left: 0;
                right: auto;
            }

            .dropdown {
                top: calc(100% + 10px);
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

            .dropdown-item {
                padding: 9px 10px;
                font-size: 0.8rem;
            }

            .dropdown-item i {
                width: 26px;
                height: 26px;
                margin-right: 8px;
                font-size: 0.75rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <!-- <div class="nav-container"></div> -->
          <div class="py-2 border-bottom" style="background-color: #4d84fcff; color: #000;">
        <div class="container d-flex justify-content-center align-items-center">
            <small>
                📧 Email: 
                <a href="mailto:info@pahampajak.com" class="text-decoration-none" style="color: #ffffffff;">info@pahampajak.com</a> 
                &nbsp; | &nbsp; 
                ☎️ Telp: 
                <a href="tel:+6281234567890" class="text-decoration-none" style="color: #fff7f7ff;">+62 812-3456-7890</a>
            </small>
        </div>
    </div>
        <div class="nav-container mt-2">
            <a href="/" class=" align-items-center text-decoration-none ">
             <div class="mt-2" style="background: none;">
                <img src="{{ asset('assets/customer/images/barcom no bg.png') }}" alt="Logo Paham Pajak" style="width: 200px; height: 200px; object-fit: contain;">
            </div>
            </a>
            <ul class="nav-menu">
                <!-- Profil / Login -->
                <li class="nav-item">
                    <li><a href="#" class="nav-link">Beranda</a></li>
                    <li><a href="#" class="nav-link">Tentang</a></li>
                    <li><a href="#" class="nav-link">Layanan</a></li>
                    <li><a href="#" class="nav-link">Portfolio</a></li>
                    <li><a href="#" class="nav-link">Kontak</a></li>
                     @guest
                    <a href="{{ route('login') }}" class="login-btn">
                        <i class="fas fa-right-to-bracket"></i> Login
                    </a>
                    @endguest
                    @auth
                    <a class="nav-link">
                        <i class="fas fa-user-circle"></i> Profile 
                        <i class="fas fa-chevron-down dropdown-chevron"></i>
                    </a>
                    <div class="dropdown">
                        <div class="dropdown-grid">
                            <a href="{{ route('profile.index') }}" class="dropdown-item">
                                <i class="fas fa-id-badge"></i> Profil Saya
                            </a>
                            <a href="/cart" class="dropdown-item">
                                <i class="fas fa-cart-shopping"></i> Cart
                            </a>
                            <a href="/transactions" class="dropdown-item">
                                <i class="fas fa-clock-rotate-left"></i> Riwayat Transaksi
                            </a>
                            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                @csrf
                                <button type="submit" class="dropdown-item logout-item" 
                                        style="width: 100%; text-align: left;">
                                    <i class="fas fa-right-from-bracket"></i> Logout
                                </button>
                            </form>
                        </div>
                    </div>
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
            const navLinks = document.querySelectorAll('.nav-link');
            const dropdownItems = document.querySelectorAll('.dropdown-item');
            const sidebarOverlay = document.querySelector('.sidebar-overlay');

            // Toggle mobile menu
            mobileBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                this.classList.toggle('active');
                navMenu.classList.toggle('active');
                sidebarOverlay.classList.toggle('active');

                if (!navMenu.classList.contains('active')) {
                    document.querySelectorAll('.dropdown').forEach(dropdown => {
                        dropdown.classList.remove('active');
                    });
                }
            });

            // Close menu when clicking on overlay
            sidebarOverlay.addEventListener('click', function() {
                mobileBtn.classList.remove('active');
                navMenu.classList.remove('active');
                this.classList.remove('active');
                document.querySelectorAll('.dropdown').forEach(dropdown => {
                    dropdown.classList.remove('active');
                });
            });

            // Toggle dropdown di mobile/tablet
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    if (window.innerWidth <= 1024) {
                        const dropdown = this.nextElementSibling;
                        if (dropdown && dropdown.classList.contains('dropdown')) {
                            e.preventDefault();
                            e.stopPropagation();

                            document.querySelectorAll('.dropdown').forEach(d => {
                                if (d !== dropdown) {
                                    d.classList.remove('active');
                                }
                            });

                            dropdown.classList.toggle('active');
                        }
                    }
                });
            });

            // Close mobile menu when clicking on dropdown items
            dropdownItems.forEach(item => {
                item.addEventListener('click', function() {
                    if (window.innerWidth <= 1024) {
                        setTimeout(() => {
                            mobileBtn.classList.remove('active');
                            navMenu.classList.remove('active');
                            sidebarOverlay.classList.remove('active');
                            document.querySelectorAll('.dropdown').forEach(dropdown => {
                                dropdown.classList.remove('active');
                            });
                        }, 300);
                    }
                });
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 1024) {
                    if (!navMenu.contains(e.target) && !mobileBtn.contains(e.target)) {
                        document.querySelectorAll('.dropdown').forEach(dropdown => {
                            dropdown.classList.remove('active');
                        });
                    }
                }
            });

            // Handle resize
            window.addEventListener('resize', function() {
                if (window.innerWidth > 1024) {
                    mobileBtn.classList.remove('active');
                    navMenu.classList.remove('active');
                    sidebarOverlay.classList.remove('active');
                    document.querySelectorAll('.dropdown').forEach(dropdown => {
                        dropdown.classList.remove('active');
                    });
                }
            });
        });
    </script>
</body>
</html>