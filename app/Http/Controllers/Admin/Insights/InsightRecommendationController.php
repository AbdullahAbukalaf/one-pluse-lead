<?php

namespace App\Http\Controllers\Admin\Insights;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Insights\InsightRecommendation;

class InsightRecommendationController extends Controller
{
    public function index()
    {
        $items = InsightRecommendation::with(['insightType', 'category'])
            ->latest()
            ->paginate(10);

        return view('admin.insights.recommendations.index', compact('items'));
    }

    public function show(InsightRecommendation $recommendation)
    {
        $item = $recommendation;
        return view('admin.insights.recommendations.show', compact('item'));
    }

    public function destroy(InsightRecommendation $recommendation)
    {
        $recommendation->delete();
        return redirect()->route('admin.insights.recommendations.index')->with('success', 'Deleted.');
    }
}
