<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs\ContactUsFormSection;

class ContactUsFormSectionController extends Controller
{
      public function edit()
    {
        $item = ContactUsFormSection::first();
        return view('admin.contact_us.form_section.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $item = ContactUsFormSection::firstOrFail();

        $data = $request->validate([
            'outline_title_en' => ['required','string','max:255'],
            'outline_title_ar' => ['required','string','max:255'],
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'description_en' => ['required','string'],
            'description_ar' => ['required','string'],
            'is_active' => ['required','boolean'],
        ]);

        $item->update($data);

        return redirect()->back()->with('success', 'Updated successfully');
    }
}
