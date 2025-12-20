@extends('layouts.site.master')
@section('title', __('insights.title'))

@section('main-content')
    <section id="home" class="hero_section hero_video_bg" style="height: 80vh">
        <video autoplay muted loop>
            @php
                $videoSrc = $hero?->video_path ? asset('storage/' . $hero->video_path) : asset('UI/Site/videos/Promotors-Car-Care-Center.mp4');
            @endphp
            <source src="{{ $videoSrc }}" type="video/mp4">
            <source src="{{ $videoSrc }}" type="video/ogg">
        </video>
    </section>

     <section class="hero_section hero_section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero_section_content">
                        <h1 class="hero_title wow" data-splitting>
                            {{ app()->getLocale() === 'ar' ? ($section->title_ar ?? __('insights.hero_title')) : ($section->title_en ?? __('insights.hero_title')) }}
                        </h1>
                        <p>
                            {{ app()->getLocale() === 'ar' ? ($section->description_ar ?? __('insights.hero_description')) : ($section->description_en ?? __('insights.hero_description')) }}
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero_section_image">
                        <img data-parallax='{"scale" : 0.6, "smoothness": 8}'
                            src="{{ $section?->image ? asset('storage/' . $section->image) : asset('UI/Site/images/hero/hero_image_1.png') }}"
                            alt="Insights Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="outline_text" data-parallax='{"x" : -200, "smoothness": 8}'>
            {{ app()->getLocale() === 'ar' ? ($section->outline_title_ar ?? __('insights.voice_matters')) : ($section->outline_title_en ?? __('insights.voice_matters')) }}
        </div>
    </section>

    <section class="appointment_form_section section_space_lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section_heading">
                        <div class="outline_text">
                            {{ app()->getLocale() === 'ar' ? ($section->outline_title_ar ?? __('insights.outline')) : ($section->outline_title_en ?? __('insights.outline')) }}
                        </div>

                        <h3 class="heading_text wow" data-splitting>
                            {{ app()->getLocale() === 'ar' ? ($section->title_ar ?? __('insights.form_heading')) : ($section->title_en ?? __('insights.form_heading')) }}
                        </h3>

                        <p class="heading_description mb-0">
                            {{ app()->getLocale() === 'ar' ? ($section->description_ar ?? __('insights.form_description')) : ($section->description_en ?? __('insights.form_description')) }}
                        </p>
                    </div>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success mt-3">{{ session('success') }}</div>
            @endif

            <form action="{{ route('insights.recommendations.store') }}" method="POST">
                @csrf

                <div class="form_wrap row">
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_name">{{ __('common.your_name') }}</label>
                            <input type="text" name="name" class="form-control" id="input_name"
                                value="{{ old('name') }}"
                                placeholder="{{ __('common.your_name') }}">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_email">{{ __('common.your_email') }}</label>
                            <input type="email" name="email" class="form-control" id="input_email"
                                value="{{ old('email') }}"
                                placeholder="{{ __('common.your_email') }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_country">{{ __('insights.country') }}</label>
                            <select name="country" id="input_country" class="form-control form-select">
                                <option value="" disabled {{ old('country') ? '' : 'selected' }}>{{ __('insights.select_country') }}</option>
                                @foreach(['Jordan','Saudi Arabia','UAE','Qatar','Kuwait','Oman','Bahrain'] as $c)
                                    <option class="text-black" value="{{ $c }}" @selected(old('country')===$c)>{{ $c }}</option>
                                @endforeach
                            </select>
                            @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label>{{ __('insights.bought_before_question') }}</label>

                            <div class="d-flex align-items-center gap-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bought_before" id="yes" value="yes" @checked(old('bought_before')==='yes')>
                                    <label class="form-check-label" for="yes">{{ __('insights.yes') }}</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bought_before" id="no" value="no" @checked(old('bought_before')==='no')>
                                    <label class="form-check-label" for="no">{{ __('insights.no') }}</label>
                                </div>
                            </div>
                            @error('bought_before') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_insight_type">{{ __('insights.insight_type') }}</label>
                            <select name="insight_type_id" id="input_insight_type" class="form-control form-select">
                                <option value="" disabled {{ old('insight_type_id') ? '' : 'selected' }}>{{ __('insights.select_insight_type') }}</option>
                                @foreach($types as $type)
                                    <option class="text-black" value="{{ $type->id }}" @selected((string)old('insight_type_id')===(string)$type->id)>
                                        {{ app()->getLocale()==='ar' ? $type->title_ar : $type->title_en }}
                                    </option>
                                @endforeach
                            </select>
                            @error('insight_type_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_product_type">{{ __('insights.product_type') }}</label>
                            <select name="category_id" id="input_product_type" class="form-control form-select">
                                <option value="" disabled {{ old('category_id') ? '' : 'selected' }}>{{ __('insights.select_product_type') }}</option>
                                @foreach($categories as $cat)
                                    <option class="text-black" value="{{ $cat->id }}" @selected((string)old('category_id')===(string)$cat->id)>
                                        {{ app()->getLocale()==='ar' ? $cat->title_ar : $cat->title_en }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="input_message">{{ __('insights.insights_label') }}</label>
                            <textarea name="recommendations" class="form-control" id="input_message"
                                placeholder="{{ __('insights.insights_placeholder') }}">{{ old('recommendations') }}</textarea>
                            @error('recommendations') <small class="text-danger">{{ $message }}</small> @enderror
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
