@extends('layouts.site.master')
@section('title', __('technology.title'))
@php
    $titleField = app()->getLocale() === 'ar' ? 'heading_ar' : 'heading_en';
    $btnField = app()->getLocale() === 'ar' ? 'button_text_ar' : 'button_text_en';
@endphp
@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' =>
            app()->getLocale() === 'ar'
                ? $banner->title_ar ?? __('technology.title')
                : $banner->title_en ?? __('technology.title'),
        'image' => $banner?->image
            ? asset('storage/' . $banner->image)
            : asset('UI/Site/images/shapes/tyre_print.svg'),
        'description' =>
            app()->getLocale() === 'ar'
                ? $banner->description_ar ?? __('technology.banner_description')
                : $banner->description_en ?? __('technology.banner_description'),
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
                    @foreach ($testimonials as $item)
                        <div class="col-md-4">
                            <div class="testimonial_item border-0">
                                <article class="s-card">
                                    <a class="s-card_img" href="#!">
                                        <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('UI/Site/images/services/service_img_2.jpg') }}"
                                            alt="{{ app()->getLocale() === 'ar' ? $item->title_ar : $item->title_en }}">
                                        <span
                                            class="s-card_tag">{{ app()->getLocale() === 'ar' ? $item->tag_ar : $item->tag_en }}</span>
                                    </a>
                                    <div class="s-card_body">
                                        <h3 class="s-card_title">
                                            <a
                                                href="#!">{{ app()->getLocale() === 'ar' ? $item->title_ar : $item->title_en }}</a>
                                        </h3>
                                        <p class="s-card_text">
                                            {{ app()->getLocale() === 'ar' ? $item->description_ar : $item->description_en }}
                                        </p>
                                    </div>
                                </article>
                            </div>
                        </div>
                    @endforeach
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
            @foreach ($certifications as $cert)
                <div class="col-">
                    <a class="brand_logo_item" href="#!">
                        <img src="{{ $cert->image ? asset('storage/' . $cert->image) : asset('UI/Site/images/services/service_img_1.jpg') }}"
                            alt="Certification">
                    </a>
                </div>
            @endforeach
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
                @foreach ($whyChooseUs as $item)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="service_item style_1">
                            <div class="service_image">
                                <img src="{{ $item->image ? asset('storage/' . $item->image) : Vite::asset('resources/UI/Site/images/services/service_img_1.jpg') }}"
                                    alt="{{ app()->getLocale() === 'ar' ? $item->title_ar : $item->title_en }}"
                                    class="w-100">
                            </div>
                            <div class="service_content">
                                <h3 class="service_title">
                                    {{ app()->getLocale() === 'ar' ? $item->title_ar : $item->title_en }}</h3>
                                <p class="mb-3">
                                    {{ app()->getLocale() === 'ar' ? $item->description_ar : $item->description_en }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <section class="purchase-banner">
        <div class="container my-5">
            <div class="row g-4 align-items-center">

                @forelse ($banners as $banner)
                    @if ($banner->is_active)
                        <div class="col-md-6">
                            <div class="banner-card">
                                <h3 class="mb-3">
                                    {{ $banner->{$titleField} }}
                                </h3>

                                @if ($banner->button_url)
                                    <a class="banner-btn" href="{{ $banner->button_url }}">
                                        {{ $banner->{$btnField} }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endif
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No banners available.</p>
                    </div>
                @endforelse

            </div>
        </div>
    </section>
@endsection
