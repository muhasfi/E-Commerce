
    <!-- Bootstrap CSS -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
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
    </style>

<body>
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

    <!-- Bootstrap JS -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
