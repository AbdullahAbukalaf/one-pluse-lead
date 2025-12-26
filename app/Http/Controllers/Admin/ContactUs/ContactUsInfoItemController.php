<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs\ContactUsInfo;
use App\Models\ContactUs\ContactUsInfoItem;
use Illuminate\Validation\Rule;

class ContactUsInfoItemController extends Controller
{
     private const GROUPS = ['address', 'hours', 'phone', 'email'];

    public function index(Request $request)
    {
        $info = ContactUsInfo::firstOrCreate(['id' => 1], [
            'map_embed_url' => 'https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed',
            'is_active' => true,
        ]);

        $group = $request->get('group'); // optional filter

        $items = ContactUsInfoItem::where('contact_us_info_id', $info->id)
            ->when($group, fn($q) => $q->where('group', $group))
            ->orderBy('group')
            ->orderBy('sort_order')
            ->paginate(20);

        return view('admin.contact_us.info_items.index', compact('items', 'info', 'group'));
    }

    public function create()
    {
        $info = ContactUsInfo::firstOrCreate(['id' => 1], [
            'map_embed_url' => 'https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed',
            'is_active' => true,
        ]);

        $groups = self::GROUPS;
        return view('admin.contact_us.info_items.create', compact('info', 'groups'));
    }

    public function store(Request $request)
    {
        $info = ContactUsInfo::firstOrCreate(['id' => 1], [
            'map_embed_url' => 'https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed',
            'is_active' => true,
        ]);

        $validated = $this->validatePayload($request);

        $validated['contact_us_info_id'] = $info->id;
        ContactUsInfoItem::create($validated);

        return redirect()->route('admin.contact_us.info_items.index')->with('success', 'Created successfully');
    }

    public function edit(ContactUsInfoItem $info_item)
    {
        $groups = self::GROUPS;
        return view('admin.contact_us.info_items.edit', ['item' => $info_item, 'groups' => $groups]);
    }

    public function update(Request $request, ContactUsInfoItem $info_item)
    {
        $validated = $this->validatePayload($request);
        $info_item->update($validated);

        return redirect()->route('admin.contact_us.info_items.index')->with('success', 'Updated successfully');
    }

    public function destroy(ContactUsInfoItem $info_item)
    {
        $info_item->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }

    private function validatePayload(Request $request): array
    {
        $base = $request->validate([
            'group' => ['required', Rule::in(self::GROUPS)],
            'sort_order' => ['required', 'integer', 'min:1'],
            'is_active' => ['required', 'boolean'],
        ]);

        $group = $base['group'];

        // Conditional validation based on group
        if ($group === 'address') {
            return array_merge($base, $request->validate([
                'value_en' => ['required', 'string'],
                'value_ar' => ['required', 'string'],
                'label_en' => ['nullable'],
                'label_ar' => ['nullable'],
                'value' => ['nullable'],
            ]));
        }

        if ($group === 'hours') {
            return array_merge($base, $request->validate([
                'label_en' => ['required', 'string', 'max:255'],
                'label_ar' => ['required', 'string', 'max:255'],
                'value_en' => ['required', 'string', 'max:255'],
                'value_ar' => ['required', 'string', 'max:255'],
                'value' => ['nullable'],
            ]));
        }

        if ($group === 'phone') {
            return array_merge($base, $request->validate([
                'value' => ['required', 'string', 'max:50'],
                'label_en' => ['nullable'],
                'label_ar' => ['nullable'],
                'value_en' => ['nullable'],
                'value_ar' => ['nullable'],
            ]));
        }

        // email
        return array_merge($base, $request->validate([
            'value' => ['required', 'email', 'max:255'],
            'label_en' => ['nullable'],
            'label_ar' => ['nullable'],
            'value_en' => ['nullable'],
            'value_ar' => ['nullable'],
        ]));
    }
}
