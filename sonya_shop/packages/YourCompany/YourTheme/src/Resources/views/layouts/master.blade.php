<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Page Title --}}
    <title>@yield('page_title') - {{ config('app.name') }}</title>

    {{-- SEO Meta Tags --}}
    <meta name="description" content="@yield('meta_description', 'Premium lingerie online store')">
    <meta name="keywords" content="@yield('meta_keywords', 'lingerie, underwear, premium, incanto')">

    {{-- Open Graph Meta Tags --}}
    <meta property="og:title" content="@yield('page_title') - {{ config('app.name') }}">
    <meta property="og:description" content="@yield('meta_description', 'Premium lingerie online store')">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="@yield('og_image', asset('themes/yourtheme/assets/images/og-image.jpg'))">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('themes/yourtheme/assets/images/favicon.ico') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Theme CSS --}}
    <link rel="stylesheet" href="{{ asset('themes/yourtheme/assets/css/app.css') }}">

    {{-- Additional CSS Stack --}}
    @stack('css')
</head>
<body>
    {{-- Header Section --}}
    @include('yourtheme::layouts.header')

    {{-- Main Content --}}
    <main class="main-content">
        @yield('content-wrapper')
    </main>

    {{-- Footer Section --}}
    @include('yourtheme::layouts.footer')

    {{-- Theme JavaScript --}}
    <script src="{{ asset('themes/yourtheme/assets/js/app.js') }}"></script>

    {{-- Additional Scripts Stack --}}
    @stack('scripts')
</body>
</html>
