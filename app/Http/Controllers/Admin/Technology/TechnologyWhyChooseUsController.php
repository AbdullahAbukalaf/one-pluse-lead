<?php

namespace App\Http\Controllers\Admin\Technology;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology\TechnologyWhyChooseUs;
use App\Http\Controllers\Admin\Technology\HandlesTechnologyUploads;

class TechnologyWhyChooseUsController extends Controller
{
   use HandlesTechnologyUploads;

    public function index()
    {
        $items = TechnologyWhyChooseUs::query()->latest('id')->paginate(20);
        return view('admin.technology.why_choose_us.index', compact('items'));
    }

    public function create()
    {
        return view('admin.technology.why_choose_us.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $validated['is_active'] = (bool)($request->input('is_active', false));
        $validated['sort_order'] = (int)($request->input('sort_order', 0));

        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->storeImage($request->file('image'), 'technology/why_choose_us');
        }

        TechnologyWhyChooseUs::query()->create($validated);

        return redirect()->route('admin.technology.why-choose-us.index')
            ->with('success', 'Item created successfully.');
    }

    public function edit(TechnologyWhyChooseUs $why_choose_u)
    {
        return view('admin.technology.why_choose_us.edit', ['item' => $why_choose_u]);
    }

    public function update(Request $request, TechnologyWhyChooseUs $why_choose_u)
    {
        $validated = $request->validate([
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $validated['is_active'] = (bool)($request->input('is_active', false));
        $validated['sort_order'] = (int)($request->input('sort_order', 0));

        if ($request->hasFile('image')) {
            $this->deleteImage($why_choose_u->image_path);
            $validated['image_path'] = $this->storeImage($request->file('image'), 'technology/why_choose_us');
        }

        $why_choose_u->fill($validated)->save();

        return redirect()->route('admin.technology.why-choose-us.index')
            ->with('success', 'Item updated successfully.');
    }

    public function destroy(TechnologyWhyChooseUs $why_choose_u)
    {
        $this->deleteImage($why_choose_u->image_path);
        $why_choose_u->delete();

        return redirect()->route('admin.technology.why-choose-us.index')
            ->with('success', 'Item deleted successfully.');
    }
}
