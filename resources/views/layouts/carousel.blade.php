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