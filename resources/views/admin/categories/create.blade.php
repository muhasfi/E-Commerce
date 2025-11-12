@extends('admin.layouts.master')
@section('title', 'Tambah Kategori')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Data Kategori</h3>
            <p class="text-subtitle text-muted">Silahkan isi data kategori yang ingin ditambahkan</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Terjadi Kesalahan!</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">

                        {{-- Nama Kategori --}}
                        <div class="form-group mb-3">
                            <label for="name">Nama Kategori</label>
                            <input type="text" class="form-control" id="name" name="name"
                                   placeholder="Masukkan Nama Kategori" required
                                   value="{{ old('name') }}">
                        </div>

                        {{-- Slug --}}
                        <div class="form-group mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug"
                                   placeholder="Otomatis dari nama atau isi manual"
                                   value="{{ old('slug') }}">
                            <small class="text-muted">Slug digunakan untuk URL (misal: <code>laptop-gaming</code>).</small>
                        </div>

                        {{-- Parent Category --}}
                        <div class="form-group mb-3">
                            <label for="parent_id">Parent Kategori (Opsional)</label>
                            <select name="parent_id" id="parent_id" class="form-select">
                                <option value="">-- Tidak Ada --</option>
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}"
                                        {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Gambar --}}
                        <div class="form-group mb-3">
                            <label for="image">Gambar Kategori</label>
                            <input type="file" class="form-control" id="image" name="image" accept=".jpg,.jpeg,.png">
                            <small class="text-muted">Ukuran ideal 600x400px</small>
                        </div>

                        {{-- Status --}}
                        <div class="form-group mb-3">
                            <label for="is_active">Status</label>
                            <div class="form-check form-switch">
                                <input type="hidden" name="is_active" value="0">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
                                       value="1" checked>
                                <label class="form-check-label" for="is_active">Aktif / Tidak Aktif</label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                            <a href="{{ route('admin.categories.index') }}" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
