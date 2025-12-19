<?php

namespace App\Http\Controllers\Admin\About;

use App\Http\Controllers\Controller;
use App\Models\About\BookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookServiceController extends Controller
{
 public function edit()
    {
        $item = BookService::first();
        return view('admin.about.book_service.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'image' => ['nullable','image','max:4096'],
            'is_active' => ['nullable','boolean'],
        ]);

        $item = BookService::firstOrCreate([]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('about', 'public');
            if ($item->image) Storage::disk('public')->delete($item->image);
        }

        $data['is_active'] = (bool) $request->input('is_active', false);
        $item->update($data);

        return back()->with('success', 'Book Service updated.');
    }
}
