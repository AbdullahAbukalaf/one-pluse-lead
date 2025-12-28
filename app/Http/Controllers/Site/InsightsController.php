<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Insights\{
    InsightHero,
    InsightSection,
    InsightType,
    InsightRecommendation
};

class InsightsController extends Controller
{
      public function index()
    {
        $hero = InsightHero::query()->where('is_active', true)->first();
        $section = InsightSection::query()->where('is_active', true)->first();

        $types = InsightType::query()->where('is_active', true)->orderBy('sort_order')->get();
        $categories = Categories::query()->where('is_active', true)->orderBy('sort_order')->get();

        return view('site.insights', compact('hero', 'section', 'types', 'categories'));
    }

    public function storeRecommendation(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255'],
            'country' => ['nullable','string','max:255'],
            'bought_before' => ['required','in:yes,no'],
            'insight_type_id' => ['nullable','integer','exists:insight_types,id'],
            'category_id' => ['nullable','integer','exists:categories,id'],
            'recommendations' => ['nullable','string'],
        ]);
        $section = InsightSection::query()->where('is_active', true)->first();

        InsightRecommendation::query()->create([
            'outline_title_en' => $section->outline_title_en ?? null,
            'outline_title_ar' => $section->outline_title_ar ?? null,
            'title_en' => $section->title_en ?? null,
            'title_ar' => $section->title_ar ?? null,
            'description_en' => $section->description_en ?? null,
            'description_ar' => $section->description_ar ?? null,

            'name' => $data['name'],
            'email' => $data['email'],
            'country' => $data['country'] ?? null,
            'bought_before' => $data['bought_before'] === 'yes',
            'insight_type_id' => $data['insight_type_id'] ?? null,
            'category_id' => $data['category_id'] ?? null,
            'recommendations' => $data['recommendations'] ?? null,
            'is_active' => true,
        ]);

        return back()->with('success', __('insights.thank_you', [], app()->getLocale()) ?: 'Thank you!');
    }
}
