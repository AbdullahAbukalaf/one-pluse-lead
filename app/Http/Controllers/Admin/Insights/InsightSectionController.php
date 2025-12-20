<?php

namespace App\Http\Controllers\Admin\Insights;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insights\InsightSection;
use Illuminate\Support\Facades\Storage;

class InsightSectionController extends Controller
{
     public function edit()
    {
        $item = InsightSection::query()->first();
        return view('admin.insights.section.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'outline_title_en' => ['nullable','string','max:255'],
            'outline_title_ar' => ['nullable','string','max:255'],
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:4096'],
            'is_active' => ['nullable','boolean'],
        ]);

        $item = InsightSection::query()->first() ?? new InsightSection();
        $data['is_active'] = (bool)($request->input('is_active', 0));

        if ($request->hasFile('image')) {
            if (!empty($item->image) && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('insights/section', 'public');
        } else {
            unset($data['image']);
        }

        $item->fill($data)->save();

        return redirect()->route('admin.insights.section.edit')->with('success', 'Insight section updated.');
    }
}
