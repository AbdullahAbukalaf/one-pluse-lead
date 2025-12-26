<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs\ContactUsExploreLocator;

class ContactUsExploreLocatorController extends Controller
{
     public function edit()
    {
        $item = ContactUsExploreLocator::first();
        return view('admin.contact_us.explore_locator.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $item = ContactUsExploreLocator::firstOrFail();

        $data = $request->validate([
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],

            'find_agent_en' => ['required','string','max:255'],
            'find_agent_ar' => ['required','string','max:255'],
            'find_agent_sub_en' => ['required','string','max:255'],
            'find_agent_sub_ar' => ['required','string','max:255'],

            'find_distributor_en' => ['required','string','max:255'],
            'find_distributor_ar' => ['required','string','max:255'],
            'find_distributor_sub_en' => ['required','string','max:255'],
            'find_distributor_sub_ar' => ['required','string','max:255'],

            'find_retailer_en' => ['required','string','max:255'],
            'find_retailer_ar' => ['required','string','max:255'],
            'find_retailer_sub_en' => ['required','string','max:255'],
            'find_retailer_sub_ar' => ['required','string','max:255'],

            'is_active' => ['required','boolean'],
        ]);

        $item->update($data);

        return redirect()->back()->with('success', 'Updated successfully');
    }
}
