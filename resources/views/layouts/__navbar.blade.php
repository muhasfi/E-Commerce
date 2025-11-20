<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paham Pajak - Modern Navbar</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
    
</head>
<body>
    <!-- Header & Navigation -->
    <header>
        <div class="nav-container">
            <a href="/" class="logo">
        <div class="logo-image">
        <img src="{{ asset('assets/customer/images/barcom no bg.png') }}" 
             alt="Paham Pajak Logo" 
             class="logo-img">
        </div>
            </a>    
            <ul class="nav-menu">
                <!-- Menu Home -->
                <li class="nav-item">
                    <a href="/" class="nav-link">
                        Home
                    </a>
                </li>

                <!-- Menu Produk -->
                <li class="nav-item">
                    <a href="/kategori-produk" class="nav-link">
                        Produk
                    </a>
                </li>

                <!-- Menu Tentang Kami -->
                <li class="nav-item">
                    <a href="/tentang" class="nav-link">
                        Tentang Kami
                    </a>
                </li>

                <!-- Menu Hubungi Kami -->
                <li class="nav-item">
                    <a href="/hubungi-kami" class="nav-link">
                     Hubungi Kami
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