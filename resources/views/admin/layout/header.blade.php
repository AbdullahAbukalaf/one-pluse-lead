@php
$user = Auth::user();
@endphp
<div class="header">
    <div class="header-left">
        <div class="menu-icon bi bi-list"></div>
        <div class="search-toggle-icon bi bi-search" data-toggle="header_search"></div>
    </div>
    <div class="header-right">
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <i class="dw dw-user"></i>
                    </span>
                    <span class="user-name">{{ $user->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="dw dw-logout"></i> Log Out</a>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="left-side-bar">
    <div class="brand-logo">
        <a href="#">
            <img src="{{ Vite::asset('resources/UI/Site/images/site_logo/dark_theme_site_logo.svg') }}" alt=""
                class="dark-logo" />
            <img src="{{ Vite::asset('resources/UI/Site/images/site_logo/dark_theme_site_logo.svg') }}" width="150"
                class="light-logo" />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu" class="p-0">

                {{-- Main --}}
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="dropdown-toggle no-arrow text-decoration-none">
                        <span class="mtext">Home</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.users.index') }}" class="dropdown-toggle no-arrow text-decoration-none">
                        <span class="mtext">Users</span>
                    </a>
                </li>

                <li>
                    <div class="dropdown-divider"></div>
                </li>

                {{-- Home Page --}}
                <li>
                    <a href="javascript:;" class="dropdown-toggle text-decoration-none">
                        {{-- <span class="micon bi bi-house"></span> --}}
                        <span class="mtext">Home Pages</span>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="#" class="text-decoration-none">
                                Hero
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.services.index') }}" class="text-decoration-none">
                                Services
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.counters.index') }}" class="text-decoration-none">
                                Counters
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.about-blocks.index') }}" class="text-decoration-none">
                                About Blocks
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.work-steps.index') }}" class="text-decoration-none">
                                Work Steps
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.purchase-banners.index') }}" class="text-decoration-none">
                                Purchase Banners
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- About Page --}}
                <li>
                    <a href="javascript:;" class="dropdown-toggle text-decoration-none">
                        {{-- <span class="micon bi bi-house"></span> --}}
                        <span class="mtext">About Pages</span>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="{{ route('admin.about.banner.edit') }}" class="text-decoration-none">
                                About Banner
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.about.section.edit') }}" class="text-decoration-none">
                                About Section
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.about.why-choose-us.index') }}" class="text-decoration-none">
                                Why Choose Us
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.about.cards.index') }}" class="text-decoration-none">
                                About Cards
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.about.certifications.index') }}" class="text-decoration-none">
                                Certifications
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.about.sliders.index') }}" class="text-decoration-none">
                                About Slider
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.about.book.edit') }}" class="text-decoration-none">
                                Book Service
                            </a>
                        </li>

                    </ul>
                </li>

                {{-- Technology Page --}}
                <li>
                    <a href="javascript:;" class="dropdown-toggle text-decoration-none">
                        <span class="mtext">Technology Pages</span>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="{{ route('admin.technology.banner.edit') }}" class="text-decoration-none">
                                Technology Banner
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.technology.testimonials.index') }}" class="text-decoration-none">
                                Testimonials
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.technology.why-choose-us.index') }}" class="text-decoration-none">
                                Why Choose Us
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.technology.certifications.index') }}" class="text-decoration-none">
                                Certifications
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Markets Page --}}
                <li>
                    <a href="javascript:;" class="dropdown-toggle text-decoration-none">
                        <span class="mtext">Markets Pages</span>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="{{ route('admin.markets.banner.edit') }}" class="text-decoration-none">
                                Markets Banner
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.markets.intro.edit') }}" class="text-decoration-none">
                                Market Intro
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.markets.services.index') }}" class="text-decoration-none">
                                Service Section
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Insights Page --}}
                <li>
                    <a href="javascript:;" class="dropdown-toggle text-decoration-none">
                        <span class="mtext">Insights Pages</span>
                    </a>

                    <ul class="submenu">
                        <li><a href="{{ route('admin.insights.hero.edit') }}" class="text-decoration-none">Hero
                                Video</a></li>
                        <li><a href="{{ route('admin.insights.section.edit') }}" class="text-decoration-none">Insights
                                Section</a></li>
                        <li><a href="{{ route('admin.insights.types.index') }}" class="text-decoration-none">Insight
                                Types</a></li>
                        <li><a href="{{ route('admin.insights.recommendations.index') }}"
                                class="text-decoration-none">Recommendations</a></li>
                    </ul>
                </li>
                {{-- Where To Find Us --}}
                <li class="">
                    <a href="javascript:;" class="dropdown-toggle text-decoration-none">
                        <span class="mtext">Where To Find Us</span>
                    </a>
                    <ul class="submenu">
                        <li class=""><a class="text-decoration-none"
                                href="{{ route('admin.where-to-find-us.hero.edit') }}">Hero</a></li>
                        <li class=""><a class="text-decoration-none"
                                href="{{ route('admin.where-to-find-us.locations.index') }}">Locations</a></li>
                        <li class=""><a class="text-decoration-none"
                                href="{{ route('admin.where-to-find-us.distributors.index') }}">Distributors</a></li>
                    </ul>
                </li>
                {{-- Contact us page --}}
                <li>
                    <a href="javascript:;" class="dropdown-toggle text-decoration-none">
                        <span class="mtext">Contact Us Pages</span>
                    </a>

                    <ul class="submenu">
                        <li>
                            <a href="{{ route('admin.contact-hero.edit') }}" class="text-decoration-none">
                                Contact Us Banner
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.contact-explore-locator.edit') }}" class="text-decoration-none">
                                Explore Locator
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.contact-form-section.edit') }}" class="text-decoration-none">
                                Form Section
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.contact-info.edit') }}" class="text-decoration-none">
                                Contact Info
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.contact-video.edit') }}" class="text-decoration-none">
                                Book service
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- Products Pages --}}
                <li>
                    <a href="javascript:;" class="dropdown-toggle text-decoration-none">
                        <span class="mtext">Products Pages</span>
                    </a>

                    <ul class="submenu">
                        {{-- Products Banner --}}
                        <li>
                            <a href="{{ route('admin.products.banner.edit') }}" class="text-decoration-none">
                                Products Banner
                            </a>
                        </li>

                        {{-- Products CRUD --}}
                        <li>
                            <a href="{{ route('admin.products.index') }}" class="text-decoration-none">
                                Products
                            </a>
                        </li>

                        {{-- Extra Sections --}}
                        <li>
                            <a href="{{ route('admin.products.recent_works.index') }}" class="text-decoration-none">
                                Our Recent Works
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('admin.products.why_choose_us.index') }}" class="text-decoration-none">
                                Why Choose Us
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- Categories --}}
                <li>
                    <a href="{{ route('admin.categories.index') }}"
                        class="dropdown-toggle no-arrow text-decoration-none">
                        <span class="mtext">Categories</span>
                    </a>
                </li>

        </div>
    </div>
</div>
<div class="mobile-menu-overlay"></div>
