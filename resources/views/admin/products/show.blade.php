@extends('admin.layouts.master')
@section('title', 'Detail Product')

@section('content')
<div class="page-title mb-4">
    <div class="row">
        <div class="col-12">
            <h3 class="fw-bold">{{ $product->name }}</h3>
            <p class="text-muted mb-0">Detail lengkap produk {{ $product->name }}</p>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        <div class="row">
            {{-- Gambar Utama & Gambar Tambahan --}}
            <div class="col-md-5 mb-4">
                <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/No_image_available.webp') }}" 
                    alt="{{ $product->name }}" 
                    class="img-fluid rounded shadow-sm main-image previewable"
                    style="max-height: 400px; object-fit: contain; cursor: pointer;"
                    data-src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/No_image_available.webp') }}">

                @if($product->images->count() > 0)
                    <div class="mt-3">
                        <h6 class="fw-semibold">Gambar Tambahan</h6>
                        <div class="d-flex flex-wrap gap-2 mt-2">
                            @foreach($product->images as $img)
                                <div class="border rounded p-1 bg-white shadow-sm" style="width: 80px; height: 80px;">
                                    <img src="{{ asset('storage/' . $img->image) }}" 
                                        alt="Additional image" 
                                        class="img-fluid rounded previewable"
                                        style="object-fit: cover; width: 100%; height: 100%; cursor: pointer;"
                                        data-src="{{ asset('storage/' . $img->image) }}"
                                        onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                <p class="text-muted small mt-2">Klik untuk memperbesar</p>
            </div>

            {{-- Detail Produk --}}
            <div class="col-md-7">
                <h5 class="fw-bold mb-3 text-primary">Informasi Produk</h5>
                <table class="table table-borderless">
                    <tr>
                        <th width="30%">Kategori</th>
                        <td>{{ $product->category?->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Brand</th>
                        <td>{{ $product->brand?->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td class="fw-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    </tr>
                    @if($product->discount_price)
                    <tr>
                        <th>Harga Diskon</th>
                        <td class="text-success fw-semibold">
                            Rp {{ number_format($product->discount_price, 0, ',', '.') }}
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($product->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Best Seller</th>
                        <td>
                            @if($product->is_best_seller)
                                <span class="badge bg-warning">Best Seller</span>
                            @else
                                <span class="badge bg-light-secondary">Tidak</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Power Deals</th>
                        <td>
                            @if($product->is_power_deals)
                                <span class="badge bg-info">Power Deals</span>
                            @else
                                <span class="badge bg-light-secondary">Tidak</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Special Product</th>
                        <td>
                            @if($product->is_special)
                                <span class="badge bg-danger">Special</span>
                            @else
                                <span class="badge bg-light-secondary">Tidak</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat</th>
                        <td>{{ $product->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diperbarui</th>
                        <td>{{ $product->updated_at->format('d M Y, H:i') }}</td>
                    </tr>
                </table>

                <h5 class="fw-bold mt-4 text-primary">Deskripsi Produk</h5>
                <div class="text-muted">
                    {!! nl2br(e($product->description ?? 'Tidak ada deskripsi.')) !!}
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-light-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <div>
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning me-2">
                            <i class="bi bi-pencil"></i> Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Preview Gambar --}}
<div id="imagePreviewModal" class="image-preview-modal">
    <span class="close-btn">&times;</span>
    <div class="image-container">
        <img class="modal-content" id="previewImage">
    </div>
    <div class="zoom-controls">
        <button class="zoom-btn" id="zoomIn">+</button>
        <button class="zoom-btn" id="zoomOut">−</button>
        <button class="zoom-btn" id="resetZoom">⟳</button>
    </div>
    <a class="prev-btn">&#10094;</a>
    <a class="next-btn">&#10095;</a>
</div>

<style>
.image-preview-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background-color: rgba(0,0,0,0.9);
    overflow: hidden;
}

.image-preview-modal .image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    overflow: hidden;
    padding: 80px 20px 100px;
}

.image-preview-modal img {
    max-width: 70%;
    max-height: 70vh;
    width: auto;
    height: auto;
    object-fit: contain;
    transition: none;
    border-radius: 10px;
    cursor: grab;
    will-change: transform;
}

.image-preview-modal img.dragging {
    cursor: grabbing;
    transition: none;
}

.image-preview-modal .close-btn {
    position: absolute;
    top: 20px; right: 35px;
    color: #fff;
    font-size: 40px;
    font-weight: bold;
    cursor: pointer;
    z-index: 10000;
}

.image-preview-modal .close-btn:hover {
    color: #ccc;
}

.image-preview-modal .prev-btn,
.image-preview-modal .next-btn {
    cursor: pointer;
    position: absolute;
    top: 50%;
    color: white;
    font-weight: bold;
    font-size: 40px;
    padding: 10px;
    user-select: none;
    transform: translateY(-50%);
    background-color: rgba(0,0,0,0.3);
    border-radius: 50%;
    width: 50px; height: 50px;
    text-align: center;
    line-height: 30px;
    z-index: 10000;
    transition: background-color 0.3s ease;
}

.image-preview-modal .prev-btn:hover,
.image-preview-modal .next-btn:hover {
    background-color: rgba(255,255,255,0.2);
}

.image-preview-modal .prev-btn { left: 30px; }
.image-preview-modal .next-btn { right: 30px; }

.zoom-controls {
    position: absolute;
    bottom: 30px;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    gap: 10px;
    z-index: 10000;
}

.zoom-btn {
    background-color: rgba(255,255,255,0.1);
    border: 1px solid rgba(255,255,255,0.3);
    color: #fff;
    font-size: 22px;
    border-radius: 50%;
    width: 45px; height: 45px;
    cursor: pointer;
    backdrop-filter: blur(5px);
    transition: background-color 0.3s ease;
}

.zoom-btn:hover {
    background-color: rgba(255,255,255,0.3);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById("imagePreviewModal");
    const modalImg = document.getElementById("previewImage");
    const closeBtn = document.querySelector(".close-btn");
    const nextBtn = document.querySelector(".next-btn");
    const prevBtn = document.querySelector(".prev-btn");

    const zoomInBtn = document.getElementById("zoomIn");
    const zoomOutBtn = document.getElementById("zoomOut");
    const resetZoomBtn = document.getElementById("resetZoom");

    const allImages = Array.from(document.querySelectorAll(".previewable, .main-image"));
    let currentIndex = 0;
    let zoomLevel = 1;
    let isDragging = false;
    let startX, startY, translateX = 0, translateY = 0;

    // buka modal
    allImages.forEach((img, index) => {
        img.addEventListener("click", function() {
            modal.style.display = "block";
            modalImg.src = img.dataset.src || img.src;
            currentIndex = index;
            resetZoom();
        });
    });

    // close modal
    closeBtn.onclick = () => modal.style.display = "none";
    modal.onclick = (e) => { 
        if (e.target === modal || e.target.classList.contains('image-container')) {
            modal.style.display = "none"; 
        }
    };

    // next/prev
    nextBtn.onclick = () => { changeImage(1); };
    prevBtn.onclick = () => { changeImage(-1); };
    
    function changeImage(dir) {
        currentIndex = (currentIndex + dir + allImages.length) % allImages.length;
        modalImg.src = allImages[currentIndex].dataset.src || allImages[currentIndex].src;
        resetZoom();
    }

    // keyboard navigasi
    document.addEventListener('keydown', function(e) {
        if (modal.style.display === "block") {
            if (e.key === "ArrowRight") changeImage(1);
            if (e.key === "ArrowLeft") changeImage(-1);
            if (e.key === "Escape") modal.style.display = "none";
        }
    });

    // zoom in/out/reset
    zoomInBtn.onclick = () => zoom(1.2);
    zoomOutBtn.onclick = () => zoom(0.8);
    resetZoomBtn.onclick = resetZoom;

    function zoom(factor) {
        zoomLevel *= factor;
        zoomLevel = Math.max(0.5, Math.min(zoomLevel, 5));
        applyTransform(true);
    }

    function resetZoom() {
        zoomLevel = 1;
        translateX = 0;
        translateY = 0;
        applyTransform(true);
    }

    function applyTransform(smooth = false) {
        if (smooth) {
            modalImg.style.transition = 'transform 0.3s ease-out';
            setTimeout(() => {
                modalImg.style.transition = 'none';
            }, 300);
        }
        modalImg.style.transform = `scale(${zoomLevel}) translate(${translateX / zoomLevel}px, ${translateY / zoomLevel}px)`;
    }

    // drag to move image
    modalImg.addEventListener("mousedown", (e) => {
        if (zoomLevel <= 1) return;
        e.preventDefault();
        isDragging = true;
        modalImg.classList.add('dragging');
        startX = e.clientX - translateX;
        startY = e.clientY - translateY;
    });

    window.addEventListener("mouseup", () => {
        isDragging = false;
        modalImg.classList.remove('dragging');
    });

    window.addEventListener("mousemove", (e) => {
        if (!isDragging) return;
        e.preventDefault();
        translateX = e.clientX - startX;
        translateY = e.clientY - startY;
        applyTransform(false);
    });

    // zoom dengan scroll
    modalImg.addEventListener("wheel", (e) => {
        e.preventDefault();
        const delta = e.deltaY;
        const factor = delta < 0 ? 1.1 : 0.9;
        zoom(factor);
    }, { passive: false });

    // Prevent image drag default behavior
    modalImg.addEventListener('dragstart', (e) => {
        e.preventDefault();
    });
});
</script>
@endsection