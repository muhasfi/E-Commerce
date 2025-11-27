<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Produk - Toko Elektronik</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        .page-header {
            margin-bottom: 20px;
        }
        
        .page-title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .breadcrumb {
            font-size: 14px;
            color: #666;
        }
        
        .breadcrumb a {
            color: #007bff;
            text-decoration: none;
        }
        
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        
        .content-wrapper {
            display: flex;
            gap: 20px;
        }
        
        /* Sidebar Styles */
        .sidebar {
            width: 220px;
            flex-shrink: 0;
        }
        
        .filter-section {
            background-color: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .filter-title {
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 16px;
        }
        
        .price-filter {
            margin-bottom: 20px;
        }
        
        .price-range {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }
        
        .price-input {
            width: 100%;
            margin-bottom: 15px;
        }
        
        .filter-button {
            background-color: #f0f0f0;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            transition: background-color 0.3s;
        }
        
        .filter-button:hover {
            background-color: #e0e0e0;
        }
        
        .categories-list {
            list-style: none;
        }
        
        .category-item {
            padding: 8px 0;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            transition: background-color 0.3s;
        }
        
        .category-item:hover {
            background-color: #f9f9f9;
        }
        
        .category-name {
            color: #333;
            text-decoration: none;
            transition: color 0.3s;
            font-size: 14px;
        }
        
        .category-name:hover {
            color: #007bff;
        }
        
        .category-count {
            color: #999;
            font-size: 12px;
        }
        
        /* Main Content Styles */
        .main-content {
            flex: 1;
        }
        
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 15px;
        }
        
        .product-card {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            height: 100%;
            cursor: pointer;
        }
        
        .product-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        
        .product-image {
            height: 120px;
            background-color: #f9f9f9;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            transition: transform 0.5s ease;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.05);
        }
        
        .product-badge {
            position: absolute;
            top: 6px;
            left: 6px;
            background-color: #ff4444;
            color: white;
            padding: 2px 6px;
            border-radius: 3px;
            font-size: 9px;
            font-weight: 600;
            z-index: 1;
        }
        
        .product-info {
            padding: 10px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .product-category {
            font-size: 9px;
            color: #666;
            margin-bottom: 5px;
            line-height: 1.3;
        }
        
        .product-title {
            font-weight: 600;
            margin-bottom: 6px;
            line-height: 1.3;
            flex-grow: 1;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            font-size: 12px;
            min-height: 32px;
        }
        
        .product-price {
            margin-bottom: 8px;
        }
        
        .current-price {
            font-weight: 600;
            font-size: 13px;
            color: #333;
        }
        
        .original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 11px;
            margin-left: 5px;
        }
        
        .product-actions {
            display: flex;
            gap: 8px;
            margin-top: auto;
        }
        
        .btn {
            padding: 5px 8px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 500;
            flex: 1;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
            font-size: 11px;
        }
        
        .btn-primary {
            background-color: #007bff;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #0056b3;
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid #007bff;
            color: #007bff;
        }
        
        .btn-outline:hover {
            background-color: #007bff;
            color: white;
        }
        
        .results-info {
            margin-bottom: 15px;
            font-size: 14px;
            color: #666;
        }
        
        .store-info {
            background-color: white;
            padding: 15px;
            border-radius: 8px;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        }
        
        .no-products {
            text-align: center;
            padding: 40px;
            background-color: white;
            border-radius: 8px;
            color: #666;
        }
        
        .active-category {
            font-weight: bold;
            color: #007bff;
        }
        
        /* Popup Styles */
        .popup-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }
        
        .popup-overlay.active {
            opacity: 1;
            visibility: visible;
        }
        
        .popup-content {
            background-color: white;
            border-radius: 10px;
            width: 90%;
            max-width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            display: flex;
            flex-direction: row;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transform: scale(0.9);
            transition: transform 0.3s;
        }
        
        .popup-overlay.active .popup-content {
            transform: scale(1);
        }
        
        .popup-image {
            flex: 0 0 45%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px 0 0 10px;
        }
        
        .popup-image img {
            max-width: 100%;
            max-height: 400px;
            object-fit: contain;
        }
        
        .popup-details {
            flex: 1;
            padding: 25px;
            display: flex;
            flex-direction: column;
        }
        
        .popup-category {
            font-size: 12px;
            color: #666;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .popup-title {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 15px;
            line-height: 1.3;
        }
        
        .popup-brand {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
            font-weight: 500;
        }
        
        .popup-price-container {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 25px;
            padding: 15px;
            background-color: #f8f9fa;
            border-radius: 8px;
        }
        
        .popup-price-group {
            display: flex;
            flex-direction: column;
        }
        
        .popup-price-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .popup-current-price {
            font-weight: 700;
            font-size: 24px;
            color: #e53935;
        }
        
        .popup-original-price {
            text-decoration: line-through;
            color: #999;
            font-size: 16px;
        }
        
        .popup-discount {
            background-color: #e53935;
            color: white;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
        
        .popup-quantity {
            margin-bottom: 25px;
        }
        
        .popup-quantity-label {
            display: block;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .quantity-controls {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .quantity-btn {
            width: 36px;
            height: 36px;
            border: 1px solid #ddd;
            background-color: white;
            border-radius: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        
        .quantity-btn:hover {
            background-color: #f5f5f5;
        }
        
        .quantity-input {
            width: 60px;
            height: 36px;
            border: 1px solid #ddd;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
        }
        
        .popup-actions {
            display: flex;
            gap: 12px;
            margin-top: auto;
        }
        
        .popup-btn {
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            flex: 1;
            text-align: center;
            transition: background-color 0.3s, color 0.3s;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        
        .popup-close {
            position: absolute;
            top: 15px;
            right: 15px;
            background: none;
            border: none;
            font-size: 24px;
            color: #666;
            cursor: pointer;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            transition: background-color 0.3s;
            z-index: 10;
        }
        
        .popup-close:hover {
            background-color: #f0f0f0;
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .content-wrapper {
                flex-direction: column;
            }
            
            .sidebar {
                width: 100%;
            }
            
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            }
        }
        
        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
                gap: 12px;
            }
            
            .product-image {
                height: 100px;
            }
            
            .product-info {
                padding: 8px;
            }
            
            .popup-content {
                flex-direction: column;
                width: 95%;
            }
            
            .popup-image {
                flex: 0 0 auto;
                border-radius: 10px 10px 0 0;
                padding: 15px;
            }
            
            .popup-image img {
                max-height: 250px;
            }
            
            .popup-details {
                padding: 20px;
            }
            
            .popup-price-container {
                flex-direction: column;
                align-items: flex-start;
                gap: 10px;
            }
        }
        
        @media (max-width: 576px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .container {
                padding: 15px;
            }
            
            .product-image {
                height: 90px;
            }
            
            .popup-title {
                font-size: 18px;
            }
            
            .popup-current-price {
                font-size: 20px;
            }
            
            .popup-original-price {
                font-size: 14px;
            }
            
            .popup-actions {
                flex-direction: column;
            }
        }
        
        @media (max-width: 400px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
            
            .product-image {
                height: 110px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Laptop</h1>
            <div class="breadcrumb"><a href="#">Home</a> / Laptop</div>
        </div>
        
        <div class="content-wrapper">
            <!-- Sidebar -->
            <div class="sidebar">
                <div class="filter-section">
                    <h3 class="filter-title">Filter by price</h3>
                    <div class="price-filter">
                        <div class="price-range">
                            <span id="price-range-text">Price: Rp0 — Rp40,999,000</span>
                        </div>
                        <input type="range" id="price-slider" class="price-input" min="0" max="40999000" value="40999000">
                        <button class="filter-button" id="apply-filter">Filter</button>
                    </div>
                </div>
                
                <div class="filter-section">
                    <h3 class="filter-title">Product categories</h3>
                    <ul class="categories-list">
                        <li class="category-item">
                            <a href="#" class="category-name" data-category="backpack">Backpack</a>
                            <span class="category-count">(2)</span>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-name" data-category="antena">Digital Antena</a>
                            <span class="category-count">(0)</span>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-name" data-category="flashsale">Flashsale</a>
                            <span class="category-count">(0)</span>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-name" data-category="console">Game Console</a>
                            <span class="category-count">(1)</span>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-name" data-category="handphone">Handphone & Tablet</a>
                            <span class="category-count">(63)</span>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-name" data-category="komputer">Komputer</a>
                            <span class="category-count">(613)</span>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-name active-category" data-category="laptop">Laptop</a>
                            <span class="category-count">(552)</span>
                        </li>
                        <li class="category-item">
                            <a href="#" class="category-name" data-category="aksesoris">Aksesoris Laptop</a>
                            <span class="category-count">(82)</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <!-- Main Content -->
            <div class="main-content">
                <div class="results-info">Laptop Showing 1-12 Products of 552 Products</div>
                
                <div class="product-grid" id="product-grid">
                    <!-- Product 1 -->
                    <div class="product-card" data-price="9299000" data-category="laptop" data-brand="Acer" data-original-price="9899000">
                        <div class="product-image">
                            <div class="product-badge">OK OFF</div>
                            <img src="https://images.unsplash.com/photo-1603302576837-37561b2e2302?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Acer Aspire 14 AI4 5IM">
                        </div>
                        <div class="product-info">
                            <div class="product-category">Acer, Aspire, Core 5, Laptop, Lap...</div>
                            <h3 class="product-title">Acer Aspire 14 AI4 5IM Intel Core i5-1235U 14" FHD IPS 8GB 512GB SSD Win 11 + OHS 2021</h3>
                            <div class="product-price">
                                <span class="current-price">Rp9,299,000.00</span>
                                <span class="original-price">Rp9,899,000.00</span>
                            </div>
                            <div class="product-actions">
                                <button class="btn btn-outline">Select options</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 2 -->
                    <div class="product-card" data-price="6499000" data-category="laptop" data-brand="Acer" data-original-price="6999000">
                        <div class="product-image">
                            <div class="product-badge">OK OFF</div>
                            <img src="https://images.unsplash.com/photo-1496181133206-80ce9b88a853?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Acer Aspire 3 A314-23M">
                        </div>
                        <div class="product-info">
                            <div class="product-category">Acer, Aspire, Laptop, Laptop AM...</div>
                            <h3 class="product-title">Acer Aspire 3 A314-23M AMD Ryzen 3 7320U 14" FHD IPS 8GB 512GB SSD Win 11 + OHS 2021</h3>
                            <div class="product-price">
                                <span class="current-price">Rp6,499,000.00</span>
                                <span class="original-price">Rp6,999,000.00</span>
                            </div>
                            <div class="product-actions">
                                <button class="btn btn-outline">Select options</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 3 -->
                    <div class="product-card" data-price="10549000" data-category="laptop" data-brand="Acer" data-original-price="12559000">
                        <div class="product-image">
                            <div class="product-badge">OK OFF</div>
                            <img src="https://images.unsplash.com/photo-1593640408182-31c70c8268f5?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Acer Aspire 7 PRO A715-59G">
                        </div>
                        <div class="product-info">
                            <div class="product-category">Acer, Aspire, Laptop, Laptop By ...</div>
                            <h3 class="product-title">Acer Aspire 7 PRO A715-59G Intel Core i5-12450H 15.6" FHD IPS 8GB 512GB SSD Win 11 + OHS 2021</h3>
                            <div class="product-price">
                                <span class="current-price">Rp10,549,000.00</span>
                                <span class="original-price">Rp12,559,000.00</span>
                            </div>
                            <div class="product-actions">
                                <button class="btn btn-primary">Add to cart</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product 4 -->
                    <div class="product-card" data-price="12500000" data-category="handphone" data-brand="Samsung" data-original-price="14999000">
                        <div class="product-image">
                            <div class="product-badge">NEW</div>
                            <img src="https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=500&q=80" alt="Samsung Galaxy S23">
                        </div>
                        <div class="product-info">
                            <div class="product-category">Handphone, Samsung, Galaxy...</div>
                            <h3 class="product-title">Samsung Galaxy S23 5G 256GB - Phantom Black</h3>
                            <div class="product-price">
                                <span class="current-price">Rp12,500,000.00</span>
                                <span class="original-price">Rp14,999,000.00</span>
                            </div>
                            <div class="product-actions">
                                <button class="btn btn-primary">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="store-info">
                    Laptop termurah, terlengkap, dan terupdate hanya di Els.id Yogyakarta, Solo, Tegal, Semarang, Purwokerto, dan Madiun
                </div>
            </div>
        </div>
    </div>

    <!-- Popup Detail Produk -->
    <div class="popup-overlay" id="product-popup">
        <div class="popup-content">
            <button class="popup-close" id="popup-close">&times;</button>
            <div class="popup-image">
                <img id="popup-img" src="" alt="Product Image">
            </div>
            <div class="popup-details">
                <div class="popup-category" id="popup-category"></div>
                <h2 class="popup-title" id="popup-title"></h2>
                <div class="popup-brand" id="popup-brand"></div>
                
                <div class="popup-price-container">
                    <div class="popup-price-group">
                        <div class="popup-price-label">Harga Normal</div>
                        <span class="popup-original-price" id="popup-original-price"></span>
                    </div>
                    <div class="popup-price-group">
                        <div class="popup-price-label">Harga Diskon</div>
                        <span class="popup-current-price" id="popup-current-price"></span>
                    </div>
                    <div class="popup-discount" id="popup-discount"></div>
                </div>
                
                <div class="popup-quantity">
                    <label class="popup-quantity-label">Jumlah Pembelian</label>
                    <div class="quantity-controls">
                        <button class="quantity-btn" id="decrease-qty">-</button>
                        <input type="number" class="quantity-input" id="quantity-input" value="1" min="1" max="99">
                        <button class="quantity-btn" id="increase-qty">+</button>
                    </div>
                </div>
                
                <div class="popup-actions">
                    <button class="popup-btn btn-primary">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                        Tambah ke Keranjang
                    </button>
                    <button class="popup-btn btn-outline">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l1.25 5h8.22l1.25-5H3.14zM5 13a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                        </svg>
                        Beli Sekarang
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Fungsi untuk mengaktifkan menu kategori
        document.addEventListener('DOMContentLoaded', function() {
            const categoryLinks = document.querySelectorAll('.category-name');
            const products = document.querySelectorAll('.product-card');
            const priceSlider = document.getElementById('price-slider');
            const priceRangeText = document.getElementById('price-range-text');
            const applyFilterBtn = document.getElementById('apply-filter');
            const productGrid = document.getElementById('product-grid');
            const resultsInfo = document.querySelector('.results-info');
            const pageTitle = document.querySelector('.page-title');
            const breadcrumb = document.querySelector('.breadcrumb');
            
            // Popup elements
            const popupOverlay = document.getElementById('product-popup');
            const popupClose = document.getElementById('popup-close');
            const popupImg = document.getElementById('popup-img');
            const popupCategory = document.getElementById('popup-category');
            const popupTitle = document.getElementById('popup-title');
            const popupBrand = document.getElementById('popup-brand');
            const popupCurrentPrice = document.getElementById('popup-current-price');
            const popupOriginalPrice = document.getElementById('popup-original-price');
            const popupDiscount = document.getElementById('popup-discount');
            
            // Quantity controls
            const decreaseQty = document.getElementById('decrease-qty');
            const increaseQty = document.getElementById('increase-qty');
            const quantityInput = document.getElementById('quantity-input');
            
            let currentCategory = 'laptop';
            let maxPrice = parseInt(priceSlider.value);
            
            // Update teks range harga
            priceSlider.addEventListener('input', function() {
                maxPrice = parseInt(this.value);
                priceRangeText.textContent = `Price: Rp0 — Rp${formatPrice(maxPrice)}`;
            });
            
            // Filter produk berdasarkan kategori
            categoryLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Hapus kelas aktif dari semua kategori
                    categoryLinks.forEach(item => {
                        item.classList.remove('active-category');
                    });
                    
                    // Tambahkan kelas aktif ke kategori yang dipilih
                    this.classList.add('active-category');
                    
                    // Dapatkan kategori yang dipilih
                    currentCategory = this.getAttribute('data-category');
                    
                    // Filter produk berdasarkan kategori
                    filterProducts();
                    
                    // Update judul halaman dan breadcrumb
                    updatePageInfo();
                });
            });
            
            // Terapkan filter harga
            applyFilterBtn.addEventListener('click', function() {
                filterProducts();
            });
            
            // Fungsi untuk memfilter produk
            function filterProducts() {
                let visibleCount = 0;
                
                products.forEach(product => {
                    const productPrice = parseInt(product.getAttribute('data-price'));
                    const productCategory = product.getAttribute('data-category');
                    
                    // Periksa apakah produk sesuai dengan kategori dan harga
                    if ((currentCategory === 'all' || productCategory === currentCategory) && productPrice <= maxPrice) {
                        product.style.display = 'block';
                        visibleCount++;
                    } else {
                        product.style.display = 'none';
                    }
                });
                
                // Update info hasil
                updateResultsInfo(visibleCount);
            }
            
            // Fungsi untuk memperbarui info hasil
            function updateResultsInfo(count) {
                const categoryName = document.querySelector('.category-name.active-category').textContent;
                resultsInfo.textContent = `${categoryName} Showing 1-${count} Products of ${count} Products`;
            }
            
            // Fungsi untuk memperbarui informasi halaman
            function updatePageInfo() {
                const categoryName = document.querySelector('.category-name.active-category').textContent;
                pageTitle.textContent = categoryName;
                breadcrumb.innerHTML = `<a href="#">Home</a> / ${categoryName}`;
            }
            
            // Fungsi untuk memformat harga
            function formatPrice(price) {
                return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }
            
            // Fungsi untuk menghitung persentase diskon
            function calculateDiscount(originalPrice, currentPrice) {
                const discount = ((originalPrice - currentPrice) / originalPrice) * 100;
                return Math.round(discount);
            }
            
            // Fungsi untuk mengatur kontrol kuantitas
            function setupQuantityControls() {
                decreaseQty.addEventListener('click', function() {
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue > 1) {
                        quantityInput.value = currentValue - 1;
                    }
                });
                
                increaseQty.addEventListener('click', function() {
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue < 99) {
                        quantityInput.value = currentValue + 1;
                    }
                });
                
                quantityInput.addEventListener('change', function() {
                    let value = parseInt(this.value);
                    if (isNaN(value) || value < 1) {
                        this.value = 1;
                    } else if (value > 99) {
                        this.value = 99;
                    }
                });
            }
            
            // Fungsi untuk membuka popup produk
            function openProductPopup(productCard) {
                const productImage = productCard.querySelector('.product-image img');
                const productCategory = productCard.querySelector('.product-category');
                const productTitle = productCard.querySelector('.product-title');
                const currentPrice = productCard.querySelector('.current-price');
                const originalPrice = productCard.querySelector('.original-price');
                
                // Dapatkan data dari atribut data
                const brand = productCard.getAttribute('data-brand');
                const price = parseInt(productCard.getAttribute('data-price'));
                const originalPriceValue = parseInt(productCard.getAttribute('data-original-price'));
                const discount = calculateDiscount(originalPriceValue, price);
                
                // Set data ke popup
                popupImg.src = productImage.src;
                popupImg.alt = productImage.alt;
                popupCategory.textContent = productCategory.textContent;
                popupTitle.textContent = productTitle.textContent;
                popupBrand.textContent = `Merk: ${brand}`;
                popupCurrentPrice.textContent = currentPrice.textContent;
                popupOriginalPrice.textContent = originalPrice.textContent;
                popupDiscount.textContent = `${discount}% OFF`;
                
                // Reset quantity
                quantityInput.value = 1;
                
                // Tampilkan popup
                popupOverlay.classList.add('active');
                document.body.style.overflow = 'hidden'; // Mencegah scroll di background
            }
            
            // Fungsi untuk menutup popup
            function closeProductPopup() {
                popupOverlay.classList.remove('active');
                document.body.style.overflow = 'auto'; // Mengembalikan scroll
            }
            
            // Event listener untuk membuka popup saat produk diklik
            products.forEach(product => {
                product.addEventListener('click', function() {
                    openProductPopup(this);
                });
            });
            
            // Event listener untuk menutup popup
            popupClose.addEventListener('click', closeProductPopup);
            
            // Event listener untuk menutup popup saat mengklik overlay
            popupOverlay.addEventListener('click', function(e) {
                if (e.target === popupOverlay) {
                    closeProductPopup();
                }
            });
            
            // Event listener untuk menutup popup dengan tombol ESC
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeProductPopup();
                }
            });
            
            // Inisialisasi kontrol kuantitas
            setupQuantityControls();
            
            // Inisialisasi filter saat halaman dimuat
            filterProducts();
        });
    </script>
</body>
</html>