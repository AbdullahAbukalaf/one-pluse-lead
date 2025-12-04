<!doctype html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale()==='ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin — {{ config('app.name','Laravel') }}</title>
    @vite(['resources/css/admin.css','resources/js/admin.js'])
</head>
<body class="min-h-screen bg-slate-50">
    <header class="p-4 border-b bg-white">
        <div class="container mx-auto flex items-center justify-between">
            <div class="font-semibold">Admin</div>
            <nav class="flex gap-4">
                <a href="{{ route('admin.dashboard') }}">{{ __('nav.dashboard') }}</a>
                <a href="{{ route('home') }}">{{ __('nav.site') }}</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>
