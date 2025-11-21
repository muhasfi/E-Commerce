@extends('admin.layouts.master')
@section('title', 'Detail Banner')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Detail Banner</h3>
            <p class="text-subtitle text-muted">Informasi lengkap banner</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <!-- Informasi Banner -->
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th width="200">Judul Banner</th>
                            <td>: {{ $banner->title }}</td>
                        </tr>
                        <tr>
                            <th>Link</th>
                            <td>:
                                @if ($banner->link)
                                    <a href="{{ $banner->link }}" target="_blank" class="text-primary">
                                        {{ $banner->link }}
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada link</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                @if($banner->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>: {{ $banner->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diubah</th>
                            <td>: {{ $banner->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Gambar Banner -->
            <div class="col-md-4">
                <div class="text-center">
                    <label class="form-label fw-bold">Gambar Banner</label>
                    @if($banner->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $banner->image) }}" 
                                 alt="{{ $banner->title }}"
                                 class="img-thumbnail previewable"
                                 style="max-width: 250px; cursor: pointer;"
                                 data-src="{{ asset('storage/' . $banner->image) }}"
                                 onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                            <p class="text-muted small mt-2">Klik untuk memperbesar</p>
                        </div>
                    @else
                        <div class="mb-3">
                            <img src="{{ asset('images/No_image_available.webp') }}" 
                                 alt="No Image"
                                 class="img-thumbnail"
                                 style="max-width: 250px;">
                        </div>
                        <p class="text-muted">Belum ada gambar</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.banners.index') }}" class="btn btn-light-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <div>
                <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning me-2">
                    <i class="bi bi-pencil"></i> Edit
                </a>
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

/* Container untuk gambar */
.image-preview-modal .image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
    overflow: hidden;
    padding: 80px 20px 100px;
}

/* Gambar lebih kecil dan proporsional */
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

/* Tombol close */
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

/* Tombol Zoom */
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
    const zoomInBtn = document.getElementById("zoomIn");
    const zoomOutBtn = document.getElementById("zoomOut");
    const resetZoomBtn = document.getElementById("resetZoom");

    const previewImage = document.querySelector(".previewable");
    let zoomLevel = 1;
    let isDragging = false;
    let startX, startY, translateX = 0, translateY = 0;

    // Buka modal hanya jika ada gambar yang bisa di-preview
    if (previewImage) {
        previewImage.addEventListener("click", function() {
            modal.style.display = "block";
            modalImg.src = this.dataset.src || this.src;
            resetZoom();
        });
    }

    // Close modal
    closeBtn.onclick = () => modal.style.display = "none";
    modal.onclick = (e) => { 
        if (e.target === modal || e.target.classList.contains('image-container')) {
            modal.style.display = "none"; 
        }
    };

    // Keyboard navigasi (hanya ESC untuk close)
    document.addEventListener('keydown', function(e) {
        if (modal.style.display === "block" && e.key === "Escape") {
            modal.style.display = "none";
        }
    });

    // Zoom in/out/reset dengan smooth transition
    zoomInBtn.onclick = () => zoom(1.2);
    zoomOutBtn.onclick = () => zoom(0.8);
    resetZoomBtn.onclick = resetZoom;

    function zoom(factor) {
        zoomLevel *= factor;
        zoomLevel = Math.max(0.5, Math.min(zoomLevel, 5)); // Limit zoom 0.5x - 5x
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

    // Drag to move image dengan smooth movement
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

    // Zoom pakai scroll - lebih smooth
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