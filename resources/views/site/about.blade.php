@extends('layouts.site.master')
@section('title', 'About')
@php
    $titleField = app()->getLocale() === 'ar' ? 'heading_ar' : 'heading_en';
    $btnField = app()->getLocale() === 'ar' ? 'button_text_ar' : 'button_text_en';
@endphp
@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' =>
            app()->getLocale() === 'ar' ? $banner?->heading_ar ?? 'من نحن' : $banner?->heading_en ?? 'About Us',
        'image' => $banner?->image
            ? asset('storage/' . $banner->image)
            : asset('UI/Site/images/shapes/tyre_print.svg'),
        'description' => app()->getLocale() === 'ar' ? $banner?->description_ar : $banner?->description_en,
        'breadcrumbs' => [
            __('home.title') => route('home'),
            __('about.title') => '#',
        ],
    ])
@endsection

@section('main-content')

    {{-- ABOUT SECTION --}}
    <section class="about_section section_space_lg pb-0">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 order-lg-last">
                    <div class="image_widget">
                        <img src="{{ $aboutSection?->image ? asset('storage/' . $aboutSection->image) : asset('UI/Site/images/about/about_image_3.jpg') }}"
                            alt="About Image">
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="about_content">
                        <div class="section_heading">
                            <h2 class="heading_text wow" data-splitting>
                                {{ app()->getLocale() === 'ar' ? $aboutSection?->title_ar : $aboutSection?->title_en }}
                            </h2>
                            <p class="heading_description mb-0">
                                {{ app()->getLocale() === 'ar' ? $aboutSection?->description_ar : $aboutSection?->description_en }}
                            </p>
                        </div>

                        {{-- Progress 1 --}}
                        {{-- Progress 1 --}}
                        @php $p1 = (int)($aboutSection?->progress_bar_percent1 ?? 0); @endphp
                        <div class="progress_item">
                            <h4 class="item_title">
                                {{ app()->getLocale() === 'ar' ? $aboutSection?->progress_bar_title1_ar : $aboutSection?->progress_bar_title1_en }}
                            </h4>
                            <div class="progress">
                                <div class="progress_bar js-progress-bar" data-target="{{ $p1 }}"
                                    role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                    aria-valuenow="{{ $p1 }}">
                                    <span class="value_text m-0">{{ $p1 }}%</span>
                                </div>
                            </div>

                        </div>

                        {{-- Progress 2 --}}
                        {{-- Progress 2 --}}
                        @php $p2 = (int)($aboutSection?->progress_bar_percent2 ?? 0); @endphp
                        <div class="progress_item mb-0">
                            <h4 class="item_title">
                                {{ app()->getLocale() === 'ar' ? $aboutSection?->progress_bar_title2_ar : $aboutSection?->progress_bar_title2_en }}
                            </h4>
                            <div class="progress">
                                <div class="progress_bar js-progress-bar" data-target="{{ $p2 }}"
                                    role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                    aria-valuenow="{{ $p2 }}">
                                    <span class="value_text m-0">{{ $p2 }}%</span>
                                </div>
                            </div>
                        </div>



                    </div>



                </div>
            </div>
        </div>
    </section>

    {{-- CARDS SECTION --}}
    <section id="products" class="service_section section_space_lg">
        <div class="container">
            <div class="section_heading">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="heading_text mb-0 wow" data-splitting>
                            {{ app()->getLocale() === 'ar' ? $aboutSection?->title_ar : $aboutSection?->title_en }}
                        </h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse($cards as $card)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service_item">
                            <div class="item_icon">
                                @if ($card->svg)
                                    <img src="{{ asset('storage/' . $card->svg) }}"
                                        alt="{{ app()->getLocale() === 'ar' ? $card->title_ar : $card->title_en }}"
                                        class="service_icon">
                                @endif

                            </div>
                            <div class="item_content">
                                <h3 class="item_title">
                                    {{ app()->getLocale() === 'ar' ? $card->title_ar : $card->title_en }}</h3>
                                <p>{{ app()->getLocale() === 'ar' ? $card->description_ar : $card->description_en }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-muted">No cards added yet.</div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- WHY CHOOSE US --}}
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
                                <img src="{{ $item->image ? asset('storage/' . $item->image) : asset('UI/Site/images/services/service_image_1.jpg') }}"
                                    alt="{{ $item->title_en }}" class="w-100">
                            </div>
                            <div class="service_content">
                                <h3 class="service_title">
                                    {{ app()->getLocale() === 'ar' ? $item->title_ar : $item->title_en }}</h3>
                                <p class="mb-3">
                                    {{ app()->getLocale() === 'ar' ? $item->description_ar : $item->description_en }}</p>
                                <a class="btn-link" href="service_details.html">
                                    <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                    <span class="btn_text me-2">
                                        <small>{{ __('common.details_service') }}</small>
                                        <small>{{ __('common.details_service') }}</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    {{-- CERTIFICATIONS --}}
    <section class="brand_logo_section section_space_lg pb-0  text-center">
        <div class="container">
            <div class="section_heading">
                <h2 class="heading_text mb-0 wow" data-splitting>{{ __('about.certifications') }}</h2>
            </div>
        </div>

        <div class="brand_logo_carousel brand_logo_blur_effect row align-items-center"
            data-slick='{"dots":false, "arrows": false}'>
            @foreach ($certifications as $cert)
            <div class="col-">
                <a class="brand_logo_item" href="#!">
                    <img src="{{ asset('storage/' . $cert->image) }}" alt="ProMotors - TOYOTA Logo">
                </a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- SLIDER --}}
    <section class="main_slider_section main_slider_2">
        <div class="container position-relative">
            <div class="main_slider" data-slick='{"arrows": false}'>
                @forelse($sliders as $slide)
                    <div class="slider_item section_space_lg">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="slider_image" data-animation="zoomIn" data-delay=".2s">
                                    <img src="{{ $slide->image ? asset('storage/' . $slide->image) : asset('UI/Site/images/hero/slider_image_6.png') }}"
                                        alt="Slider Image">
                                </div>
                            </div>
                            <div class="order-lg-first col-lg-6">
                                <h3 class="title_text" data-animation="fadeInUp2" data-delay=".4s">
                                    {{ app()->getLocale() === 'ar' ? $slide->title_ar : $slide->title_en }}
                                </h3>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- fallback (optional) --}}
                    <div class="slider_item section_space_lg">
                        <div class="row align-items-center">
                            <div class="col-lg-6">
                                <div class="slider_image">
                                    <img src="{{ asset('UI/Site/images/hero/slider_image_6.png') }}" alt="Slider Image">
                                </div>
                            </div>
                            <div class="order-lg-first col-lg-6">
                                <h3 class="title_text">About</h3>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>

            <div class="main_slider_nav d-none">
                <div class="slider_nav_item"></div>
                <div class="slider_nav_item"></div>
                <div class="slider_nav_item"></div>
                <div class="slider_nav_item"></div>
            </div>

            <div class="slick-progress"><span></span></div>

            <div class="slide_count_wrap">
                <span class="current">1</span>
                <span>/</span>
                <span class="total">{{ max(1, $sliders->count()) }}</span>
            </div>
        </div>
    </section>

    {{-- BOOK SERVICE (was the video section) --}}
    @if($bookService && $bookService->is_active)
        <section class="video_section">
            <div class="video_wrap parallaxie text-center section_space_lg"
                style="background-image: url({{ $bookService?->image ? asset('storage/' . $bookService->image) : asset('UI/Site/images/video/video_poster_3.jpg') }});">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section_heading">
                                <h2 class="heading_text wow" data-splitting>
                                    {{ app()->getLocale() === 'ar' ? $bookService?->title_ar : $bookService?->title_en }}
                                </h2>
                                <p class="heading_description mb-0 ps-lg-5 pe-lg-5">
                                    {{ app()->getLocale() === 'ar' ? $bookService?->description_ar : $bookService?->description_en }}
                                </p>
                            </div>

                            <a class="btn btn-primary" href="#">
                                <span class="btn_text">{{ __('about.video.btn_text') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Keep your purchase-banner section as-is --}}
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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const bars = document.querySelectorAll(".js-progress-bar");
            if (!bars.length) return;

            const animateBar = (bar) => {
                if (bar.dataset.running === "1") return;
                bar.dataset.running = "1";

                const target = Math.min(100, Math.max(0, parseInt(bar.dataset.target, 10) || 0));
                let current = 0;
                const duration = 1000; // ms
                const startTime = performance.now();

                function step(now) {
                    const progress = Math.min((now - startTime) / duration, 1);
                    current = Math.floor(progress * target);
                    bar.style.width = current + "%";

                    if (progress < 1) {
                        requestAnimationFrame(step);
                    } else {
                        bar.style.width = target + "%";
                    }
                }

                requestAnimationFrame(step);
            };

            // Trigger when visible
            const observer = new IntersectionObserver(
                (entries, obs) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animateBar(entry.target);
                            obs.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.4
                }
            );

            bars.forEach(bar => observer.observe(bar));
        });
    </script>
@endsection
