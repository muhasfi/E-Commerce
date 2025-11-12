{{-- resources/views/layouts/master.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>

    @include('layouts.__header') {{-- meta, title, favicon, dsb --}}

    {{-- CSS Global --}}
    <link rel="stylesheet" href="{{ asset('assets/customer/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/customer/css/footer.css') }}">
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
