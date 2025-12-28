{{-- // i18n rule: DO NOT translate class/id/data-* or any JS selector. --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script> --}}

<!-- Site Footer - Start
      ================================================== -->
@php
$footerLogo = $settings?->footer_logo_path ? asset('storage/'.$settings->footer_logo_path) :
Vite::asset('resources/UI/Site/images/logo.png');
$locale = app()->getLocale();
@endphp
<footer class="site_footer" id="contact-us">
    <div class="footer_content_area section_space_lg bg_gray_dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_about pe-lg-5">
                        <div class="site_logo">
                            <a class="site_link" href="{{ route('home') }}">
                                <img class="dark_theme_logo" src="{{ $footerLogo }}"
                                    alt="Site Logo - ProMotors - Car Service & Detailing Template">
                                <img class="light_theme_logo" src="{{ $footerLogo }}"
                                    alt="Site Logo - ProMotors - Car Service & Detailing Template">
                            </a>
                        </div>
                        <p>{{ $locale === 'ar' ? ($settings->description_ar ?? '') : ($settings->description_en ?? '')
                            }}</p>
                        @if($settings?->phone)
                        <div class="footer_hotline">
                            <span>{{ __('common.support_center') }}</span>
                            <a class="hotline_number" href="tel:{{ $settings->phone }}">
                                <bdi dir="ltr">{{ $settings->phone }}</bdi>
                            </a>
                            @if($settings?->email)
                            <a class="hotline_number capitalize" href="mailto:{{ $settings->email }}">
                                <bdi dir="ltr">{{ $settings->email }}</bdi>
                            </a>
                            @endif
                        </div>
                        @endif

                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="info_list_wrap">
                        <h3 class="list_title">{{ __('common.quick_links') }}</h3>
                        <ul class="info_list unordered_list_block text-uppercase">
                            <li>
                                <a href="{{ route('home') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">{{ __('nav.home') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">{{ __('nav.about') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}#products">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">{{ __('nav.products') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('technology') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">{{ __('nav.technology') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('whereToFindUs') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">{{ __('nav.where_to_find_us') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('Markets') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">{{ __('nav.markets') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('Insites') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">{{ __('nav.insights') }}</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('Contact') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">{{ __('nav.contact') }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info_list_wrap">
                        <h3 class="list_title">{{ __('nav.products') }}</h3>
                        @php
                        $category = $categories;
                        @endphp
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <ul class="info_list unordered_list_block text-uppercase">

                                    @foreach ($category as $cat)
                                    <li>
                                        <a href="{{ route('products', ['category' => $cat->slug]) }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}" alt="">
                                            </span>
                                            <span class="info_text">{{ app()->getLocale() === 'ar' ? $cat->title_ar : $cat->title_en }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info_list_wrap">
                        <h3 class="list_title">{{ __('common.company') }}</h3>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <ul class="info_list unordered_list_block text-uppercase">
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                    alt="ProMotors - Icon Square">
                                            </span>
                                            <span class="info_text">{{ __('common.catalogue') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('technology') }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                    alt="ProMotors - Icon Square">
                                            </span>
                                            <span class="info_text">{{ __('nav.technology') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('whereToFindUs') }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                    alt="ProMotors - Icon Square">
                                            </span>
                                            <span class="info_text">{{ __('nav.where_to_find_us') }}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                    alt="ProMotors - Icon Square">
                                            </span>
                                            <span class="info_text">{{ __('common.clients') }}</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright_widget">
        <div class="container">
            <p class="copyright_text text-center mb-0">
                <a href="https://themeforest.net/user/merkulove">{{ __('common.all_rights_reserved') }}</a>
            </p>
        </div>
    </div>
</footer>
<!-- Site Footer - End
      ================================================== -->

<!-- Fraimwork - Jquery Include -->
@vite(['resources/js/site.js'])

<!-- ===== Legacy / Vendor JS (must be global, NOT imported) ===== -->
<script defer src="{{ Vite::asset('resources/UI/Site/js/jquery.min.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/popper.min.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/bootstrap.min.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/bootstrap-dropdown-ml-hack.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/cursor.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/tilt.min.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/parallaxie.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/parallax-scroll.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/slick.min.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/magnific-popup.min.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/countdown.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/vanilla-calendar.min.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/imagebeforeafter.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/jquery-ui.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/dark-light.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/appear.js') }}"></script>


<!-- ===== WOW + Splitting (must load BEFORE main.js) ===== -->
<script defer src="{{ Vite::asset('resources/UI/Site/js/wow.min.js') }}"></script>
<script defer src="{{ Vite::asset('resources/UI/Site/js/splitting.min.js') }}"></script>

<!-- ===== Main Template Logic (MUST BE LAST) ===== -->
<script defer src="{{ Vite::asset('resources/UI/Site/js/main.js') }}"></script>

<!-- ===== Init WOW / Splitting when ready ===== -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        if (window.Splitting) window.Splitting();
        if (window.WOW) new WOW().init();
    });
</script>


@stack('scripts')
