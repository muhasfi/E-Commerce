@extends('admin.layouts.master')
@section('title', 'Edit Kategori')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Kategori</h3>
            <p class="text-subtitle text-muted">Ubah data kategori sesuai kebutuhan</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Submit Error!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">

                        {{-- Nama --}}
                        <div class="form-group mb-3">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $category->name) }}" placeholder="Masukkan nama kategori" required>
                        </div>

                        {{-- Slug --}}
                        <div class="form-group mb-3">
                            <label for="slug">Slug (otomatis, bisa diubah)</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                value="{{ old('slug', $category->slug) }}" placeholder="contoh: kategori-elektronik">
                        </div>

                        {{-- Parent --}}
                        <div class="form-group mb-3">
                            <label for="parent_id">Kategori Induk</label>
                            <select name="parent_id" id="parent_id" class="form-select">
                                <option value="">-- Tanpa Induk (Kategori Utama) --</option>
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}"
                                        {{ old('parent_id', $category->parent_id) == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Gambar --}}
                        <div class="form-group mb-3">
                            <label for="image">Gambar</label>
                            
                            @if ($category->image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $category->image) }}"
                                        alt="{{ $category->name }}"
                                        width="150"
                                        class="img-thumbnail"
                                        onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                                    
                                    {{-- Checkbox untuk hapus gambar --}}
                                    <div class="form-check mt-2">
                                        <input type="checkbox" class="form-check-input" id="remove_old_image" 
                                               name="remove_old_image" value="1">
                                        <label class="form-check-label text-danger" for="remove_old_image">
                                            Hapus gambar yang ada
                                        </label>
                                    </div>
                                </div>
                            @else
                                <small class="text-muted d-block mb-2">Belum ada gambar.</small>
                            @endif

                            {{-- Upload Baru --}}
                            <input type="file" class="form-control" id="image" name="image" accept=".jpg,.jpeg,.png">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti gambar.</small>
                        </div>

                        {{-- Status --}}
                        <div class="form-group mb-3">
                            <label for="is_active">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="form-check-input" id="is_active"
                                       name="is_active" value="1"
                                       {{ old('is_active', $category->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Aktif / Tidak Aktif</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection