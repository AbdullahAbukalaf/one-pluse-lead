@extends('layouts.site.master')
@section('title', __('insights.title'))

@section('main-content')
    <section id="home" class="hero_section hero_video_bg" style="height: 80vh">
        <video autoplay muted loop>
            <source src="{{ asset('UI/Site/videos/Promotors-Car-Care-Center.mp4') }}" type="video/mp4">
            <source src="{{ asset('UI/Site/videos/Promotors-Car-Care-Center.mp4') }}" type="video/ogg">
        </video>
    </section>

    <section class="hero_section hero_section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero_section_content">
                        <h1 class="hero_title wow" data-splitting>{{ __('insights.hero_title') }}</h1>
                        <p>{{ __('insights.hero_description') }}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero_section_image">
                        <img data-parallax='{"scale" : 0.6, "smoothness": 8}'
                            src="{{ asset('UI/Site/images/hero/hero_image_1.png') }}" alt="ProMotors - Car Service Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="outline_text" data-parallax='{"x" : -200, "smoothness": 8}'>{{ __('insights.voice_matters') }}</div>
    </section>

    <section class="appointment_form_section section_space_lg">
        <div class="container">

            <div class="row">
                <div class="col-lg-7">
                    <div class="section_heading">
                        <div class="outline_text">{{ __('insights.outline') }}</div>

                        <h3 class="heading_text wow" data-splitting>
                            {{ __('insights.form_heading') }}
                        </h3>

                        <p class="heading_description mb-0">
                            {{ __('insights.form_description') }}
                        </p>
                    </div>
                </div>
            </div>

            <form action="#" method="POST">
                @csrf

                <div class="form_wrap row">

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_name">{{ __('common.your_name') }}</label>
                            <input type="text" name="name" class="form-control" id="input_name"
                                placeholder="{{ __('common.your_name') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_email">{{ __('common.your_email') }}</label>
                            <input type="email" name="email" class="form-control" id="input_email"
                                placeholder="{{ __('common.your_email') }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_country">{{ __('insights.country') }}</label>
                            <select name="country" id="input_country" class="form-control form-select">
                                <option value="" disabled selected>{{ __('insights.select_country') }}</option>
                                <option class="text-black">Jordan</option>
                                <option class="text-black">Saudi Arabia</option>
                                <option class="text-black">UAE</option>
                                <option class="text-black">Qatar</option>
                                <option class="text-black">Kuwait</option>
                                <option class="text-black">Oman</option>
                                <option class="text-black">Bahrain</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label>{{ __('insights.bought_before_question') }}</label>

                            <div class="d-flex align-items-center gap-3">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bought_before" id="yes"
                                        value="yes">
                                    <label class="form-check-label" for="yes">{{ __('insights.yes') }}</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bought_before" id="no"
                                        value="no">
                                    <label class="form-check-label" for="no">{{ __('insights.no') }}</label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_insight_type">{{ __('insights.insight_type') }}</label>
                            <select name="insight_type" id="input_insight_type" class="form-control form-select">
                                <option value="" disabled selected>{{ __('insights.select_insight_type') }}</option>
                                <option class="text-black">{{ __('insights.insight_types.quality') }}</option>
                                <option class="text-black">{{ __('insights.insight_types.performance') }}</option>
                                <option class="text-black">{{ __('insights.insight_types.installation') }}</option>
                                <option class="text-black">{{ __('insights.insight_types.feature') }}</option>
                                <option class="text-black">{{ __('insights.insight_types.general') }}</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_product_type">{{ __('insights.product_type') }}</label>
                            @php
                                $productTypes = trans('products.categories');
                            @endphp
                            <select name="product_type" id="input_product_type" class="form-control form-select">
                                <option value="" disabled selected>{{ __('insights.select_product_type') }}</option>
                                @foreach ($productTypes as $label)
                                    <option class="text-black">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="input_message">{{ __('insights.insights_label') }}</label>
                            <textarea name="message" class="form-control" id="input_message"
                                placeholder="{{ __('insights.insights_placeholder') }}"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <span class="btn_text">{{ __('insights.submit') }}</span>
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </section>
@endsection
