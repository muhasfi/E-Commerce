@extends('admin.layouts.master')
@section('title', 'Daftar Product')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Product</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i> Tambah Product
                </a>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Product</th>
                            <th>Category</th>
                            <th>Brand</th>
                            <th>Harga</th>
                            <th>Harga Diskon</th>
                            <th>Status</th>
                            <th colspan="3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" width="60" class="img-fluid rounded" alt="{{ $product->name }}" onerror="this.onerror=null;this.src='';">
                                @else
                                    <img src="" width="60" class="img-fluid rounded" alt="Default">
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->category->name ?? '-' }}</td>
                            <td>{{ $product->brand->name ?? '-' }}</td>
                            <td>{{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->discount_price ? number_format($product->discount_price, 0, ',', '.') : '-' }}</td>
                            <td>
                                <span class="badge {{ $product->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $product->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger delete-btn">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="mt-3">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/admin/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('assets/admin/static/js/pages/simple-datatables.js') }}"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-btn');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            let form = this.closest('form');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: "Data yang sudah dihapus tidak bisa dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection
