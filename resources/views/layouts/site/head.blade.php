@php
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
@endphp
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title', 'One Pluse Lead')</title>
<link rel="alternate" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}" hreflang="en" />
<link rel="alternate" href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}" hreflang="ar" />

<!-- depdency stylesheet -->
<link href="https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400,500,600,700,800,900" rel="stylesheet">

<link rel="shortcut icon" href="{{ asset('UI/Site/images/site_logo/favourite_icon.svg') }}">
@if (app()->getLocale() === 'ar')
    @vite(['resources/css/site.css', 'resources/css/site-rtl.css', 'resources/js/app.js'])
@else
    @vite(['resources/css/site.css', 'resources/js/app.js'])
@endif
@vite(['resources/js/site.js'])

<script src="{{ route('lang.js') }}" defer></script>

@yield('styles')
