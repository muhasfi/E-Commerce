@extends('admin.layouts.master')
@section('title', 'Detail Kategori')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header text-white">
            <h5 class="mb-0">{{ $category->name }}</h5>
        </div>

        <div class="card-body">
            <div class="row">
                <!-- Gambar -->
                <div class="col-md-4 text-center">
                    <img src="{{ asset('storage/' . $category->image) }}"
                        alt="{{ $category->name }}"
                        width="150"
                        class="img-thumbnail"
                        onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                </div>

                <!-- Informasi -->
                <div class="col-md-8">
                    <h4>{{ $category->name }}</h4>

                    <p>
                        <strong>Slug:</strong> 
                        {{ $category->slug ?? '-' }}
                    </p>

                    <p>
                        <strong>Kategori Induk:</strong> 
                        {{ $category->parent ? $category->parent->name : '-' }}
                    </p>

                    <p>
                        <strong>Status:</strong>
                        @if($category->is_active)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-secondary">Tidak Aktif</span>
                        @endif
                    </p>

                    <p>
                        <strong>Dibuat pada:</strong> 
                        {{ $category->created_at->format('d M Y H:i') }}
                    </p>

                    <p>
                        <strong>Diperbarui pada:</strong> 
                        {{ $category->updated_at->format('d M Y H:i') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="card-footer text-end">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">Kembali</a>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
