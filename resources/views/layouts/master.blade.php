{{-- resources/views/layouts/master.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>

    @include('layouts.__header') {{-- meta, title, favicon, dsb --}}

    {{-- CSS Global --}}
    <link rel="stylesheet" href="{{ asset('assets/customer/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/footer.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('style')
    @yield('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

    {{-- Navbar --}}
    @include('layouts.__navbar')
   
    {{-- Konten Halaman --}}
    <main>
        @yield('content')
      
    </main>

    {{-- Footer --}}
    @include('layouts.__footer')

    {{-- Script JS Global --}}
    <script src="{{ asset('assets/customer/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/customer/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/lightbox/js/lightbox.min.js') }}"></script>
    <script src="{{ asset('assets/customer/lib/owlcarousel/owl.carousel.min.js') }}"></script>


    {{-- Script Tambahan Per Halaman --}}
    @yield('script')
</body>
</html>
