<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs\ContactUsHero;
use Illuminate\Support\Facades\Storage;

class ContactUsHeroController extends Controller
{
    public function edit()
    {
        $item = ContactUsHero::first();
        return view('admin.contact_us.hero.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $item = ContactUsHero::firstOrFail();

        $data = $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_ar' => ['required', 'string', 'max:255'],
            'description_en' => ['required', 'string'],
            'description_ar' => ['required', 'string'],
            'background_image' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:5120'],
            'is_active' => ['required', 'boolean'],
        ]);

        if ($request->hasFile('background_image')) {
            if ($item->background_image) {
                Storage::disk('public')->delete($item->background_image);
            }
            $data['background_image'] = $request->file('background_image')->store('cms/contact-us', 'public');
        }

        $item->update($data);

        return redirect()->back()->with('success', 'Updated successfully');
    }
}
