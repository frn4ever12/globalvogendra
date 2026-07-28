<!DOCTYPE html>
<html lang="en">
<script src="{{ asset('dist/js/frontend.js') }}"></script>
<link rel="stylesheet" href="{{asset('dist/css/frontend.css')}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $setting->name ?? 'Example' }}</title>
    
    <!-- Swiper.js CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    
    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    @include('Frontend.includes.top')
    @yield('head')
   
</head>

<body>
    @include('Frontend.includes.top-header')
    @include('Frontend.includes.navbar')
    <main style="min-height: 50vh;margin-top:-10px !important">
        @include('Frontend.includes.message')
        @yield('content')
    </main>
    @include('Frontend.includes.footer')
    @include('Frontend.includes.bottom')
    
    <!-- Swiper.js JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    
    <!-- AOS Animation JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        AOS.init({
            duration: 800,
            easing: 'slide',
            once: true
        });
    </script>
    
    @yield('scripts')
</body>

</html>
