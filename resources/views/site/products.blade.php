@extends('layouts.site.master')
@php
    $titleField = app()->getLocale() === 'ar' ? 'heading_ar' : 'heading_en';
    $btnField = app()->getLocale() === 'ar' ? 'button_text_ar' : 'button_text_en';
@endphp
@section('title', $categoryModel ? ($categoryModel->title_en) : __('products.all_products'))
@php
$isCategory = (bool)$categoryModel;
$locale = app()->getLocale();

$categoryName = $categoryModel ? ($locale === 'ar' ? $categoryModel->title_ar : $categoryModel->title_en) : null;

$bannerTitle = $isCategory
? ($locale === 'ar' ? ($categoryModel->banner_title_ar ?? $categoryModel->title_ar) : ($categoryModel->banner_title_en
?? $categoryModel->title_en))
: ($locale === 'ar' ? ($banner->title_ar ?? __('products.all_products')) : ($banner->title_en ??
__('products.all_products')));

$bannerDesc = $isCategory
? ($locale === 'ar'
? ($categoryModel->banner_description_ar ?? __('products.browse_category', ['category' => $categoryName]))
: ($categoryModel->banner_description_en ?? __('products.browse_category', ['category' => $categoryName]))
)
: ($locale === 'ar' ? ($banner->description_ar ?? __('products.all_categories')) : ($banner->description_en ??
__('products.all_categories')));

$bannerImg = $isCategory
? ($categoryModel->banner_image ?? $banner?->image)
: ($banner?->image);

$breadcrumbs = [
__('nav.home') => route('home'),
__('products.title') => route('products'),
];
if ($categoryName) $breadcrumbs[$categoryName] = null;
@endphp
@section('page-banner')
@include('layouts.site.partials.banner', [
'title' => $bannerTitle,
'image' => $bannerImg,
'description' => $bannerDesc,
'breadcrumbs' => $breadcrumbs,
])
@endsection

@section('main-content')
<section class="shop_section section_space_lg pb-0">
    <div class="container">
        <div class="row">

            <div class="col-lg-9">
                <div class="row">
                    @foreach($products as $p)
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="product_item">
                            <a class="item_image" href="{{ route('productDetails', $p->slug) }}">
                                <img src="{{ asset('storage/' . $p->card_image ?: 'resources/UI/Site/images/products/product_img_5.png') }}"
                                    alt="Product Image">
                            </a>
                            <div class="item_content">
                                <h3 class="item_title">
                                    <a href="{{ route('productDetails', $p->slug) }}">
                                        {{ $locale === 'ar' ? $p->title_ar : $p->title_en }}
                                    </a>
                                </h3>

                                @if(!$isCategory)
                                <a class="item_brand" href="#!">{{ $locale === 'ar' ? $p->brand_ar : $p->brand_en }}</a>
                                @if(!empty($p->price))
                                <div class="item_price"><span class="sale_price">{{ $p->price }}</span></div>
                                @endif
                                @else
                                <div class="small text-white-50">
                                    @if($p->spec_1_en || $p->spec_1_ar)
                                    <div><strong>Specification 1:</strong> {{ $locale === 'ar' ? $p->spec_1_ar :
                                        $p->spec_1_en }}</div>
                                    @endif
                                    @if($p->spec_2_en || $p->spec_2_ar)
                                    <div><strong>Specification 2:</strong> {{ $locale === 'ar' ? $p->spec_2_ar :
                                        $p->spec_2_en }}</div>
                                    @endif
                                    @if($p->details_snippet_en || $p->details_snippet_ar)
                                    <div><strong>Details:</strong> {{ $locale === 'ar' ? $p->details_snippet_ar :
                                        $p->details_snippet_en }}</div>
                                    @endif
                                </div>
                                @endif

                                <div class="item_footer mt-3">
                                    <a class="btn-link" href="{{ route('productDetails', $p->slug) }}">
                                        <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="btn_text"><small>SEE MORE</small><small>SEE MORE</small></span>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $products->links('vendor.pagination.default') }}
                </div>
            </div>

            <div class="col-lg-3">
                <aside class="sidebar style_2">
                    <div class="widget">
                        <h3 class="widget_title">{{ __('products.categories_title') }}</h3>
                        <ul class="info_list unordered_list_block">
                            @foreach($categories as $cat)
                            <li>
                                <a href="{{ route('products', $cat->slug) }}">
                                    <span class="info_icon">
                                        <img src="{{ asset('UI/Site/images/icons/icon_square.svg') }}" alt="">
                                    </span>
                                    <span class="info_text">{{ $locale === 'ar' ? $cat->title_ar : $cat->title_en }}</span>
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
            @foreach ($recentWorks as $rw)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="team_expert_item">
                    <div class="team_expert_image">
                        <img src="{{ asset('storage/' . $rw->image ?: 'resources/UI/Site/images/placeholder/620x890.png') }}"
                            alt="Work">
                    </div>
                    <div class="team_expert_content">
                        <div class="team_expert_title">
                            <h3 class="team_expert_name mb-0">{{ $locale === 'ar' ? $rw->title_ar : $rw->title_en }}
                            </h3>
                        </div>
                        <a class="btn-link" href="#!">
                            <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="btn_text"><small>{{ __('common.more_details') }}</small><small>{{
                                    __('common.more_details') }}</small></span>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
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
            @foreach($whyChooseUs as $wc)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="service_item style_1">
                    <div class="service_image">
                        <img src="{{ asset('storage/' . $wc->image ?: 'resources/UI/Site/images/placeholder/1920x1220.png') }}"
                            alt="{{ $locale === 'ar' ? $wc->title_ar : $wc->title_en }}" class="w-100">
                    </div>
                    <div class="service_content">
                        <h3 class="service_title">{{ $locale === 'ar' ? $wc->title_ar : $wc->title_en }}</h3>
                        <p class="mb-3">{{ $locale === 'ar' ? $wc->description_ar : $wc->description_en }}</p>
                        <a class="btn-link" href="service_details.html">
                            <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                            <span class="btn_text"><small>{{ __('common.details_service') }}</small><small>{{
                                    __('common.details_service') }}</small></span>
                        </a>
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

@push('styles')
<style>
    /* Theme pagination look */
    .pagination_wrap {
        margin-top: 8px;
    }

    .pagination_nav {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .pagination_nav .pagination_btn,
    .pagination_nav a,
    .pagination_nav span {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 48px;
        height: 48px;
        border: 1px solid rgba(255, 255, 255, 0.15);
        background: transparent;
        color: #fff;
        font-weight: 600;
        transition: .2s ease;
        line-height: 1;
    }

    .pagination_nav a:hover,
    .pagination_nav .pagination_btn:hover {
        background: #dd6a23;
        border-color: #dd6a23;
        color: #fff;
    }

    .pagination_nav li.active .pagination_btn,
    .pagination_nav li.active span {
        background: #dd6a23 !important;
        border-color: #dd6a23 !important;
        color: #fff !important;
    }

    .pagination_nav li.disabled .pagination_btn,
    .pagination_nav li.disabled span {
        opacity: .4;
        cursor: not-allowed;
    }
</style>
@endpush
