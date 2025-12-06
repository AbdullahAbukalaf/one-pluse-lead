@extends('layouts.site.master')
@section('title', __('products.title') . ' | ' . __('products.product_details'))

@section('main-content')
    <section class="details_section shop_details section_space_lg">
        <div class="container">
            <div class="section_space_sm pt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image_gallery_carousel">
                            <div class="details_image_carousel">
                                @for ($i = 0; $i < 7; $i++)
                                    <div class="gallery_image">
                                        <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                            alt="ProMotors - Product Image">
                                    </div>
                                @endfor
                            </div>
                            <div class="details_image_carousel_nav">
                                @for ($i = 0; $i < 7; $i++)
                                    <div class="gallery_image">
                                        <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                            alt="ProMotors - Product Image">
                                    </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="details_content ps-lg-4">
                            <ul class="breadcrumb_nav unordered_list mb-4">
                                <li><a href="{{ route('home') }}">{{ __('nav.home') }}</a></li>
                                <li><a href="{{ route('products') }}">{{ __('products.title') }}</a></li>
                                <li><a href="{{ route('productDetails') }}">{{ __('products.product_details') }}</a></li>
                            </ul>
                            <h1 class="details_item_title">Silentblock damper M12 A~ 75mm</h1>
                            <p>
                                Nisl purus in mollis nunc sed id. Nunc sed velit dignissim sodales ut eu sem. c scelerisque
                                fermentum dui faucibus in ornare. Nisl condimentum id venenatis a condimentum. Id
                                consectetur purus ut faucibus pulvinar
                            </p>
                            <ul class="product_details_info_list unordered_list_block text-uppercase">
                                <li>
                                    <span>{{ __('products.categories_label') }} </span>
                                    <a href="#!">{{ __('products.categories.indoor-light') }}</a>
                                    <a href="#!">Mechanic</a>
                                </li>
                                <li><span>{{ __('products.sku_label') }} </span>01289</li>
                                <li>
                                    <span>{{ __('products.tags_label') }} </span>
                                    <a href="#!">Energy</a>
                                    <a href="#!">Speed</a>
                                    <a href="#!">System</a>
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
                        <button data-bs-toggle="tab" data-bs-target="#tab_additional_information" type="button"
                            role="tab" aria-selected="false">
                            {{ __('products.additional_information') }}
                        </button>
                    </li>
                </ul>
                <div class="tab-content p-0 bg-transparent">
                    <div class="tab-pane fade show active" id="tab_description" role="tabpanel">
                        <h3 class="details_info_title">{{ __('products.product_description_title') }}</h3>
                        <p class="p-0">
                            One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, iste, architecto ullam
                            tenetur quia nemo ratione tempora consectetur quos minus voluptates nisi hic alias libero
                            explicabo reiciendis sint ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit,
                            molestiae. One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, iste,
                            architecto ullam tenetur quia nemo ratione tempora consectetur quos minus voluptates nisi hic
                            alias libero explicabo reiciendis sint ut quo nulla ipsa aliquid neque molestias et qui sunt.
                            Odit, molestiae.
                        </p>
                        <p class="mb-0 p-0">
                            One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat, iste, architecto ullam
                            tenetur quia nemo ratione tempora consectetur quos minus voluptates nisi hic alias libero
                            explicabo reiciendis sint ut quo nulla ipsa aliquid neque molestias et qui sunt. Odit,
                            molestiae.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="tab_additional_information" role="tabpanel">
                        <ul class="additional_info_list unordered_list_block">
                            <li>
                                <span>Repair Kit Type</span>
                                <span>Maintenance Kit</span>
                            </li>
                            <li>
                                <span>Number of Pieces</span>
                                <span>1</span>
                            </li>
                            <li>
                                <span>Package Depth (cm)</span>
                                <span>22.61 cm</span>
                            </li>
                            <li>
                                <span>Package Depth (in)</span>
                                <span>8.90 in</span>
                            </li>
                            <li>
                                <span>Package Height (cm)</span>
                                <span>6.86 cm</span>
                            </li>
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
                @for ($i = 0; $i < 4; $i++)
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="product_item">
                            <a class="item_image" href="{{ route('productDetails') }}">
                                <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                    alt="ProMotors - Product Image">
                            </a>
                            <div class="item_content">
                                <h3 class="item_title">
                                    <a href="{{ route('productDetails') }}">
                                        Silent Bloc A~10-75mm
                                    </a>
                                </h3>
                                <a class="item_brand" href="#!">WEROO</a>
                                <div class="item_footer">
                                    <div class="item_price">
                                        <span class="sale_price">$49</span>
                                    </div>
                                    <a class="btn-link" href="{{ route('productDetails') }}">
                                        <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                        <span class="btn_text">
                                            <small>{{ __('products.add_to_cart') }}</small>
                                            <small>{{ __('products.add_to_cart') }}</small>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection
