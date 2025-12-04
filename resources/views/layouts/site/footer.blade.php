{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script> --}}

<!-- Site Footer - Start
      ================================================== -->
<footer class="site_footer" id="contact-us">
    <div class="footer_content_area section_space_lg bg_gray_dark">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_about pe-lg-5">
                        <div class="site_logo">
                            <a class="site_link" href="{{ route('home') }}">
                                <img class="dark_theme_logo"
                                    src="{{ asset('UI/Site/images/site_logo/dark_theme_site_logo.svg') }}"
                                    alt="Site Logo - ProMotors - Car Service & Detailing Template">
                                <img class="light_theme_logo"
                                    src="{{ asset('UI/Site/images/site_logo/light_theme_site_logo.svg') }}"
                                    alt="Site Logo - ProMotors - Car Service & Detailing Template">
                            </a>
                        </div>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velite esse cillum dolore eu fugiat
                        </p>
                        <div class="footer_hotline">
                            <span>Support center 24/7</span>
                            <a class="hotline_number" href="tel:+8801680636189">
                                +880 1680 6361 89
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="info_list_wrap">
                        <h3 class="list_title">Quick Links</h3>
                        <ul class="info_list unordered_list_block text-uppercase">
                            <li>
                                <a href="{{ route('home') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">Home</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">About Us</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('home') }}#products">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">Products</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('technologyAndInnovation') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">Technology & Innovation</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('WhereToFindUs') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">Where to fund us</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('Markets') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">Markets</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('Insights') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">Your Insights</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('Contact') }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                            alt="ProMotors - Icon Square">
                                    </span>
                                    <span class="info_text">Contact Us</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="info_list_wrap">
                        <h3 class="list_title">Products</h3>
                        @php
                            $cats = [
                                'Indoor Light' => 'indoor-light',
                                'Outdoor Light' => 'outdoor-light',
                                'Garden Light' => 'garden-light',
                                'Solar Light' => 'solar-light',
                                'Strip Light' => 'strip-light',
                                'Bulb Light' => 'bulb-light',
                            ];
                        @endphp
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <ul class="info_list unordered_list_block text-uppercase">

                                    @foreach ($cats as $label => $slug)
                                        <li>
                                            <a href="{{ route('products', ['category' => $slug]) }}">
                                                <span class="info_icon">
                                                    <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                        alt="">
                                                </span>
                                                <span class="info_text">{{ $label }}</span>
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
                        <h3 class="list_title">Company</h3>
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <ul class="info_list unordered_list_block text-uppercase">
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                    alt="ProMotors - Icon Square">
                                            </span>
                                            <span class="info_text">Catalogue</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('technologyAndInnovation') }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                    alt="ProMotors - Icon Square">
                                            </span>
                                            <span class="info_text">Technology and Innovation</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('WhereToFindUs') }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                    alt="ProMotors - Icon Square">
                                            </span>
                                            <span class="info_text">Where to Find Us</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('home') }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                    alt="ProMotors - Icon Square">
                                            </span>
                                            <span class="info_text">Clients</span>
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
                <a href="https://themeforest.net/user/merkulove">All rights reserved Copyrights 2025
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
