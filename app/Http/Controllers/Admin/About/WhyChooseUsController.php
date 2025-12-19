<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\About\WhyChooseUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUsController extends Controller
{
    public function index()
    {
        $items = WhyChooseUs::latest()->get();
        return view('admin.about.why_choose_us.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about.why_choose_us.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['nullable', 'string', 'max:255'],
            'title_ar' => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about/why-choose-us', 'public');
        }

        $data['is_active'] = (bool) $request->input('is_active', false);

        WhyChooseUs::create($data);

        return redirect()->route('admin.about.why-choose-us.index')
            ->with('success', 'Why Choose Us item created.');
    }

    public function edit(WhyChooseUs $why_choose_us)
    {
        return view('admin.about.why_choose_us.edit', ['item' => $why_choose_us]);
    }

    public function update(Request $request, WhyChooseUs $why_choose_us)
    {
        $data = $request->validate([
            'title_en' => ['nullable', 'string', 'max:255'],
            'title_ar' => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'max:4096'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about/why-choose-us', 'public');
            if ($why_choose_us->image) {
                Storage::disk('public')->delete($why_choose_us->image);
            }
        }

        $data['is_active'] = (bool) $request->input('is_active', false);

        $why_choose_us->update($data);

        return back()->with('success', 'Why Choose Us item updated.');
    }

    public function destroy(WhyChooseUs $why_choose_us)
    {
        if ($why_choose_us->image) {
            Storage::disk('public')->delete($why_choose_us->image);
        }

        $why_choose_us->delete();

        return back()->with('success', 'Why Choose Us item deleted.');
    }
}
