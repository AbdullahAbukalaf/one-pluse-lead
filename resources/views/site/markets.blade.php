@extends('layouts.site.master')
@section('title', __('markets.title'))
@php
    $titleField = app()->getLocale() === 'ar' ? 'heading_ar' : 'heading_en';
    $btnField = app()->getLocale() === 'ar' ? 'button_text_ar' : 'button_text_en';
@endphp
@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' => app()->getLocale() === 'ar' ? ($banner->title_ar ?? __('nav.markets')) : ($banner->title_en ?? __('nav.markets')),
        'image' => $banner?->image ? asset('storage/' . $banner->image) : asset('UI/Site/images/shapes/tyre_print.svg'),
        'description' => app()->getLocale() === 'ar' ? ($banner->description_ar ?? null) : ($banner->description_en ?? null),
        'breadcrumbs' => [
            __('nav.home') => route('home'),
            __('nav.markets') => null,
        ],
    ])
@endsection

@section('main-content')

    <section class="section_space_lg market-intro">
        <div class="container">
            <div class="market-panel">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-12">
                        <span class="market-eyebrow">{{ app()->getLocale() === 'ar' ? $intro->head_title_ar : $intro->head_title_en }}</span>
                        <div class="d-flex align-items-center gap-3 mb-2">
                            <h3 class="section_title mb-0">{{ app()->getLocale() === 'ar' ? $intro->title_ar : $intro->title_en }}</h3>
                            <span class="glow-dot"></span>
                        </div>
                        <p class="market-copy mb-4">{{ app()->getLocale() === 'ar' ? $intro->description_ar : $intro->description_en }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="products" class="service_section section_space_lg">
        <div class="container">
            <div class="section_heading">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <h2 class="heading_text mb-0 wow" data-splitting>{{ __('home.services_heading') }}</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="service_item bg-black d-flex justify-content-center align-items-center d-flex justify-content-center align-items-center  gap-4 text-center">
                            <div class="item_icon">
                                <img class="w-100"
                                    src="{{ $service->image ? asset('storage/' . $service->image) : Vite::asset('resources/UI/Site/images/services/service_img_1.jpg') }}"
                                    alt="{{ app()->getLocale() === 'ar' ? $service->title_ar : $service->title_en }}">
                            </div>
                            <div class="item_content">
                                <h3 class="item_title">{{ app()->getLocale() === 'ar' ? $service->title_ar : $service->title_en }}</h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="btn_wrap text-center d-lg-none d-block">
                <a class="btn btn-primary" href="service.html">
                    <span class="btn_text">{{ __('common.all_services') }}</span>
                </a>
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
