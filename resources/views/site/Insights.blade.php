@extends('layouts.Site.master')
@section('title', 'Your Insights')

@section('main-content')
    <!-- Hero Video Background - Start
                ================================================== -->
    <section id="home" class="hero_section hero_video_bg" style="height: 80vh">
        <video autoplay muted loop>
            <source src="{{ asset('UI/Site/videos/Promotors-Car-Care-Center.mp4') }}" type="video/mp4">
            <source src="{{ asset('UI/Site/videos/Promotors-Car-Care-Center.mp4') }}" type="video/ogg">
        </video>
        {{-- <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="hero_section_content py-5">
                        <h1 class="hero_title wow" data-splitting>Auto Maintenance & Repair Service</h1>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        </p>
                        <a class="btn btn-primary" href="service_details.html">
                            <span class="btn_text">Get Service</span>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}
    </section>
    <!-- Hero Video Background - End
                        ================================================== -->


    <!-- Hero Section - Start
                    ================================================== -->
    <section class="hero_section hero_section_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero_section_content">
                        <h1 class="hero_title wow" data-splitting>Auto Maintenance & Repair Service</h1>
                        <p>
                            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="hero_section_image">
                        <img data-parallax='{"scale" : 0.6, "smoothness": 8}'
                            src="{{ asset('UI/Site/images/hero/hero_image_1.png') }}" alt="ProMotors – Car Service Image">
                    </div>
                </div>
            </div>
        </div>
        <div class="outline_text" data-parallax='{"x" : -200, "smoothness": 8}'>Your Voice Matters</div>
    </section>
    <!-- Hero Section - End
                    ================================================== -->
    <!-- Insights Form Section - Start
    ================================================== -->
    <section class="appointment_form_section section_space_lg">
        <div class="container">

            <div class="row">
                <div class="col-lg-7">
                    <div class="section_heading">
                        <div class="outline_text">Insights</div>

                        <h3 class="heading_text wow" data-splitting>
                            Share Your Insight & Recommendations
                        </h3>

                        <p class="heading_description mb-0">
                            Help us improve by sharing your experience, recommendations, and product feedback.
                        </p>
                    </div>
                </div>
            </div>

            <form action="#" method="POST">
                @csrf

                <div class="form_wrap row">

                    <!-- Name -->
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_name">Your Name</label>
                            <input type="text" name="name" class="form-control" id="input_name"
                                placeholder="Enter Your Name">
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_email">Your Email</label>
                            <input type="email" name="email" class="form-control" id="input_email"
                                placeholder="Enter Your Email">
                        </div>
                    </div>

                    <!-- Country -->
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_country">Country</label>
                            <select name="country" id="input_country" class="form-control form-select">
                                <option value="" disabled selected>Select Country</option>
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

                    <!-- Have you bought before? -->
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label>Have you bought a One Plus LED product before?</label>

                            <div class="d-flex align-items-center gap-3">

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bought_before" id="yes"
                                        value="yes">
                                    <label class="form-check-label" for="yes">Yes</label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="bought_before" id="no"
                                        value="no">
                                    <label class="form-check-label" for="no">No</label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Insight Type -->
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_insight_type">Insight Type</label>
                            <select name="insight_type" id="input_insight_type" class="form-control form-select">
                                <option value="" disabled selected>Select Insight Type</option>
                                <option class="text-black">Quality Issue</option>
                                <option class="text-black">Performance</option>
                                <option class="text-black">Installation</option>
                                <option class="text-black">Feature Request</option>
                                <option class="text-black">General Feedback</option>
                            </select>
                        </div>
                    </div>

                    <!-- Product Type -->
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_product_type">Product Type</label>
                            <select name="product_type" id="input_product_type" class="form-control form-select">
                                <option value="" disabled selected>Select Product Type</option>
                                <option class="text-black">Indoor Light</option>
                                <option class="text-black">Outdoor Light</option>
                                <option class="text-black">Garden Light</option>
                                <option class="text-black">Solar Light</option>
                                <option class="text-black">Strip Light</option>
                                <option class="text-black">Bulb Light</option>
                            </select>
                        </div>
                    </div>

                    <!-- Insights & Recommendations -->
                    <div class="col-12">
                        <div class="form-group">
                            <label for="input_message">Insights & Recommendations</label>
                            <textarea name="message" class="form-control" id="input_message"
                                placeholder="Tell us your insights and recommendations..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <span class="btn_text">Submit Insight</span>
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </section>
    <!-- Insights Form Section - End
    ================================================== -->
@endsection
