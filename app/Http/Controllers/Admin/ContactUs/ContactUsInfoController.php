<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs\ContactUsInfo;

class ContactUsInfoController extends Controller
{
    public function edit()
    {
        $item = ContactUsInfo::firstOrCreate(
            ['id' => 1],
            [
                'map_embed_url' => 'https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed',
                'is_active' => true,
            ]
        );

        return view('admin.contact_us.info.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'map_embed_url' => ['required', 'string', 'max:2000'],
            'is_active' => ['required', 'boolean'],
        ]);

        $item = ContactUsInfo::firstOrCreate(['id' => 1]);
        $item->update($validated);

        return redirect()->back()->with('success', 'Updated successfully');
    }
}
