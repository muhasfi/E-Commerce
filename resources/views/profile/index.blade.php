@extends('layouts.master')

@section('title', 'Profil Saya')

@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="profile-card">
                <h4 class="section-title">Data Profil</h4>

               @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif


                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}"
                               class="form-control @error('name') is-invalid @enderror" 
                               placeholder="Contoh: Ahmad Hidayat">
                        @error('name')<span class="error-text">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" value="{{ $user->email }}" 
                               class="form-control" disabled>
                        <span class="helper-text">Email tidak bisa diubah setelah registrasi</span>
                    </div>

                    <div class="form-group">
                        <label for="phone">No. Handphone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone', $user->phone) }}" 
                               class="form-control @error('phone') is-invalid @enderror"
                               placeholder="08123456789">
                        @error('phone')<span class="error-text">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea id="address" name="address" rows="3"
                                  class="form-control @error('address') is-invalid @enderror"
                                  placeholder="Jl. Contoh No. 123, Kelurahan, Kecamatan, Kota">{{ old('address', $user->address) }}</textarea>
                        @error('address')<span class="error-text">{{ $message }}</span>@enderror
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <button type="submit" class="btn-submit flex-fill">Simpan</button>
                        <a href="{{ route('index') }}" class="btn-submit btn-secondary flex-fill text-center" style="text-decoration: none;">
                            Kembali
                        </a>
                    </div>

                </form>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="profile-card">
                <h4 class="section-title">Ubah Password</h4>

                <form action="{{ route('profile.password') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="current_password">Password Lama</label>
                        <input type="password" id="current_password" name="current_password"
                               class="form-control @error('current_password') is-invalid @enderror">
                        @error('current_password')<span class="error-text">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password">Password Baru</label>
                        <input type="password" id="new_password" name="new_password"
                               class="form-control @error('new_password') is-invalid @enderror"
                               placeholder="Minimal 8 karakter">
                        @error('new_password')<span class="error-text">{{ $message }}</span>@enderror
                    </div>

                    <div class="form-group">
                        <label for="new_password_confirmation">Ulangi Password Baru</label>
                        <input type="password" id="new_password_confirmation" name="new_password_confirmation"
                               class="form-control">
                    </div>

                    <button type="submit" class="btn-submit btn-secondary">Update Password</button>
                </form>

                <div class="info-box">
                    <p>Pastikan password Anda mengandung huruf besar, huruf kecil, angka, dan minimal 8 karakter.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.profile-card {
    background: #fff;
    border-radius: 8px;
    padding: 30px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    height: 100%;
}

.section-title {
    font-size: 20px;
    font-weight: 600;
    color: #1a1a1a;
    margin-bottom: 25px;
    padding-bottom: 12px;
    border-bottom: 2px solid #f0f0f0;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-size: 14px;
    font-weight: 500;
    color: #333;
    margin-bottom: 8px;
}

.form-control {
    width: 100%;
    padding: 10px 14px;
    font-size: 14px;
    border: 1.5px solid #ddd;
    border-radius: 6px;
    transition: border-color 0.2s;
}

.form-control:focus {
    outline: none;
    border-color: #4a90e2;
}

.form-control:disabled {
    background: #f8f8f8;
    color: #666;
    cursor: not-allowed;
}

.helper-text {
    display: block;
    font-size: 12px;
    color: #888;
    margin-top: 5px;
}

.error-text {
    display: block;
    font-size: 13px;
    color: #dc3545;
    margin-top: 5px;
}

.btn-submit {
    width: 100%;
    padding: 12px;
    font-size: 15px;
    font-weight: 500;
    color: #fff;
    background: #4a90e2;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    margin-top: 10px;
}

.btn-submit:hover {
    background: #357abd;
}

.btn-submit.btn-secondary {
    background: #f39c12;
}

.btn-submit.btn-secondary:hover {
    background: #e67e22;
}

.info-box {
    background: #f8f9fa;
    border-left: 3px solid #4a90e2;
    padding: 14px;
    margin-top: 25px;
    border-radius: 4px;
}

.info-box p {
    font-size: 13px;
    color: #555;
    margin: 0;
    line-height: 1.5;
}

.alert {
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 20px;
    font-size: 14px;
}

.alert-success {
    background: #d4edda;
    border: 1px solid #c3e6cb;
    color: #155724;
}

@media (max-width: 991px) {
    .profile-card {
        margin-bottom: 20px;
    }
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection