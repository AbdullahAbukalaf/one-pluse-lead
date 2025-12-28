<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Categories;
use App\Models\Products\ProductsBanner;
use App\Models\Products\ProductsRecentWork;
use App\Models\Products\ProductsWhyChooseUs;
use App\Models\Home\PurchaseBanner;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Vite;

class ProductsController extends Controller
{
    public function index(?string $category = null)
    {
        $categories = Categories::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        $categoryModel = null;
        if ($category) {
            $categoryModel = Categories::query()->where('slug', $category)->where('is_active', true)->first();
        }

        $query = Product::query()->where('is_active', true)->orderBy('sort_order');

        if ($categoryModel) {
            $query->whereHas('categories', fn($q) => $q->where('categories.id', $categoryModel->id));
        }

        $products = $query->paginate(12);

        // Banner
        $banner = ProductsBanner::query()->find(1);
        $title = $categoryModel
            ? ($categoryModel->banner_title_en ?? $categoryModel->title_en)
            : ($banner?->title_en ?? __('products.all_products'));

        // Note: the banner partial expects already-localized strings in the view (you can localize there).
        $recentWorks = ProductsRecentWork::query()->where('is_active', true)->orderBy('sort_order')->get();
        $whyChooseUs = ProductsWhyChooseUs::query()->where('is_active', true)->orderBy('sort_order')->get();
        $banners = PurchaseBanner::where('is_active', true)
            ->orderBy('display_order')
            ->get()
            ->keyBy('key');

        return view('site.products', compact('products', 'categories', 'categoryModel', 'banner', 'recentWorks', 'whyChooseUs', 'banners', 'title'));
    }

    public function show(string $slug)
    {
        $product = Product::query()
            ->where('slug', $slug)
            ->where('is_active', true)
            ->with([
                'categories',
                'images',
                'additionalInfos',
            ])
            ->firstOrFail();

        $otherProducts = Product::query()
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->whereHas('categories', function ($q) use ($product) {
                $q->whereIn('categories.id', $product->categories->pluck('id'));
            })
            ->orderBy('sort_order')
            ->limit(4)
            ->get();

        return view('site.productDetails', compact('product', 'otherProducts'));
    }

    public function suggest(Request $request)
    {
        $q = trim((string)$request->query('q', ''));
        if (mb_strlen($q) < 2) {
            return response()->json([]);
        }

        $locale = app()->getLocale();
        $titleColumn = $locale === 'ar' ? 'title_ar' : 'title_en';

        $products = Product::query()
            ->when($request->has('is_active') || Schema::hasColumn('products', 'is_active'), function ($query) {
                $query->where('is_active', true);
            })
            ->where($titleColumn, 'LIKE', '%' . $q . '%')
            ->orderBy('sort_order')
            ->limit(3)
            ->get(['id', 'slug', 'card_image', 'title_en', 'title_ar']);

        $placeholder = Vite::asset('resources/UI/Site/images/products/product_img_1.png');

        $result = $products->map(function ($product) use ($titleColumn, $placeholder) {
            $image = $product->card_image
                ? Storage::url($product->card_image)
                : $placeholder;

            return [
                'id' => $product->id,
                'slug' => $product->slug,
                'title' => $product->{$titleColumn},
                'image_url' => $image,
                'url' => route('productDetails', $product->slug),
            ];
        });

        return response()->json($result);
    }
}
