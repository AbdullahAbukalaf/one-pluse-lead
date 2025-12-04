@extends('layouts.Site.master')
@section('title', 'Products | Product Details')

@section('main-content')
    <!-- Details Section - Start
            ================================================== -->
    <section class="details_section shop_details section_space_lg">
        <div class="container">
            <div class="section_space_sm pt-0">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image_gallery_carousel">
                            <div class="details_image_carousel">
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                            </div>
                            <div class="details_image_carousel_nav">
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                                <div class="gallery_image">
                                    <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                        alt="ProMotors - Product Image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="details_content ps-lg-4">
                            <ul class="breadcrumb_nav unordered_list mb-4">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="shop.html">Product Name</a></li>
                                <li><a href="{{ route('productDetails') }}">Product Details</a></li>
                            </ul>
                            <h1 class="details_item_title">Silentblock damper M12 Ø 75mm</h1>
                            <p>
                                Nisl purus in mollis nunc sed id. Nunc sed velit dignissim sodales ut eu sem. c scelerisque
                                fermentum dui faucibus in ornare. Nisl condimentum id venenatis a condimentum. Id
                                consectetur purus ut faucibus pulvinar
                            </p>
                            <ul class="product_details_info_list unordered_list_block text-uppercase">
                                <li>
                                    <span>Categories: </span>
                                    <a href="#!">Automatic</a>
                                    <a href="#!">Mechanic</a>
                                </li>
                                <li><span>Sku: </span>01289</li>
                                <li>
                                    <span>Tags: </span>
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
                            Description
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button data-bs-toggle="tab" data-bs-target="#tab_additional_information" type="button"
                            role="tab" aria-selected="false">
                            Additional Information
                        </button>
                    </li>
                </ul>
                <div class="tab-content p-0 bg-transparent">
                    <div class="tab-pane fade show active" id="tab_description" role="tabpanel">
                        <h3 class="details_info_title">Product Description</h3>
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
    <!-- Details Section - End
            ================================================== -->

    <!-- Product Section - Start (Pased on the same Category Products)
            ================================================== -->
    <section class="product_section section_space_lg">
        <div class="container">
            <div class="section_heading">
                <h2 class="heading_text mb-0 wow" data-splitting>Other Products</h2>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product_item">
                        <a class="item_image" href="{{ route('productDetails') }}">
                            <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                alt="ProMotors - Product Image">
                        </a>
                        <div class="item_content">
                            <h3 class="item_title">
                                <a href="{{ route('productDetails') }}">
                                    Silent Bloc Ø10-75mm
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
                                        <small>Add To Cart</small>
                                        <small>Add To Cart</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product_item">
                        <a class="item_image" href="{{ route('productDetails') }}">
                            <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                alt="ProMotors - Product Image">
                        </a>
                        <div class="item_content">
                            <h3 class="item_title">
                                <a href="{{ route('productDetails') }}">
                                    Brake Discs Front 282mm 4x100
                                </a>
                            </h3>
                            <a class="item_brand" href="#!">ASCY</a>
                            <div class="item_footer">
                                <div class="item_price">
                                    <span class="sale_price">$69</span>
                                    <del class="remove_price">$76</del>
                                </div>
                                <a class="btn-link" href="{{ route('productDetails') }}">
                                    <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                    <span class="btn_text">
                                        <small>Add To Cart</small>
                                        <small>Add To Cart</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product_item">
                        <a class="item_image" href="{{ route('productDetails') }}">
                            <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                alt="ProMotors - Product Image">
                        </a>
                        <div class="item_content">
                            <h3 class="item_title">
                                <a href="{{ route('productDetails') }}">
                                    Oil Filter 12345
                                </a>
                            </h3>
                            <a class="item_brand" href="#!">QWER</a>
                            <div class="item_footer">
                                <div class="item_price">
                                    <span class="sale_price">$49</span>
                                </div>
                                <a class="btn-link" href="{{ route('productDetails') }}">
                                    <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                    <span class="btn_text">
                                        <small>Add To Cart</small>
                                        <small>Add To Cart</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product_item">
                        <a class="item_image" href="{{ route('productDetails') }}">
                            <img src="{{ Vite::asset('resources/UI/Site/images/products/product_img_1.png') }}"
                                alt="ProMotors - Product Image">
                        </a>
                        <div class="item_content">
                            <h3 class="item_title">
                                <a href="{{ route('productDetails') }}">
                                    Oil Filter DF 15A/20A
                                </a>
                            </h3>
                            <a class="item_brand" href="#!">GRIP</a>
                            <div class="item_footer">
                                <div class="item_price">
                                    <span class="sale_price">$19.90</span>
                                </div>
                                <a class="btn-link" href="{{ route('productDetails') }}">
                                    <span class="btn_icon"><i class="fa-regular fa-angle-right"></i></span>
                                    <span class="btn_text">
                                        <small>Add To Cart</small>
                                        <small>Add To Cart</small>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section - End
            ================================================== -->
@endsection
