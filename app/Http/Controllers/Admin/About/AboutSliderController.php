<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\About\AboutSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutSliderController extends Controller
{
    public function index()
    {
        $items = AboutSlider::latest()->get();
        return view('admin.about.sliders.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about.sliders.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['nullable', 'string', 'max:255'],
            'title_ar' => ['nullable', 'string', 'max:255'],
            'image' => ['required', 'image', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['image'] = $request->file('image')->store('about/sliders', 'public');
        $data['is_active'] = (bool) $request->input('is_active', false);

        AboutSlider::create($data);

        return redirect()->route('admin.about.sliders.index')->with('success', 'Slider item added.');
    }

    public function edit(AboutSlider $slider)
    {
        return view('admin.about.sliders.edit', ['item' => $slider]);
    }

    public function update(Request $request, AboutSlider $slider)
    {
        $data = $request->validate([
            'title_en' => ['nullable', 'string', 'max:255'],
            'title_ar' => ['nullable', 'string', 'max:255'],
            'image' => ['nullable', 'image', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about/sliders', 'public');
            if ($slider->image) Storage::disk('public')->delete($slider->image);
        }

        $data['is_active'] = (bool) $request->input('is_active', false);
        $slider->update($data);

        return back()->with('success', 'Slider updated.');
    }

    public function destroy(AboutSlider $slider)
    {
        if ($slider->image) Storage::disk('public')->delete($slider->image);
        $slider->delete();

        return back()->with('success', 'Slider deleted.');
    }
}
