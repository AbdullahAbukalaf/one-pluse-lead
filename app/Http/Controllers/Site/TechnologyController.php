<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology\TechnologyBanner;
use App\Models\Technology\TechnologyTestimonial;
use App\Models\Technology\TechnologyWhyChooseUs;
use App\Models\Technology\TechnologyCertification;
use App\Models\Home\PurchaseBanner;

class TechnologyController extends Controller
{
    public function index()
    {
        $banner = TechnologyBanner::query()
            ->where('is_active', true)
            ->orderBy('id')
            ->first();

        $testimonials = TechnologyTestimonial::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->latest('id')
            ->get();

        $whyChooseUs = TechnologyWhyChooseUs::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->latest('id')
            ->get();

        $certifications = TechnologyCertification::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->latest('id')
            ->get();

        // two cards: where_to_buy, contact_us (or any keys you made)
        $banners = PurchaseBanner::where('is_active', true)
            ->orderBy('display_order')
            ->get()
            ->keyBy('key');

        return view('site.technologyAndInnovation', compact('banner','testimonials','whyChooseUs','certifications', 'banners'));
    }
}
