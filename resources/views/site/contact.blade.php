@extends('layouts.Site.master')
@section('title', 'Contact Us')

@section('page-banner')
    @include('layouts.site.partials.banner', [
        'title' => 'Contact Us',
        'image' => asset('UI/Site/images/shapes/tyre_print.svg'),
        'description' => 'We’re here to help. Reach out for sales, support, or general inquiries.',
        'breadcrumbs' => [
            'Home' => route('home'),
            'Contact Us' => null,
        ],
    ])
@endsection

@section('main-content')

    {{-- “Where can I purchase your products?” CTA banner (uses theme utilities only) --}}
    <section class="section_space_md">
        <div class="container">
            <div class="cta_box bg-dark rounded-3 p-4 p-md-5">
                <div class="section_heading mb-4">
                    <h3 class="heading_text mb-0">Where can I purchase your products?</h3>
                </div>

                <div class="row g-4">
                    <div class="col-md-6 col-lg-4">
                        <div>
                            <p class="mb-2 fw-semibold">Find an AGENT:</p>
                            <a class="btn btn-primary" href="{{ route('WhereToFindUs', ['tab' => 'agent']) }}">
                                <span class="btn_text">Explore Agent Locator</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div>
                            <p class="mb-2 fw-semibold">Find a DISTRIBUTOR:</p>
                            <a class="btn btn-primary" href="{{ route('WhereToFindUs', ['tab' => 'agent']) }}">
                                <span class="btn_text">View Distributor Locator</span>
                            </a>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <div>
                            <p class="mb-2 fw-semibold">Find a RETAILER:</p>
                            <a class="btn btn-primary" href="{{ route('WhereToFindUs', ['tab' => 'retailer']) }}">
                                <span class="btn_text">Explore Retailers</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Contact form (same visual style as Appointment Form section) --}}
    <section class="appointment_form_section section_space_lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section_heading">
                        <div class="outline_text">Contact</div>
                        <h3 class="heading_text wow" data-splitting>Send Us a Message</h3>
                        <p class="heading_description mb-0">
                            Have a question about our products, pricing, or availability? Fill out the form and our team
                            will get back to you.
                        </p>
                    </div>
                </div>
            </div>

            <form action="#" method="POST">
                @csrf
                <div class="form_wrap row">
                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_name">Your Name</label>
                            <input type="text" class="form-control" id="input_name" name="name"
                                placeholder="Enter Your Name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_email">Your Email</label>
                            <input type="email" class="form-control" id="input_email" name="email"
                                placeholder="Enter Your Email">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-0">
                            <label for="input_phone">Your Phone</label>
                            <input type="tel" class="form-control" id="input_phone" name="phone"
                                placeholder="Enter Your Phone">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <label for="input_message">Your Message</label>
                            <textarea class="form-control" id="input_message" name="message" placeholder="How can we help?"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <span class="btn_text">Submit</span>
                        </button>
                    </div>
                </div>
            </form>

        </div>
    </section>

    <!-- Contact Section - Start
            ================================================== -->
    <section class="contact_section section_space_lg">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact_info_box">
                        <h3 class="item_title">Address</h3>
                        <ul class="info_list unordered_list_block pe-lg-2">
                            <li>
                                <span class="info_text mb-3">
                                    19 Frisk Drive, Middletown,nj, 3348 United States
                                </span>
                            </li>
                            <li>
                                <span class="info_text">
                                    31 S Division Street, Montour,ia, 50133 United States
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact_info_box">
                        <h3 class="item_title">Office Hours</h3>
                        <ul class="info_list unordered_list_block">
                            <li>
                                <span class="info_text d-flex align-items-center justify-content-between">
                                    <span>Monday - Thuesday</span>
                                    <span>8 am - 8 pm</span>
                                </span>
                            </li>
                            <li>
                                <span class="info_text d-flex align-items-center justify-content-between">
                                    <span>Friday</span>
                                    <span>8 am - 6 pm</span>
                                </span>
                            </li>
                            <li>
                                <span class="info_text d-flex align-items-center justify-content-between">
                                    <span>Saturday</span>
                                    <span>9 am - 4 pm</span>
                                </span>
                            </li>
                            <li>
                                <span class="info_text d-flex align-items-center justify-content-between">
                                    <span>Sunday</span>
                                    <span>Closed</span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="contact_info_box">
                        <h3 class="item_title">Customer Support</h3>
                        <ul class="info_list unordered_list_block">
                            <li>
                                <span class="info_text mb-3">
                                    <span class="d-block">
                                        <a href="tel:+8801680636189">+880 1680 6361 89</a>
                                    </span>
                                    <span class="d-block">
                                        <a href="tel:+11234567890">+ 1 123 456-7890</a>
                                    </span>
                                </span>
                            </li>
                            <li>
                                <span class="info_text">
                                    <span class="d-block">
                                        <a href="mailto:+8801680636189">promotors@email.com</a>
                                    </span>
                                    <span class="d-block">
                                        <a href="mailto:+11234567890">contact@email.com</a>
                                    </span>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-12">
                    <div class="gmap_canvas">
                        <iframe
                            src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section - End
            ================================================== -->

    <!-- Video Section - Start
                    ================================================== -->
    <section class="video_section">
        <div class="video_wrap parallaxie text-center section_space_lg"
            style="background-image: url({{ asset('UI/Site/images/video/video_poster_3.jpg') }});">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="section_heading">
                            <h2 class="heading_text wow" data-splitting>Book your Service Today</h2>
                            <p class="heading_description mb-0 ps-lg-5 pe-lg-5">
                                Egestas integer eget aliquet nibh praesent tristique magna. Penatibus et magnis dis
                                parturient montes nascetur ridiculus
                            </p>
                        </div>
                        <a class="btn btn-primary" href="contact.html">
                            <span class="btn_text">Book Service Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Video Section - End
                    ================================================== -->


    <!-- Purchase Banner Section - Start
                ================================================== -->
    <section class="purchase-banner">
        <div class="container">
            <div class="row">
                <div class="my-5">
                    <div class="container">
                        <div class="row g-4 align-items-center">
                            <div class="col-md-6">
                                <div class="banner-card">
                                    <h3 class="mb-3">Looking to Purchase?</h3>
                                    <a class="banner-btn" href="#where-to-buy">Where to buy</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="banner-card">
                                    <h3 class="mb-3">Need More Information?</h3>
                                    <a class="banner-btn" href="#contact-us">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Purchase Banner Section - End
                ================================================== -->
@endsection
