@extends('admin.layouts.master')
@section('title', 'Detail Brand')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Detail Brand</h3>
            <p class="text-subtitle text-muted">Informasi lengkap brand</p>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th width="200">Nama Brand</th>
                            <td>: {{ $brand->name }}</td>
                        </tr>
                        <tr>
                            <th>Slug</th>
                            <td>: {{ $brand->slug }}</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>: 
                                @if($brand->is_active)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Tidak Aktif</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Dibuat Pada</th>
                            <td>: {{ $brand->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diubah</th>
                            <td>: {{ $brand->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-md-4">
                <div class="text-center">
                    <label class="form-label fw-bold">Logo Brand</label>
                    @if($brand->logo)
                        <div class="mb-3">
                            <img src="{{ asset('storage/' . $brand->logo) }}" 
                                 alt="{{ $brand->name }}"
                                 class="img-thumbnail"
                                 style="max-width: 200px;"
                                 onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                        </div>
                    @else
                        <div class="mb-3">
                            <img src="{{ asset('images/No_image_available.webp') }}" 
                                 alt="No Logo"
                                 class="img-thumbnail"
                                 style="max-width: 200px;">
                        </div>
                        <p class="text-muted">Belum ada logo</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('admin.brands.index') }}" class="btn btn-light-secondary">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <div>
                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-warning me-2">
                    <i class="bi bi-pencil"></i> Edit
                </a>
            </div>
        </div>
    </div>
</div>
@endsection