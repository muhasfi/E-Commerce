@extends('layouts.master')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<div class="text-center py-5">
    <h1 class="text-6xl font-bold text-red-600">404</h1>
    <h1 class="mt-3 text-lg">Ups! Halaman yang kamu cari tidak ditemukan.</h1>
    <a href="{{ url('/') }}" class="btn btn-primary mt-4">Kembali ke Beranda</a>
</div>
@endsection
