<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Vite;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('/lang.js', function () {
    $payload = [
        'nav' => trans('nav'),
        'common' => trans('common'),
    ];

    return response('window.I18N=' . json_encode($payload) . ';')
        ->header('Content-Type', 'application/javascript');
})->name('lang.js');

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ],
    function () {
        Route::get('/', function () {
            return view('site.home');
        })->name('home');

        Route::get('/about', function () {
            return view('site.about');
        })->name('about');

        Route::get('/productDetails', function () {
            return view('site.productDetails');
        })->name('productDetails');

        Route::get('/products/{category?}', function (?string $category = null) {
            $categories = trans('products.categories');

            $categorySlug = $category && isset($categories[$category]) ? $category : null;
            $categoryName = $categorySlug ? $categories[$categorySlug] : null;

            $makeProduct = function ($i, $overrides = []) {
                return array_merge([
                    'slug' => 'product-' . $i,
                    'name' => 'Sample Product ' . $i,
                    'brand' => 'Brand ' . ($i % 3 + 1),
                    'price' => rand(20, 120),
                    'image' => Vite::asset('resources/UI/Site/images/products/product_img_5.png'),
                    'spec_1' => 'Wattage: ' . rand(8, 50) . 'W',
                    'spec_2' => 'Color Temp: ' . [2700, 3000, 4000, 6500][array_rand([0, 1, 2, 3])] . 'K',
                    'details' => 'Aluminum body, long-life LED driver, IP' . [20, 40, 65][array_rand([0, 1, 2])],
                ], $overrides);
            };

            $mockByCategory = [
                'indoor-light' => collect(range(1, 24))->map(fn ($i) => $makeProduct($i)),
                'outdoor-light' => collect(range(1, 18))->map(fn ($i) => $makeProduct($i)),
                'garden-light' => collect(range(1, 10))->map(fn ($i) => $makeProduct($i)),
                'solar-light' => collect(range(1, 16))->map(fn ($i) => $makeProduct($i)),
                'strip-light' => collect(range(1, 14))->map(fn ($i) => $makeProduct($i)),
                'bulb-light' => collect(range(1, 20))->map(fn ($i) => $makeProduct($i)),
                'all' => collect(range(1, 30))->map(fn ($i) => $makeProduct($i)),
            ];

            /** @var Collection $items */
            $items = $categorySlug ? $mockByCategory[$categorySlug] : $mockByCategory['all'];

            $perPage = 12;
            $page = (int) request('page', 1);
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
                __('nav.home') => route('home'),
                __('products.title') => route('products'),
            ];
            if ($categoryName) {
                $breadcrumbs[$categoryName] = null;
            }

            return view('site.products', [
                'products' => $paginator,
                'categorySlug' => $categorySlug,
                'categoryName' => $categoryName,
                'title' => $title,
                'bannerImg' => $bannerImg,
                'breadcrumbs' => $breadcrumbs,
            ]);
        })->name('products');

        Route::get('/technologyAndInnovation', function () {
            return view('site.technologyAndInnovation');
        })->name('technologyAndInnovation');

        Route::get('/WhereToFindUs', function () {
            return view('site.whereToFindUs');
        })->name('WhereToFindUs');

        Route::get('/Markets', function () {
            return view('site.markets');
        })->name('Markets');

        Route::get('/Insights', function () {
            return view('site.Insights');
        })->name('Insights');

        Route::get('/Contact', function () {
            return view('site.contact');
        })->name('Contact');

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        });

        require __DIR__ . '/auth.php';
    }
);
