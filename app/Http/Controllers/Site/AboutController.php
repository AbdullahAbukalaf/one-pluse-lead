<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About\AboutBanner;
use App\Models\About\AboutSection;
use App\Models\About\AboutCard;
use App\Models\About\WhyChooseUs;
use App\Models\About\Certification;
use App\Models\About\AboutSlider;
use App\Models\About\BookService;
use App\Models\Home\PurchaseBanner;

class AboutController extends Controller
{
   public function index()
    {
        $banner = AboutBanner::where('is_active', true)->latest()->first();

        $aboutSection = AboutSection::where('is_active', true)->latest()->first();

        $cards = AboutCard::where('is_active', true)
            ->orderBy('id')
            ->get();

        // If you kept WhyChooseUs as FULL CRUD, we show the latest active item.
        $whyChooseUs = WhyChooseUs::where('is_active', true)->get();

        $certifications = Certification::where('is_active', true)
            ->orderBy('id')
            ->get();

        $sliders = AboutSlider::where('is_active', true)
            ->orderBy('id')
            ->get();

        $bookService = BookService::where('is_active', true)->latest()->first();

        // two cards: where_to_buy, contact_us (or any keys you made)
        $banners = PurchaseBanner::where('is_active', true)
            ->orderBy('display_order')
            ->get()
            ->keyBy('key');

        return view('site.about', compact(
            'banner',
            'aboutSection',
            'cards',
            'whyChooseUs',
            'certifications',
            'sliders',
            'bookService',
            'banners'
        ));
    }
}
