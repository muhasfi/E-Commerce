@extends('admin.layouts.master')
@section('title', 'Daftar Banner')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Banner</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('admin.banners.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i>
                    Tambah Banner
                </a>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th colspan="2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banners as $banner)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($banner->image)
                                    <img src="{{ asset('storage/' . $banner->image) }}"
                                         width="80"
                                         class="img-fluid rounded"
                                         alt="{{ $banner->title }}"
                                         onerror="this.onerror=null;this.src='{{ asset('images/No_image_available.webp') }}';">
                                @else
                                    <img src="{{ asset('images/No_image_available.webp') }}" width="80" class="img-fluid rounded" alt="Default">
                                @endif
                            </td>
                            <td>{{ $banner->title }}</td>
                            <td>
                                @if ($banner->link)
                                    <a href="{{ $banner->link }}" target="_blank" class="text-primary text-decoration-underline">Kunjungi</a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge {{ $banner->is_active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $banner->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.banners.edit', $banner->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <form action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm delete-btn">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                                <a href="{{ route('admin.banners.show', $banner->id) }}" class="btn btn-sm btn-info">
                                    <i class="bi bi-eye"></i> Lihat
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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
