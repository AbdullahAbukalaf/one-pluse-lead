<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\Product;
use App\Models\Products\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImagesController extends Controller
{
     public function index(Product $product)
    {
        $items = ProductImage::where('product_id', $product->id)
            ->orderBy('sort_order')
            ->paginate(30);

        return view('admin.productImages.index', compact('product', 'items'));
    }

    public function create(Product $product)
    {
        return view('admin.productImages.create', compact('product'));
    }

    public function store(Request $request, Product $product)
    {
        $request->validate([
            'images'   => ['required', 'array'],
            'images.*' => ['file', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
        ]);

        $uploaded = [];
        $failed   = [];

        $lastSort = ProductImage::where('product_id', $product->id)->max('sort_order') ?? 0;

        foreach ($request->file('images') as $file) {
            try {
                $path = $file->store('products/gallery', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                    'sort_order' => ++$lastSort,
                    'is_active'  => true,
                ]);

                $uploaded[] = $file->getClientOriginalName();
            } catch (\Throwable $e) {
                $failed[] = $file->getClientOriginalName();
            }
        }

        return redirect()
            ->route('admin.products.images.index', $product->id)
            ->with([
                'uploaded_images' => $uploaded,
                'failed_images'   => $failed,
            ]);
    }

    public function edit(Product $product, ProductImage $image)
    {
        return view('admin.productImages.edit', compact('product', 'image'));
    }

    public function update(Request $request, Product $product, ProductImage $image)
    {
        $data = $request->validate([
            'image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            if ($image->image_path) {
                Storage::disk('public')->delete($image->image_path);
            }
            $data['image_path'] = $request->file('image')->store('products/gallery', 'public');
        }

        $data['is_active'] = (bool)($request->input('is_active', 0));
        $data['sort_order'] = (int)($data['sort_order'] ?? 0);

        $image->update($data);

        return redirect()
            ->route('admin.products.images.index', $product->id)
            ->with('success', 'Image updated.');
    }

    public function destroy(Product $product, ProductImage $image)
    {
        if ($image->image_path) {
            Storage::disk('public')->delete($image->image_path);
        }

        $image->delete();

        return redirect()
            ->route('admin.products.images.index', $product->id)
            ->with('success', 'Image deleted.');
    }
}
