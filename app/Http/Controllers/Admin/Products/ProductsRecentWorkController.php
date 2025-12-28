<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\ProductsRecentWork;
use Illuminate\Support\Facades\Storage;

class ProductsRecentWorkController extends Controller
{
    public function index()
    {
        $items = ProductsRecentWork::query()->orderBy('sort_order')->paginate(30);
        return view('admin.products_recent_works.index', compact('items'));
    }

    public function create()
    {
        return view('admin.products_recent_works.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateItem($request);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products/recent_works', 'public');
        }

        $data['sort_order'] = (int)($data['sort_order'] ?? 0);
        $data['is_active'] = (bool)$request->input('is_active', 0);
        ProductsRecentWork::query()->create($data);
        return redirect()->route('admin.products.recent_works.index')->with('success', 'Item created.');
    }

    public function edit(int $id)
    {
        $item = ProductsRecentWork::findOrFail($id);
        return view('admin.products_recent_works.edit', compact('item'));
    }

    public function update(Request $request, int $id)
    {
        $recent_work = ProductsRecentWork::findOrFail($id);
        $data = $this->validateItem($request);
        if ($request->hasFile('image')) {
            // delete old if exists
            if ($recent_work->image) {
                Storage::disk('public')->delete($recent_work->image);
            }
            $data['image'] = $request->file('image')->store('products/recent_works', 'public');
        } else {
            unset($data['image']); // don't overwrite existing path with null
        }

        $data['sort_order'] = (int)($data['sort_order'] ?? 0);
        $data['is_active'] = (bool)$request->input('is_active', 0);
        $recent_work->fill($data)->save();
        return redirect()->route('admin.products.recent_works.index')->with('success', 'Item updated.');
    }

    public function destroy(ProductsRecentWork $recent_work)
    {
        $recent_work->delete();
        return redirect()->route('admin.products.recent_works.index')->with('success', 'Item deleted.');
    }

    private function validateItem(Request $request): array
    {
        return $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_ar' => ['required', 'string', 'max:255'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,svg', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
