<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Campaign;
use App\Models\CampaignInquiry;

class CampaignController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $campaign = Campaign::where('slug', $slug)->firstOrFail();

        // Validation
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'required|string|max:10',
            'message' => 'nullable|string|max:100',
        ]);

        // Store Inquiry
        CampaignInquiry::create([
            'page' => $campaign->name,
            'name'        => $validated['name'],
            'email'       => $validated['email'],
            'phone'       => $validated['phone'],
            'message'     => $validated['message'],
        ]);

        return redirect()->back()->with('success', 'Thank You!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $campaign = Campaign::where('slug', $slug)->firstOrFail();
        return view('web.campaign', compact('campaign'));
    }
}
