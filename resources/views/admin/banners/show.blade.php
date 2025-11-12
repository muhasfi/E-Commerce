@extends('admin.layouts.master')
@section('title', 'Detail Banner')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Detail Banner</h3>
            <p class="text-subtitle text-muted">Informasi lengkap banner</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <!-- Informasi Banner -->
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th width="200">Judul Banner</th>
                            <td>: {{ $banner->title }}</td>
                        </tr>
                        <tr>
                            <th>Link</th>
                            <td>:
                                @if ($banner->link)
                                    <a href="{{ $banner->link }}" target="_blank" class="text-primary">
                                        {{ $banner->link }}
                                    </a>
                                @else
                                    <span class="text-muted">Tidak ada link</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                @if($banner->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>: {{ $banner->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diubah</th>
                            <td>: {{ $banner->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Gambar Banner -->
            <div class="col-md-4">
                <div class="text-center">
                    <label class="form-label fw-bold">Gambar Banner</label>
                    @if($banner->image)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $banner->image) }}" 
                                 alt="{{ $banner->title }}"
                                 class="img-thumbnail"
                                 style="max-width: 250px;"
                                 onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                        </div>
                    @else
                        <div class="mb-3">
                            <img src="{{ asset('images/No_image_available.webp') }}" 
                                 alt="No Image"
                                 class="img-thumbnail"
                                 style="max-width: 250px;">
                        </div>
                        <p class="text-muted">Belum ada gambar</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Tombol Navigasi -->
        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.banners.index') }}" class="btn btn-light-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <div>
                <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning me-2">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
