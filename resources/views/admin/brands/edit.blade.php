@extends('admin.layouts.master')
@section('title', 'Edit Brand')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Brand</h3>
            <p class="text-subtitle text-muted">Ubah data brand sesuai kebutuhan</p>
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

        <form action="{{ route('admin.brands.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">

                        {{-- Nama --}}
                        <div class="form-group mb-3">
                            <label for="name">Nama Brand <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name"
                                   value="{{ old('name', $brand->name) }}" 
                                   placeholder="Masukkan nama brand" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Slug akan dibuat otomatis dari nama brand</small>
                        </div>

                        {{-- Logo --}}
                        <div class="form-group mb-3">
                            <label for="logo">Logo Brand</label>
                            
                            @if ($brand->logo)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $brand->logo) }}"
                                        alt="{{ $brand->name }}"
                                        width="150"
                                        class="img-thumbnail"
                                        onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                                    
                                    {{-- Checkbox untuk hapus logo --}}
                                    <div class="form-check mt-2">
                                        <input type="checkbox" class="form-check-input" id="remove_old_logo" 
                                               name="remove_old_logo" value="1">
                                        <label class="form-check-label text-danger" for="remove_old_logo">
                                            Hapus logo yang ada
                                        </label>
                                    </div>
                                </div>
                            @else
                                <small class="text-muted d-block mb-2">Belum ada logo.</small>
                            @endif

                            {{-- Upload Baru --}}
                            <input type="file" class="form-control" id="logo" name="logo" accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">Kosongkan jika tidak ingin mengganti logo. Format: JPG, PNG, WEBP. Max: 2MB</small>
                        </div>

                        {{-- Status --}}
                        <div class="form-group mb-3">
                            <label for="is_active">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="form-check-input" id="is_active"
                                       name="is_active" value="1"
                                       {{ old('is_active', $brand->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Aktif / Tidak Aktif</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                            <a href="{{ route('admin.brands.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection