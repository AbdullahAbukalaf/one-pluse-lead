<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale()==='ar' ? 'rtl' : 'ltr' }}" data-bs-theme="dark">

<head>
    @include('layouts.site.head')
</head>

<body class="{{ app()->getLocale()==='ar' ? 'rtl' : 'ltr' }}">
    <!-- Body Wrap - Start -->
    <div class="page_wrapper">

        <!-- Back To Top - Start -->
        <div class="backtotop">
            <a href="#" class="scroll">
                <i class="fa-solid fa-arrow-up"></i>
            </a>
        </div>
        <!-- Back To Top - End -->



        <!-- Header -->
        @include('layouts.site.header')
        <!--/ End Header -->

        <!-- Main Body - Start
      ================================================== -->
        <main class="page_content">
            @hasSection('page-banner')
                @yield('page-banner')
            @endif
            @yield('main-content')
        </main>
        <!-- Main Body - End
      ================================================== -->

        <!-- Site Footer - Start
        ================================================== -->
        @include('layouts.site.footer')
        <!-- Site Footer - End
        ================================================== -->
    </div>

</body>

</html>
