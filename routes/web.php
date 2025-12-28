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
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoriesController;
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
use App\Http\Controllers\Admin\Insights\{
    InsightHeroController,
    InsightSectionController,
    InsightTypeController,
    InsightRecommendationController
};
use App\Http\Controllers\Admin\WhereToFindUs\{
    WhereToFindUsHeroController,
    WhereToFindUsLocationController,
    WhereToFindUsDistributorController
};
use App\Http\Controllers\Admin\ContactUs\{
    ContactUsHeroController,
    ContactUsBannerController,
    ContactUsExploreLocatorController,
    ContactUsFormSectionController,
    ContactUsInfoController,
    ContactUsVideoController,
    ContactUsSubmissionController
};
use App\Http\Controllers\Admin\Products\{
    ProductController,
    ProductAdditionalInformationController,
    ProductsBannerController,
    ProductsRecentWorkController,
    ProductsWhyChooseUsController
};
use App\Http\Controllers\Site\ProductsController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\InsightsController;

use App\Http\Controllers\Site\MarketsController;
use App\Http\Controllers\Site\WhereToFindUs\WhereToFindUsController;


use App\Http\Controllers\Site\AboutController;
use App\Http\Controllers\Site\TechnologyController;
use App\Models\Categories;

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
    Route::resource('users', UserController::class);
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


    // ADMIN (inside dashboard group)
    Route::get('insights/hero', [InsightHeroController::class, 'edit'])->name('insights.hero.edit');
    Route::post('insights/hero', [InsightHeroController::class, 'update'])->name('insights.hero.update');

    Route::get('insights/section', [InsightSectionController::class, 'edit'])->name('insights.section.edit');
    Route::post('insights/section', [InsightSectionController::class, 'update'])->name('insights.section.update');

    Route::resource('insights/types', InsightTypeController::class)
        ->parameters(['types' => 'type'])
        ->names('insights.types');

    Route::resource('insights/recommendations', InsightRecommendationController::class)
        ->only(['index', 'show', 'destroy'])
        ->parameters(['recommendations' => 'recommendation'])
        ->names('insights.recommendations');

    // Where To Find Us
    // Where To Find Us - Hero (single)
    Route::get('where-to-find-us/hero', [WhereToFindUsHeroController::class, 'edit'])->name('where-to-find-us.hero.edit');
    Route::put('where-to-find-us/hero', [WhereToFindUsHeroController::class, 'update'])->name('where-to-find-us.hero.update');

    // Where To Find Us - Locations (CRUD)
    Route::resource('where-to-find-us/locations', WhereToFindUsLocationController::class)
        ->names('where-to-find-us.locations')
        ->parameters(['locations' => 'location']);

    // Where To Find Us - Distributors (CRUD)
    Route::resource('where-to-find-us/distributors', WhereToFindUsDistributorController::class)
        ->names('where-to-find-us.distributors')
        ->parameters(['distributors' => 'distributor']);

    // Contact us
    // Single sections (edit/update only)
    Route::get('hero', [ContactUsHeroController::class, 'edit'])->name('contact-hero.edit');
    Route::put('hero', [ContactUsHeroController::class, 'update'])->name('contact-hero.update');

    Route::get('banner', [ContactUsBannerController::class, 'edit'])->name('contact-banner.edit');
    Route::put('banner', [ContactUsBannerController::class, 'update'])->name('contact-banner.update');
    Route::get('explore-locator', [ContactUsExploreLocatorController::class, 'edit'])->name('contact-explore-locator.edit');
    Route::put('explore-locator', [ContactUsExploreLocatorController::class, 'update'])->name('contact-explore-locator.update');

    Route::get('form-section', [ContactUsFormSectionController::class, 'edit'])->name('contact-form-section.edit');
    Route::put('form-section', [ContactUsFormSectionController::class, 'update'])->name('contact-form-section.update');

    Route::get('info', [ContactUsInfoController::class, 'edit'])->name('contact-info.edit');
    Route::put('info', [ContactUsInfoController::class, 'update'])->name('contact-info.update');
    Route::get('video', [ContactUsVideoController::class, 'edit'])->name('contact-video.edit');
    Route::put('video', [ContactUsVideoController::class, 'update'])->name('contact-video.update');

    // Submissions (admin view only)
    Route::get('submissions', [ContactUsSubmissionController::class, 'index'])->name('contact-submissions.index');
    Route::put('submissions/{submission}/mark-read', [ContactUsSubmissionController::class, 'markRead'])->name('contact-submissions.mark-read');
    Route::delete('submissions/{submission}', [ContactUsSubmissionController::class, 'destroy'])->name('contact-submissions.destroy');

    // Contact Us - Info Section
    Route::get('contact-us/info', [\App\Http\Controllers\Admin\ContactUs\ContactUsInfoController::class, 'edit'])
        ->name('contact_us.info.edit');
    Route::put('contact-us/info', [\App\Http\Controllers\Admin\ContactUs\ContactUsInfoController::class, 'update'])
        ->name('contact_us.info.update');

    // Contact Us - Info Items (CRUD)
    Route::resource('contact-us/info-items', \App\Http\Controllers\Admin\ContactUs\ContactUsInfoItemController::class)
        ->names([
            'index' => 'contact_us.info_items.index',
            'create' => 'contact_us.info_items.create',
            'store' => 'contact_us.info_items.store',
            'show' => 'contact_us.info_items.show',
            'edit' => 'contact_us.info_items.edit',
            'update' => 'contact_us.info_items.update',
            'destroy' => 'contact_us.info_items.destroy',
        ]);

    // Products
    // Categories (updated to include slug + banner fields)
    Route::resource('categories', CategoriesController::class)->except(['show']);

    // Products
    Route::resource('products', ProductController::class)->except(['show']);

    // Products main banner (singleton)
    Route::get('products-banner', [ProductsBannerController::class, 'edit'])->name('products.banner.edit');
    Route::put('products-banner', [ProductsBannerController::class, 'update'])->name('products.banner.update');

    // Extra sections
    Route::resource('products-recent-works', ProductsRecentWorkController::class)->except(['show'])
        ->names('products.recent_works');
    Route::resource('products-why-choose-us', ProductsWhyChooseUsController::class)->except(['show'])
        ->names('products.why_choose_us');

    Route::prefix('products/{product}/additional-information')
        ->name('products.additional_information.')
        ->group(function () {
            Route::get('/', [ProductAdditionalInformationController::class, 'index'])->name('index');
            Route::get('/create', [ProductAdditionalInformationController::class, 'create'])->name('create');
            Route::post('/', [ProductAdditionalInformationController::class, 'store'])->name('store');
            Route::get('/{information}/edit', [ProductAdditionalInformationController::class, 'edit'])->name('edit');
            Route::put('/{information}', [ProductAdditionalInformationController::class, 'update'])->name('update');
            Route::delete('/{information}', [ProductAdditionalInformationController::class, 'destroy'])->name('destroy');
        });

    Route::prefix('products/{product}/images')
        ->name('products.images.')
        ->group(function () {

            Route::get('/', [\App\Http\Controllers\Admin\Products\ProductImagesController::class, 'index'])
                ->name('index');

            Route::get('/create', [\App\Http\Controllers\Admin\Products\ProductImagesController::class, 'create'])
                ->name('create');

            Route::post('/', [\App\Http\Controllers\Admin\Products\ProductImagesController::class, 'store'])
                ->name('store');

            Route::get('/{image}/edit', [\App\Http\Controllers\Admin\Products\ProductImagesController::class, 'edit'])
                ->name('edit');

            Route::put('/{image}', [\App\Http\Controllers\Admin\Products\ProductImagesController::class, 'update'])
                ->name('update');

            Route::delete('/{image}', [\App\Http\Controllers\Admin\Products\ProductImagesController::class, 'destroy'])
                ->name('destroy');
        });

    // // Usually singleton-ish (index/edit/update only)
    // Route::resource('heroes', HeroController::class)->only(['index', 'edit', 'update']);
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

    Route::get('/products/{category?}', [ProductsController::class, 'index'])->name('products');
    Route::get('/product/{slug}', [ProductsController::class, 'show'])->name('productDetails');
    Route::get('/search/suggest', [ProductsController::class, 'suggest'])->name('products.suggest');

    Route::get('/technology', [TechnologyController::class, 'index'])
        ->name('technology');

    Route::get('/where-to-find-us', [WhereToFindUsController::class, 'index'])->name('whereToFindUs');
    Route::get('/Markets', [MarketsController::class, 'index'])->name('Markets');


    Route::get('/Insites', [InsightsController::class, 'index'])->name('Insites');
    Route::post('/insights/recommendations', [InsightsController::class, 'storeRecommendation'])->name('insights.recommendations.store');

    Route::get('/Contact', [ContactUsController::class, 'index'])->name('Contact');
    Route::post('/Contact', [ContactUsController::class, 'submit'])->name('Contact.submit');
});
