<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Products\Product;
use App\Models\Categories;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $items = Product::query()->orderByDesc('id')->paginate(20);
        return view('admin.products.index', compact('items'));
    }

    public function create()
    {
        $categories = Categories::query()->where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $this->validateProduct($request);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title_en']);
        }
        if ($request->hasFile('card_image')) {
            $data['card_image'] = $request->file('card_image')->store('products/cards', 'public');
        }


        $data['is_active'] = (bool) $request->input('is_active', 0);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);

        // Tags come as comma-separated or array (view uses textarea)
        $data['tags_en'] = $this->normalizeTags($request->input('tags_en'));
        $data['tags_ar'] = $this->normalizeTags($request->input('tags_ar'));

        $product = Product::query()->create($data);

        $categoryIds = $request->input('category_ids', []);
        $product->categories()->sync($categoryIds);

        // $this->syncImages($product, $request);

        return redirect()->route('admin.products.index')->with('success', 'Product created.');
    }

    public function edit(Product $product)
    {
        $item = $product->load(['categories', 'images']);
        $categories = Categories::query()->where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.products.edit', compact('item', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $this->validateProduct($request, $product->id);
        if ($request->hasFile('card_image')) {
            if ($product->card_image) {
                Storage::disk('public')->delete($product->card_image);
            }
            $data['card_image'] = $request->file('card_image')->store('products/cards', 'public');
        } else {
            unset($data['card_image']);
        }
        $data['is_active'] = (bool) $request->input('is_active', 0);
        $data['sort_order'] = (int) ($data['sort_order'] ?? 0);
        $data['tags_en'] = $this->normalizeTags($request->input('tags_en'));
        $data['tags_ar'] = $this->normalizeTags($request->input('tags_ar'));

        $product->fill($data)->save();

        $categoryIds = $request->input('category_ids', []);
        $product->categories()->sync($categoryIds);

        // $this->syncImages($product, $request);

        return redirect()->route('admin.products.index')->with('success', 'Product updated.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted.');
    }

    private function validateProduct(Request $request, ?int $ignoreId = null): array
    {
        $uniqueSlug = 'unique:products,slug';
        if ($ignoreId) $uniqueSlug .= ',' . $ignoreId;

        return $request->validate([
            'slug' => ['nullable', 'string', 'max:255', $uniqueSlug],
            'title_en' => ['required', 'string', 'max:255'],
            'title_ar' => ['required', 'string', 'max:255'],
            'short_description_en' => ['nullable', 'string'],
            'short_description_ar' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],
            'sku' => ['nullable', 'string', 'max:255'],
            'brand_en' => ['nullable', 'string', 'max:255'],
            'brand_ar' => ['nullable', 'string', 'max:255'],
            'card_image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,svg', 'max:4096'], // keep string path to match your project style
            'price' => ['nullable', 'string', 'max:255'],

            'spec_1_en' => ['nullable', 'string', 'max:255'],
            'spec_1_ar' => ['nullable', 'string', 'max:255'],
            'spec_2_en' => ['nullable', 'string', 'max:255'],
            'spec_2_ar' => ['nullable', 'string', 'max:255'],
            'details_snippet_en' => ['nullable', 'string'],
            'details_snippet_ar' => ['nullable', 'string'],

            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    private function normalizeTags($value): array
    {
        if (is_array($value)) return array_values(array_filter(array_map('trim', $value)));
        if (!is_string($value) || trim($value) === '') return [];
        return array_values(array_filter(array_map('trim', preg_split('/[\n,]+/', $value))));
    }

    // private function syncImages(Product $product, Request $request): void
    // {
    //     $rows = $request->input('images', []);
    //     ProductImage::query()->where('product_id', $product->id)->delete();

    //     $order = 1;
    //     foreach ($rows as $row) {
    //         $path = trim((string)($row['image_path'] ?? ''));
    //         if ($path === '') continue;

    //         ProductImage::query()->create([
    //             'product_id' => $product->id,
    //             'image_path' => $path,
    //             'sort_order' => (int)($row['sort_order'] ?? $order),
    //             'is_active' => (bool)($row['is_active'] ?? 1),
    //         ]);
    //         $order++;
    //     }
    // }

}
