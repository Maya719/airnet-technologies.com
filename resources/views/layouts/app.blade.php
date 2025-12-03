@php
    $seo = \App\Models\Setting::where('key', 'seo')->first();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ $seo->value['title'] ?? 'Airnet Technologies' }}</title>
    <meta
        content="{{ $seo->value['description'] ?? 'Airnet Technologies have helped many users with our top-rated apps, websites, and custom software.' }}"
        name="description">
    <meta
        content="{{ $seo->value['keywords'] ?? 'Airnet Technologies, Software House, IT consultancy, App development, Website Development, Artificial Intelligence' }}"
        name="keywords">
    <meta property="og:title" content="{{ $seo->value['title'] ?? 'Airnet Technologies' }}">
    <meta property="og:description"
        content="{{ $seo->value['description'] ?? 'Airnet Technologies have helped many users with our top-rated apps, websites, and custom software.' }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seo->value['title'] ?? 'Airnet Technologies' }}">
    <meta name="twitter:description"
        content="{{ $seo->value['description'] ?? 'Airnet Technologies have helped many users with our top-rated apps, websites, and custom software.' }}">
    <meta http-equiv="cache-control" content="no-store" />
    <meta http-equiv="pragma" content="no-store" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('assets/images/favicon/site.webmanifest') }}">

    <!-- Scripts & Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap">

    <!-- Icons -->
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">

    <style>
        /* Products dropdown hover fix */
        .products-dropdown:hover .dropdown-menu {
            opacity: 1 !important;
            visibility: visible !important;
            pointer-events: auto !important;
        }

        .products-dropdown:hover .dropdown-icon {
            transform: rotate(180deg);
        }
    </style>
</head>

<body class="font-sans text-gray-800 antialiased">
    <!-- ======= navbar ======= -->
    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top-btn"
        class="fixed bottom-4 right-4 bg-primary text-white p-3 rounded-full shadow-lg hover:bg-blue-800 transition-all z-50 flex items-center justify-center">
        <i class="bi bi-arrow-up-short text-2xl"></i>
    </a>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const scrollTopBtn = document.getElementById('scroll-top-btn');

            if (scrollTopBtn) {
                scrollTopBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>

    @stack('scripts')

    @include('partials.script')
</body>

</html>