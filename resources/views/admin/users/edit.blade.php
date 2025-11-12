@extends('admin.layouts.master')
@section('title', 'Edit User')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Data User</h3>
            <p class="text-subtitle text-muted">Perbarui data user yang sudah ada</p>
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

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-body">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Nama -->
                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input 
                                type="text" 
                                class="form-control @error('name') is-invalid @enderror" 
                                id="name" 
                                name="name" 
                                value="{{ old('name', $user->name) }}" 
                                placeholder="Masukkan Nama Lengkap" 
                                required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email">Email</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', $user->email) }}" 
                                placeholder="Masukkan Email" 
                                required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Telepon -->
                        <div class="form-group mb-3">
                            <label for="phone">Nomor Telepon</label>
                            <input 
                                type="number" 
                                class="form-control @error('phone') is-invalid @enderror" 
                                id="phone" 
                                name="phone" 
                                value="{{ old('phone', $user->phone) }}" 
                                placeholder="Masukkan Nomor Telepon">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="address">Alamat</label>
                            <textarea 
                                class="form-control @error('address') is-invalid @enderror" 
                                id="address" 
                                name="address" 
                                rows="3"
                                placeholder="Masukkan Alamat">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        
                        <h5>Ubah Password (Opsional)</h5>
                        <p class="text-muted small">Kosongkan jika tidak ingin mengganti password.</p>

                        <!-- Password Baru -->
                        <div class="form-group mb-3">
                            <label for="password">Password Baru</label>
                            <input 
                                type="password" 
                                class="form-control @error('password') is-invalid @enderror" 
                                id="password" 
                                name="password" 
                                placeholder="Masukkan Password Baru">
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Konfirmasi Password -->
                        <div class="form-group mb-3">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            <input 
                                type="password" 
                                class="form-control" 
                                id="password_confirmation" 
                                name="password_confirmation" 
                                placeholder="Ulangi Password Baru">
                        </div>

                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ route('admin.users.index') }}" class="btn btn-outline-primary me-2">
                                <i class="bi bi-arrow-left-circle"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
