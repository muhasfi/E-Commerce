@extends('layouts.master')

@section('title', 'Pesanan Berhasil')

@section('content')

<div class="text-center mt-5">
        <h1>Pesanan Tidak Ditemukan</h1>
        <p>item yang Anda cari tidak tersedia.</p>
        <a href="{{ route('book') }}" class="btn btn-primary">Kembali ke Booking</a>
    </div>

@endsection