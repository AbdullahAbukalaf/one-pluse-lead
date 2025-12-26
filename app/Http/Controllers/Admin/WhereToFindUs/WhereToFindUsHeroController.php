<?php

namespace App\Http\Controllers\Admin\WhereToFindUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhereToFindUs\WhereToFindUsHero;
use Illuminate\Support\Facades\Storage;

class WhereToFindUsHeroController extends Controller
{
    public function edit()
    {
        $item = WhereToFindUsHero::first();
        if (!$item) {
            $item = WhereToFindUsHero::create([
                'title_en' => 'Where To Find Us',
                'title_ar' => 'أين تجدنا',
                'description_en' => 'Find our locations and distributors.',
                'description_ar' => 'اعثر على مواقعنا والموزعين.',
                'background_image' => null,
                'is_active' => true,
            ]);
        }

        return view('admin.where_to_find_us.hero.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $item = WhereToFindUsHero::firstOrFail();

        $data = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_ar' => ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
            'background_image' => ['nullable', 'file' , 'mimes:jpeg,png,jpg,gif,webp,svg' , 'max:5120'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('background_image')) {
            if ($item->background_image && Storage::disk('public')->exists($item->background_image)) {
                Storage::disk('public')->delete($item->background_image);
            }
            $data['background_image'] = $request->file('background_image')->store('where-to-find-us/hero', 'public');
        }

        $item->update($data);

        return redirect()->back()->with('success', 'Hero section updated successfully.');
    }
}
