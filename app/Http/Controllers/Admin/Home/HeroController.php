<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HeroSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HeroController extends Controller
{
     public function index()
    {
        $item = HeroSection::query()->orderBy('display_order')->first();
        return view('admin.Home.heroes.index', compact('item'));
    }

    public function edit(HeroSection $hero)
    {
        return view('admin.Home.heroes.edit', ['item' => $hero]);
    }

    public function update(Request $request, HeroSection $hero)
    {
        $data = $request->validate([
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'button_text_en' => ['nullable','string','max:255'],
            'button_text_ar' => ['nullable','string','max:255'],
            'button_url' => ['nullable','string','max:255'],

            'display_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
            'starts_at' => ['nullable','date'],
            'ends_at' => ['nullable','date','after_or_equal:starts_at'],

            'video_mp4' => ['nullable','file','mimetypes:video/mp4','max:51200'],
            'video_ogg' => ['nullable','file','mimetypes:video/ogg,application/ogg','max:51200'],
        ]);

        if ($request->hasFile('video_mp4')) {
            if ($hero->video_mp4_path && Storage::disk('public')->exists($hero->video_mp4_path)) {
                Storage::disk('public')->delete($hero->video_mp4_path);
            }
            $data['video_mp4_path'] = $request->file('video_mp4')->store('hero', 'public');
        }

        if ($request->hasFile('video_ogg')) {
            if ($hero->video_ogg_path && Storage::disk('public')->exists($hero->video_ogg_path)) {
                Storage::disk('public')->delete($hero->video_ogg_path);
            }
            $data['video_ogg_path'] = $request->file('video_ogg')->store('hero', 'public');
        }

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? $hero->display_order;

        $hero->update($data);

        return redirect()->route('admin.heroes.index')->with('success', 'Hero updated.');
    }

}
