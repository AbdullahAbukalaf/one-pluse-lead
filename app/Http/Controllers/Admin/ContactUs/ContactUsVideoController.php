<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs\ContactUsVideo;
use Illuminate\Support\Facades\Storage;

class ContactUsVideoController extends Controller
{
     public function edit()
    {
        $item = ContactUsVideo::first();
        return view('admin.contact_us.video.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $item = ContactUsVideo::firstOrFail();

        $data = $request->validate([
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'description_en' => ['required','string'],
            'description_ar' => ['required','string'],
            'image' => ['nullable','file','mimes:jpg,jpeg,png,webp,svg','max:5120'],
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
