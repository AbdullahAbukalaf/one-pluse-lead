<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SiteSettingsController extends Controller
{
    public function edit()
    {
        $item = SiteSetting::query()->firstOrCreate(['id' => 1]);
        return view('admin.settings.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $item = SiteSetting::query()->firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'header_logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],
            'footer_logo' => ['nullable', 'file', 'mimes:jpg,jpeg,png,webp,svg', 'max:2048'],

            'description_en' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],

            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
        ]);

        // Upload header logo
        if ($request->hasFile('header_logo')) {
            if ($item->header_logo_path) {
                Storage::disk('public')->delete($item->header_logo_path);
            }
            $item->header_logo_path = $request->file('header_logo')->store('settings', 'public');
        }

        // Upload footer logo
        if ($request->hasFile('footer_logo')) {
            if ($item->footer_logo_path) {
                Storage::disk('public')->delete($item->footer_logo_path);
            }
            $item->footer_logo_path = $request->file('footer_logo')->store('settings', 'public');
        }

        $item->description_en = $validated['description_en'] ?? null;
        $item->description_ar = $validated['description_ar'] ?? null;
        $item->email = $validated['email'] ?? null;
        $item->phone = $validated['phone'] ?? null;

        $item->save();

        return redirect()->back()->with('success', 'Settings updated successfully.');
    }
}
