@extends('layouts.site.master')

@section('title', __('products.title'))

@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' => $categoryName ? $categoryName : __('products.all_products'),
        'image' => $bannerImg,
        'description' => $categoryName ? __('products.browse_category', ['category' => $categoryName]) : __('products.all_categories'),
        'breadcrumbs' => $breadcrumbs,
    ])
@endsection

@section('main-content')
    <section class="shop_section section_space_lg pb-0">
        <div class="container">
            <div class="row">

                <div class="col-lg-9">
                    <div class="row">
                        @forelse($products as $p)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <div class="product_item">
                                    <a class="item_image" href="{{ route('productDetails') }}">
                                        <img src="{{ $p['image'] }}" alt="{{ $p['name'] }}">
                                    </a>

                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="{{ route('productDetails') }}">{{ $p['name'] }}</a>
                                        </h3>

                                        @php
                                            $isLight = in_array($categorySlug, [
                                                'indoor-light',
                                                'outdoor-light',
                                                'garden-light',
                                                'solar-light',
                                                'strip-light',
                                                'bulb-light',
                                            ]);
                                        @endphp

                                        @if ($isLight)
                                            <ul class="unordered_list_block small mb-3">
                                                @if (!empty($p['spec_1']))
                                                    <li><strong>{{ __('services.labels.spec_1') }}</strong> {{ $p['spec_1'] }}</li>
                                                @endif
                                                @if (!empty($p['spec_2']))
                                                    <li><strong>{{ __('services.labels.spec_2') }}</strong> {{ $p['spec_2'] }}</li>
                                                @endif
                                                @if (!empty($p['details']))
                                                    <li><strong>{{ __('services.labels.details') }}</strong> {{ \Illuminate\Support\Str::limit($p['details'], 80) }}</li>
                                                @endif
                                            </ul>
                                        @else
                                            @if (!empty($p['brand']))
                                                <a class="item_brand" href="#!">{{ $p['brand'] }}</a>
                                            @endif
                                            @if (isset($p['price']))
                                                <div class="item_footer">
                                                    <div class="item_price">
                                                        <span class="sale_price">${{ number_format($p['price'], 2) }}</span>
                                                    </div>
                                                </div>
                                            @endif
                                        @endif

                                        <a class="btn-link" href="{{ route('productDetails') }}">
                                            <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                            <span class="btn_text"><small>{{ __('products.see_more') }}</small><small>{{ __('products.see_more') }}</small></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p class="text-muted">{{ __('common.no_products') }}</p>
                            </div>
                        @endforelse
                    </div>

                    @if ($products->total() > 0)
                        <p class="text-white small mt-4 mb-3">
                            {{ __('common.showing_results', ['from' => $products->firstItem(), 'to' => $products->lastItem(), 'total' => $products->total()]) }}
                        </p>
                    @endif

                    <div class="mt-2">
                        {{ $products->links('vendor.pagination.default') }}
                    </div>
                </div>

                <div class="col-lg-3">
                    <aside class="sidebar style_2">
                        <div class="widget">
                            <h3 class="widget_title">{{ __('products.categories_title') }}</h3>
                            <ul class="info_list unordered_list_block">
                                @php
                                    $cats = trans('products.categories');
                                @endphp
                                @foreach ($cats as $slug => $label)
                                    <li>
                                        <a href="{{ route('products', ['category' => $slug]) }}">
                                            <span class="info_icon">
                                                <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}" alt="">
                                            </span>
                                            <span class="info_text">{{ $label }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>

            </div>
        </div>
    </section>

    <section class="portfolio_section section_space_lg pb-0">
        <div class="container">
            <div class="section_heading">
                <h2 class="heading_text wow mb-0" data-splitting>{{ __('products.recent_works_title') }}</h2>
            </div>
            <div class="row">
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team_expert_item">
                            <div class="team_expert_image">
                                <img src="{{ asset('UI/Site/images/portfolio/portfolio_img_1.jpg') }}" alt="ProMotors - Car Repair Service">
                            </div>
                            <div class="team_expert_content">
                                <div class="team_expert_title">
                                    <h3 class="team_expert_name mb-0">{{ __('services.engine.title') }}</h3>
                                </div>
                                <a class="btn-link" href="#!">
                                    <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                    <span class="btn_text"><small>{{ __('common.more_details') }}</small><small>{{ __('common.more_details') }}</small></span>
                                </a>
                            </div>
                        </div>
                    </div>
                @endfor
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
                            <img src="{{ Vite::asset('resources/UI/Site/images/services/service_img_1.jpg') }}" alt="{{ __('services.brake.title') }}" class="w-100">
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
                            <img src="{{ Vite::asset('resources/UI/Site/images/services/service_img_2.jpg') }}" alt="{{ __('services.engine.title') }}" class="w-100">
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
                            <img src="{{ Vite::asset('resources/UI/Site/images/services/service_img_3.jpg') }}" alt="{{ __('services.tire.title') }}" class="w-100">
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

@push('styles')
<style>
    /* Theme pagination look */
    .pagination_wrap { margin-top: 8px; }
    .pagination_nav { display: flex; align-items: center; gap: 10px; }
    .pagination_nav .pagination_btn,
    .pagination_nav a,
    .pagination_nav span {
        display: flex; justify-content: center; align-items: center;
        width: 48px; height: 48px;
        border: 1px solid rgba(255,255,255,0.15);
        background: transparent; color: #fff; font-weight: 600;
        transition: .2s ease; line-height: 1;
    }
    .pagination_nav a:hover,
    .pagination_nav .pagination_btn:hover {
        background: #dd6a23; border-color: #dd6a23; color: #fff;
    }
    .pagination_nav li.active .pagination_btn,
    .pagination_nav li.active span {
        background: #dd6a23 !important; border-color: #dd6a23 !important; color: #fff !important;
    }
    .pagination_nav li.disabled .pagination_btn,
    .pagination_nav li.disabled span {
        opacity: .4; cursor: not-allowed;
    }
</style>
@endpush
