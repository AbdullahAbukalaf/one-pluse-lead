<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\About\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
  public function index()
    {
        $items = Certification::latest()->get();
        return view('admin.about.certifications.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about.certifications.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image' => ['required','image','max:4096'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['image'] = $request->file('image')->store('about/certifications', 'public');
        $data['is_active'] = (bool) $request->input('is_active', false);

        Certification::create($data);

        return redirect()->route('admin.about.certifications.index')->with('success', 'Certification added.');
    }

    public function edit(Certification $certification)
    {
        return view('admin.about.certifications.edit', ['item' => $certification]);
    }

    public function update(Request $request, Certification $certification)
    {
        $data = $request->validate([
            'image' => ['nullable','image','max:4096'],
            'is_active' => ['nullable','boolean'],
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about/certifications', 'public');
            if ($certification->image) Storage::disk('public')->delete($certification->image);
        }

        $data['is_active'] = (bool) $request->input('is_active', false);
        $certification->update($data);

        return back()->with('success', 'Certification updated.');
    }

    public function destroy(Certification $certification)
    {
        if ($certification->image) Storage::disk('public')->delete($certification->image);
        $certification->delete();

        return back()->with('success', 'Certification deleted.');
    }
}
