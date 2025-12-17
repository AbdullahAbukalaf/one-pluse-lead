<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreServiceRequest;
use App\Http\Requests\Admin\UpdateServiceRequest;
use Illuminate\Http\Request;
use App\Models\Home\Service;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $items = Service::ordered()->latest()->paginate(12);
        return view('admin.Home.services.index', compact('items'));
    }

    public function create()
    {
        return view('admin.Home.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();

        // handle SVG upload -> storage/app/public/svgs/...
        if ($request->hasFile('icon_svg')) {
            // (optional) give it a random safe name
            $filename = Str::random(20) . '.svg';
            $request->file('icon_svg')->storeAs('svgs', $filename, 'public');
            $data['icon_svg_path'] = "svgs/{$filename}";
        }

        $data['is_active']     = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? 0;

        Service::create($data);

        return redirect()->route('admin.services.index')->with('success', 'Service created.');
    }

    public function edit(Service $service)
    {
        return view('admin.Home.services.edit', ['item' => $service]);
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        // Only trusted, validated inputs (excluding the file)
        $data = $request->safe()->except('icon_svg');

        // File replace if a new SVG is uploaded
        if ($request->hasFile('icon_svg')) {
            // delete old file if present
            if ($service->icon_svg_path && Storage::disk('public')->exists($service->icon_svg_path)) {
                Storage::disk('public')->delete($service->icon_svg_path);
            }

            $filename = Str::random(20) . '.svg';
            $request->file('icon_svg')->storeAs('svgs', $filename, 'public');
            $data['icon_svg_path'] = "svgs/{$filename}";
        }

        // defaults/casts
        $data['is_active']     = $request->boolean('is_active');
        $data['display_order'] = $data['display_order'] ?? $service->display_order;

        $service->fill($data)->save();

        return redirect()->route('admin.services.index')->with('success', 'Service updated.');
    }

    public function destroy(Service $service)
    {
        // delete file
        if (!empty($service->icon_svg_path) && Storage::disk('public')->exists($service->icon_svg_path)) {
            Storage::disk('public')->delete($service->icon_svg_path);
        }

        $service->delete();
        return back()->with('success', 'Service deleted.');
    }
}
