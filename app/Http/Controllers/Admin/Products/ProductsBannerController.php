<?php

namespace App\Http\Controllers\Admin\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products\ProductsBanner;
use Illuminate\Support\Facades\Storage;

class ProductsBannerController extends Controller
{
    public function edit()
    {
        $item = ProductsBanner::query()->firstOrCreate(['id' => 1]);
        return view('admin.products_banner.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['nullable', 'string', 'max:255'],
            'title_ar' => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],
            'image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,svg', 'max:4096'],
        ]);
        if ($request->hasFile('image')) {
            // delete old if exists
            $item = ProductsBanner::query()->first();
            if ($item && $item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('products/banner', 'public');
        }


        $item = ProductsBanner::query()->firstOrCreate(['id' => 1]);
        $item->fill($data)->save();

        return redirect()->route('admin.products.banner.edit')->with('success', 'Products banner updated.');
    }
}
