@extends('layouts.site.master')
@section('title', __('products.title') . ' | ' . ($product ? ($product->title_en) : __('products.product_details')))
@php $locale = app()->getLocale(); @endphp
@section('main-content')
<section class="details_section shop_details section_space_lg">
    <div class="container">
        <div class="section_space_sm pt-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="image_gallery_carousel" @if(app()->getLocale() === 'ar') dir="ltr" @endif>

                        <div class="details_image_carousel">
                            @foreach($product->images as $img)
                            <div class="gallery_image">
                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="Product Image">
                            </div>
                            @endforeach
                        </div>

                        <div class="details_image_carousel_nav">
                            @foreach($product->images as $img)
                            <div class="gallery_image">
                                <img src="{{ asset('storage/' . $img->image_path) }}" alt="Product Image">
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="details_content ps-lg-4">
                        <ul class="breadcrumb_nav unordered_list mb-4">
                            <li><a href="{{ route('home') }}">{{ __('nav.home') }}</a></li>
                            <li><a href="{{ route('products') }}">{{ __('products.title') }}</a></li>
                            <li><a href="#!">{{ __('products.product_details') }}</a></li>
                        </ul>

                        <h1 class="details_item_title">{{ $locale === 'ar' ? $product->title_ar : $product->title_en }}
                        </h1>

                        <p>{{ $locale === 'ar' ? $product->short_description_ar : $product->short_description_en }}</p>

                        <ul class="product_details_info_list unordered_list_block text-uppercase">
                            <li>
                                <span>{{ __('products.categories_label') }} </span>
                                @foreach($product->categories as $cat)
                                <a href="{{ route('products', $cat->slug) }}">{{ $locale === 'ar' ? $cat->title_ar :
                                    $cat->title_en }}</a>
                                @endforeach
                            </li>
                            <li><span>{{ __('products.sku_label') }} </span>{{ $product->sku }}</li>
                            <li>
                                <span>{{ __('products.tags_label') }} </span>
                                @foreach((array)($locale === 'ar' ? $product->tags_ar : $product->tags_en) as $t)
                                <a href="#!">{{ $t }}</a>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="product_additional_info">
            <ul class="nav tab_nav style_3" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="active" data-bs-toggle="tab" data-bs-target="#tab_description" type="button"
                        role="tab" aria-selected="true">
                        {{ __('products.description') }}
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button data-bs-toggle="tab" data-bs-target="#tab_additional_information" type="button" role="tab"
                        aria-selected="false">
                        {{ __('products.additional_information') }}
                    </button>
                </li>
            </ul>

            <div class="tab-content p-0 bg-transparent">
                <div class="tab-pane fade show active" id="tab_description" role="tabpanel">
                    <h3 class="details_info_title">{{ __('products.product_description_title') }}</h3>
                    <div class="p-0">
                        {!! nl2br(e($locale === 'ar' ? $product->description_ar : $product->description_en)) !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="tab_additional_information" role="tabpanel">
                    <ul class="additional_info_list unordered_list_block">
                        @foreach($product->additionalInfos as $row)
                        <li>
                            <span>{{ $locale === 'ar' ? $row->label_ar : $row->label_en }}</span>
                            <span>{{ $locale === 'ar' ? $row->value_ar : $row->value_en }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</section>

<section class="product_section section_space_lg">
    <div class="container">
        <div class="section_heading">
            <h2 class="heading_text mb-0 wow" data-splitting>{{ __('products.other_products') }}</h2>
        </div>

        <div class="row">
            @foreach($otherProducts as $p)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product_item">
                    <a class="item_image" href="{{ route('productDetails', $p->slug) }}">
                        <img src="{{ Vite::asset($p->card_image ?: 'resources/UI/Site/images/products/product_img_1.png') }}"
                            alt="Product Image">
                    </a>
                    <div class="item_content">
                        <h3 class="item_title">
                            <a href="{{ route('productDetails', $p->slug) }}">{{ $locale === 'ar' ? $p->title_ar :
                                $p->title_en }}</a>
                        </h3>
                        <a class="item_brand" href="#!">{{ $locale === 'ar' ? $p->brand_ar : $p->brand_en }}</a>
                        <div class="item_footer">
                            @if(!empty($p->price))
                            <div class="item_price"><span class="sale_price">{{ $p->price }}</span></div>
                            @endif
                            <a class="btn-link" href="{{ route('productDetails', $p->slug) }}">
                                <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                <span class="btn_text"><small>{{ __('products.add_to_cart') }}</small><small>{{
                                        __('products.add_to_cart') }}</small></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection
