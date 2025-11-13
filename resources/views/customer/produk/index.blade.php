<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Produk Elektronik</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        
        header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e1e5eb;
        }
        
        h1 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        
        .subtitle {
            color: #7f8c8d;
            font-size: 1.1rem;
        }
        
        .content-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
        }
        
        .categories {
            flex: 1;
            min-width: 250px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            height: fit-content;
        }
        
        .categories h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }
        
        .category-list {
            list-style: none;
        }
        
        .category-item {
            padding: 12px 15px;
            margin-bottom: 8px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        
        .category-item:hover {
            background-color: #f0f7ff;
        }
        
        .category-item.active {
            background-color: #FFD700;
            color: white;
        }
        
        .category-icon {
            margin-right: 10px;
            font-size: 1.2rem;
        }
        
        .products {
            flex: 3;
            min-width: 300px;
        }
        
        .products h2 {
            color: #2c3e50;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid #3498db;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .product-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .product-image {
            height: 180px;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .product-card:hover .product-image img {
            transform: scale(1.05);
        }
        
        .product-info {
            padding: 15px;
        }
        
        .product-category {
            color: #3498db;
            font-size: 0.8rem;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .product-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 10px;
            color: #2c3e50;
        }
        
        .product-price {
            font-size: 1.2rem;
            font-weight: 700;
            color: #e74c3c;
        }
        
        @media (max-width: 768px) {
            .content-wrapper {
                flex-direction: column;
            }
            
            .categories {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Daftar Produk Elektronik</h1>
            <p class="subtitle">Temukan berbagai produk elektronik terbaru dengan kualitas terbaik</p>
        </header>
        
        <div class="content-wrapper">
            <div class="categories">
                <h2>Kategori</h2>
                <ul class="category-list">
                    <li class="category-item active" data-category="all">
                        <span class="category-icon"></span>
                        Semua Produk
                    </li>
                    <li class="category-item" data-category="smartphone">
                        <span class="category-icon"></span>
                        Smartphone
                    </li>
                    <li class="category-item" data-category="laptop">
                        <span class="category-icon"></span>
                        Laptop & Komputer
                    </li>
                    <li class="category-item" data-category="tv">
                        <span class="category-icon"></span>
                        Televisi
                    </li>
                    <li class="category-item" data-category="audio">
                        <span class="category-icon"></span>
                        Audio & Headphone
                    </li>
                    <li class="category-item" data-category="camera">
                        <span class="category-icon"></span>
                        Kamera
                    </li>
                    <li class="category-item" data-category="gaming">
                        <span class="category-icon"></span>
                        Gaming
                    </li>
                    <li class="category-item" data-category="smart-home">
                        <span class="category-icon"></span>
                        Smart Home
                    </li>
                </ul>
            </div>
            
            <div class="products">
                <h2>Produk Elektronik</h2>
                <div class="products-grid" id="products-container">
                    <!-- Produk akan dimuat di sini melalui JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data produk dengan URL gambar
        const products = [
            {
                id: 1,
                title: "iPhone 14 Pro",
                category: "smartphone",
                price: "Rp 18.999.000",
                image: "https://images.unsplash.com/photo-1592750475338-74b7b21085ab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 2,
                title: "Samsung Galaxy S23",
                category: "smartphone",
                price: "Rp 12.499.000",
                image: "https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 3,
                title: "MacBook Pro 14\"",
                category: "laptop",
                price: "Rp 27.999.000",
                image: "https://images.unsplash.com/photo-1517336714731-489689fd1ca8?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 4,
                title: "Dell XPS 13",
                category: "laptop",
                price: "Rp 19.999.000",
                image: "https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 5,
                title: "Samsung QLED 4K 55\"",
                category: "tv",
                price: "Rp 12.999.000",
                image: "https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 6,
                title: "Sony Bravia OLED 65\"",
                category: "tv",
                price: "Rp 24.999.000",
                image: "https://images.unsplash.com/photo-1593359677879-a4bb92f829d1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 7,
                title: "Sony WH-1000XM5",
                category: "audio",
                price: "Rp 4.999.000",
                image: "https://images.unsplash.com/photo-1583394838336-acd977736f90?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 8,
                title: "AirPods Pro 2",
                category: "audio",
                price: "Rp 3.999.000",
                image: "https://images.unsplash.com/photo-1606220945770-b5b6c2c55bf1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 9,
                title: "Canon EOS R5",
                category: "camera",
                price: "Rp 49.999.000",
                image: "https://images.unsplash.com/photo-1502920917128-1aa500764cbd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 10,
                title: "Sony A7 IV",
                category: "camera",
                price: "Rp 32.999.000",
                image: "https://images.unsplash.com/photo-1515378791036-0648a3ef77b2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 11,
                title: "PlayStation 5",
                category: "gaming",
                price: "Rp 8.999.000",
                image: "https://images.unsplash.com/photo-1606813907291-d86efa9b94db?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 12,
                title: "Nintendo Switch OLED",
                category: "gaming",
                price: "Rp 5.499.000",
                image: "https://images.unsplash.com/photo-1578303512597-81e6cc155b3e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 13,
                title: "Google Nest Hub",
                category: "smart-home",
                price: "Rp 1.299.000",
                image: "https://images.unsplash.com/photo-1558089687-db4b18a82de0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            },
            {
                id: 14,
                title: "Amazon Echo Dot",
                category: "smart-home",
                price: "Rp 899.000",
                image: "https://images.unsplash.com/photo-1543512214-318c7553f230?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80"
            }
        ];

        // Kategori untuk filter
        const categories = [
            { id: "all", name: "Semua Produk" },
            { id: "smartphone", name: "Smartphone" },
            { id: "laptop", name: "Laptop & Komputer" },
            { id: "tv", name: "Televisi" },
            { id: "audio", name: "Audio & Headphone" },
            { id: "camera", name: "Kamera" },
            { id: "gaming", name: "Gaming" },
            { id: "smart-home", name: "Smart Home" }
        ];

        // Fungsi untuk menampilkan produk
        function displayProducts(category = "all") {
            const productsContainer = document.getElementById("products-container");
            productsContainer.innerHTML = "";
            
            const filteredProducts = category === "all" 
                ? products 
                : products.filter(product => product.category === category);
            
            if (filteredProducts.length === 0) {
                productsContainer.innerHTML = "<p>Tidak ada produk dalam kategori ini.</p>";
                return;
            }
            
            filteredProducts.forEach(product => {
                const productCard = document.createElement("div");
                productCard.className = "product-card";
                
                productCard.innerHTML = `
                    <div class="product-image">
                        <img src="${product.image}" alt="${product.title}">
                    </div>
                    <div class="product-info">
                        <div class="product-category">${categories.find(cat => cat.id === product.category).name}</div>
                        <h3 class="product-title">${product.title}</h3>
                        <div class="product-price">${product.price}</div>
                    </div>
                `;
                
                productsContainer.appendChild(productCard);
            });
        }

        // Fungsi untuk mengatur kategori aktif
        function setActiveCategory(categoryId) {
            document.querySelectorAll(".category-item").forEach(item => {
                item.classList.remove("active");
            });
            
            document.querySelector(`.category-item[data-category="${categoryId}"]`).classList.add("active");
        }

        // Event listener untuk kategori
        document.querySelectorAll(".category-item").forEach(item => {
            item.addEventListener("click", function() {
                const category = this.getAttribute("data-category");
                setActiveCategory(category);
                displayProducts(category);
            });
        });

        // Inisialisasi halaman
        document.addEventListener("DOMContentLoaded", function() {
            displayProducts();
        });
    </script>
</body>
</html>