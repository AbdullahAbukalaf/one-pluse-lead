@extends('layouts.Site.master')
@section('title', 'Technology And Innovation')
@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' => 'Technology And Innovation',
        'image' => asset('UI/Site/images/hero/about_banner.png'),
        'description' => 'Learn more about our mission and values',
        'breadcrumbs' => [
            'Home' => route('home'),
            'Technology And Innovation' => null,
        ],
    ])
@endsection
@section('main-content')
    <!-- Testimonial Section - Start
                    ================================================== -->
    <section class="testimonial_section section_space_lg">
        <div class="container">
            <div class="section_heading">
                <div class="row align-items-center">
                    <div class="col-md-4lg-6">
                        <div class="outline_text">Sustainability</div>
                    </div>
                    <div class="col-md-4lg-6 d-none d-lg-flex justify-content-end">
                        <ul class="carousel_arrow unordered_list">
                            <li>
                                <button type="button" class="c3c_arrow_left">
                                    <i class="fa-regular fa-angle-left"></i>
                                    <i class="fa-regular fa-angle-left"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="c3c_arrow_right">
                                    <i class="fa-regular fa-angle-right"></i>
                                    <i class="fa-regular fa-angle-right"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="testimonial_carousel">
                <div class="testimonial_item_boxed carousel_3col row" data-slick='{"dots": false}'>
                    <div class="col-md-4">
                        <div class="testimonial_item border-0">
                            <article class="s-card">
                                <a class="s-card_img" href="#!">
                                    <img src="{{ asset('UI/Site/images/services/service_img_2.jpg') }}"
                                        alt="Protect interior">
                                    <span class="s-card_tag">Car Advice</span>
                                </a>
                                <div class="s-card_body">
                                    <h3 class="s-card_title"><a href="#!">How to protect your car’s interior</a></h3>
                                    <p class="s-card_text">Daily habits that keep materials clean and extend cabin life.</p>
                                    <a class="btn-link" href="#!">
                                        <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="btn_text"><small>Read More</small><small>Read More</small></span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial_item border-0">
                            <article class="s-card">
                                <a class="s-card_img" href="#!">
                                    <img src="{{ asset('UI/Site/images/services/service_img_2.jpg') }}"
                                        alt="Protect interior">
                                    <span class="s-card_tag">Car Advice</span>
                                </a>
                                <div class="s-card_body">
                                    <h3 class="s-card_title"><a href="#!">How to protect your car’s interior</a></h3>
                                    <p class="s-card_text">Daily habits that keep materials clean and extend cabin life.</p>
                                    <a class="btn-link" href="#!">
                                        <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="btn_text"><small>Read More</small><small>Read More</small></span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial_item border-0">
                            <article class="s-card">
                                <a class="s-card_img" href="#!">
                                    <img src="{{ asset('UI/Site/images/services/service_img_2.jpg') }}"
                                        alt="Protect interior">
                                    <span class="s-card_tag">Car Advice</span>
                                </a>
                                <div class="s-card_body">
                                    <h3 class="s-card_title"><a href="#!">How to protect your car’s interior</a></h3>
                                    <p class="s-card_text">Daily habits that keep materials clean and extend cabin life.</p>
                                    <a class="btn-link" href="#!">
                                        <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="btn_text"><small>Read More</small><small>Read More</small></span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial_item border-0">
                            <article class="s-card">
                                <a class="s-card_img" href="#!">
                                    <img src="{{ asset('UI/Site/images/services/service_img_2.jpg') }}"
                                        alt="Protect interior">
                                    <span class="s-card_tag">Car Advice</span>
                                </a>
                                <div class="s-card_body">
                                    <h3 class="s-card_title"><a href="#!">How to protect your car’s interior</a></h3>
                                    <p class="s-card_text">Daily habits that keep materials clean and extend cabin life.</p>
                                    <a class="btn-link" href="#!">
                                        <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="btn_text"><small>Read More</small><small>Read More</small></span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial_item border-0">
                            <article class="s-card">
                                <a class="s-card_img" href="#!">
                                    <img src="{{ asset('UI/Site/images/services/service_img_2.jpg') }}"
                                        alt="Protect interior">
                                    <span class="s-card_tag">Car Advice</span>
                                </a>
                                <div class="s-card_body">
                                    <h3 class="s-card_title"><a href="#!">How to protect your car’s interior</a></h3>
                                    <p class="s-card_text">Daily habits that keep materials clean and extend cabin life.</p>
                                    <a class="btn-link" href="#!">
                                        <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="btn_text"><small>Read More</small><small>Read More</small></span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial_item border-0">
                            <article class="s-card">
                                <a class="s-card_img" href="#!">
                                    <img src="{{ asset('UI/Site/images/services/service_img_2.jpg') }}"
                                        alt="Protect interior">
                                    <span class="s-card_tag">Car Advice</span>
                                </a>
                                <div class="s-card_body">
                                    <h3 class="s-card_title"><a href="#!">How to protect your car’s interior</a></h3>
                                    <p class="s-card_text">Daily habits that keep materials clean and extend cabin life.
                                    </p>
                                    <a class="btn-link" href="#!">
                                        <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="btn_text"><small>Read More</small><small>Read More</small></span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="testimonial_item border-0">
                            <article class="s-card">
                                <a class="s-card_img" href="#!">
                                    <img src="{{ asset('UI/Site/images/services/service_img_2.jpg') }}"
                                        alt="Protect interior">
                                    <span class="s-card_tag">Car Advice</span>
                                </a>
                                <div class="s-card_body">
                                    <h3 class="s-card_title"><a href="#!">How to protect your car’s interior</a></h3>
                                    <p class="s-card_text">Daily habits that keep materials clean and extend cabin life.
                                    </p>
                                    <a class="btn-link" href="#!">
                                        <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="btn_text"><small>Read More</small><small>Read More</small></span>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>

            <div class="btn_wrap text-center d-lg-none d-block">
                <ul class="carousel_arrow unordered_list_center">
                    <li>
                        <button type="button" class="c3c_arrow_left">
                            <i class="fa-regular fa-angle-left"></i>
                            <i class="fa-regular fa-angle-left"></i>
                        </button>
                    </li>
                    <li>
                        <button type="button" class="c3c_arrow_right">
                            <i class="fa-regular fa-angle-right"></i>
                            <i class="fa-regular fa-angle-right"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!-- Testimonial Section - End
                    ================================================== -->

    <!-- Brand Logo Section - Start
                            ================================================== -->
    <section class="brand_logo_section section_space_lg pb-0  text-center mb-5">
        <div class="container">
            <div class="section_heading">
                <h2 class="heading_text mb-0 wow" data-splitting>Certifications</h2>
            </div>
        </div>

        <div class="brand_logo_carousel brand_logo_blur_effect row align-items-center"
            data-slick='{"dots":false, "arrows": false}'>
            <div class="col-">
                <a class="brand_logo_item" href="#!">
                    <img src="{{ asset('UI/Site/images/services/service_img_1.jpg') }}" alt="ProMotors - TOYOTA Logo">
                </a>
            </div>
            <div class="col-">
                <a class="brand_logo_item" href="#!">
                    <img src="{{ asset('UI/Site/images/services/service_img_1.jpg') }}" alt="ProMotors - Ford Logo">
                </a>
            </div>
            <div class="col-">
                <a class="brand_logo_item" href="#!">
                    <img src="{{ asset('UI/Site/images/services/service_img_1.jpg') }}" alt="ProMotors - DODGE Logo">
                </a>
            </div>
            <div class="col-">
                <a class="brand_logo_item" href="#!">
                    <img src="{{ asset('UI/Site/images/services/service_img_1.jpg') }}" alt="ProMotors - JAGUAR Logo">
                </a>
            </div>
            <div class="col-">
                <a class="brand_logo_item" href="#!">
                    <img src="{{ asset('UI/Site/images/services/service_img_1.jpg') }}" alt="ProMotors - HONDA Logo">
                </a>
            </div>
            <div class="col-">
                <a class="brand_logo_item" href="#!">
                    <img src="{{ asset('UI/Site/images/services/service_img_1.jpg') }}" alt="ProMotors - BMW Logo">
                </a>
            </div>
        </div>
    </section>
    <!-- Brand Logo Section - End
                            ================================================== -->

    <!-- Call To Action Section - Start
        ================================================== -->
    <section class="section_space_md">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col">
                    <h2 class="section_title">WHY CHOOSE US</h2>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-primary btn-sm">ALL SERVICES</a>
                </div>
            </div>

            <div class="row g-4">
                {{-- Card 1 --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service_item style_1">
                        <div class="service_image">
                            <img src="{{ Vite::asset('resources/UI/Site/images/services/service_img_1.jpg') }}"
                                alt="Brake Repair" class="w-100">
                        </div>
                        <div class="service_content">
                            <h3 class="service_title">BRAKE REPAIR</h3>
                            <p class="mb-3">Eget velit aliquet sagittis id consectetur. Odio eu feugiat pretium nibh
                                ipsum cons­­ectetur risus vel.</p>
                            <a class="btn-link" href="service_details.html">
                                <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                <span class="btn_text"><small>Details Service</small><small>Details Service</small></span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 2 --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service_item style_1">
                        <div class="service_image">
                            <img src="{{ Vite::asset('resources/UI/Site/images/services/service_img_2.jpg') }}"
                                alt="Engine Repair" class="w-100">
                        </div>
                        <div class="service_content">
                            <h3 class="service_title">ENGINE REPAIR</h3>
                            <p class="mb-3">Etiam erat velit scelerisque in. Placerat in egestas erat imperdiet sed
                                euismod.</p>
                            <a class="btn-link" href="service_details.html">
                                <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                <span class="btn_text"><small>Details Service</small><small>Details Service</small></span>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Card 3 --}}
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service_item style_1">
                        <div class="service_image">
                            <img src="{{ Vite::asset('resources/UI/Site/images/services/service_img_3.jpg') }}"
                                alt="Tire Repair" class="w-100">
                        </div>
                        <div class="service_content">
                            <h3 class="service_title">TIRE REPAIR</h3>
                            <p class="mb-3">Fermentum posuere urna nec tincidunt praesent. Dignissim enim sit amet
                                venenatis.</p>
                            <a class="btn-link" href="service_details.html">
                                <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                <span class="btn_text"><small>Details Service</small><small>Details Service</small></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Section - End
        ================================================== -->

    <!-- Purchase Banner Section - Start
        ================================================== -->
    <section class="purchase-banner">
        <div class="container">
            <div class="row">
                <div class="my-5">
                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="banner-card">
                                    <h3 class="mb-3">Looking to Purchase?</h3>
                                    <a class="banner-btn" href="#where-to-buy">Where to buy</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner-card">
                                    <h3 class="mb-3">Need More Information?</h3>
                                    <a class="banner-btn" href="#contact-us">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Purchase Banner Section - End
        ================================================== -->
@endsection
