<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\About\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSectionController extends Controller
{
 public function edit()
    {
        $item = AboutSection::first();
        return view('admin.about.section.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'image' => ['nullable','image','max:4096'],

            'progress_bar_title1_en' => ['nullable','string','max:255'],
            'progress_bar_title1_ar' => ['nullable','string','max:255'],
            'progress_bar_percent1' => ['required','integer','min:0','max:100'],

            'progress_bar_title2_en' => ['nullable','string','max:255'],
            'progress_bar_title2_ar' => ['nullable','string','max:255'],
            'progress_bar_percent2' => ['required','integer','min:0','max:100'],

            'is_active' => ['nullable','boolean'],
        ]);

        $item = AboutSection::firstOrCreate([]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about', 'public');
            if ($item->image) Storage::disk('public')->delete($item->image);
        }

        $data['is_active'] = (bool) $request->input('is_active', false);
        $item->update($data);

        return back()->with('success', 'About Section updated.');
    }
}
