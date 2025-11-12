@extends('admin.layouts.master')

@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">

@endsection

@section('content')

<div class="page-heading mb-4">
    <div class="d-flex justify-content-between align-items-center">
        <h3 class="mb-0">Selamat Datang, Admin! 👋</h3>
    </div>
</div>

<!-- Script langsung di sini -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>


@endsection