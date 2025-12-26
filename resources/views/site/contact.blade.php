{{-- // i18n rule: DO NOT translate class/id/data-* or any JS selector. --}}
@extends('layouts.site.master')
@section('title', __('contact.title'))

@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' => __('contact.title'),
        'image' => asset('UI/Site/images/shapes/tyre_print.svg'),
        'description' => __('contact.banner_description'),
        'breadcrumbs' => [
            __('nav.home') => route('home'),
            __('contact.title') => null,
        ],
    ])
@endsection

@section('main-content')

    <section class="section_space_md">
        <div class="container">
            <div class="cta_box bg-dark rounded-3 p-4 p-md-5">
                <div class="section_heading mb-4">
                    <h3 class="heading_text mb-0">{{ __('contact.purchase_question') }}</h3>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div>
                            <p class="mb-2 fw-semibold">{{ __('common.find_agent') }}</p>
                            <a class="btn btn-primary" href="{{ route('whereToFindUs', ['tab' => 'agent']) }}">
                                <span class="btn_text">{{ __('common.explore_agent_locator') }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div>
                            <p class="mb-2 fw-semibold">{{ __('common.find_distributor') }}</p>
                            <a class="btn btn-primary" href="{{ route('whereToFindUs', ['tab' => 'distributor']) }}">
                                <span class="btn_text">{{ __('common.view_distributor_locator') }}</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div>
                            <p class="mb-2 fw-semibold">{{ __('common.find_retailer') }}</p>
                            <a class="btn btn-primary" href="{{ route('whereToFindUs', ['tab' => 'retailer']) }}">
                                <span class="btn_text">{{ __('common.explore_retailers') }}</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="appointment_form_section section_space_lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section_heading">
                        <div class="outline_text">{{ __('common.contact_us') }}</div>
                        <h3 class="heading_text wow" data-splitting>{{ __('contact.send_message') }}</h3>
                        <p class="heading_description mb-0">{{ __('common.contact_intro') }}</p>
                    </div>
                </div>
            </div>

            <form action="#" method="POST">
                @csrf
                <div class="form_wrap row">
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_name">{{ __('common.your_name') }}</label>
                            <input type="text" class="form-control" id="input_name" name="name"
                                placeholder="{{ __('common.your_name') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_email">{{ __('common.your_email') }}</label>
                            <input type="email" class="form-control" id="input_email" name="email"
                                placeholder="{{ __('common.your_email') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_phone">{{ __('common.your_phone') }}</label>
                            <input type="tel" class="form-control" id="input_phone" name="phone"
                                placeholder="{{ __('common.your_phone') }}">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="input_message">{{ __('common.your_message') }}</label>
                            <textarea class="form-control" id="input_message" name="message" placeholder="{{ __('common.your_message') }}"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <span class="btn_text">{{ __('common.submit') }}</span>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <section class="contact_section section_space_lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact_info_box">
                        <h3 class="item_title">{{ __('common.address') }}</h3>
                        <ul class="info_list unordered_list_block pe-lg-2">
                            <li>
                                <span class="info_text mb-3">
                                    19 Frisk Drive, Middletown,nj, 3348 United States
                                </span>
                            </li>
                            <li>
                                <span class="info_text">
                                    31 S Division Street, Montour,ia, 50133 United States
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact_info_box">
                        <h3 class="item_title">{{ __('common.office_hours') }}</h3>
                        <ul class="info_list unordered_list_block">
                            <li>
                                <span class="info_text d-flex align-items-center justify-content-between">
                                    <span>{{ __('contact.hours.mon_thu') }}</span>
                                    <span>{{ __('contact.hours.mon_thu_hours') }}</span>
                                </span>
                            </li>
                            <li>
                                <span class="info_text d-flex align-items-center justify-content-between">
                                    <span>{{ __('contact.hours.fri') }}</span>
                                    <span>{{ __('contact.hours.fri_hours') }}</span>
                                </span>
                            </li>
                            <li>
                                <span class="info_text d-flex align-items-center justify-content-between">
                                    <span>{{ __('contact.hours.sat') }}</span>
                                    <span>{{ __('contact.hours.sat_hours') }}</span>
                                </span>
                            </li>
                            <li>
                                <span class="info_text d-flex align-items-center justify-content-between">
                                    <span>{{ __('contact.hours.sun') }}</span>
                                    <span>{{ __('contact.hours.sun_hours') }}</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact_info_box">
                        <h3 class="item_title">{{ __('common.customer_support') }}</h3>
                        <ul class="info_list unordered_list_block">
                            <li>
                                <span class="info_text mb-3">
                                    <span class="d-block">
                                        <a href="tel:+8801680636189">
                                            <bdi dir="ltr">{{ config('company.support_phone') }}</bdi>
                                        </a>
                                    </span>
                                    <span class="d-block">
                                        <a href="tel:+11234567890">
                                            <bdi dir="ltr">+ 1 123 456-7890</bdi>
                                        </a>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="info_text">
                                    <span class="d-block">
                                        <a href="mailto:promotors@email.com">promotors@email.com</a>
                                    </span>
                                    <span class="d-block">
                                        <a href="mailto:contact@email.com">contact@email.com</a>
                                    </span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                    <div class="gmap_canvas">
                        <iframe
                            src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="video_section">
        <div class="video_wrap parallaxie text-center section_space_lg"
            style="background-image: url({{ asset('UI/Site/images/video/video_poster_3.jpg') }});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_heading">
                            <h2 class="heading_text wow" data-splitting>{{ __('contact.book_service_title') }}</h2>
                            <p class="heading_description mb-0 ps-lg-5 pe-lg-5">
                                {{ __('contact.book_service_description') }}
                            </p>
                        </div>
                        <a class="btn btn-primary" href="contact.html">
                            <span class="btn_text">{{ __('common.book_service_now') }}</span>
                        </a>
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
