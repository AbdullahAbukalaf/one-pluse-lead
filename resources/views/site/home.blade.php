@extends('layouts.site.master')
@section('title', __('home.title'))
@php
    $t = "title_{$locale}";
    $d = "description_{$locale}";
    $outline = "outline_{$locale}";
    $btn = "button_text_{$locale}";
    $titleField = app()->getLocale() === 'ar' ? 'heading_ar' : 'heading_en';
    $btnField = app()->getLocale() === 'ar' ? 'button_text_ar' : 'button_text_en';
@endphp

@section('main-content')

    <!-- Hero Video Background - Start ================================================== -->
    <section id="home" class="hero_section hero_video_bg">
        <video autoplay muted loop>
            @if ($hero && $hero->video_mp4_path)
                <source src="{{ asset($hero->video_mp4_path) }}" type="video/mp4">
            @else
                <source src="{{ asset('UI/Site/videos/Promotors-Car-Care-Center.mp4') }}" type="video/mp4">
            @endif

            @if ($hero && $hero->video_ogg_path)
                <source src="{{ asset($hero->video_ogg_path) }}" type="video/ogg">
            @else
                <source src="{{ asset('UI/Site/videos/Promotors-Car-Care-Center.mp4') }}" type="video/ogg">
            @endif
        </video>

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero_section_content py-5">
                        <h1 class="hero_title wow" data-splitting">
                            {{ $hero ? $hero->$t : __('home.hero.title') }}
                        </h1>

                        <p>{{ $hero && $hero->$d ? $hero->$d : __('home.hero.description') }}</p>

                        @php
                            $heroBtnText = $hero && $hero->$btn ? $hero->$btn : __('common.get_service');
                            $heroBtnUrl = $hero && $hero->button_url ? $hero->button_url : 'service_details.html';
                        @endphp
                        <a class="btn btn-primary" href="{{ $heroBtnUrl }}">
                            <span class="btn_text">{{ $heroBtnText }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero Video Background - End ================================================== -->
    <!-- Counter Section - Start ================================================== -->
    <div id="markets" class="counter_section bg_gray_dark section_space_md">
        <div class="container">
            <div class="counter_items_group row">
                @foreach ($counters as $counter)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter_item">
                            <div class="counter_value">
                                <span class="odometer" data-count="{{ $counter->value }}">0</span>
                                @if ($counter->suffix)
                                    <span>{{ $counter->suffix }}</span>
                                @endif
                            </div>
                            <hr>
                            <p class="counter_description mb-0">{{ $counter->{"description_{$locale}"} }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Counter Section - End ================================================== -->
    <!-- About Section - Start ================================================== -->
    <section id="about-us" class="service_section bg_gray_dark">
        <div class="service_split_wrapper">

            @foreach ($aboutBlocks as $block)
                <div class="service_split_item">
                    <div class="item_image">
                        <img src="{{ asset($block->image_path) }}" alt="ProMotors - Service Image">
                    </div>

                    <div class="item_content">
                        <div class="section_heading">
                            @if ($block->$outline)
                                <div class="outline_text">{{ $block->$outline }}</div>
                            @endif

                            <h3 class="heading_text wow" data-splitting>{{ $block->$t }}</h3>

                            {{-- If this block has features, render them; otherwise show a paragraph if present --}}
                            @if ($block->features->count())
                                <ul class="info_list unordered_list_block text-uppercase">
                                    @foreach ($block->features as $feature)
                                        <li>
                                            <span class="info_icon">
                                                @if ($feature->icon_svg_path)
                                                    <img src="{{ asset($feature->icon_svg_path) }}" alt="Icon">
                                                @else
                                                    <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}"
                                                        alt="Icon">
                                                @endif
                                            </span>
                                            <span class="info_text">{{ $feature->{"text_{$locale}"} }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @elseif($block->$d)
                                <p class="heading_description mb-0">{{ $block->$d }}</p>
                            @endif
                        </div>

                        @php
                            $btnText = $block->$btn ?: __('common.learn_more');
                        @endphp
                        @if ($block->button_url)
                            <a class="btn btn-primary" href="{{ $block->button_url }}">
                                <span class="btn_text">{{ $btnText }}</span>
                            </a>
                        @endif
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <!-- About Section - End ================================================== -->
    <!-- Service Section - Start ================================================== -->
    <section id="products" class="service_section section_space_lg">
        <div class="container">
            <div class="section_heading">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="heading_text mb-0 wow" data-splitting>{{ __('home.services_heading') }}</h2>
                    </div>
                    <div class="col-lg-6 d-none d-lg-flex justify-content-end">
                        <a class="btn btn-primary" href="{{ route('home') }}#products">
                            <span class="btn_text">{{ __('common.all_services') }}</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service_item">
                            <div class="item_icon">
                                @if ($service->icon_svg_path)
                                    {{-- Use Storage::url because we saved on the public disk --}}
                                    <img src="{{ Storage::url($service->icon_svg_path) }}" alt="{{ $service->$t }}"
                                        width="56" height="56">
                                @endif
                            </div>
                            <div class="item_content">
                                <h3 class="item_title">{{ $service->$t }}</h3>

                                @if (!empty($service->$d))
                                    <p>{{ $service->$d }}</p>
                                @endif

                                @php
                                    $url = $service->details_url ?: 'service_details.html';
                                @endphp

                                <a class="btn-link" href="{{ $url }}">
                                    <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                    <span class="btn_text">
                                        <small>{{ __('common.details_service') }}</small>
                                        <small>{{ __('common.details_service') }}</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="btn_wrap text-center d-lg-none d-block">
                <a class="btn btn-primary" href="{{ route('home') }}#products">
                    <span class="btn_text">{{ __('common.all_services') }}</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Service Section - End ================================================== -->
    <!-- Work Process Section - Start ================================================== -->
    <section id="insights" class="workprocess_section section_space_lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="section_heading pe-lg-5">
                        <h2 class="heading_text wow" data-splitting">{{ __('home.work_process.heading') }}</h2>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        @foreach ($steps as $step)
                            <div class="col-md-6 col-sm-6">
                                <div class="workprocess_item">
                                    <h3 class="item_title">
                                        <span
                                            class="serial_number">{{ str_pad($step->step_number, 2, '0', STR_PAD_LEFT) }}</span>
                                        <span class="title_text">{{ $step->$t }}</span>
                                    </h3>
                                    @if ($step->$d)
                                        <p class="mb-0">{{ $step->$d }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Work Process Section - End ================================================== -->
    <!-- Purchase Banner Section - Start ============================================ -->
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
    <!-- Purchase Banner Section - End ============================================== -->


@endsection
