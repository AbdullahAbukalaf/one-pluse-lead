<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Markets\MarketBanner;;
use App\Models\Markets\MarketIntro;
use App\Models\Markets\MarketService;
use App\Models\Home\PurchaseBanner;

class MarketsController extends Controller
{
    public function index()
    {
        $banner = MarketBanner::query()
            ->where('is_active', true)
            ->first();

        $intro = MarketIntro::query()
            ->where('is_active', true)
            ->first();

        $services = MarketService::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // two cards: where_to_buy, contact_us (or any keys you made)
        $banners = PurchaseBanner::where('is_active', true)
            ->orderBy('display_order')
            ->get()
            ->keyBy('key');


        return view('site.markets', compact('banner', 'intro', 'services', 'banners'));
    }
}
