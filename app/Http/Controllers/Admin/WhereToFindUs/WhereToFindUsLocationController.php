<?php

namespace App\Http\Controllers\Admin\WhereToFindUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhereToFindUs\WhereToFindUsLocation;


class WhereToFindUsLocationController extends Controller
{
    public function index()
    {
        $items = WhereToFindUsLocation::orderByDesc('id')->paginate(20);
        return view('admin.where_to_find_us.locations.index', compact('items'));
    }

    public function create()
    {
        return view('admin.where_to_find_us.locations.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'country_en' => ['required', 'string', 'max:255'],
            'country_ar' => ['required', 'string', 'max:255'],
            'city_en' => ['required', 'string', 'max:255'],
            'city_ar' => ['required', 'string', 'max:255'],
            'district_en' => ['nullable', 'string', 'max:255'],
            'district_ar' => ['nullable', 'string', 'max:255'],
            'address_en' => ['required', 'string'],
            'address_ar' => ['required', 'string'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'map_embed_url' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        WhereToFindUsLocation::create($data);

        return redirect()->route('admin.where-to-find-us.locations.index')
            ->with('success', 'Location created successfully.');
    }

    public function edit(WhereToFindUsLocation $location)
    {
        $item = $location;
        return view('admin.where_to_find_us.locations.edit', compact('item'));
    }

    public function update(Request $request, WhereToFindUsLocation $location)
    {
        $data = $request->validate([
            'country_en' => ['required', 'string', 'max:255'],
            'country_ar' => ['required', 'string', 'max:255'],
            'city_en' => ['required', 'string', 'max:255'],
            'city_ar' => ['required', 'string', 'max:255'],
            'district_en' => ['nullable', 'string', 'max:255'],
            'district_ar' => ['nullable', 'string', 'max:255'],
            'address_en' => ['required', 'string'],
            'address_ar' => ['required', 'string'],
            'latitude' => ['nullable', 'numeric'],
            'longitude' => ['nullable', 'numeric'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'map_embed_url' => ['nullable', 'string'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        $location->update($data);

        return redirect()->route('admin.where-to-find-us.locations.index')
            ->with('success', 'Location updated successfully.');
    }

    public function destroy(WhereToFindUsLocation $location)
    {
        $location->delete();

        return redirect()->route('admin.where-to-find-us.locations.index')
            ->with('success', 'Location deleted successfully.');
    }
}
