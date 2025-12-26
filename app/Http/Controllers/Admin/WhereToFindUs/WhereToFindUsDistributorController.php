<?php

namespace App\Http\Controllers\Admin\WhereToFindUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhereToFindUs\WhereToFindUsDistributor;
use Illuminate\Support\Facades\Storage;

class WhereToFindUsDistributorController extends Controller
{
    public function index()
    {
        $items = WhereToFindUsDistributor::orderByDesc('id')->paginate(20);
        return view('admin.where_to_find_us.distributors.index', compact('items'));
    }

    public function create()
    {
        return view('admin.where_to_find_us.distributors.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_en' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
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
            'map_embed_url' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'logo' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('where-to-find-us/distributors', 'public');
        }

        WhereToFindUsDistributor::create($data);

        return redirect()->route('admin.where-to-find-us.distributors.index')
            ->with('success', 'Distributor created successfully.');
    }

    public function edit(WhereToFindUsDistributor $distributor)
    {
        $item = $distributor;
        return view('admin.where_to_find_us.distributors.edit', compact('item'));
    }

    public function update(Request $request, WhereToFindUsDistributor $distributor)
    {
        $data = $request->validate([
            'name_en' => ['required', 'string', 'max:255'],
            'name_ar' => ['required', 'string', 'max:255'],
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
            'map_embed_url' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'website' => ['nullable', 'url', 'max:255'],
            'logo' => ['nullable', 'file' , 'mimes:jpeg,png,jpg,gif,svg', 'max:5120'],
            'is_active' => ['nullable', 'boolean'],
        ]);

        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('logo')) {
            if ($distributor->logo && Storage::disk('public')->exists($distributor->logo)) {
                Storage::disk('public')->delete($distributor->logo);
            }
            $data['logo'] = $request->file('logo')->store('where-to-find-us/distributors', 'public');
        }

        $distributor->update($data);

        return redirect()->route('admin.where-to-find-us.distributors.index')
            ->with('success', 'Distributor updated successfully.');
    }

    public function destroy(WhereToFindUsDistributor $distributor)
    {
        if ($distributor->logo && Storage::disk('public')->exists($distributor->logo)) {
            Storage::disk('public')->delete($distributor->logo);
        }

        $distributor->delete();

        return redirect()->route('admin.where-to-find-us.distributors.index')
            ->with('success', 'Distributor deleted successfully.');
    }
}
