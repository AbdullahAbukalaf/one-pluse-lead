<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\AboutBlock;
use App\Models\Home\AboutFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AboutBlockController extends Controller
{
      public function index()
    {
        $items = AboutBlock::query()
            ->orderBy('display_order')
            ->latest()
            ->paginate(10);

        return view('admin.Home.about_blocks.index', compact('items'));
    }

    public function create()
    {
        return view('admin.Home.about_blocks.create');
    }

    public function store(Request $request)
    {
        $data = $this->validateBlock($request);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('about', 'public');
        }

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? 0;

        $block = AboutBlock::create($data);

        return redirect()->route('admin.about-blocks.edit', $block)->with('success', 'About block created.');
    }

    public function edit(AboutBlock $about_block)
    {
        $about_block->load(['features' => fn($q) => $q->orderBy('display_order')]);
        return view('admin.Home.about_blocks.edit', ['item' => $about_block]);
    }

    public function update(Request $request, AboutBlock $about_block)
    {
        $data = $this->validateBlock($request);

        if ($request->hasFile('image')) {
            if (!empty($about_block->image_path) && Storage::disk('public')->exists($about_block->image_path)) {
                Storage::disk('public')->delete($about_block->image_path);
            }
            $data['image_path'] = $request->file('image')->store('about', 'public');
        }

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? $about_block->display_order;

        $about_block->update($data);

        return back()->with('success', 'About block updated.');
    }

    public function destroy(AboutBlock $about_block)
    {
        if (!empty($about_block->image_path) && Storage::disk('public')->exists($about_block->image_path)) {
            Storage::disk('public')->delete($about_block->image_path);
        }
        $about_block->delete();

        return back()->with('success', 'About block deleted.');
    }

    // --- Features (nested inside edit page) ---
    public function storeFeature(Request $request, AboutBlock $about_block)
    {
        $data = $request->validate([
            'text_en' => ['required','string','max:255'],
            'text_ar' => ['required','string','max:255'],
            'display_order' => ['nullable','integer','min:0'],
            'icon_svg' => ['nullable','file','mimetypes:image/svg+xml','max:200'],
        ]);

        if ($request->hasFile('icon_svg')) {
            $filename = Str::random(20).'.svg';
            $request->file('icon_svg')->storeAs('svgs', $filename, 'public');
            $data['icon_svg_path'] = "svgs/{$filename}";
        }

        $data['display_order'] = $data['display_order'] ?? 0;
        $data['about_block_id'] = $about_block->id;

        AboutFeature::create($data);

        return back()->with('success', 'Feature added.');
    }

    public function destroyFeature(AboutFeature $feature)
    {
        if (!empty($feature->icon_svg_path) && Storage::disk('public')->exists($feature->icon_svg_path)) {
            Storage::disk('public')->delete($feature->icon_svg_path);
        }
        $feature->delete();

        return back()->with('success', 'Feature deleted.');
    }

    private function validateBlock(Request $request): array
    {
        return $request->validate([
            'outline_en' => ['nullable','string','max:255'],
            'outline_ar' => ['nullable','string','max:255'],
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'button_text_en' => ['nullable','string','max:255'],
            'button_text_ar' => ['nullable','string','max:255'],
            'button_url' => ['nullable','string','max:255'],
            'display_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
            'image' => ['nullable','image','max:4096'],
        ]);
    }
}
