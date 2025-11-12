@extends('admin.layouts.master')
@section('title', 'Tambah Product')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data Product</h3>
            <p class="text-subtitle text-muted">Silahkan isi data product yang ingin ditambahkan</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        {{-- Error Validasi --}}
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Terjadi Kesalahan!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                {{-- Nama Product --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Product</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        id="name"
                        value="{{ old('name') }}" 
                        required>
                </div>

                {{-- Slug (otomatis, opsional) --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug</label>
                    <input 
                        type="text" 
                        name="slug" 
                        class="form-control" 
                        id="slug"
                        value="{{ old('slug') }}" 
                        placeholder="Otomatis dari nama (boleh dikosongkan)">
                </div>

                {{-- Category --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Pilih Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Brand --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Brand</label>
                    <select name="brand_id" class="form-select">
                        <option value="">-- Tidak Ada --</option>
                        @foreach($brands as $brand)
                            <option value="{{ $brand->id }}" 
                                {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Harga --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga</label>
                    <input 
                        type="number" 
                        name="price" 
                        class="form-control" 
                        value="{{ old('price') }}" 
                        required 
                        min="0" 
                        step="0.01">
                </div>

                {{-- Harga Diskon --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Diskon</label>
                    <input 
                        type="number" 
                        name="discount_price" 
                        class="form-control" 
                        value="{{ old('discount_price') }}" 
                        min="0" 
                        step="0.01">
                </div>

                {{-- Deskripsi --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea 
                        name="description" 
                        class="form-control" 
                        rows="3">{{ old('description') }}</textarea>
                </div>

                {{-- Gambar utama --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar Utama Product</label>
                    <input 
                        type="file" 
                        name="image" 
                        id="mainImage" 
                        class="form-control" 
                        accept=".jpg,.jpeg,.png,.webp">
                    <small class="text-muted">Gambar utama produk (ideal 600x400px)</small>

                    <div id="mainImagePreview" class="mt-3"></div>
                </div>

                {{-- Gambar tambahan --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Gambar Tambahan Product</label>
                    <input 
                        type="file" 
                        name="images[]" 
                        id="imageInput" 
                        class="form-control" 
                        accept=".jpg,.jpeg,.png,.webp" 
                        multiple>
                    <small class="text-muted">Pilih satu atau beberapa gambar tambahan</small>

                    <div id="previewContainer" class="mt-3 d-flex flex-wrap gap-3"></div>
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input 
                            type="checkbox" 
                            class="form-check-input" 
                            name="is_active" 
                            value="1" 
                            {{ old('is_active', 1) ? 'checked' : '' }}>
                        <label class="form-check-label">Aktif</label>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="col-12 mt-3 d-flex justify-content-end">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Auto generate slug
    const nameInput = document.getElementById("name");
    const slugInput = document.getElementById("slug");
    nameInput.addEventListener("keyup", function () {
        slugInput.value = nameInput.value
            .toLowerCase()
            .replace(/[^\w ]+/g, '')
            .replace(/ +/g, '-');
    });

    // 🔹 Gambar utama
    const mainImageInput = document.getElementById("mainImage");
    const mainImagePreview = document.getElementById("mainImagePreview");
    mainImageInput.addEventListener("change", function () {
        mainImagePreview.innerHTML = "";
        const file = mainImageInput.files[0];
        if (!file) return;

        const reader = new FileReader();
        reader.onload = function (event) {
            const wrapper = document.createElement("div");
            wrapper.classList.add("position-relative");
            wrapper.style.width = "150px";
            wrapper.style.height = "150px";

            const img = document.createElement("img");
            img.src = event.target.result;
            img.classList.add("img-thumbnail", "w-100", "h-100", "object-fit-cover");

            const removeBtn = document.createElement("button");
            removeBtn.innerHTML = "&times;";
            removeBtn.type = "button";
            removeBtn.classList.add("btn", "btn-danger", "btn-sm", "position-absolute");
            removeBtn.style.top = "5px";
            removeBtn.style.right = "5px";
            removeBtn.style.borderRadius = "50%";
            removeBtn.addEventListener("click", function () {
                mainImageInput.value = "";
                mainImagePreview.innerHTML = "";
            });

            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            mainImagePreview.appendChild(wrapper);
        };
        reader.readAsDataURL(file);
    });

    // 🔹 Gambar tambahan (multiple)
    const imageInput = document.getElementById("imageInput");
    const previewContainer = document.getElementById("previewContainer");
    let selectedFiles = [];

    imageInput.addEventListener("change", function (e) {
        selectedFiles = Array.from(e.target.files);
        renderPreview();
    });

    function renderPreview() {
        previewContainer.innerHTML = "";
        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (event) {
                const box = document.createElement("div");
                box.classList.add("position-relative");
                box.style.width = "150px";
                box.style.height = "150px";

                const img = document.createElement("img");
                img.src = event.target.result;
                img.classList.add("img-thumbnail", "w-100", "h-100", "object-fit-cover");

                const removeBtn = document.createElement("button");
                removeBtn.innerHTML = "&times;";
                removeBtn.type = "button";
                removeBtn.classList.add("btn", "btn-danger", "btn-sm", "position-absolute");
                removeBtn.style.top = "5px";
                removeBtn.style.right = "5px";
                removeBtn.style.borderRadius = "50%";
                removeBtn.addEventListener("click", function () {
                    selectedFiles.splice(index, 1);
                    updateFileInput();
                    renderPreview();
                });

                box.appendChild(img);
                box.appendChild(removeBtn);
                previewContainer.appendChild(box);
            };
            reader.readAsDataURL(file);
        });
    }

    function updateFileInput() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        imageInput.files = dataTransfer.files;
    }
});
</script>
@endsection
