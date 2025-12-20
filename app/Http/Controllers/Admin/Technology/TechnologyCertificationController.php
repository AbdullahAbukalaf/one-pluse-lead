<?php

namespace App\Http\Controllers\Admin\Technology;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology\TechnologyCertification;
use App\Http\Controllers\Admin\Technology\HandlesTechnologyUploads;

class TechnologyCertificationController extends Controller
{
      use HandlesTechnologyUploads;

    public function index()
    {
        $items = TechnologyCertification::query()->latest('id')->paginate(20);
        return view('admin.technology.certifications.index', compact('items'));
    }

    public function create()
    {
        return view('admin.technology.certifications.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => ['required','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $validated['is_active'] = (bool)($request->input('is_active', false));
        $validated['sort_order'] = (int)($request->input('sort_order', 0));
        $validated['image_path'] = $this->storeImage($request->file('image'), 'technology/certifications');

        TechnologyCertification::query()->create($validated);

        return redirect()->route('admin.technology.certifications.index')
            ->with('success', 'Certification created successfully.');
    }

    public function edit(TechnologyCertification $certification)
    {
        return view('admin.technology.certifications.edit', ['item' => $certification]);
    }

    public function update(Request $request, TechnologyCertification $certification)
    {
        $validated = $request->validate([
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $validated['is_active'] = (bool)($request->input('is_active', false));
        $validated['sort_order'] = (int)($request->input('sort_order', 0));

        if ($request->hasFile('image')) {
            $this->deleteImage($certification->image_path);
            $validated['image_path'] = $this->storeImage($request->file('image'), 'technology/certifications');
        }

        $certification->fill($validated)->save();

        return redirect()->route('admin.technology.certifications.index')
            ->with('success', 'Certification updated successfully.');
    }

    public function destroy(TechnologyCertification $certification)
    {
        $this->deleteImage($certification->image_path);
        $certification->delete();

        return redirect()->route('admin.technology.certifications.index')
            ->with('success', 'Certification deleted successfully.');
    }
}
