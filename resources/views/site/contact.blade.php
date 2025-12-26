{{-- // i18n rule: DO NOT translate class/id/data-* or any JS selector. --}}
@extends('layouts.site.master')
@section('title', __('contact.title'))
@php
    $titleField = app()->getLocale() === 'ar' ? 'heading_ar' : 'heading_en';
    $btnField = app()->getLocale() === 'ar' ? 'button_text_ar' : 'button_text_en';
@endphp
@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' =>
            app()->getLocale() === 'ar'
                ? $hero->title_ar ?? __('contact.title')
                : $hero->title_en ?? __('contact.title'),
        'image' => !empty($hero?->background_image)
            ? asset('storage/' . $hero->background_image)
            : asset('UI/Site/images/shapes/tyre_print.svg'),
        'description' => app()->getLocale() === 'ar' ? $hero->description_ar ?? '' : $hero->description_en ?? '',
        'breadcrumbs' => [
            __('nav.home') => route('home'),
            __('contact.title') => null,
        ],
    ])
@endsection

@section('main-content')

    @if ($exploreLocator && $exploreLocator->is_active)
        <section class="section_space_md">
            <div class="container">
                <div class="cta_box bg-dark rounded-3 p-4 p-md-5">
                    <div class="section_heading mb-4">
                        <h3 class="heading_text mb-0">
                            {{ app()->getLocale() === 'ar' ? $exploreLocator->title_ar : $exploreLocator->title_en }}
                        </h3>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6 col-lg-4">
                            <div>
                                <p class="mb-2 fw-semibold">
                                    {{ app()->getLocale() === 'ar' ? $exploreLocator->find_agent_ar : $exploreLocator->find_agent_en }}
                                </p>
                                <a class="btn btn-primary" href="{{ route('whereToFindUs', ['tab' => 'agent']) }}">
                                    <span
                                        class="btn_text">{{ app()->getLocale() === 'ar' ? $exploreLocator->find_agent_sub_ar : $exploreLocator->find_agent_sub_en }}</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div>
                                <p class="mb-2 fw-semibold">
                                    {{ app()->getLocale() === 'ar' ? $exploreLocator->find_distributor_ar : $exploreLocator->find_distributor_en }}
                                </p>
                                <a class="btn btn-primary" href="{{ route('whereToFindUs', ['tab' => 'distributor']) }}">
                                    <span
                                        class="btn_text">{{ app()->getLocale() === 'ar' ? $exploreLocator->find_distributor_sub_ar : $exploreLocator->find_distributor_sub_en }}</span>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <div>
                                <p class="mb-2 fw-semibold">
                                    {{ app()->getLocale() === 'ar' ? $exploreLocator->find_retailer_ar : $exploreLocator->find_retailer_en }}
                                </p>
                                <a class="btn btn-primary" href="{{ route('whereToFindUs', ['tab' => 'retailer']) }}">
                                    <span
                                        class="btn_text">{{ app()->getLocale() === 'ar' ? $exploreLocator->find_retailer_sub_ar : $exploreLocator->find_retailer_sub_en }}</span>
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if ($formSection && $formSection->is_active)
        <section class="appointment_form_section section_space_lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="section_heading">
                            <div class="outline_text">
                                {{ app()->getLocale() === 'ar' ? $formSection->outline_title_ar : $formSection->outline_title_en }}
                            </div>
                            <h3 class="heading_text wow" data-splitting>
                                {{ app()->getLocale() === 'ar' ? $formSection->title_ar : $formSection->title_en }}</h3>
                            <p class="heading_description mb-0">
                                {{ app()->getLocale() === 'ar' ? $formSection->description_ar : $formSection->description_en }}
                            </p>
                        </div>
                    </div>
                </div>

                <form action="{{ route('Contact.submit') }}" method="POST">
                    @csrf
                    <div class="form_wrap row">
                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label for="input_name">{{ __('common.your_name') }}</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="input_name" name="name" value="{{ old('name') }}"
                                    placeholder="{{ __('common.your_name') }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label for="input_email">{{ __('common.your_email') }}</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="input_email" name="email" value="{{ old('email') }}"
                                    placeholder="{{ __('common.your_email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label for="input_phone">{{ __('common.your_phone') }}</label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror"
                                    id="input_phone" name="phone" value="{{ old('phone') }}"
                                    placeholder="{{ __('common.your_phone') }}">
                                @error('phone')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-0">
                                <label for="input_subject">{{ __('contact.subject') }}</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror"
                                    id="input_subject" name="subject" value="{{ old('subject') }}"
                                    placeholder="{{ __('contact.subject') }}">
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="input_message">{{ __('common.your_message') }}</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" id="input_message" name="message"
                                    placeholder="{{ __('common.your_message') }}">{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <span class="btn_text">{{ __('common.submit') }}</span>
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </section>
    @endif

    @if ($info)
        @php
            $items = $info->items;

            $addresses = $items->where('group', 'address')->values();
            $hours = $items->where('group', 'hours')->values();
            $phones = $items->where('group', 'phone')->values();
            $emails = $items->where('group', 'email')->values();

            $isAr = app()->getLocale() === 'ar';
        @endphp

        <section class="contact_section section_space_lg">
            <div class="container">
                <div class="row">

                    {{-- Address --}}
                    <div class="col-lg-4">
                        <div class="contact_info_box">
                            <h3 class="item_title">{{ __('common.address') }}</h3>
                            <ul class="info_list unordered_list_block pe-lg-2">
                                @foreach ($addresses as $addr)
                                    <li>
                                        <span class="info_text {{ $loop->first ? 'mb-3' : '' }}">
                                            {{ $isAr ? $addr->value_ar : $addr->value_en }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Office Hours --}}
                    <div class="col-lg-4">
                        <div class="contact_info_box">
                            <h3 class="item_title">{{ __('common.office_hours') }}</h3>
                            <ul class="info_list unordered_list_block">
                                @foreach ($hours as $row)
                                    <li>
                                        <span class="info_text d-flex align-items-center justify-content-between">
                                            <span>{{ $isAr ? $row->label_ar : $row->label_en }}</span>
                                            <span>{{ $isAr ? $row->value_ar : $row->value_en }}</span>
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    {{-- Customer Support --}}
                    <div class="col-lg-4">
                        <div class="contact_info_box">
                            <h3 class="item_title">{{ __('common.customer_support') }}</h3>
                            <ul class="info_list unordered_list_block">
                                @if ($phones->count())
                                    <li>
                                        <span class="info_text mb-3">
                                            @foreach ($phones as $p)
                                                <span class="d-block">
                                                    <a href="tel:{{ $p->value }}">
                                                        <bdi dir="ltr">{{ $p->value }}</bdi>
                                                    </a>
                                                </span>
                                            @endforeach
                                        </span>
                                    </li>
                                @endif

                                @if ($emails->count())
                                    <li>
                                        <span class="info_text">
                                            @foreach ($emails as $e)
                                                <span class="d-block">
                                                    <a href="mailto:{{ $e->value }}">{{ $e->value }}</a>
                                                </span>
                                            @endforeach
                                        </span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>

                    {{-- Map --}}
                    <div class="col-12">
                        <div class="gmap_canvas">
                            <iframe src="{{ $info->map_embed_url }}"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif


    @if ($video && $video->is_active)
        <section class="video_section">
            <div class="video_wrap parallaxie text-center section_space_lg"
                style="background-image: url({{ !empty($video->image) ? asset('storage/' . $video->image) : asset('UI/Site/images/video/video_poster_3.jpg') }});">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="section_heading">
                                <h2 class="heading_text wow" data-splitting>
                                    {{ app()->getLocale() === 'ar' ? $video->title_ar : $video->title_en }}</h2>
                                <p class="heading_description mb-0 ps-lg-5 pe-lg-5">
                                    {{ app()->getLocale() === 'ar' ? $video->description_ar : $video->description_en }}
                                </p>
                            </div>
                            <a class="btn btn-primary" href="{{ route('Contact') }}">
                                <span class="btn_text">{{ __('common.book_service_now') }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

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
