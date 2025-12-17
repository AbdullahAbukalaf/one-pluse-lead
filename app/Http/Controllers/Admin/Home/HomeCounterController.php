<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\HomeCounter;
use Illuminate\Http\Request;

class HomeCounterController extends Controller
{
    public function index()
    {
        $items = HomeCounter::query()
            ->orderBy('display_order')
            ->latest()
            ->paginate(12);

        return view('admin.Home.counters.index', compact('items'));
    }

    public function create()
    {
        return view('admin.Home.counters.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'value' => ['required','string','max:50'],
            'suffix' => ['nullable','string','max:20'],
            'description_en' => ['nullable','string','max:255'],
            'description_ar' => ['nullable','string','max:255'],
            'display_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? 0;

        HomeCounter::create($data);

        return redirect()->route('admin.counters.index')->with('success', 'Counter created.');
    }

    public function edit(HomeCounter $counter)
    {
        return view('admin.Home.counters.edit', ['item' => $counter]);
    }

    public function update(Request $request, HomeCounter $counter)
    {
        $data = $request->validate([
            'value' => ['required','string','max:50'],
            'suffix' => ['nullable','string','max:20'],
            'description_en' => ['nullable','string','max:255'],
            'description_ar' => ['nullable','string','max:255'],
            'display_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? $counter->display_order;

        $counter->update($data);

        return redirect()->route('admin.counters.index')->with('success', 'Counter updated.');
    }

    public function destroy(HomeCounter $counter)
    {
        $counter->delete();
        return back()->with('success', 'Counter deleted.');
    }
}
