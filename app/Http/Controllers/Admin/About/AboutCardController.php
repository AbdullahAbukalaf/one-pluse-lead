<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\About\AboutCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutCardController extends Controller
{
    public function index()
    {
        $items = AboutCard::latest()->get();
        return view('admin.about.cards.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about.cards.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'svg' => ['nullable', 'file', 'mimetypes:image/svg+xml', 'max:2048'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'title_ar' => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = (bool) $request->input('is_active', false);

        if ($request->hasFile('svg')) {
            $data['svg'] = $request->file('svg')->store('about/cards', 'public');
        }

        AboutCard::create($data);

        return redirect()
            ->route('admin.about.cards.index')
            ->with('success', 'Card added.');
    }


    public function edit(AboutCard $card)
    {
        return view('admin.about.cards.edit', ['item' => $card]);
    }

    public function update(Request $request, AboutCard $card)
    {
        $data = $request->validate([
            'svg' => ['nullable', 'file', 'mimetypes:image/svg+xml', 'max:2048'],
            'title_en' => ['nullable', 'string', 'max:255'],
            'title_ar' => ['nullable', 'string', 'max:255'],
            'description_en' => ['nullable', 'string'],
            'description_ar' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = (bool) $request->input('is_active', false);

        if ($request->hasFile('svg')) {
            if ($card->svg) {
                Storage::disk('public')->delete($card->svg);
            }
            $data['svg'] = $request->file('svg')->store('about/cards', 'public');
        }

        $card->update($data);

        return back()->with('success', 'Card updated.');
    }


    public function destroy(AboutCard $card)
    {
        $card->delete();
        return back()->with('success', 'Card deleted.');
    }
}
