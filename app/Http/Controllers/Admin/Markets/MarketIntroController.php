<?php

namespace App\Http\Controllers\Admin\Markets;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Markets\MarketIntro;

class MarketIntroController extends Controller
{
       public function edit()
    {
        $item = MarketIntro::query()->first();
        return view('admin.markets.intro.edit', compact('item'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'head_title_en' => ['nullable','string','max:255'],
            'head_title_ar' => ['nullable','string','max:255'],
            'title_en' => ['nullable','string','max:255'],
            'title_ar' => ['nullable','string','max:255'],
            'description_en' => ['nullable','string'],
            'description_ar' => ['nullable','string'],
            'is_active' => ['nullable','boolean'],
        ]);

        $data['is_active'] = (bool)($request->input('is_active', 0));

        $item = MarketIntro::query()->first() ?? new MarketIntro();
        $item->fill($data)->save();

        return redirect()->route('admin.markets.intro.edit')->with('success', 'Markets intro updated.');
    }
}
