<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Vendors Started --}}
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}">
    {{-- Vendors Ended --}}

    <link rel="stylesheet" href="{{ asset('assets/css/globals.css') }}">
    @stack('styles')
</head>

<body>
    @include('front.layout.preloader')
    @include('front.layout.header')

    <main>
        @yield('content')
    </main>

    @include('front.layout.footer')

    {{-- Vendor Starts --}}
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jQuery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
    {{-- Vendor End --}}

    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('scripts')
</body>

</html>
