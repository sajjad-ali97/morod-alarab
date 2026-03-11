<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $settings->site_name ?? 'شركة مورد العرب' }}</title>
    <meta name="description" content="موقع شركة مورد العرب لعرض الأقسام والمنتجات">
    <meta name="theme-color" content="#39338B">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>

    <div class="site-page">

        @include('partials.header')

        <main class="site-main">
            @yield('content')
        </main>

        @include('partials.footer')

    </div>

    @stack('scripts')
</body>
</html>
