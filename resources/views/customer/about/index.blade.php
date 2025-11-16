@extends('layouts.master')

@section('title', 'Tentang Kami - Barcom')

@section('style')
    <style>
        :root {
            --primary-color: #FFA500;
            --secondary-color:  #FFA500;
            --accent-color: #f59e0b;
            --dark-bg: #0f172a;
            --gradient-start: #1e293b;
            --gradient-end: #0f172a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            overflow-x: hidden;
        }

        /* Hero Section with Background */
        .hero-section {
            position: relative;
            min-height: 100vh;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--gradient-start) 0%, var(--gradient-end) 100%);
            overflow: hidden;
            padding: 120px 0 80px;
        }

        /* Background Image */
        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('{{ asset('assets/customer/images/laptop.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.15;
            z-index: 1;
        }

        /* Smoke Effect Overlay */
        .smoke-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, rgba(15, 23, 42, 0.7) 0%, rgba(15, 23, 42, 0.95) 100%);
            z-index: 2;
        }

        /* Bubble Animation */
        .bubbles {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 3;
            overflow: hidden;
            pointer-events: none;
        }

        .bubble {
            position: absolute;
            bottom: -100px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            animation: rise linear infinite;
            backdrop-filter: blur(5px);
        }

        .bubble:nth-child(1) { left: 10%; width: 80px; height: 80px; animation-duration: 12s; animation-delay: 0s; }
        .bubble:nth-child(2) { left: 20%; width: 60px; height: 60px; animation-duration: 10s; animation-delay: 2s; }
        .bubble:nth-child(3) { left: 35%; width: 100px; height: 100px; animation-duration: 15s; animation-delay: 4s; }
        .bubble:nth-child(4) { left: 50%; width: 70px; height: 70px; animation-duration: 11s; animation-delay: 1s; }
        .bubble:nth-child(5) { left: 65%; width: 90px; height: 90px; animation-duration: 13s; animation-delay: 3s; }
        .bubble:nth-child(6) { left: 80%; width: 65px; height: 65px; animation-duration: 9s; animation-delay: 5s; }
        .bubble:nth-child(7) { left: 15%; width: 75px; height: 75px; animation-duration: 14s; animation-delay: 6s; }
        .bubble:nth-child(8) { left: 45%; width: 85px; height: 85px; animation-duration: 12s; animation-delay: 2s; }
        .bubble:nth-child(9) { left: 75%; width: 55px; height: 55px; animation-duration: 10s; animation-delay: 4s; }
        .bubble:nth-child(10) { left: 90%; width: 70px; height: 70px; animation-duration: 11s; animation-delay: 1s; }

        @keyframes rise {
            0% {
                bottom: -100px;
                transform: translateX(0) scale(1);
                opacity: 0;
            }
            10% {
                opacity: 0.6;
            }
            90% {
                opacity: 0.6;
            }
            100% {
                bottom: 110%;
                transform: translateX(calc(-50px + 100px * var(--random))) scale(0.8);
                opacity: 0;
            }
        }

        /* Content Container */
        .hero-content {
            position: relative;
            z-index: 10;
            width: 100%;
        }

        /* Text Content - Left Side */
        .about-text {
            color: white;
            animation: fadeInLeft 1s ease-out;
        }

        .about-text h1 {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            background: linear-gradient(135deg, #ffffff 0%, #a5b4fc 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            line-height: 1.2;
        }

        .about-text .subtitle {
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: #94a3b8;
            margin-bottom: 2rem;
            font-weight: 500;
            letter-spacing: 0.5px;
        }

        .about-text p {
            font-size: clamp(1rem, 2vw, 1.125rem);
            line-height: 1.8;
            color: #cbd5e1;
            margin-bottom: 2rem;
            text-align: justify;
        }

        .highlight-box {
            background: rgba(37, 99, 235, 0.1);
            border-left: 4px solid var(--primary-color);
            padding: 1.5rem;
            margin-top: 2rem;
            border-radius: 8px;
            backdrop-filter: blur(10px);
        }

        .highlight-box .stat {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .highlight-box .stat:last-child {
            margin-bottom: 0;
        }

        .highlight-box .stat i {
            color: var(--accent-color);
            font-size: 1.5rem;
        }

        .highlight-box .stat span {
            color: #e2e8f0;
            font-size: 1.1rem;
        }

        /* Image Container - Right Side */
        .about-image-container {
            position: relative;
            animation: fadeInRight 1s ease-out;
        }

        .image-wrapper {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
            transform: perspective(1000px) rotateY(-5deg);
            transition: transform 0.6s ease;
        }

        .image-wrapper:hover {
            transform: perspective(1000px) rotateY(0deg) scale(1.02);
        }

        .image-wrapper img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px;
        }

        .image-wrapper::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.2) 0%, rgba(30, 64, 175, 0.2) 100%);
            z-index: 1;
            border-radius: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-wrapper:hover::before {
            opacity: 1;
        }

        /* Floating Badge */
        .floating-badge {
            position: absolute;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(135deg, var(--accent-color) 0%, #dc2626 100%);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 50px;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 10px 30px rgba(245, 158, 11, 0.4);
            z-index: 2;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        /* Vision & Mission Section */
        .vision-mission-section {
            padding: 100px 0;
            background: white;
            position: relative;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-header h2 {
            font-size: clamp(2rem, 4vw, 3rem);
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .section-header p {
            font-size: 1.2rem;
            color: #64748b;
        }

        .value-card {
            padding: 3rem;
            border-radius: 20px;
            background: white;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            transition: all 0.4s ease;
            height: 100%;
            border-top: 5px solid var(--primary-color);
            position: relative;
            overflow: hidden;
        }

        .value-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.05), transparent);
            transition: left 0.5s ease;
        }

        .value-card:hover::before {
            left: 100%;
        }

        .value-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.15);
        }

        .value-icon {
            width: 90px;
            height: 90px;
            background: #FFA500;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
            color: white;
            font-size: 2.5rem;
            box-shadow: 0 10px 30px rgba(37, 99, 235, 0.3);
            transition: transform 0.3s ease;
        }

        .value-card:hover .value-icon {
            transform: scale(1.1) rotate(5deg);
        }

        .value-card h3 {
            font-size: 1.8rem;
            font-weight: 700;
            color:  #FFA500;
            margin-bottom: 1.5rem;
        }

        .value-card p {
            color: #64748b;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        /* Animations */
        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translateX(50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .hero-section {
                min-height: auto;
                padding: 100px 0 60px;
            }

            .about-text {
                margin-bottom: 3rem;
            }

            .image-wrapper {
                transform: perspective(1000px) rotateY(0deg);
            }

            .floating-badge {
                bottom: 20px;
                right: 20px;
                padding: 0.75rem 1.25rem;
                font-size: 0.8rem;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                padding: 80px 0 40px;
            }

            .about-text h1 {
                font-size: 2rem;
            }

            .about-text p {
                text-align: left;
            }

            .highlight-box {
                padding: 1rem;
            }

            .value-card {
                padding: 2rem;
                margin-bottom: 2rem;
            }

            .vision-mission-section {
                padding: 60px 0;
            }

            .section-header {
                margin-bottom: 2rem;
            }
        }

        @media (max-width: 576px) {
            .bubble {
                display: none;
            }

            .floating-badge {
                position: static;
                display: inline-block;
                margin-top: 1rem;
            }

            .value-icon {
                width: 70px;
                height: 70px;
                font-size: 2rem;
            }
        }
    </style>
@endsection

@section('content')
    <!-- Hero Section with Background and Bubbles -->
    <section class="hero-section">
        <!-- Background Image -->
        <div class="hero-background"></div>
        
        <!-- Smoke Overlay -->
        <div class="smoke-overlay"></div>
        
        <!-- Animated Bubbles -->
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

        <!-- Content -->
        <div class="container hero-content">
            <div class="row align-items-center g-5">
                <!-- Text Content - Left Side -->
                <div class="col-lg-6">
                    <div class="about-text">
                        <h1>Tentang Kami</h1>
                        <p class="subtitle">Mitra Terpercaya Solusi Teknologi Anda</p>
                        <p>
                            CV. Barkom adalah toko komputer & CCTV terpercaya yang berdiri sejak tahun 2008. 
                            Kami juga memiliki cabang di Karanganyar maupun Sukoharjo. Oleh karenanya, konsumen 
                            patut merasa aman berbelanja dan bekerjasama di Barkom karena kredibilitasnya yang 
                            telah teruji lebih dari 15 tahun melayani masyarakat.
                        </p>
                        
                        <div class="highlight-box">
                            <div class="stat">
                                <i class="fas fa-calendar-check"></i>
                                <span><strong>15+ Tahun</strong> Pengalaman</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-store"></i>
                                <span><strong>3 Cabang</strong> Melayani Anda</span>
                            </div>
                            <div class="stat">
                                <i class="fas fa-users"></i>
                                <span><strong>1000+ Pelanggan</strong> Puas</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Image - Right Side -->
                <div class="col-lg-6">
                    <div class="about-image-container">
                        <div class="image-wrapper">
                            <img src="{{ asset('assets/customer/images/barcom toko depan.jpg') }}" alt="CV Barcom - Toko Komputer & CCTV Terpercaya">
                            <div class="floating-badge">
                                <i class="fas fa-award"></i> Terpercaya Sejak 2008
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision & Mission Section -->
    <section class="vision-mission-section">
        <div class="container">
            <div class="section-header">
                <h2>VISI & MISI </h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-eye"></i>
                        </div>
                        <h3>Visi</h3>
                        <p>Partner IT Solutions terbaik dan sebuah jasa service komputer lainnya yang dapat dipercaya serta 
                        menjadi sebuah perusahaan yang mampu bersaing dalam dunia global saat ini.
                        Menjadi sebuah perusahaan yang mampu memberikan kontribusi dalam bidang Teknologi Informasi dalam menggerakkan ekonomi digital di Indonesia</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <h3>Misi</h3>
                        <p>Menyediakan harga ekonomis dengan kualitas pelayanan yang baik, 
                        bagus dan terpercaya Memberikan kualitas layanan terbaik kepada konsumen secara 
                        konsisten dengan tetap memperhatikan efektivitas dan efisiensi
                        Mempunyai team yang profesional, berpengalaman dan juga solid</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection