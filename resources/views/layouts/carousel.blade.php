 <section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
             <!-- <img src="{{ asset('assets/customer/images/barcom no bg.png') }}" alt="Logo Paham Pajak" style="width: 200px; height: 200px; object-fit: contain;"> -->
            <div class="carousel-item active" style="background-image: url('{{ asset('assets/customer/images/laptop.jpg') }}');background-size: cover; background-position: center; height: 100vh;">
                <div class="carousel-container d-flex justify-content-center align-items-center text-center text-white" style="background: rgba(0, 0, 0, 0.5); height: 100%;">
                    <div>
                        <h1 class="display-4 fw-bold">Solusi Laptop Terbaik untuk Produktivitas Anda</h1>
                        <p class="lead">Temukan berbagai pilihan laptop berkualitas tinggi untuk kebutuhan kerja, belajar, dan hiburan. </p>
                        <p class="lead">Dapatkan performa cepat, desain modern, dan layanan purna jual terpercaya.</p>
                       
                    </div>
                </div>
            </div>

            <!-- Slide 2 -->
           <div class="carousel-item active" style="background-image: url('{{ asset('assets/customer/images/cctv.jpg') }}');background-size: cover; background-position: center; height: 100vh;">
                <div class="carousel-container d-flex justify-content-center align-items-center text-center text-white" style="background: rgba(0, 0, 0, 0.5); height: 100%;">
                    <div>
                        <h1 class="display-4 fw-bold">Keamanan Maksimal dengan Teknologi Terkini</h1>
                        <p class="lead">Pantau rumah dan tempat usaha Anda kapan saja dan di mana saja. </p>
                         <p class="lead">Sistem CCTV kami menawarkan kualitas gambar jernih dan fitur pemantauan jarak jauh yang mudah digunakan.</p>
                      
                    </div>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="carousel-item active" style="background-image: url('{{ asset('assets/customer/images/wifi.jpg') }}');background-size: cover; background-position: center; height: 100vh;">
                <div class="carousel-container d-flex justify-content-center align-items-center text-center text-white" style="background: rgba(0, 0, 0, 0.5); height: 100%;">
                    <div>
                        <h1 class="display-4 fw-bold">Internet Cepat dan Stabil</h1>
                        <p class="lead">Nikmati koneksi tanpa hambatan dengan layanan instalasi dan perangkat WiFi berkinerja tinggi</p>
                            <p class="lead">Cocok untuk rumah, kantor, dan bisnis yang membutuhkan akses internet lancar.</p>
                
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