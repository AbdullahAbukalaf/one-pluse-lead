<?php

namespace App\Http\Controllers\Admin\Markets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Markets\MarketService;
use Illuminate\Support\Facades\Storage;

class MarketServiceController extends Controller
{
    public function index()
    {
        $items = MarketService::query()->orderBy('sort_order')->get();
        return view('admin.markets.services.index', compact('items'));
    }

    public function create()
    {
        return view('admin.markets.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'image' => ['nullable','file','mimes:jpg,jpeg,png,webp,svg','max:4096'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['sort_order'] = (int)($data['sort_order'] ?? 0);
        $data['is_active'] = (bool)($request->input('is_active', 0));

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('markets/services', 'public');
        }

        MarketService::query()->create($data);

        return redirect()->route('admin.markets.services.index')->with('success', 'Service created.');
    }

    public function edit(MarketService $service)
    {
        $item = $service;
        return view('admin.markets.services.edit', compact('item'));
    }

    public function update(Request $request, MarketService $service)
    {
        $data = $request->validate([
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'image' => ['nullable','file','mimes:jpg,jpeg,png,webp,svg','max:4096'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['sort_order'] = (int)($data['sort_order'] ?? 0);
        $data['is_active'] = (bool)($request->input('is_active', 0));

        if ($request->hasFile('image')) {
            if (!empty($service->image) && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('markets/services', 'public');
        } else {
            unset($data['image']);
        }

        $service->fill($data)->save();

        return redirect()->route('admin.markets.services.index')->with('success', 'Service updated.');
    }

    public function destroy(MarketService $service)
    {
        if (!empty($service->image) && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }
        $service->delete();

        return redirect()->route('admin.markets.services.index')->with('success', 'Service deleted.');
    }
}
