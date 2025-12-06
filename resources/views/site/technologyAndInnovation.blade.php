@extends('layouts.site.master')
@section('title', __('technology.title'))
@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' => __('technology.title'),
        'image' => asset('UI/Site/images/hero/about_banner.png'),
        'description' => __('technology.banner_description'),
        'breadcrumbs' => [
            __('nav.home') => route('home'),
            __('technology.title') => null,
        ],
    ])
@endsection
@section('main-content')
    <section class="testimonial_section section_space_lg">
        <div class="container">
            <div class="section_heading">
                <div class="row align-items-center">
                    <div class="col-md-4lg-6">
                        <div class="outline_text">{{ __('technology.sustainability') }}</div>
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
                    @for ($i = 0; $i < 6; $i++)
                        <div class="col-md-4">
                            <div class="testimonial_item border-0">
                                <article class="s-card">
                                    <a class="s-card_img" href="#!">
                                        <img src="{{ asset('UI/Site/images/services/service_img_2.jpg') }}"
                                            alt="Protect interior">
                                        <span class="s-card_tag">{{ __('technology.card_tag') }}</span>
                                    </a>
                                    <div class="s-card_body">
                                        <h3 class="s-card_title"><a href="#!">{{ __('technology.card_title') }}</a></h3>
                                        <p class="s-card_text">{{ __('technology.card_text') }}</p>
                                        <a class="btn-link" href="#!">
                                            <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                            <span class="btn_text"><small>{{ __('common.read_more') }}</small><small>{{ __('common.read_more') }}</small></span>
                                        </a>
                                    </div>
                                </article>
                            </div>
                        </div>
                    @endfor
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

    <section class="brand_logo_section section_space_lg pb-0  text-center mb-5">
        <div class="container">
            <div class="section_heading">
                <h2 class="heading_text mb-0 wow" data-splitting>{{ __('technology.certifications') }}</h2>
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

    <section class="section_space_md">
        <div class="container">
            <div class="row align-items-end mb-4">
                <div class="col">
                    <h2 class="section_title">{{ __('about.why_choose_us') }}</h2>
                </div>
                <div class="col-auto">
                    <a href="#" class="btn btn-primary btn-sm">{{ __('common.all_services') }}</a>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service_item style_1">
                        <div class="service_image">
                            <img src="{{ Vite::asset('resources/UI/Site/images/services/service_img_1.jpg') }}"
                                alt="{{ __('services.brake.title') }}" class="w-100">
                        </div>
                        <div class="service_content">
                            <h3 class="service_title">{{ __('services.brake.title') }}</h3>
                            <p class="mb-3">{{ __('services.brake.description') }}</p>
                            <a class="btn-link" href="service_details.html">
                                <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                <span class="btn_text"><small>{{ __('common.details_service') }}</small><small>{{ __('common.details_service') }}</small></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service_item style_1">
                        <div class="service_image">
                            <img src="{{ Vite::asset('resources/UI/Site/images/services/service_img_2.jpg') }}"
                                alt="{{ __('services.engine.title') }}" class="w-100">
                        </div>
                        <div class="service_content">
                            <h3 class="service_title">{{ __('services.engine.title') }}</h3>
                            <p class="mb-3">{{ __('services.engine.description') }}</p>
                            <a class="btn-link" href="service_details.html">
                                <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                <span class="btn_text"><small>{{ __('common.details_service') }}</small><small>{{ __('common.details_service') }}</small></span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="service_item style_1">
                        <div class="service_image">
                            <img src="{{ Vite::asset('resources/UI/Site/images/services/service_img_3.jpg') }}"
                                alt="{{ __('services.tire.title') }}" class="w-100">
                        </div>
                        <div class="service_content">
                            <h3 class="service_title">{{ __('services.tire.title') }}</h3>
                            <p class="mb-3">{{ __('services.tire.description') }}</p>
                            <a class="btn-link" href="service_details.html">
                                <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                <span class="btn_text"><small>{{ __('common.details_service') }}</small><small>{{ __('common.details_service') }}</small></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="purchase-banner">
        <div class="container">
            <div class="row">
                <div class="my-5">
                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="banner-card">
                                    <h3 class="mb-3">{{ __('common.purchase_heading') }}</h3>
                                    <a class="banner-btn" href="#where-to-buy">{{ __('common.where_to_buy') }}</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner-card">
                                    <h3 class="mb-3">{{ __('common.more_info_heading') }}</h3>
                                    <a class="banner-btn" href="#contact-us">{{ __('common.contact_us') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
