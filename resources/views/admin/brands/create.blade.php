@extends('admin.layouts.master')
@section('title', 'Tambah Brand')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Brand</h3>
            <p class="text-subtitle text-muted">Tambahkan brand baru ke sistem</p>
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

        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">

                        {{-- Nama --}}
                        <div class="form-group mb-3">
                            <label for="name">Nama Brand <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                   id="name" name="name"
                                   value="{{ old('name') }}" 
                                   placeholder="Masukkan nama brand" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Slug akan dibuat otomatis dari nama brand</small>
                        </div>

                        {{-- Logo --}}
                        <div class="form-group mb-3">
                            <label for="logo">Logo Brand</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror" 
                                   id="logo" name="logo" 
                                   accept=".jpg,.jpeg,.png,.webp">
                            <small class="text-muted">Format: JPG, PNG, WEBP. Ukuran maksimal: 2MB</small>
                            @error('logo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="form-group mb-3">
                            <label for="is_active">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="form-check-input" id="is_active"
                                       name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Aktif / Tidak Aktif</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <a href="{{ route('admin.brands.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection