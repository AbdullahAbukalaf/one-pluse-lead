<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
        $data = $this->validateCategory($request);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title_en']);
        }

        if ($request->hasFile('banner_image')) {
            $data['banner_image'] = $request->file('banner_image')->store('categories/banners', 'public');
        }

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
        $data = $this->validateCategory($request, $category->id);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title_en']);
        }

        if ($request->hasFile('banner_image')) {
            if ($category->banner_image) {
                Storage::disk('public')->delete($category->banner_image);
            }
            $data['banner_image'] = $request->file('banner_image')->store('categories/banners', 'public');
        } else {
            unset($data['banner_image']);
        }

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

    private function validateCategory(Request $request, ?int $ignoreId = null): array
    {
        $uniqueSlug = 'unique:categories,slug';
        if ($ignoreId) $uniqueSlug .= ',' . $ignoreId;

        return $request->validate([
            'title_en' => ['required', 'string', 'max:255'],
            'title_ar' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', $uniqueSlug],

            'banner_title_en' => ['nullable', 'string', 'max:255'],
            'banner_title_ar' => ['nullable', 'string', 'max:255'],
            'banner_description_en' => ['nullable', 'string'],
            'banner_description_ar' => ['nullable', 'string'],
            'banner_image' => ['nullable', 'file', 'mimes:jpeg,png,jpg,webp,svg', 'max:4096'],

            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['nullable', 'boolean'],
        ]);
    }
}
