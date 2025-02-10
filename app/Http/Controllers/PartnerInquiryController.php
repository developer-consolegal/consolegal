<?php
namespace App\Http\Controllers;

use App\Models\PartnerInquiry;
use Illuminate\Http\Request;

class PartnerInquiryController extends Controller
{

    // Store inquiry in database
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'required|string|max:20',
            'city'       => 'required|string|max:100',
            'state'      => 'required|string|max:100',
            'occupation' => 'required|string|max:100',
            'message'    => 'required|string|min:10',
        ]);

        // Store Inquiry
        PartnerInquiry::create($validated);

        if ($request->ajax()) {
            return response()->json(['success' => 'Your inquiry has been submitted successfully!']);
        }

        return redirect()->back()->with('success', 'Your inquiry has been submitted successfully!');
    }
}
