@extends('admin.layouts.master')
@section('title', 'Edit PDF Pricelist')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit PDF Pricelist</h3>
            <p class="text-subtitle text-muted">Silahkan ubah data PDF Pricelist yang dipilih</p>
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

        <form action="{{ route('admin.price_lists.update', $priceList->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                {{-- Nama PDF --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama PDF</label>
                    <input 
                        type="text" 
                        name="name" 
                        class="form-control" 
                        id="name"
                        value="{{ old('name', $priceList->name) }}" 
                        required>
                </div>

                {{-- File PDF --}}
                <div class="col-md-6 mb-3">
                    <label class="form-label">File PDF (Kosongkan jika tidak ingin diubah)</label>
                    <input 
                        type="file" 
                        name="file" 
                        id="pdfFile" 
                        class="form-control" 
                        accept=".pdf">
                    <small class="text-muted">Format PDF, max 10MB</small>

                    {{-- Preview File Lama --}}
                    @if ($priceList->file)
                        <div class="mt-3">
                            <p class="mb-1">File saat ini:</p>
                            <a href="{{ asset('storage/' . $priceList->file) }}" 
                               target="_blank" 
                               class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-file-earmark-pdf"></i> Lihat File
                            </a>
                        </div>
                    @endif

                    {{-- Preview File Baru --}}
                    <div id="pdfFilePreview" class="mt-3"></div>
                </div>

                {{-- Tombol --}}
                <div class="col-12 mt-3 d-flex justify-content-end">
                    <a href="{{ route('admin.price_lists.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

{{-- Script Preview PDF --}}
<script>
document.addEventListener("DOMContentLoaded", function () {
    const pdfInput = document.getElementById("pdfFile");
    const pdfPreview = document.getElementById("pdfFilePreview");

    pdfInput.addEventListener("change", function () {
        pdfPreview.innerHTML = "";
        const file = pdfInput.files[0];
        if (!file) return;

        const wrapper = document.createElement("div");
        wrapper.classList.add("position-relative");

        const info = document.createElement("p");
        info.textContent = `Nama file baru: ${file.name} (${Math.round(file.size/1024)} KB)`;
        wrapper.appendChild(info);

        const removeBtn = document.createElement("button");
        removeBtn.innerHTML = "&times;";
        removeBtn.type = "button";
        removeBtn.classList.add("btn", "btn-danger", "btn-sm");
        removeBtn.style.marginTop = "5px";
        removeBtn.addEventListener("click", function () {
            pdfInput.value = "";
            pdfPreview.innerHTML = "";
        });

        wrapper.appendChild(removeBtn);
        pdfPreview.appendChild(wrapper);
    });
});
</script>
@endsection
