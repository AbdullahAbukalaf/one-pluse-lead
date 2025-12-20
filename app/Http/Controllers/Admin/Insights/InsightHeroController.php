<?php

namespace App\Http\Controllers\Admin\Insights;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insights\InsightHero;
use Illuminate\Support\Facades\Storage;

class InsightHeroController extends Controller
{
    public function edit()
    {
        $item = InsightHero::query()->first();
        return view('admin.insights.hero.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'video' => ['nullable','file','mimes:mp4,webm,ogg','max:51200'],
            'is_active' => ['nullable','boolean'],
        ]);

        $item = InsightHero::query()->first() ?? new InsightHero();
        $item->is_active = (bool)($request->input('is_active', 0));

        if ($request->hasFile('video')) {
            if (!empty($item->video_path) && Storage::disk('public')->exists($item->video_path)) {
                Storage::disk('public')->delete($item->video_path);
            }
            $item->video_path = $request->file('video')->store('insights/hero', 'public');
        }

        $item->save();

        return redirect()->route('admin.insights.hero.edit')->with('success', 'Insight hero updated.');
    }
}
