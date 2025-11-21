@extends('admin.layouts.master')
@section('title', 'Lihat Pricelist Buku')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Preview Pricelist</h3>
            <p class="text-subtitle text-muted">Menampilkan PDF dengan efek buku 3D</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="text-center mb-4">{{ $priceList->name }}</h5>

        @if ($priceList->file && file_exists(public_path('storage/' . $priceList->file)))
            <!-- Loading Indicator -->
            <div id="loadingIndicator" class="text-center mb-3">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
                <p class="mt-2">Memuat PDF...</p>
            </div>

            <!-- Book Container -->
            <div id="bookWrapper" style="display: none;">
                <div class="flipbook-container">
                    <div id="flipbook"></div>
                </div>

                <!-- Controls -->
                <div class="controls text-center mt-4">
                    <button id="prevBtn" class="btn btn-primary me-2">
                        <i class="bi bi-chevron-left"></i> Previous
                    </button>
                    <span id="pageInfo" class="mx-3 fw-bold">Page 1</span>
                    <button id="nextBtn" class="btn btn-primary ms-2">
                        Next <i class="bi bi-chevron-right"></i>
                    </button>
                    <button id="zoomIn" class="btn btn-secondary ms-3">
                        <i class="bi bi-zoom-in"></i>
                    </button>
                    <button id="zoomOut" class="btn btn-secondary">
                        <i class="bi bi-zoom-out"></i>
                    </button>
                    <a href="{{ asset('storage/' . $priceList->file) }}" 
                       class="btn btn-success ms-3" 
                       download>
                        <i class="bi bi-download"></i> Download
                    </a>
                </div>
            </div>

            <!-- Error Message -->
            <div id="errorMessage" class="alert alert-danger" style="display: none;"></div>
        @else
            <div class="alert alert-warning">
                File tidak ditemukan.
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="{{ route('admin.price_lists.index') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
        </div>
    </div>
</div>

<style>
.flipbook-container {
    width: 100%;
    max-width: 1000px;
    margin: 0 auto;
    perspective: 2000px;
    background: #ffffff; /* Background putih */
    border-radius: 10px;
    padding: 30px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
    overflow: hidden; /* Potong element yang keluar */
}

#flipbook {
    width: 100%;
    height: 600px; /* Fixed height yang sama dengan Turn.js */
    margin: 0 auto;
    background: #ffffff;
}

#flipbook .page {
    width: 100%;
    height: 100%;
    background-color: #ffffff; /* Background putih untuk setiap halaman */
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.15);
}

#flipbook .page canvas {
    max-width: 100%;
    max-height: 100%;
    width: auto !important;
    height: auto !important;
    object-fit: contain;
}

/* Hard shadow untuk efek buku */
#flipbook .hard {
    background: #ffffff !important;
}

#flipbook .own-size {
    background: #ffffff !important;
}

.controls {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
}

.controls button, .controls a {
    min-width: 90px;
    border-radius: 6px;
}

/* Responsive untuk tablet */
@media (max-width: 992px) {
    .flipbook-container {
        max-width: 95%;
        padding: 20px;
    }

    #flipbook {
        height: 500px;
    }
}

/* Responsive untuk mobile */
@media (max-width: 576px) {
    .flipbook-container {
        padding: 15px;
    }

    #flipbook {
        height: 400px;
    }

    .controls button, .controls a {
        font-size: 0.85rem;
        padding: 6px 10px;
        min-width: 70px;
    }
}
</style>


{{-- jQuery (HARUS DIMUAT PERTAMA) --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

{{-- PDF.js Library --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>

{{-- Turn.js Library --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/turn.js/3/turn.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", async function () {
    const pdfUrl = "{{ asset('storage/' . $priceList->file) }}";
    const flipbookEl = document.getElementById("flipbook");
    const loadingEl = document.getElementById("loadingIndicator");
    const bookWrapperEl = document.getElementById("bookWrapper");
    const errorEl = document.getElementById("errorMessage");
    const pageInfoEl = document.getElementById("pageInfo");
    
    let currentZoom = 1;
    let pdfDoc = null;
    let totalPages = 0;
    const baseWidth = 1000;
    const baseHeight = 600;

    // Set PDF.js worker
    pdfjsLib.GlobalWorkerOptions.workerSrc = 
        'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

    try {
        // Cek apakah jQuery sudah dimuat
        if (typeof jQuery === 'undefined') {
            throw new Error('jQuery belum dimuat. Pastikan jQuery dimuat sebelum script ini.');
        }

        // Load PDF
        const loadingTask = pdfjsLib.getDocument(pdfUrl);
        pdfDoc = await loadingTask.promise;
        totalPages = pdfDoc.numPages;

        // Render all pages
        for (let pageNum = 1; pageNum <= totalPages; pageNum++) {
            const page = await pdfDoc.getPage(pageNum);
            
            // Hitung scale agar pas dengan ukuran halaman Turn.js
            const viewport = page.getViewport({ scale: 1 });
            const pageWidth = baseWidth / 2; // Karena double page
            const pageHeight = baseHeight;
            
            // Scale berdasarkan yang lebih kecil agar pas
            const scaleX = pageWidth / viewport.width;
            const scaleY = pageHeight / viewport.height;
            const scale = Math.min(scaleX, scaleY) * 1.5; // 1.5 untuk kualitas lebih baik
            
            const scaledViewport = page.getViewport({ scale });

            // Create canvas for each page
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.height = scaledViewport.height;
            canvas.width = scaledViewport.width;

            // Render PDF page to canvas
            await page.render({
                canvasContext: context,
                viewport: scaledViewport
            }).promise;

            // Create page div
            const pageDiv = document.createElement('div');
            pageDiv.className = 'page';
            pageDiv.appendChild(canvas);
            flipbookEl.appendChild(pageDiv);
        }

        // Initialize Turn.js
        $("#flipbook").turn({
            width: baseWidth,
            height: baseHeight,
            autoCenter: true,
            duration: 1000,
            gradients: true,
            elevation: 50,
            pages: totalPages,
            acceleration: true,
            when: {
                turned: function(event, page) {
                    updatePageInfo(page, totalPages);
                }
            }
        });

        // Show book and hide loading
        loadingEl.style.display = 'none';
        bookWrapperEl.style.display = 'block';
        updatePageInfo(1, totalPages);

        // Controls
        document.getElementById('prevBtn').addEventListener('click', function() {
            $("#flipbook").turn("previous");
        });

        document.getElementById('nextBtn').addEventListener('click', function() {
            $("#flipbook").turn("next");
        });

        document.getElementById('zoomIn').addEventListener('click', function() {
            if (currentZoom < 2) {
                currentZoom += 0.1;
                applyZoom();
            }
        });

        document.getElementById('zoomOut').addEventListener('click', function() {
            if (currentZoom > 0.5) {
                currentZoom -= 0.1;
                applyZoom();
            }
        });

        function applyZoom() {
            const newWidth = baseWidth * currentZoom;
            const newHeight = baseHeight * currentZoom;
            $("#flipbook").turn("size", newWidth, newHeight);
        }

        function updatePageInfo(page, total) {
            pageInfoEl.textContent = `Page ${page} of ${total}`;
        }

        // Keyboard navigation
        document.addEventListener('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                $("#flipbook").turn("previous");
            } else if (e.key === 'ArrowRight') {
                $("#flipbook").turn("next");
            }
        });

        // Responsive handling
        function handleResize() {
            const container = document.querySelector('.flipbook-container');
            const containerWidth = container.clientWidth - 60; // minus padding
            
            if (containerWidth < baseWidth) {
                const scale = containerWidth / baseWidth;
                $("#flipbook").turn("size", baseWidth * scale, baseHeight * scale);
                currentZoom = scale;
            }
        }

        window.addEventListener('resize', handleResize);
        handleResize(); // Call on load

    } catch (error) {
        console.error('Error loading PDF:', error);
        loadingEl.style.display = 'none';
        errorEl.textContent = 'Gagal memuat PDF: ' + error.message;
        errorEl.style.display = 'block';
    }
});
</script>

@endsection