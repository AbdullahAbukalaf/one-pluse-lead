<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs\ContactUsBanner;
use App\Models\ContactUs\ContactUsExploreLocator;
use App\Models\ContactUs\ContactUsFormSection;
use App\Models\ContactUs\ContactUsHero;
use App\Models\ContactUs\ContactUsInfo;
use App\Models\ContactUs\ContactUsSubmission;
use App\Models\ContactUs\ContactUsVideo;
use App\Models\Home\PurchaseBanner;

class ContactUsController extends Controller
{
     public function index()
    {
        return view('site.contact', [
            'hero' => ContactUsHero::where('is_active', true)->first(),
            'banner' => ContactUsBanner::where('is_active', true)->first(),
            'exploreLocator' => ContactUsExploreLocator::where('is_active', true)->first(),
            'formSection' => ContactUsFormSection::where('is_active', true)->first(),
            'info' => ContactUsInfo::where('is_active', true)
            ->with(['items' => fn($q) => $q->active()->orderBy('sort_order')])
            ->first(),
            'video' => ContactUsVideo::where('is_active', true)->first(),
            'banners' => PurchaseBanner::where('is_active', true)
            ->orderBy('display_order')
            ->get()
            ->keyBy('key'),
        ]);
    }

    public function submit(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email','max:255'],
            'phone' => ['required','string','max:50'],
            'subject' => ['nullable','string','max:255'],
            'message' => ['required','string','max:5000'],
        ]);

        $data['ip_address'] = $request->ip();
        $data['is_read'] = false;

        ContactUsSubmission::create($data);

        return redirect()->back()->with('success', __('common.sent_successfully') ?? 'Sent successfully');
    }
}
