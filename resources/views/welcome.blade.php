@extends('layouts.master')

@section('title', 'Paham Pajak - Solusi Akuntansi & Perpajakan Terpercaya')

@section('style')
<style>
    :root {
        --primary: #2563eb;
        --primary-dark: #1d4ed8;
        --secondary: #64748b;
        --accent: #f59e0b;
        --light: #f8fafc;
        --dark: #1e293b;
        --success: #10b981;
        --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        --shadow-xl: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        --radius: 8px;
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        line-height: 1.6;
        color: var(--dark);
        background-color: #ffffff;
        overflow-x: hidden;
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 1.5rem;
        width: 100%;
    }

    .section {
        padding: 4rem 0;
    }

    .section-title {
        text-align: center;
        margin-bottom: 3rem;
    }

    .section-title h2 {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--dark);
        margin-bottom: 1rem;
        position: relative;
        display: inline-block;
    }

    .section-title h2::after {
        content: '';
        position: absolute;
        bottom: -10px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        border-radius: 2px;
    }

    .section-title p {
        font-size: 1.125rem;
        color: var(--secondary);
        max-width: 700px;
        margin: 1.5rem auto 0;
        line-height: 1.8;
    }

    /* Hero Section */
    .hero {
        background: #f8f9fa;
        padding: 80px 0 60px;
        position: relative;
        overflow: hidden;
        min-height: 500px;
        display: flex;
        align-items: center;
        margin-bottom: 0;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
        width: 100%;
    }

    .hero-text {
        width: 100%;
        text-align: left;
    }

    .hero-text h1 {
        font-size: 2.8rem;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 1.2rem;
        color: #1e293b;
    }

    .hero-text p {
        font-size: 1.2rem;
        margin-bottom: 1.5rem;
        color: #475569;
        line-height: 1.8;
    }

    .hero-features {
        margin: 2rem 0;
    }

    .hero-feature {
        display: flex;
        align-items: flex-start;
        margin-bottom: 1.2rem;
        transition: transform 0.3s ease;
    }

    .hero-feature:hover {
        transform: translateX(5px);
    }

    .hero-feature i {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 1.3rem;
        flex-shrink: 0;
    }

    .hero-feature:nth-child(1) i {
        color: #007bff;
        background: rgba(0, 123, 255, 0.1);
    }

    .hero-feature:nth-child(2) i {
        color: #FAA533;
        background: rgba(250, 165, 51, 0.1);
    }

    .hero-feature:nth-child(3) i {
        color: #8FA31E;
        background: rgba(143, 163, 30, 0.1);
    }

    .hero-feature span {
        font-weight: 600;
        font-size: 1rem;
        color: #1e293b;
        line-height: 1.5;
        padding-top: 0.3rem;
    }

    .hero-image {
        position: relative;
        width: 100%;
    }

    .hero-image img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: var(--shadow-xl);
        display: block;
    }

    .hero-buttons {
        margin-top: 2rem;
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 0.9rem 1.8rem;
        border-radius: var(--radius);
        font-weight: 600;
        font-size: 1rem;
        text-decoration: none;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        gap: 0.5rem;
        font-family: inherit;
    }

    .btn-primary {
        background: var(--primary);
        color: white;
        box-shadow: var(--shadow-lg);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: var(--shadow-xl);
        background: var(--primary-dark);
    }

    .btn-secondary {
        background: white;
        color: var(--primary);
        border: 2px solid var(--primary);
        box-shadow: var(--shadow);
    }

    .btn-secondary:hover {
        background: var(--primary);
        color: white;
        transform: translateY(-2px);
    }
    /* kaategori */

    /* About Section */
    .about {
        background: white;
        padding-top: 0;
        margin-top: 0;
    }

    .about-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 3rem;
        align-items: center;
    }

    .about-image {
        position: relative;
    }

    .about-image img {
        width: 100%;
        height: auto;
        border-radius: 12px;
        box-shadow: var(--shadow-xl);
        display: block;
    }

    .about-image::before {
        content: '';
        position: absolute;
        top: -15px;
        left: -15px;
        width: 100%;
        height: 100%;
        border: 4px solid var(--primary);
        border-radius: 12px;
        z-index: -1;
        opacity: 0.3;
    }

    .about-text h2 {
        font-size: 2rem;
        margin-bottom: 1.2rem;
        color: var(--dark);
        font-weight: 700;
    }

    .about-text p {
        color: var(--secondary);
        margin-bottom: 1.2rem;
        line-height: 1.8;
        font-size: 1.05rem;
    }

    .about-features {
        margin: 2rem 0;
    }

    .about-feature {
        display: flex;
        align-items: center;
        margin-bottom: 1rem;
        transition: transform 0.3s ease;
    }

    .about-feature:hover {
        transform: translateX(5px);
    }

    .about-feature i {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 1rem;
        font-size: 0.9rem;
        background: rgba(37, 99, 235, 0.1);
        color: var(--primary);
        flex-shrink: 0;
    }

    .about-feature span {
        font-weight: 600;
        color: var(--dark);
    }

    /* Services Section */
    .services {
        background: var(--light);
    }

    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2rem;
    }

    .service-card {
        background: white;
        padding: 2rem 1.5rem;
        border-radius: 12px;
        box-shadow: var(--shadow);
        transition: var(--transition);
        text-align: center;
        position: relative;
        overflow: hidden;
        border-top: 4px solid transparent;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: var(--shadow-xl);
    }

    .service-card:nth-child(1) {
        border-top-color: #007bff;
    }

    .service-card:nth-child(2) {
        border-top-color: #28a745;
    }

    .service-card:nth-child(3) {
        border-top-color: #ffc107;
    }

    .service-card:nth-child(4) {
        border-top-color: #dc3545;
    }

    .service-card:nth-child(5) {
        border-top-color: #6f42c1;
    }

    .service-card:nth-child(6) {
        border-top-color: #20c997;
    }

    .service-icon {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.2rem;
        font-size: 1.8rem;
        transition: var(--transition);
    }

    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(5deg);
    }

    .service-card h3 {
        font-size: 1.3rem;
        margin-bottom: 0.8rem;
        color: var(--dark);
        font-weight: 700;
    }

    .service-card p {
        color: var(--secondary);
        margin-bottom: 1.2rem;
        line-height: 1.7;
    }

    .service-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: gap 0.3s ease;
    }

    .service-link:hover {
        gap: 0.75rem;
    }
/* Kategori */
 .circle {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: relative;
    overflow: hidden;
    background: #269dffff; /* warna oranye */
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform .3s ease;
}
.circle img {
    width: 70%;
    height: auto;
    object-fit: contain;
    transition: transform .3s ease;
}
.category-item:hover .circle img {
    transform: scale(1.1);
}
.category-item p {
    color: #212529;
    margin-top: 5px;
}
    /* Stats Section */
    .stats {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        color: white;
        position: relative;
        overflow: hidden;
    }
/* col-6 col-sm-4 col-md-3 */
    .stats::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'/%3E%3C/svg%3E");
        opacity: 0.3;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 2rem;
        text-align: center;
        position: relative;
        z-index: 1;
    }

    .stat-item {
        background-color: transparent;
        border-radius: 12px;
        padding: 1.5rem;
        text-align: center;
        color: #fff;
    }

    .stat-item:hover {
        transform: translateY(-5px);
    }

    .stat-item h3 {
        font-size: 2.5rem;
        font-weight: 800;
        margin-bottom: 0.5rem;
        color: #ffffff;
    }

    .stat-item p {
        font-size: 1rem;
        font-weight: 600;
        color: rgba(255, 255, 255, 0.95);
    }

    .stats-footer {
        text-align: center;
        margin-top: 2rem;
        position: relative;
        z-index: 1;
    }

    .stats-footer h3 {
        font-size: 1.3rem;
        margin-bottom: 0.8rem;
        font-weight: 700;
        color: white;
    }

    .stats-footer p {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.9);
        max-width: 800px;
        margin: 0 auto;
    }

    /* Consultation Section */
    .consultation {
        text-align: center;
        background: var(--light);
        padding: 4rem 0;
    }

    .consultation-content {
        max-width: 700px;
        margin: 0 auto;
    }

    .consultation-content h2 {
        font-size: 2.2rem;
        margin-bottom: 1.2rem;
        color: var(--dark);
        font-weight: 700;
    }

    .consultation-content p {
        font-size: 1.1rem;
        color: var(--secondary);
        margin-bottom: 2rem;
        line-height: 1.8;
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

    .animate-fade-in {
        opacity: 0;
        animation: fadeInUp 0.8s ease-out forwards;
    }

    .delay-100 {
        animation-delay: 0.1s;
    }

    .delay-200 {
        animation-delay: 0.2s;
    }

    .delay-300 {
        animation-delay: 0.3s;
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .hero {
            padding: 60px 0 40px;
            min-height: auto;
        }

        .hero-content {
            grid-template-columns: 1fr;
            gap: 2.5rem;
        }

        .hero-text {
            text-align: center;
        }

        .hero-buttons {
            justify-content: center;
        }
        
        .about-content {
            grid-template-columns: 1fr;
            gap: 2.5rem;
            text-align: center;
        }
        
        .about-image::before {
            display: none;
        }
        
        .hero-text h1 {
            font-size: 2.2rem;
        }
        
        .hero-feature {
            justify-content: center;
            text-align: left;
        }
        
        .about-feature {
            justify-content: center;
        }
    }

    @media (max-width: 768px) {
        .section {
            padding: 3rem 0;
        }
        
        .section-title h2 {
            font-size: 1.8rem;
        }
        
        .hero {
            padding: 50px 0 30px;
        }
        
        .hero-text h1 {
            font-size: 1.8rem;
        }
        
        .hero-text p {
            font-size: 1.1rem;
        }

        .hero-feature i {
            width: 40px;
            height: 40px;
            font-size: 1.25rem;
        }

        .hero-feature span {
            font-size: 1rem;
        }
        
        .about-text h2 {
            font-size: 1.6rem;
        }

        .hero-buttons {
            flex-direction: column;
        }
        
        .btn {
            width: 100%;
        }

        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .services-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 480px) {
        .container {
            padding: 0 1rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .hero-text h1 {
            font-size: 1.6rem;
        }
        
        .section-title h2 {
            font-size: 1.6rem;
        }
        
        .service-icon {
            width: 60px;
            height: 60px;
            font-size: 1.6rem;
        }

        .stat-item h3 {
            font-size: 2rem;
        }
    }

    html {
        scroll-behavior: smooth;
    }
</style>
@endsection

@section('content')
<main>
    
    <!-- Hero/ Caraousel -->
        @include('layouts.carousel')
        <!-- rating google -->
        @include('layouts.google-rating')
        <!-- Kategori -->
        @include('layouts.categories')
        <!-- hot produk -->
        @include('layouts.hot_produk')
        <!-- kelebihan -->
        @include('layouts.kelebihan')
</main>
@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Animation on scroll
        const animatedElements = document.querySelectorAll('.animate-fade-in');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, { 
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedElements.forEach(el => {
            observer.observe(el);
        });
        
        // Counter animation for stats
        const counters = document.querySelectorAll('.stat-item h3');
        let hasCounted = false;
        
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !hasCounted) {
                    hasCounted = true;
                    counters.forEach(counter => {
                        const target = parseInt(counter.getAttribute('data-target'));
                        let count = 0;
                        const duration = 2000;
                        const increment = target / (duration / 16);
                        
                        const updateCount = () => {
                            if (count < target) {
                                count += increment;
                                counter.textContent = Math.ceil(count) + '+';
                                requestAnimationFrame(updateCount);
                            } else {
                                counter.textContent = target + '+';
                            }
                        };
                        
                        updateCount();
                    });
                }
            });
        }, { threshold: 0.5 });
        
        const statsSection = document.querySelector('.stats');
        if (statsSection) {
            counterObserver.observe(statsSection);
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                const href = this.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });
    });
</script>
@endsection