<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale()==='ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name','Laravel') }}</title>
    @vite(['resources/css/site.css','resources/js/site.js'])
</head>
<body class="min-h-screen bg-gray-50">
    <header class="p-4 border-b bg-white">
        <nav class="container mx-auto flex items-center justify-between">
            <a href="{{ route('home') }}" class="font-semibold">{{ __('nav.home') }}</a>
            <ul class="flex gap-4">
                <li><a href="{{ url(LaravelLocalization::getLocalizedURL('en')) }}">EN</a></li>
                <li><a href="{{ url(LaravelLocalization::getLocalizedURL('ar')) }}">AR</a></li>
                @auth
                    <li><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                @endauth
            </ul>
        </nav>
    </header>
    <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>
