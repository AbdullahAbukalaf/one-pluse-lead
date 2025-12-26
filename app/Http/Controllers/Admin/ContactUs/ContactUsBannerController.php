<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs\ContactUsBanner;
use Illuminate\Support\Facades\Storage;

class ContactUsBannerController extends Controller
{
     public function edit()
    {
        $item = ContactUsBanner::first();
        return view('admin.contact_us.banner.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $item = ContactUsBanner::firstOrFail();

        $data = $request->validate([
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'description_en' => ['required','string'],
            'description_ar' => ['required','string'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp','max:5120'],
            'is_active' => ['required','boolean'],
        ]);

        if ($request->hasFile('image')) {
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }
            $data['image'] = $request->file('image')->store('cms/contact-us', 'public');
        }

        $item->update($data);

        return redirect()->back()->with('success', 'Updated successfully');
    }
}
