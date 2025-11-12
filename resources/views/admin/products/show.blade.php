@extends('admin.layouts.master')
@section('title', 'Detail Product')

@section('content')
<div class="page-title mb-4">
    <div class="row">
        <div class="col-12">
            <h3 class="fw-bold">{{ $product->name }}</h3>
            <p class="text-muted mb-0">Detail lengkap produk {{ $product->name }}</p>
        </div>
    </div>
</div>

<div class="card shadow-sm border-0">
    <div class="card-body">
        {{-- Bagian Gambar --}}
        <div class="row">
            <div class="col-md-5 mb-4">
                <div class="border rounded p-2 text-center bg-light">
                    <img src="{{ $product->image ? asset('storage/' . $product->image) : asset('images/No_image_available.webp') }}" 
                        alt="{{ $product->name }}" 
                        class="img-fluid rounded shadow-sm"
                        style="max-height: 400px; object-fit: contain;">
                </div>

                @if($product->images->count() > 0)
                    <div class="mt-3">
                        <h6 class="fw-semibold">Gambar Tambahan</h6>
                        <div class="d-flex flex-wrap gap-2 mt-2">
                            @foreach($product->images as $img)
                                <div class="border rounded p-1 bg-white shadow-sm" style="width: 80px; height: 80px;">
                                    <a href="{{ asset('storage/' . $img->image) }}" target="_blank">
                                        <img src="{{ asset('storage/' . $img->image) }}" 
                                            alt="Additional image" 
                                            class="img-fluid rounded"
                                            style="object-fit: cover; width: 100%; height: 100%;"
                                            onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Detail Produk --}}
            <div class="col-md-7">
                <h5 class="fw-bold mb-3 text-primary">Informasi Produk</h5>
                <table class="table table-borderless">
                    <tr>
                        <th width="30%">Kategori</th>
                        <td>{{ $product->category?->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Brand</th>
                        <td>{{ $product->brand?->name ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Harga</th>
                        <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    </tr>
                    @if($product->discount_price)
                    <tr>
                        <th>Harga Diskon</th>
                        <td class="text-success fw-semibold">Rp {{ number_format($product->discount_price, 0, ',', '.') }}</td>
                    </tr>
                    @endif
                    <tr>
                        <th>Status</th>
                        <td>
                            @if($product->is_active)
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Dibuat</th>
                        <td>{{ $product->created_at->format('d M Y, H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Terakhir Diperbarui</th>
                        <td>{{ $product->updated_at->format('d M Y, H:i') }}</td>
                    </tr>
                </table>

                <h5 class="fw-bold mt-4 text-primary">Deskripsi Produk</h5>
                <div class="border rounded p-3 bg-light">
                    {!! nl2br(e($product->description ?? 'Tidak ada deskripsi.')) !!}
                </div>

                <div class="mt-4 d-flex justify-content-end">
                    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary me-2">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil"></i> Edit Produk
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
