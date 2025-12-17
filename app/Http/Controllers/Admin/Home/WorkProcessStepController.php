<?php

namespace App\Http\Controllers\Admin\Home;

use App\Http\Controllers\Controller;
use App\Models\Home\WorkProcessStep;
use Illuminate\Http\Request;

class WorkProcessStepController extends Controller
{
     public function index()
    {
        $items = WorkProcessStep::query()
            ->orderBy('display_order')
            ->latest()
            ->paginate(12);

        return view('admin.Home.work_steps.index', compact('items'));
    }

    public function create()
    {
        return view('admin.Home.work_steps.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'step_number' => ['required','integer','min:1'],
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'display_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? 0;

        WorkProcessStep::create($data);

        return redirect()->route('admin.work-steps.index')->with('success', 'Work step created.');
    }

    public function edit(WorkProcessStep $work_step)
    {
        return view('admin.Home.work_steps.edit', ['item' => $work_step]);
    }

    public function update(Request $request, WorkProcessStep $work_step)
    {
        $data = $request->validate([
            'step_number' => ['required','integer','min:1'],
            'title_en' => ['required','string','max:255'],
            'title_ar' => ['required','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'display_order' => ['nullable','integer','min:0'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = (bool)($data['is_active'] ?? false);
        $data['display_order'] = $data['display_order'] ?? $work_step->display_order;

        $work_step->update($data);

        return redirect()->route('admin.work-steps.index')->with('success', 'Work step updated.');
    }

    public function destroy(WorkProcessStep $work_step)
    {
        $work_step->delete();
        return back()->with('success', 'Work step deleted.');
    }
}
