
@extends('layouts.master')

@section('title', 'Barcom - Pilihan Terbaik Kebutuhan Bisnis Anda')

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


    /* Google Rating */
     /* Tombol navigasi */
        .custom-control {
            width: 45px;
            height: 45px;
            background: rgba(0,0,0,0.5);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.8;
            transition: 0.3s;
        }
        .custom-control:hover { opacity: 1; }

        .carousel-control-prev.custom-control { left: -22px; }
        .carousel-control-next.custom-control { right: -22px; }

        /* Kunci tinggi card agar tidak berubah */
        .review-card {
            min-height: 180px;
            transition: transform 0.3s ease;
        }
        .review-card:hover {
            transform: translateY(-3px);
        }

        /* Pastikan tinggi carousel tidak berubah */
        .carousel-inner {
            min-height: 240px;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .carousel-control-prev.custom-control { left: -10px; }
            .carousel-control-next.custom-control { right: -10px; }
        }
/* Card Kategori */
.category-card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            height: 250px;
            cursor: pointer;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.15);
        }
        
        .category-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .category-card:hover .category-image {
            transform: scale(1.05);
        }
        
        .category-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white;
            padding: 20px;
            transform: translateY(100%);
            transition: transform 0.3s ease;
        }
        
        .category-card:hover .category-overlay {
            transform: translateY(0);
        }
        
        .category-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .category-stock {
            font-size: 0.9rem;
            opacity: 0.9;
        }
        
        .page-header {
            margin-bottom: 2rem;
        }
        
        /* New Arrival, Special For You, On Sale Sections */
    .section-header-flex {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .section-title-main {
        font-size: 2rem;
        font-weight: 700;
        color: var(--dark);
        margin: 0;
    }

    .view-all-btn {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        transition: gap 0.3s ease;
    }

    .view-all-btn:hover {
        gap: 0.75rem;
        color: var(--primary-dark);
    }

    /* New Arrival Badge */
    .new-badge {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    /* Sale Badge */
    .sale-badge {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
        color: white;
    }

    /* Special Badge */
    .special-badge {
        background: linear-gradient(135deg, #8b5cf6 0%, #7c3aed 100%);
        color: white;
    }

    /* Discount Percentage */
    .discount-percentage {
        position: absolute;
        top: 1rem;
        right: 1rem;
        background: #ef4444;
        color: white;
        padding: 0.25rem 0.5rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        z-index: 2;
    }

    /* Product Grid for Special Sections */
    .special-products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
    }

  /* Hot Produk */
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

       

        /* Kelebihan */
         body {
            background-color: #f8f9fa;
            padding: 20px 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: #333;
            font-weight: 700;
            position: relative;
            padding-bottom: 15px;
        }
        .section-title:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(90deg, #FFD700, #FFA500);
        }
        .feature-card {
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
            border: none;
            border-radius: 10px;
            overflow: hidden;
            background: white;
        }
        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: #d97706; /* Warna kuning */
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .card-title {
            font-weight: 600;
            margin-bottom: 15px;
            color: #333;
        }
        .card-text {
            color: #666;
            line-height: 1.6;
        }
        .card-body {
            padding: 2rem 1.5rem;
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
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
             <!-- <img src="{{ asset('assets/customer/images/barcom no bg.png') }}" alt="Logo Paham Pajak" style="width: 200px; height: 200px; object-fit: contain;"> -->
            <div class="carousel-item active" style="background-image: url('{{ asset('assets/customer/images/laptop.jpg') }}');background-size: cover; background-position: center; height: 100vh;">
                <div class="carousel-container d-flex justify-content-center align-items-center text-center text-white" style="background: rgba(0, 0, 0, 0.5); height: 100%;">
                    <div>
                        <h1 class="display-4 fw-bold">Solusi Laptop Terbaik Anda</h1>
                          <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>  Aliquid animi tempora voluptate qui. 
                            Voluptates impedit iusto sunt quidem sint tenetur odio quia deleniti debitis nulla,</p>
                        <p> vitae architecto ratione unde exercitationem.</p>
                        <!-- <p class="lead">Dapatkan performa cepat, desain modern, dan layanan purna jual terpercaya.</p> -->
                       
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
           <div class="carousel-item active" style="background-image: url('{{ asset('assets/customer/images/cctv.jpg') }}');background-size: cover; background-position: center; height: 100vh;">
                <div class="carousel-container d-flex justify-content-center align-items-center text-center text-white" style="background: rgba(0, 0, 0, 0.5); height: 100%;">
                    <div>
                        <h1 class="display-4 fw-bold">Keamanan Maksimal </h1>
                         <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>  Aliquid animi tempora voluptate qui. 
                            Voluptates impedit iusto sunt quidem sint tenetur odio quia deleniti debitis nulla,</p>
                        <p> vitae architecto ratione unde exercitationem.</p>
                       
                      
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item active" style="background-image: url('{{ asset('assets/customer/images/wifi.jpg') }}');background-size: cover; background-position: center; height: 100vh;">
                <div class="carousel-container d-flex justify-content-center align-items-center text-center text-white" style="background: rgba(0, 0, 0, 0.5); height: 100%;">
                    <div>
                        <h1 class="display-4 fw-bold">Internet Cepat dan Stabil</h1>
                        <p class="lead">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
                        <p>  Aliquid animi tempora voluptate qui. 
                            Voluptates impedit iusto sunt quidem sint tenetur odio quia deleniti debitis nulla,</p>
                        <p> vitae architecto ratione unde exercitationem.</p>
                    </div>
                </div>
            </div>

        </div>

        <!-- Controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>

        <!-- Indicators -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
        </div>
    </div>
</section>

        <!-- rating google -->
      <section class="py-5 bg-light">
    <div class="container position-relative">
        <div class="row align-items-center">
            <!-- Bagian kiri -->
            <div class="col-lg-3 text-center text-lg-start mb-4 mb-lg-0">
                <h5 class="fw-bold text-uppercase mb-2">Bagus Sekali</h5>
                <div class="d-flex justify-content-center justify-content-lg-start align-items-center mb-2">
                    <span class="text-warning fs-4 me-1">★</span>
                    <span class="text-warning fs-4 me-1">★</span>
                    <span class="text-warning fs-4 me-1">★</span>
                    <span class="text-warning fs-4 me-1">★</span>
                    <span class="text-warning fs-4 me-1">★</span>
                    <i class="bi bi-star-half text-warning fs-5"></i>
                </div>
                <p class="mb-2">Berdasarkan <strong>18.247</strong> ulasan</p>
                <img src="{{ asset('assets/customer/images/google.png') }}" alt="Google" width="20">
            </div>

            <!-- Bagian kanan -->
            <div class="col-lg-9 position-relative">
                <div id="googleReviewCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="4000">

                    <!-- DOT indikator -->
                    <div class="carousel-indicators mb-0">
                        <button type="button" data-bs-target="#googleReviewCarousel" data-bs-slide-to="0" class="active bg-primary rounded-circle" style="width:10px;height:10px"></button>
                        <button type="button" data-bs-target="#googleReviewCarousel" data-bs-slide-to="1" class="bg-primary rounded-circle" style="width:10px;height:10px"></button>
                        <button type="button" data-bs-target="#googleReviewCarousel" data-bs-slide-to="2" class="bg-primary rounded-circle" style="width:10px;height:10px"></button>
                    </div>

                    <div class="carousel-inner mt-3">
                        <!-- Slide 1 -->
                        <div class="carousel-item active">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm review-card h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="">
                                                <h6 class="mb-0 fw-bold">Teguh Ariyanto</h6>
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" class="ms-auto" width="18" alt="">
                                            </div>
                                            <div class="text-warning mb-2">
                                                ★★★★★ <i class="bi bi-patch-check-fill text-primary ms-1"></i>
                                            </div>
                                            <p class="text-muted small mb-0">Mba Fitri salesnya baik dan cekata...</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm review-card h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2" style="width:40px;height:40px;">b</div>
                                                <h6 class="mb-0 fw-bold">Batrisyia</h6>
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" class="ms-auto" width="18" alt="">
                                            </div>
                                            <div class="text-warning mb-2">
                                                ★★★★★ <i class="bi bi-patch-check-fill text-primary ms-1"></i>
                                            </div>
                                            <p class="text-muted small mb-0">Pelayanannya baik dibantu ka kemal daan ka yani</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm review-card h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="">
                                                <h6 class="mb-0 fw-bold">Margaretha Christa...</h6>
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" class="ms-auto" width="18" alt="">
                                            </div>
                                            <div class="text-warning mb-2">
                                                ★★★★★ <i class="bi bi-patch-check-fill text-primary ms-1"></i>
                                            </div>
                                            <p class="text-muted small mb-0">Wiwin keren</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Slide 2 -->
                        <div class="carousel-item">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm review-card h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="rounded-circle bg-danger text-white d-flex align-items-center justify-content-center me-2" style="width:40px;height:40px;">r</div>
                                                <h6 class="mb-0 fw-bold">Rizky</h6>
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" class="ms-auto" width="18" alt="">
                                            </div>
                                            <div class="text-warning mb-2">★★★★★</div>
                                            <p class="text-muted small mb-0">Proses cepat, pelayanan ramah!</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm review-card h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <img src="https://via.placeholder.com/40" class="rounded-circle me-2" alt="">
                                                <h6 class="mb-0 fw-bold">Dea Marlina</h6>
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" class="ms-auto" width="18" alt="">
                                            </div>
                                            <div class="text-warning mb-2">★★★★★</div>
                                            <p class="text-muted small mb-0">Terima kasih sudah dibantu dengan baik!</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="card border-0 shadow-sm review-card h-100">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center mb-2">
                                                <div class="rounded-circle bg-success text-white d-flex align-items-center justify-content-center me-2" style="width:40px;height:40px;">a</div>
                                                <h6 class="mb-0 fw-bold">Andi Pratama</h6>
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" class="ms-auto" width="18" alt="">
                                            </div>
                                            <div class="text-warning mb-2">★★★★★</div>
                                            <p class="text-muted small mb-0">Sangat puas dengan hasilnya!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tombol navigasi -->
                    <button class="carousel-control-prev custom-control" type="button" data-bs-target="#googleReviewCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next custom-control" type="button" data-bs-target="#googleReviewCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
        <!-- Kategori -->
        <div class="container py-5">
        <!-- Header -->
        <div class="page-header text-center">
            <h1 class="display-8 fw-bold text-dark">Kategori Barang Elektronik</h1>
            <!-- <p class="lead">Temukan berbagai macam produk elektronik berkualitas</p> -->
        </div>
        
        <!-- Kategori Cards -->
        <div class="row g-4">
            <!-- Kategori 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1498049794561-7780e7231661?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                         alt="Laptop" class="category-image">
                    <div class="category-overlay">
                        <h3 class="category-title">Laptop & Notebook</h3>
                        <p class="category-stock">Stok tersedia: 42 unit</p>
                    </div>
                </div>
            </div>
            
            <!-- Kategori 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1555774698-0b77e0d5fac6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" 
                         alt="Smartphone" class="category-image">
                    <div class="category-overlay">
                        <h3 class="category-title">Smartphone & Tablet</h3>
                        <p class="category-stock">Stok tersedia: 78 unit</p>
                    </div>
                </div>
            </div>
            
            <!-- Kategori 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1542751110-97427bbecf20?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1084&q=80" 
                         alt="Audio" class="category-image">
                    <div class="category-overlay">
                        <h3 class="category-title">Audio & Headphone</h3>
                        <p class="category-stock">Stok tersedia: 35 unit</p>
                    </div>
                </div>
            </div>
            
            <!-- Kategori 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1142&q=80" 
                         alt="Kamera" class="category-image">
                    <div class="category-overlay">
                        <h3 class="category-title">Kamera & Aksesoris</h3>
                        <p class="category-stock">Stok tersedia: 24 unit</p>
                    </div>
                </div>
            </div>
            
            <!-- Kategori 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1151&q=80" 
                         alt="Gaming" class="category-image">
                    <div class="category-overlay">
                        <h3 class="category-title">Gaming & Konsol</h3>
                        <p class="category-stock">Stok tersedia: 19 unit</p>
                    </div>
                </div>
            </div>
            
            <!-- Kategori 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="category-card">
                    <img src="https://images.unsplash.com/photo-1558618047-3c8c76ca7d13?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1121&q=80" 
                         alt="Smart Home" class="category-image">
                    <div class="category-overlay">
                        <h3 class="category-title">Smart Home & IoT</h3>
                        <p class="category-stock">Stok tersedia: 31 unit</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


        <!-- hot produk -->
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

    <!-- New Arrival Section -->
<section id="new-arrival" class="section bg-light">
    <div class="container">
        <div class="section-header-flex">
            <h2 class="section-title-main">New Arrival</h2>
            <a href="#" class="view-all-btn">
                Lihat Semua
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="special-products-grid">
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-badge new-badge">New</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1512941937669-90a1b58e7e9c?w=400" alt="Smartwatch Pro">
                    <div class="product-actions">
                        <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                        <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">Smartwatch</div>
                    <h3 class="product-title">Smartwatch Pro 2024</h3>
                    <p>Smartwatch terbaru dengan fitur kesehatan lengkap dan battery life hingga 7 hari.</p>
                    <div class="product-features">
                        <span class="feature-tag">AMOLED</span>
                        <span class="feature-tag">GPS</span>
                        <span class="feature-tag">Waterproof</span>
                    </div>
                    <div class="product-footer">
                        <div>
                            <div class="product-price">Rp 2.499.000</div>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>Keranjang
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-badge new-badge">New</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?w=400" alt="DSLR Camera">
                    <div class="product-actions">
                        <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                        <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">Kamera</div>
                    <h3 class="product-title">DSLR X2000 Pro</h3>
                    <p>Kamera DSLR terbaru dengan sensor 45MP dan 8K video recording.</p>
                    <div class="product-features">
                        <span class="feature-tag">45MP</span>
                        <span class="feature-tag">8K Video</span>
                        <span class="feature-tag">WiFi</span>
                    </div>
                    <div class="product-footer">
                        <div>
                            <div class="product-price">Rp 18.999.000</div>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>Keranjang
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-badge new-badge">New</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1605236453806-6ff36851218e?w=400" alt="Wireless Speaker">
                    <div class="product-actions">
                        <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                        <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">Audio</div>
                    <h3 class="product-title">Wireless Speaker Max</h3>
                    <p>Speaker Bluetooth dengan sound quality terbaik dan battery 20 jam.</p>
                    <div class="product-features">
                        <span class="feature-tag">360° Sound</span>
                        <span class="feature-tag">20h Battery</span>
                        <span class="feature-tag">IP67</span>
                    </div>
                    <div class="product-footer">
                        <div>
                            <div class="product-price">Rp 1.799.000</div>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>Keranjang
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Special For You Section -->
<section id="special-for-you" class="section">
    <div class="container">
        <div class="section-header-flex">
            <h2 class="section-title-main">Special For You</h2>
            <a href="#" class="view-all-btn">
                Lihat Semua
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="special-products-grid">
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-badge special-badge">Special</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400" alt="Smartphone Pro">
                    <div class="product-actions">
                        <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                        <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">Smartphone</div>
                    <h3 class="product-title">Smartphone Pro Max</h3>
                    <p>Spesial untuk Anda! Smartphone flagship dengan harga terbaik.</p>
                    <div class="product-features">
                        <span class="feature-tag">128GB</span>
                        <span class="feature-tag">5G</span>
                        <span class="feature-tag">Triple Camera</span>
                    </div>
                    <div class="product-footer">
                        <div>
                            <div class="product-price">Rp 8.999.000</div>
                            <div class="discount">Rp 10.999.000</div>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>Keranjang
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-badge special-badge">Special</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1546868871-7041f2a55e12?w=400" alt="Smartwatch">
                    <div class="product-actions">
                        <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                        <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">Smartwatch</div>
                    <h3 class="product-title">Smartwatch Fit Pro</h3>
                    <p>Spesial diskon untuk kesehatan dan fitness Anda.</p>
                    <div class="product-features">
                        <span class="feature-tag">Health Monitor</span>
                        <span class="feature-tag">Sport Mode</span>
                        <span class="feature-tag">7 Days</span>
                    </div>
                    <div class="product-footer">
                        <div>
                            <div class="product-price">Rp 1.299.000</div>
                            <div class="discount">Rp 1.799.000</div>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>Keranjang
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-badge special-badge">Special</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1560769624-7a8f7c6d46e7?w=400" alt="Gaming Headset">
                    <div class="product-actions">
                        <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                        <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">Gaming</div>
                    <h3 class="product-title">Gaming Headset Pro</h3>
                    <p>Spesial untuk gamers dengan surround sound 7.1.</p>
                    <div class="product-features">
                        <span class="feature-tag">7.1 Surround</span>
                        <span class="feature-tag">RGB</span>
                        <span class="feature-tag">Noise Cancel</span>
                    </div>
                    <div class="product-footer">
                        <div>
                            <div class="product-price">Rp 899.000</div>
                            <div class="discount">Rp 1.299.000</div>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>Keranjang
                        </button>
                    </div>
                </div>
            </div>
          
        </div>
    </div>
</section>

<!-- On Sale Section -->
<section id="on-sale" class="section bg-light">
    <div class="container">
        <div class="section-header-flex">
            <h2 class="section-title-main">On Sale</h2>
            <a href="#" class="view-all-btn">
                Lihat Semua
                <i class="fas fa-arrow-right"></i>
            </a>
        </div>
        
        <div class="special-products-grid">
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-badge sale-badge">Sale</div>
                <div class="discount-percentage">-30%</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?w=400" alt="Laptop Ultra">
                    <div class="product-actions">
                        <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                        <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">Laptop</div>
                    <h3 class="product-title">Laptop Ultra Slim</h3>
                    <p>Diskon spesial! Laptop ultra slim dengan performa tinggi.</p>
                    <div class="product-features">
                        <span class="feature-tag">i7 12th Gen</span>
                        <span class="feature-tag">16GB RAM</span>
                        <span class="feature-tag">512GB SSD</span>
                    </div>
                    <div class="product-footer">
                        <div>
                            <div class="product-price">Rp 12.999.000</div>
                            <div class="discount">Rp 18.499.000</div>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>Keranjang
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-badge sale-badge">Sale</div>
                <div class="discount-percentage">-40%</div>
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
                    <p>Diskon besar! Earbuds dengan noise cancellation aktif.</p>
                    <div class="product-features">
                        <span class="feature-tag">ANC</span>
                        <span class="feature-tag">30h Case</span>
                        <span class="feature-tag">Wireless Charge</span>
                    </div>
                    <div class="product-footer">
                        <div>
                            <div class="product-price">Rp 1.199.000</div>
                            <div class="discount">Rp 1.999.000</div>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>Keranjang
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-badge sale-badge">Sale</div>
                <div class="discount-percentage">-25%</div>
                <div class="product-image">
                    <img src="https://images.unsplash.com/photo-1526170375885-4d8ecf77b99f?w=400" alt="Action Camera">
                    <div class="product-actions">
                        <button class="action-btn" title="Tambah ke Wishlist"><i class="far fa-heart"></i></button>
                        <button class="action-btn" title="Lihat Detail"><i class="far fa-eye"></i></button>
                    </div>
                </div>
                <div class="product-info">
                    <div class="product-category">Kamera</div>
                    <h3 class="product-title">Action Camera 4K</h3>
                    <p>Harga spesial! Kamera aksi 4K untuk petualangan Anda.</p>
                    <div class="product-features">
                        <span class="feature-tag">4K 60fps</span>
                        <span class="feature-tag">Waterproof</span>
                        <span class="feature-tag">WiFi</span>
                    </div>
                    <div class="product-footer">
                        <div>
                            <div class="product-price">Rp 3.749.000</div>
                            <div class="discount">Rp 4.999.000</div>
                        </div>
                        <button class="add-to-cart">
                            <i class="fas fa-shopping-cart"></i>Keranjang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

        <!-- kelebihan -->
       <div class="container">
        <h2 class="section-title mt-2">Kenapa harus membeli di Barcom? </h2>
        <div class="row g-4">
            <!-- Card 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h5 class="card-title">Pengiriman Cepat</h5>
                        <p class="card-text">
                            Kami menyediakan layanan pengiriman cepat ke seluruh Indonesia. 
                            Pesanan Anda akan sampai dalam waktu 1-3 hari kerja.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h5 class="card-title">Garansi 100%</h5>
                        <p class="card-text">
                            Semua produk kami dilengkapi dengan garansi 100% kepuasan. 
                            Jika tidak puas, Anda dapat mengembalikan produk dengan mudah.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h5 class="card-title">Layanan 24/7</h5>
                        <p class="card-text">
                            Tim customer service kami siap membantu Anda 24 jam sehari, 
                            7 hari seminggu melalui chat, telepon, atau email.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 4 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-tags"></i>
                        </div>
                        <h5 class="card-title">Harga Terjangkau</h5>
                        <p class="card-text">
                            Kami menawarkan produk berkualitas dengan harga yang kompetitif 
                            dan terjangkau untuk semua kalangan.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 5 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-award"></i>
                        </div>
                        <h5 class="card-title">Kualitas Terjamin</h5>
                        <p class="card-text">
                            Semua produk kami melalui proses quality control yang ketat 
                            untuk memastikan kualitas terbaik untuk pelanggan.
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Card 6 -->
            <div class="col-md-6 col-lg-4">
                <div class="card feature-card shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon">
                            <i class="fas fa-lock"></i>
                        </div>
                        <h5 class="card-title">Pembayaran Aman</h5>
                        <p class="card-text">
                            Sistem pembayaran kami terjamin keamanannya dengan enkripsi 
                            terbaru untuk melindungi data pribadi Anda.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection\