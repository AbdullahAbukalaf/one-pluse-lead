<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\ProductsWhyChooseUs;
use Illuminate\Support\Facades\Storage;

class ProductsWhyChooseUsController extends Controller
{
    public function index()
    {
        $items = ProductsWhyChooseUs::query()->orderBy('sort_order')->paginate(30);
        return view('admin.products_why_choose_us.index', compact('items'));
    }

    public function create()
    {
        return view('admin.products_why_choose_us.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateItem($request);
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products/why_choose_us', 'public');
        }
        $data['sort_order'] = (int)($data['sort_order'] ?? 0);
        $data['is_active'] = (bool)$request->input('is_active', 0);
        ProductsWhyChooseUs::query()->create($data);
        return redirect()->route('admin.products.why_choose_us.index')->with('success', 'Item created.');
    }

    public function edit(int $id)
    {
        $why_choose_u = ProductsWhyChooseUs::findOrFail($id);
        $item = $why_choose_u;
        return view('admin.products_why_choose_us.edit', compact('item'));
    }

    public function update(Request $request, int $id)
    {
        $why_choose_u = ProductsWhyChooseUs::findOrFail($id);
        $data = $this->validateItem($request);
        if ($request->hasFile('image')) {
            // delete old if exists
            if ($why_choose_u->image) {
                Storage::disk('public')->delete($why_choose_u->image);
            }
            $data['image'] = $request->file('image')->store('products/why_choose_us', 'public');
        } else {
            unset($data['image']); // don't overwrite existing path with null
        }

        $data['sort_order'] = (int)($data['sort_order'] ?? 0);
        $data['is_active'] = (bool)$request->input('is_active', 0);
        $why_choose_u->fill($data)->save();
        return redirect()->route('admin.products.why_choose_us.index')->with('success', 'Item updated.');
    }

    public function destroy(int $id)
    {
        $why_choose_u = ProductsWhyChooseUs::findOrFail($id);
        $why_choose_u->delete();
        return redirect()->route('admin.products.why_choose_us.index')->with('success', 'Item deleted.');
    }

    private function validateItem(Request $request): array
    {
        return $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_ar' => ['required', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,svg', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }
}
