<?php

namespace App\Http\Controllers\Admin\ContactUs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs\ContactUsSubmission;

class ContactUsSubmissionController extends Controller
{
    public function index()
    {
        $items = ContactUsSubmission::orderByDesc('id')->paginate(25);
        return view('admin.contact_us.submissions.index', compact('items'));
    }

    public function markRead(ContactUsSubmission $submission)
    {
        $submission->update(['is_read' => true]);
        return redirect()->back()->with('success', 'Marked as read');
    }

    public function destroy(ContactUsSubmission $submission)
    {
        $submission->delete();
        return redirect()->back()->with('success', 'Deleted successfully');
    }
}
