    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', 'Segoe UI', system-ui, -apple-system, sans-serif;
        }
        
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #10b981;
            --dark: #1e293b;
            --light: #f8fafc;
            --border: #e2e8f0;
            --shadow: rgba(0, 0, 0, 0.1);
            --gradient: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        body {
            background: linear-gradient(to bottom, #f1f5f9 0%, #ffffff 100%);
            color: var(--dark);
            line-height: 1.6;
            min-height: 100vh;
        }
        
        /* Header */
        .top-bar {
            background: var(--gradient);
            color: white;
            padding: 0.5rem 0;
            font-size: 0.875rem;
            text-align: center;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 1px 3px var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .nav-container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 2rem;
        }
        
        .logo {
            font-size: 1.5rem;
            font-weight: 800;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .search-bar {
            flex: 1;
            max-width: 600px;
            position: relative;
        }
        
        .search-bar input {
            width: 100%;
            padding: 0.75rem 3rem 0.75rem 1rem;
            border: 2px solid var(--border);
            border-radius: 50px;
            font-size: 0.95rem;
            transition: all 0.3s;
            outline: none;
        }
        
        .search-bar input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        
        .search-icon {
            position: absolute;
            right: 1.25rem;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1.2rem;
        }
        
        .cart-icon {
            position: relative;
            cursor: pointer;
            padding: 0.5rem;
        }
        
        .cart-icon::before {
            content: "🛒";
            font-size: 1.5rem;
        }
        
        .cart-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--secondary);
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        /* Container */
        .container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
        }
        
        /* Hero Section */
        .hero {
            background: var(--gradient);
            border-radius: 20px;
            padding: 3rem;
            margin-bottom: 2rem;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg width="100" height="100" xmlns="http://www.w3.org/2000/svg"><circle cx="50" cy="50" r="40" fill="rgba(255,255,255,0.05)"/></svg>');
            opacity: 0.3;
        }
        
        .hero-content {
            position: relative;
            z-index: 1;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            font-weight: 800;
        }
        
        .hero p {
            font-size: 1.1rem;
            opacity: 0.95;
        }
        
        /* Controls */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            gap: 1rem;
            flex-wrap: wrap;
        }
        
        .filter-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }
        
        .filter-tag {
            padding: 0.5rem 1rem;
            border: 2px solid var(--border);
            border-radius: 50px;
            background: white;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .filter-tag:hover {
            border-color: var(--primary);
            background: #eff6ff;
        }
        
        .filter-tag.active {
            background: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .sort-select {
            padding: 0.75rem 1rem;
            border: 2px solid var(--border);
            border-radius: 10px;
            background: white;
            cursor: pointer;
            font-size: 0.9rem;
            outline: none;
            transition: all 0.3s;
        }
        
        .sort-select:focus {
            border-color: var(--primary);
        }
        
        /* Stats */
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 15px;
            box-shadow: 0 2px 8px var(--shadow);
            text-align: center;
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--primary);
        }
        
        .stat-label {
            color: #64748b;
            font-size: 0.9rem;
            margin-top: 0.25rem;
        }
        
        /* Products Grid */
        .products-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .products-header h2 {
            font-size: 1.75rem;
            color: var(--dark);
        }
        
        .products-count {
            color: #64748b;
            font-size: 0.95rem;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 1.5rem;
            margin-bottom: 3rem;
        }
        
        /* Product Card */
        .product-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 2px 8px var(--shadow);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
        }
        
        .product-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.15);
        }
        
        .product-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--secondary);
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
            object-fit: cover;
            transition: transform 0.5s ease;
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
            box-shadow: 0 2px 8px var(--shadow);
            transition: all 0.3s;
        }
        
        .action-btn:hover {
            background: var(--primary);
            color: white;
            transform: scale(1.1);
        }
        
        .product-info {
            padding: 1.25rem;
        }
        
        .product-category {
            color: var(--primary);
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
            color: var(--dark);
            line-height: 1.4;
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
        
        .product-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 1rem;
            border-top: 1px solid var(--border);
        }
        
        .product-price {
            font-size: 1.4rem;
            font-weight: 800;
            color: var(--primary);
        }
        
        .add-to-cart {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        
        .add-to-cart:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }
        
        /* Loading Animation */
        .loading {
            display: none;
            text-align: center;
            padding: 3rem;
        }
        
        .loading.active {
            display: block;
        }
        
        .spinner {
            border: 4px solid var(--border);
            border-top: 4px solid var(--primary);
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 0 auto 1rem;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 4rem 2rem;
            display: none;
        }
        
        .empty-state.active {
            display: block;
        }
        
        .empty-state-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }
        
        .empty-state h3 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }
        
        .empty-state p {
            color: #64748b;
        }
        
        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 2rem;
            text-align: center;
            margin-top: 4rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                padding: 1rem;
            }
            
            .search-bar {
                max-width: 100%;
            }
            
            .hero {
                padding: 2rem 1.5rem;
            }
            
            .hero h1 {
                font-size: 1.75rem;
            }
            
            .controls {
                flex-direction: column;
                align-items: stretch;
            }
            
            .filter-tags {
                overflow-x: auto;
                flex-wrap: nowrap;
                padding-bottom: 0.5rem;
            }
            
            .products-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
                gap: 1rem;
            }
            
            .stats {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>

<body>
 
    <nav class="navbar">
        <div class="nav-container">
            
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Cari produk elektronik...">
                <span class="search-icon">🔍</span>
            </div>
            <div class="cart-icon">
                <span class="cart-badge">0</span>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div class="hero">
            <div class="hero-content">
                <h1>Katalog Produk Elektronik Premium</h1>
                <p>Temukan gadget dan elektronik terbaru dengan teknologi terkini</p>
            </div>
        </div>
        
        <div class="stats">
            <div class="stat-card">
                <div class="stat-value" id="totalProducts">0</div>
                <div class="stat-label">Total Produk</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">8</div>
                <div class="stat-label">Kategori</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">4.8★</div>
                <div class="stat-label">Rating Toko</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">24/7</div>
                <div class="stat-label">Customer Support</div>
            </div>
        </div>
        
        <div class="controls">
            <div class="filter-tags" id="filterTags"></div>
            <select class="sort-select" id="sortSelect">
                <option value="default">Urutkan: Default</option>
                <option value="price-low">Harga: Terendah</option>
                <option value="price-high">Harga: Tertinggi</option>
                <option value="name-asc">Nama: A-Z</option>
                <option value="name-desc">Nama: Z-A</option>
            </select>
        </div>
        
        <div class="products-header">
            <h2>Produk Tersedia</h2>
            <span class="products-count" id="productsCount">Menampilkan 0 produk</span>
        </div>
        
        <div class="loading" id="loading">
            <div class="spinner"></div>
            <p>Memuat produk...</p>
        </div>
        
        <div class="products-grid" id="productsContainer"></div>
        
        <div class="empty-state" id="emptyState">
            <div class="empty-state-icon">📦</div>
            <h3>Tidak Ada Produk</h3>
            <p>Maaf, tidak ada produk yang sesuai dengan pencarian Anda.</p>
        </div>
    </div>
    
    <footer>
        <p>&copy; 2024 ElectroShop. Semua hak dilindungi. Toko Elektronik Terpercaya Indonesia.</p>
    </footer>

    <script>
        const products = [
            { id: 1, title: "iPhone 14 Pro", category: "smartphone", price: 18999000, image: "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?w=800&q=80", badge: "Terlaris" },
            { id: 2, title: "Samsung Galaxy S23", category: "smartphone", price: 12499000, image: "https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w=800&q=80", badge: "Baru" },
            { id: 3, title: "MacBook Pro 14\"", category: "laptop", price: 27999000, image: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w=800&q=80", badge: "Premium" },
            { id: 4, title: "Dell XPS 13", category: "laptop", price: 19999000, image: "https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?w=800&q=80" },
            { id: 5, title: "Samsung QLED 4K 55\"", category: "tv", price: 12999000, image: "https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=800&q=80", badge: "Promo" },
            { id: 6, title: "Sony Bravia OLED 65\"", category: "tv", price: 24999000, image: "https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?w=800&q=80" },
            { id: 7, title: "Sony WH-1000XM5", category: "audio", price: 4999000, image: "https://images.unsplash.com/photo-1583394838336-acd977736f90?w=800&q=80", badge: "Terlaris" },
            { id: 8, title: "AirPods Pro 2", category: "audio", price: 3999000, image: "https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?w=800&q=80" },
            { id: 9, title: "Canon EOS R5", category: "camera", price: 49999000, image: "https://images.unsplash.com/photo-1502920917128-1aa500764cbd?w=800&q=80", badge: "Professional" },
            { id: 10, title: "Sony A7 IV", category: "camera", price: 32999000, image: "https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?w=800&q=80" },
            { id: 11, title: "PlayStation 5", category: "gaming", price: 8999000, image: "https://images.unsplash.com/photo-1606813907291-d86efa9b94db?w=800&q=80", badge: "Hot" },
            { id: 12, title: "Nintendo Switch OLED", category: "gaming", price: 5499000, image: "https://images.unsplash.com/photo-1578303512597-81e6cc155b3e?w=800&q=80" },
            { id: 13, title: "Google Nest Hub", category: "smart-home", price: 1299000, image: "https://images.unsplash.com/photo-1558089687-db4b18a82de0?w=800&q=80" },
            { id: 14, title: "Amazon Echo Dot", category: "smart-home", price: 899000, image: "https://images.unsplash.com/photo-1543512214-318c7553f230?w=800&q=80", badge: "Hemat" }
        ];

        const categories = [
            { id: "all", name: "✨ Semua Produk", icon: "🏪" },
            { id: "smartphone", name: "📱 Smartphone", icon: "📱" },
            { id: "laptop", name: "💻 Laptop", icon: "💻" },
            { id: "tv", name: "📺 Televisi", icon: "📺" },
            { id: "audio", name: "🎧 Audio", icon: "🎧" },
            { id: "camera", name: "📷 Kamera", icon: "📷" },
            { id: "gaming", name: "🎮 Gaming", icon: "🎮" },
            { id: "smart-home", name: "🏠 Smart Home", icon: "🏠" }
        ];

        let currentCategory = "all";
        let currentSort = "default";
        let searchQuery = "";
        let cartCount = 0;

        function formatPrice(price) {
            return `Rp ${price.toLocaleString('id-ID')}`;
        }

        function createProductCard(product) {
            return `
                <div class="product-card" data-category="${product.category}">
                    ${product.badge ? `<div class="product-badge">${product.badge}</div>` : ''}
                    <div class="product-image">
                        <img src="${product.image}" alt="${product.title}" loading="lazy">
                        <div class="product-actions">
                            <button class="action-btn" title="Tambah ke Wishlist">❤️</button>
                            <button class="action-btn" title="Lihat Detail">👁️</button>
                        </div>
                    </div>
                    <div class="product-info">
                        <div class="product-category">${categories.find(c => c.id === product.category).name}</div>
                        <h3 class="product-title">${product.title}</h3>
                        <div class="product-features">
                            <span class="feature-tag">✓ Garansi Resmi</span>
                            <span class="feature-tag">✓ Gratis Ongkir</span>
                        </div>
                        <div class="product-footer">
                            <div class="product-price">${formatPrice(product.price)}</div>
                            <button class="add-to-cart" onclick="addToCart(${product.id})">+ Keranjang</button>
                        </div>
                    </div>
                </div>
            `;
        }

        function filterProducts() {
            let filtered = products;

            if (currentCategory !== "all") {
                filtered = filtered.filter(p => p.category === currentCategory);
            }

            if (searchQuery) {
                filtered = filtered.filter(p => 
                    p.title.toLowerCase().includes(searchQuery.toLowerCase())
                );
            }

            return filtered;
        }

        function sortProducts(products) {
            const sorted = [...products];
            
            switch(currentSort) {
                case "price-low":
                    return sorted.sort((a, b) => a.price - b.price);
                case "price-high":
                    return sorted.sort((a, b) => b.price - a.price);
                case "name-asc":
                    return sorted.sort((a, b) => a.title.localeCompare(b.title));
                case "name-desc":
                    return sorted.sort((a, b) => b.title.localeCompare(a.title));
                default:
                    return sorted;
            }
        }

        function displayProducts() {
            const container = document.getElementById("productsContainer");
            const loading = document.getElementById("loading");
            const emptyState = document.getElementById("emptyState");
            
            loading.classList.add("active");
            container.innerHTML = "";
            emptyState.classList.remove("active");
            
            setTimeout(() => {
                loading.classList.remove("active");
                
                let filtered = filterProducts();
                let sorted = sortProducts(filtered);
                
                if (sorted.length === 0) {
                    emptyState.classList.add("active");
                    document.getElementById("productsCount").textContent = "Menampilkan 0 produk";
                    return;
                }
                
                container.innerHTML = sorted.map(createProductCard).join("");
                document.getElementById("productsCount").textContent = `Menampilkan ${sorted.length} produk`;
            }, 500);
        }

        function initializeFilters() {
            const filterTags = document.getElementById("filterTags");
            filterTags.innerHTML = categories.map(cat => `
                <div class="filter-tag ${cat.id === 'all' ? 'active' : ''}" data-category="${cat.id}">
                    ${cat.name}
                </div>
            `).join("");

            document.querySelectorAll(".filter-tag").forEach(tag => {
                tag.addEventListener("click", function() {
                    document.querySelectorAll(".filter-tag").forEach(t => t.classList.remove("active"));
                    this.classList.add("active");
                    currentCategory = this.dataset.category;
                    displayProducts();
                });
            });
        }

        function addToCart(productId) {
            cartCount++;
            document.querySelector(".cart-badge").textContent = cartCount;
            
            const btn = event.target;
            btn.textContent = "✓ Ditambahkan";
            btn.style.background = "var(--secondary)";
            
            setTimeout(() => {
                btn.textContent = "+ Keranjang";
                btn.style.background = "var(--gradient)";
            }, 2000);
        }

        document.getElementById("searchInput").addEventListener("input", function(e) {
            searchQuery = e.target.value;
            displayProducts();
        });

        document.getElementById("sortSelect").addEventListener("change", function(e) {
            currentSort = e.target.value;
            displayProducts();
        });

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("totalProducts").textContent = products.length;
            initializeFilters();
            displayProducts();
        });
    </script>
</body>
