<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\HomeController;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Vite;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\Home\{
    HeroController,
    HomeCounterController,
    AboutBlockController,
    WorkProcessStepController,
    PurchaseBannerController,
    ServiceController,
};
use App\Http\Controllers\Admin\About\{
    AboutSliderController,
    AboutCardController,
    AboutBannerController,
    AboutSectionController,
    WhyChooseUsController,
    BookServiceController,
    CertificationController
};
use App\Http\Controllers\Admin\Technology\{
    TechnologyBannerController,
    TechnologyTestimonialController,
    TechnologyWhyChooseUsController,
    TechnologyCertificationController
};
use App\Http\Controllers\Admin\Markets\{
    MarketBannerController,
    MarketIntroController,
    MarketServiceController
};

use App\Http\Controllers\Site\MarketsController;


use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\TechnologyController;

// Static lang payload for frontend
Route::get('/lang.js', function () {
    $payload = [
        'nav'    => trans('nav'),
        'common' => trans('common'),
    ];
    return response('window.I18N=' . json_encode($payload) . ';')
        ->header('Content-Type', 'application/javascript');
})->name('lang.js');

// -------------------------------
// ADMIN (no locale prefix)
// -------------------------------
Route::prefix('dashboard')->name('admin.')->middleware(['auth'])->group(function () {

    // Admin Home (dashboard page)
    Route::get('/', fn() => view('admin.dashboard'))
        ->middleware('verified') // optional
        ->name('dashboard');

    // CRUDs
    Route::resource('services', ServiceController::class);
    Route::resource('counters', HomeCounterController::class);
    Route::resource('about-blocks', AboutBlockController::class);
    Route::resource('work-steps', WorkProcessStepController::class);
    Route::resource('purchase-banners', PurchaseBannerController::class);
    Route::post('about-blocks/{about_block}/features', [AboutBlockController::class, 'storeFeature'])->name('about-blocks.features.store');
    Route::delete('about-features/{feature}', [AboutBlockController::class, 'destroyFeature'])->name('about-features.destroy');

    /*
    |--------------------------------------------------------------------------
    | About Page CMS (Admin/About/*)
    |--------------------------------------------------------------------------
    */

    // Single-row sections (edit/update only)
    Route::get('about/banner', [AboutBannerController::class, 'edit'])->name('about.banner.edit');
    Route::post('about/banner', [AboutBannerController::class, 'update'])->name('about.banner.update');

    Route::get('about/section', [AboutSectionController::class, 'edit'])->name('about.section.edit');
    Route::post('about/section', [AboutSectionController::class, 'update'])->name('about.section.update');

    Route::get('about/book-service', [BookServiceController::class, 'edit'])->name('about.book.edit');
    Route::post('about/book-service', [BookServiceController::class, 'update'])->name('about.book.update');

    // Full CRUD (resources)
    Route::resource('about/why-choose-us', WhyChooseUsController::class)
        ->parameters(['why-choose-us' => 'why_choose_us'])
        ->names('about.why-choose-us');

    Route::resource('about/cards', AboutCardController::class)
        ->parameters(['cards' => 'card'])
        ->names('about.cards');

    Route::resource('about/certifications', CertificationController::class)
        ->parameters(['certifications' => 'certification'])
        ->names('about.certifications');

    Route::resource('about/sliders', AboutSliderController::class)
        ->parameters(['sliders' => 'slider'])
        ->names('about.sliders');

    /*
    |--------------------------------------------------------------------------
    | Technology Page CMS (Admin/Technology/*)
    |--------------------------------------------------------------------------
    */

    // single
    Route::get('technology/banner', [TechnologyBannerController::class, 'edit'])->name('technology.banner.edit');
    Route::post('technology/banner', [TechnologyBannerController::class, 'update'])->name('technology.banner.update');

    // resources
    Route::resource('technology/testimonials', TechnologyTestimonialController::class)
        ->parameters(['testimonials' => 'testimonial'])
        ->names('technology.testimonials');

    Route::resource('technology/why-choose-us', TechnologyWhyChooseUsController::class)
        ->parameters(['why-choose-us' => 'why_choose_us'])
        ->names('technology.why-choose-us');

    Route::resource('technology/certifications', TechnologyCertificationController::class)
        ->parameters(['certifications' => 'certification'])
        ->names('technology.certifications');

    /*
    |--------------------------------------------------------------------------
    | Markets Page CMS (Admin/Markets/*)
    |--------------------------------------------------------------------------
    */

    // single
    Route::get('markets/banner', [MarketBannerController::class, 'edit'])->name('markets.banner.edit');
    Route::post('markets/banner', [MarketBannerController::class, 'update'])->name('markets.banner.update');

    Route::get('markets/intro', [MarketIntroController::class, 'edit'])->name('markets.intro.edit');
    Route::post('markets/intro', [MarketIntroController::class, 'update'])->name('markets.intro.update');

    // resources
    Route::resource('markets/services', MarketServiceController::class)
        ->parameters(['services' => 'service'])
        ->names('markets.services');

    // Usually singleton-ish (index/edit/update only)
    Route::resource('heroes', HeroController::class)->only(['index', 'edit', 'update']);
});

// Profile (non-localized)
Route::middleware('auth')->group(function () {
    Route::get('/profile',  [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (keep outside localization unless you WANT /en/login, /ar/login)
require __DIR__ . '/auth.php';

// -------------------------------
// PUBLIC SITE (localized)
// -------------------------------
Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/about', [AboutController::class, 'index'])->name('about');

    Route::get('/productDetails', fn() => view('site.productDetails'))->name('productDetails');

    Route::get('/products/{category?}', function (?string $category = null) {
        $categories = trans('products.categories');
        $categorySlug = ($category && isset($categories[$category])) ? $category : null;
        $categoryName = $categorySlug ? $categories[$categorySlug] : null;

        $makeProduct = function ($i, $overrides = []) {
            return array_merge([
                'slug'    => 'product-' . $i,
                'name'    => 'Sample Product ' . $i,
                'brand'   => 'Brand ' . ($i % 3 + 1),
                'price'   => rand(20, 120),
                'image'   => Vite::asset('resources/UI/Site/images/products/product_img_5.png'),
                'spec_1'  => 'Wattage: ' . rand(8, 50) . 'W',
                'spec_2'  => 'Color Temp: ' . [2700, 3000, 4000, 6500][array_rand([0, 1, 2, 3])] . 'K',
                'details' => 'Aluminum body, long-life LED driver, IP' . [20, 40, 65][array_rand([0, 1, 2])],
            ], $overrides);
        };

        $mockByCategory = [
            'indoor-light'  => collect(range(1, 24))->map(fn($i) => $makeProduct($i)),
            'outdoor-light' => collect(range(1, 18))->map(fn($i) => $makeProduct($i)),
            'garden-light'  => collect(range(1, 10))->map(fn($i) => $makeProduct($i)),
            'solar-light'   => collect(range(1, 16))->map(fn($i) => $makeProduct($i)),
            'strip-light'   => collect(range(1, 14))->map(fn($i) => $makeProduct($i)),
            'bulb-light'    => collect(range(1, 20))->map(fn($i) => $makeProduct($i)),
            'all'           => collect(range(1, 30))->map(fn($i) => $makeProduct($i)),
        ];

        /** @var \Illuminate\Support\Collection $items */
        $items = $categorySlug ? $mockByCategory[$categorySlug] : $mockByCategory['all'];

        $perPage   = 12;
        $page      = (int) request('page', 1);
        $pageItems = $items->forPage($page, $perPage)->values();
        $paginator = new LengthAwarePaginator(
            $pageItems,
            $items->count(),
            $perPage,
            $page,
            ['path' => url()->current(), 'query' => request()->query()]
        );

        $title = $categoryName ? __('products.title') . ' | ' . $categoryName : __('products.title');
        $bannerImg = $categoryName
            ? Vite::asset('resources/UI/Site/images/hero/products_banner.jpg')
            : Vite::asset('resources/UI/Site/images/hero/about_banner.png');

        $breadcrumbs = [
            __('nav.home')     => route('home'),
            __('products.title') => route('products'),
        ];
        if ($categoryName) $breadcrumbs[$categoryName] = null;

        return view('site.products', compact(
            'paginator',
            'categorySlug',
            'categoryName',
            'title',
            'bannerImg',
            'breadcrumbs'
        ))->with(['products' => $paginator]); // keep old var name
    })->name('products');

    Route::get('/technology', [TechnologyController::class, 'index'])
        ->name('technology');

    Route::get('/WhereToFindUs', fn() => view('site.whereToFindUs'))->name('WhereToFindUs');
    Route::get('/Markets', [MarketsController::class, 'index'])->name('Markets');

    Route::get('/Insights', fn() => view('site.Insights'))->name('Insights');
    Route::get('/Contact', fn() => view('site.contact'))->name('Contact');
});
