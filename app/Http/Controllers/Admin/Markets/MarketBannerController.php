<?php

namespace App\Http\Controllers\Admin\Markets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Markets\MarketBanner;
use Illuminate\Support\Facades\Storage;

class MarketBannerController extends Controller
{
      public function edit()
    {
        $item = MarketBanner::query()->first();
        return view('admin.markets.banner.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = (bool)($request->input('is_active', 0));

        $item = MarketBanner::query()->first() ?? new MarketBanner();

        if ($request->hasFile('image')) {
            // delete old
            if (!empty($item->image) && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('markets/banner', 'public');
        } else {
            unset($data['image']);
        }

        $item->fill($data)->save();

        return redirect()->route('admin.markets.banner.edit')->with('success', 'Markets banner updated.');
    }
}
