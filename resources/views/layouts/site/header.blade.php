{{-- // i18n rule: DO NOT translate class/id/data-* or any JS selector. --}}
<!-- Site Header - Start
      ================================================== -->
<header class="site_header">
    <div class="header_bottom">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-3 col-6 order-1 order-lg-1">
                    <div class="site_logo">
                        <a class="site_link" href="{{ route('home') }}">
                            <img class="dark_theme_logo"
                                src="{{ Vite::asset('resources/UI/Site/images/site_logo/dark_theme_site_logo.svg') }}"
                                alt="Site Logo - ProMotors - Car Service & Detailing Template">
                            <img class="light_theme_logo"
                                src="{{ Vite::asset('resources/UI/Site/images/site_logo/light_theme_site_logo.svg') }}"
                                alt="Site Logo - ProMotors - Car Service & Detailing Template">
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-12 order-3 order-lg-2">
                    <nav class="main_menu navbar navbar-expand-lg">
                        <div class="main_menu_inner collapse navbar-collapse justify-content-center"
                            id="main_menu_dropdown">
                            <ul class="main_menu_list unordered_list_center">
                                <li>
                                    <a href="{{ route('home') }}">{{ __('nav.home') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}">{{ __('nav.about') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('products') }}">{{ __('nav.products') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('technology') }}">{{ __('nav.technology') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('WhereToFindUs') }}">{{ __('nav.where_to_find_us') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('Markets') }}">{{ __('nav.markets') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('Insights') }}">{{ __('nav.insights') }}</a>
                                </li>
                                <li>
                                    <a href="{{ route('Contact') }}">{{ __('nav.contact') }}</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-lg-3 col-6 order-2 order-lg-3">
                    <ul class="header_btns_group unordered_list_end align-items-center">
                        <li>
                            <button class="mobile_menu_btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#main_menu_dropdown" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <i class="far fa-bars"></i>
                            </button>
                        </li>
                        <li>
                            <div class="mode-switch" data-bs-toggle="mode" data-cursor="-opaque" data-magnetic>
                                <input id="theme-mode-btn" type="checkbox">
                            </div>
                        </li>
                        <li>
                            <x-lang-switcher />
                        </li>
                        <li class="d-none d-lg-inline-flex">
                            <div class="btn_hotline search_box">
                                <input type="text" class="search_input" placeholder="{{ __('common.search') }}..." />
                                <button class="search_btn">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Site Header - End
      ================================================== -->
