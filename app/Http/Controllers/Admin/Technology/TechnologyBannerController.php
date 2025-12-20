<?php

namespace App\Http\Controllers\Admin\Technology;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology\TechnologyBanner;
use App\Http\Controllers\Admin\Technology\HandlesTechnologyUploads;

class TechnologyBannerController extends Controller
{
    use HandlesTechnologyUploads;

    public function edit()
    {
        $item = TechnologyBanner::query()->firstOrCreate(['id' => 1]);
        return view('admin.technology.banner.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $item = TechnologyBanner::query()->firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'is_active' => ['nullable','boolean'],
        ]);

        if ($request->hasFile('image')) {
            $this->deleteImage($item->image_path);
            $validated['image_path'] = $this->storeImage($request->file('image'), 'technology/banner');
        }

        $validated['is_active'] = (bool)($request->input('is_active', false));

        $item->fill($validated)->save();

        return redirect()->back()->with('success', 'Technology banner updated successfully.');
    }
}
