<?php

namespace App\Http\Controllers\Site;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\View\View;
use App\Models\Home\HeroSection;
use App\Models\Home\HomeCounter;
use App\Models\Home\AboutBlock;
use App\Models\Home\Service;
use App\Models\Home\WorkProcessStep;
use App\Models\Home\PurchaseBanner;

class HomeController extends BaseController
{
    public function index()
    {
        $locale = app()->getLocale(); // 'en' or 'ar'

        $hero = HeroSection::activeNow()->first();

        $counters = HomeCounter::where('is_active', true)
            ->orderBy('display_order')
            ->get();

        $aboutBlocks = AboutBlock::with(['features' => function ($q) {
                $q->orderBy('display_order');
            }])
            ->where('is_active', true)
            ->orderBy('display_order')
            ->take(2)
            ->get();

        $services = Service::active()->ordered()->take(7)->get();

        $steps = WorkProcessStep::where('is_active', true)
            ->orderBy('step_number')
            ->get();

        // two cards: where_to_buy, contact_us (or any keys you made)
        $banners = PurchaseBanner::where('is_active', true)
            ->orderBy('display_order')
            ->get()
            ->keyBy('key');

        return view('site.home', compact(
            'locale',
            'hero',
            'counters',
            'aboutBlocks',
            'services',
            'steps',
            'banners'
        ));
    }
}
