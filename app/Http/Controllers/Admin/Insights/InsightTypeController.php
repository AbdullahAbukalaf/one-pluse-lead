<?php

namespace App\Http\Controllers\Admin\Insights;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insights\InsightType;

class InsightTypeController extends Controller
{
   public function index()
    {
        $items = InsightType::query()->orderBy('sort_order')->get();
        return view('admin.insights.types.index', compact('items'));
    }

    public function create()
    {
        return view('admin.insights.types.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['sort_order'] = (int)($data['sort_order'] ?? 0);
        $data['is_active'] = (bool)($request->input('is_active', 0));

        InsightType::query()->create($data);

        return redirect()->route('admin.insights.types.index')->with('success', 'Type created.');
    }

    public function edit(InsightType $type)
    {
        $item = $type;
        return view('admin.insights.types.edit', compact('item'));
    }

    public function update(Request $request, InsightType $type)
    {
        $data = $request->validate([
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['sort_order'] = (int)($data['sort_order'] ?? 0);
        $data['is_active'] = (bool)($request->input('is_active', 0));

        $type->fill($data)->save();

        return redirect()->route('admin.insights.types.index')->with('success', 'Type updated.');
    }

    public function destroy(InsightType $type)
    {
        $type->delete();
        return redirect()->route('admin.insights.types.index')->with('success', 'Type deleted.');
    }
}
