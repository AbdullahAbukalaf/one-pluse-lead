<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\PurchaseBanner;
use Illuminate\Http\Request;

class PurchaseBannerController extends Controller
{
   public function index()
    {
        $items = PurchaseBanner::query()
            ->orderBy('display_order')
            ->latest()
            ->paginate(12);

        return view('admin.Home.purchase_banners.index', compact('items'));
    }

    public function create()
    {
        return view('admin.Home.purchase_banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'key' => ['nullable','string','max:100'],
            'heading_en' => ['required','string','max:255'],
            'heading_ar' => ['required','string','max:255'],
            'button_text_en' => ['nullable','string','max:255'],
            'button_text_ar' => ['nullable','string','max:255'],
            'button_url' => ['nullable','string','max:255'],
            'display_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? 0;

        PurchaseBanner::create($data);

        return redirect()->route('admin.purchase-banners.index')->with('success', 'Banner created.');
    }

    public function edit(PurchaseBanner $purchase_banner)
    {
        return view('admin.Home.purchase_banners.edit', ['item' => $purchase_banner]);
    }

    public function update(Request $request, PurchaseBanner $purchase_banner)
    {
        $data = $request->validate([
            'key' => ['nullable','string','max:100'],
            'heading_en' => ['required','string','max:255'],
            'heading_ar' => ['required','string','max:255'],
            'button_text_en' => ['nullable','string','max:255'],
            'button_text_ar' => ['nullable','string','max:255'],
            'button_url' => ['nullable','string','max:255'],
            'display_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? $purchase_banner->display_order;

        $purchase_banner->update($data);

        return redirect()->route('admin.purchase-banners.index')->with('success', 'Banner updated.');
    }

    public function destroy(PurchaseBanner $purchase_banner)
    {
        $purchase_banner->delete();
        return back()->with('success', 'Banner deleted.');
    }
}
