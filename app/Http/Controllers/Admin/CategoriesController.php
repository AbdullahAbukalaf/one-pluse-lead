<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $items = Categories::query()->orderBy('sort_order')->get();
        return view('admin.categories.index', compact('items'));
    }

    public function create()
    {
        return view('admin.categories.create');
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

        Categories::query()->create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created.');
    }

    public function edit(Categories $category)
    {
        $item = $category;
        return view('admin.categories.edit', compact('item'));
    }

    public function update(Request $request, Categories $category)
    {
        $data = $request->validate([
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'sort_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['sort_order'] = (int)($data['sort_order'] ?? 0);
        $data['is_active'] = (bool)($request->input('is_active', 0));

        $category->fill($data)->save();

        return redirect()->route('admin.categories.index')->with('success', 'Category updated.');
    }

    public function destroy(Categories $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted.');
    }
}
