<?php

namespace App\Http\Controllers\Site\WhereToFindUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhereToFindUs\WhereToFindUsHero;
use App\Models\WhereToFindUs\WhereToFindUsLocation;
use App\Models\WhereToFindUs\WhereToFindUsDistributor;

class WhereToFindUsController extends Controller
{
    public function index()
    {
        $hero = WhereToFindUsHero::where('is_active', true)->first();

        $locations = WhereToFindUsLocation::where('is_active', true)
            ->orderBy('country_en')
            ->orderBy('city_en')
            ->orderBy('id')
            ->get();

        $distributors = WhereToFindUsDistributor::where('is_active', true)
            ->orderBy('country_en')
            ->orderBy('name_en')
            ->orderBy('id')
            ->get();

        return view('site.whereToFindUs', compact('hero', 'locations', 'distributors'));
    }
}
