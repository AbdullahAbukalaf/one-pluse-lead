<?php

namespace App\Http\Controllers\Admin\Technology;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology\TechnologyTestimonial;
use App\Http\Controllers\Admin\Technology\HandlesTechnologyUploads;

class TechnologyTestimonialController extends Controller
{
     use HandlesTechnologyUploads;

    public function index()
    {
        $items = TechnologyTestimonial::query()->latest('id')->paginate(20);
        return view('admin.technology.testimonials.index', compact('items'));
    }

    public function create()
    {
        return view('admin.technology.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'tag_en' => ['nullable','string','max:255'],
            'tag_ar' => ['nullable','string','max:255'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $validated['is_active'] = (bool)($request->input('is_active', false));
        $validated['sort_order'] = (int)($request->input('sort_order', 0));

        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->storeImage($request->file('image'), 'technology/testimonials');
        }

        TechnologyTestimonial::query()->create($validated);

        return redirect()->route('admin.technology.testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(TechnologyTestimonial $testimonial)
    {
        return view('admin.technology.testimonials.edit', ['item' => $testimonial]);
    }

    public function update(Request $request, TechnologyTestimonial $testimonial)
    {
        $validated = $request->validate([
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'tag_en' => ['nullable','string','max:255'],
            'tag_ar' => ['nullable','string','max:255'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $validated['is_active'] = (bool)($request->input('is_active', false));
        $validated['sort_order'] = (int)($request->input('sort_order', 0));

        if ($request->hasFile('image')) {
            $this->deleteImage($testimonial->image_path);
            $validated['image_path'] = $this->storeImage($request->file('image'), 'technology/testimonials');
        }

        $testimonial->fill($validated)->save();

        return redirect()->route('admin.technology.testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(TechnologyTestimonial $testimonial)
    {
        $this->deleteImage($testimonial->image_path);
        $testimonial->delete();

        return redirect()->route('admin.technology.testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}
