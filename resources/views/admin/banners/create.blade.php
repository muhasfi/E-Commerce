@extends('admin.layouts.master')
@section('title', 'Tambah Banner')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data Banner</h3>
            <p class="text-subtitle text-muted">Silahkan isi data banner yang ingin ditambahkan</p>
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

        <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">

                {{-- Judul Banner --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Judul Banner</label>
                    <input 
                        type="text" 
                        name="title" 
                        class="form-control" 
                        id="title"
                        value="{{ old('title') }}" 
                        required>
                </div>

                {{-- Link --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Link (Opsional)</label>
                    <input 
                        type="url" 
                        name="link" 
                        class="form-control" 
                        id="link"
                        value="{{ old('link') }}" 
                        placeholder="https://contoh.com">
                </div>

                {{-- Gambar Banner --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Gambar Banner</label>
                    <input 
                        type="file" 
                        name="image" 
                        id="mainImage" 
                        class="form-control" 
                        accept=".jpg,.jpeg,.png,.webp" 
                        required>
                    <small class="text-muted">Ukuran disarankan 1200x400px (format: JPG, PNG, WEBP)</small>

                    <div id="mainImagePreview" class="mt-3"></div>
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
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Script Preview Gambar --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
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
            wrapper.style.width = "300px";
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
});
</script>
@endsection
