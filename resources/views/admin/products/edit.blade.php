@extends('admin.layouts.master')
@section('title', 'Edit Product')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data Product</h3>
            <p class="text-subtitle text-muted">Silahkan ubah data produk sesuai kebutuhan</p>
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

        <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">
                {{-- Nama Product --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Product</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ old('name', $product->name) }}" required>
                </div>

                {{-- Slug --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control"
                           value="{{ old('slug', $product->slug) }}">
                </div>

                {{-- Category --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Pilih Category --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
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
                                {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Harga --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga</label>
                    <input type="number" name="price" class="form-control"
                           value="{{ old('price', $product->price) }}" min="0" step="0.01" required>
                </div>

                {{-- Harga Diskon --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Harga Diskon</label>
                    <input type="number" name="discount_price" class="form-control"
                           value="{{ old('discount_price', $product->discount_price) }}" min="0" step="0.01">
                </div>

                {{-- Deskripsi --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="description" class="form-control" rows="3">{{ old('description', $product->description) }}</textarea>
                </div>

                {{-- Gambar --}}
                 <div class="form-group mb-3">
                    <label class="form-label">Gambar Utama Produk</label>

                    <div id="mainImagePreview" class="mb-3">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
                                alt="{{ $product->name }}"
                                width="150"
                                class="img-thumbnail"
                                onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                        @else
                            <small class="text-muted d-block mb-2">Belum ada gambar.</small>
                        @endif
                    </div>

                    {{-- Input file --}}
                    <input type="file" id="mainImageInput" name="image" class="form-control" accept=".jpg,.jpeg,.png,.webp">

                    {{-- Checkbox untuk hapus gambar lama --}}
                    @if ($product->image)
                        <div class="form-check mt-2">
                            <input type="checkbox" class="form-check-input" id="remove_old_image"
                                name="remove_old_image" value="1">
                            <label class="form-check-label text-danger" for="remove_old_image">Hapus gambar yang ada</label>
                        </div>
                    @endif
                </div>


                {{-- Gambar Lama --}}
                <div class="col-md-12 mb-4">
                    <label class="form-label">Gambar Lama</label>
                    <div class="d-flex flex-wrap gap-3">
                        @forelse ($product->images as $img)
                            <div class="position-relative" style="width: 150px;">
                                <img src="{{ asset('storage/' . $img->image) }}"
                                     alt="{{ $product->name }}"
                                     class="img-thumbnail w-100 h-100"
                                     onerror="this.src='{{ asset('images/No_image_available.webp') }}';">

                                <div class="form-check mt-1">
                                    <input type="checkbox" name="remove_images[]" value="{{ $img->id }}" id="remove_{{ $img->id }}" class="form-check-input">
                                    <label for="remove_{{ $img->id }}" class="form-check-label text-danger small">Hapus</label>
                                </div>
                            </div>
                        @empty
                            <p class="text-muted">Belum ada gambar.</p>
                        @endforelse
                    </div>
                </div>

                {{-- Gambar Baru --}}
                <div class="col-md-12 mb-3">
                    <label class="form-label">Tambah Gambar Baru</label>
                    <input type="file" name="images[]" id="imageInput" class="form-control" accept=".jpg,.jpeg,.png,.webp" multiple>
                    <small class="text-muted">Pilih satu atau beberapa gambar baru (opsional)</small>

                    {{-- Preview Gambar Baru --}}
                    <div id="previewContainer" class="mt-3 d-flex flex-wrap gap-3"></div>
                </div>

                {{-- Status --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" class="form-check-input" name="is_active" value="1"
                            {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label">Aktif</label>
                    </div>
                </div>

                {{-- Tombol --}}
                <div class="col-12 mt-3 d-flex justify-content-end">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Script Preview --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const imageInput = document.getElementById("imageInput");
    const previewContainer = document.getElementById("previewContainer");
    let selectedFiles = [];

    imageInput.addEventListener("change", function (e) {
        const files = Array.from(e.target.files);
        previewContainer.innerHTML = "";
        selectedFiles = files;

        files.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (event) {
                const imageBox = document.createElement("div");
                imageBox.classList.add("position-relative");
                imageBox.style.width = "150px";
                imageBox.style.height = "150px";

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
                    updateFileList();
                });

                imageBox.appendChild(img);
                imageBox.appendChild(removeBtn);
                previewContainer.appendChild(imageBox);
            };
            reader.readAsDataURL(file);
        });
    });

    function updateFileList() {
        const dataTransfer = new DataTransfer();
        selectedFiles.forEach(file => dataTransfer.items.add(file));
        imageInput.files = dataTransfer.files;

        previewContainer.innerHTML = "";
        selectedFiles.forEach((file, index) => {
            const reader = new FileReader();
            reader.onload = function (event) {
                const imageBox = document.createElement("div");
                imageBox.classList.add("position-relative");
                imageBox.style.width = "150px";
                imageBox.style.height = "150px";

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
                    updateFileList();
                });

                imageBox.appendChild(img);
                imageBox.appendChild(removeBtn);
                previewContainer.appendChild(imageBox);
            };
            reader.readAsDataURL(file);
        });
    }

    // ======================
// 🔹 Gambar utama (preview dan hapus sebelum upload)
// ======================
const mainImageInput = document.getElementById("mainImageInput");
const mainImagePreview = document.getElementById("mainImagePreview");

mainImageInput.addEventListener("change", function () {
    mainImagePreview.innerHTML = ""; // Kosongkan preview lama
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
            mainImageInput.value = ""; // reset input file
            mainImagePreview.innerHTML = "<small class='text-muted'>Belum ada gambar.</small>";
        });

        wrapper.appendChild(img);
        wrapper.appendChild(removeBtn);
        mainImagePreview.appendChild(wrapper);
    };
    reader.readAsDataURL(file);
});

});
</script>
@endsection
