<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;

class CampaignController extends Controller
{
    public function index()
    {
        $campaigns = Campaign::latest()->paginate(10);
        return view('campaign.index', compact('campaigns'));
    }
    
    public function create()
    {
        return view('campaign.create');
    }
    
    public function edit(Request $request, $id)
    { 
        $campaign = Campaign::findOrFail($id);
        return view('campaign.edit', compact('campaign'));
    }

    public function store(Request $request)
{

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'label' => 'nullable|string',
        'sub_paragraph' => 'nullable|string',
        'learn_more_link' => 'nullable|url',
        'slug' => 'required|unique:campaigns,slug',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'faqs' => 'nullable|array',
        'faqs.*.question' => 'nullable|string',
        'faqs.*.answer' => 'nullable|string',
        'analytics' => 'nullable|array',
        'happy_customers' => 'nullable|integer|min:0',
        'projects_completed' => 'nullable|integer|min:0',
        'years_of_experience' => 'nullable|integer|min:0',
        'team_members_count' => 'nullable|integer|min:0',
    ]);

    Campaign::create([
        'name' => $validated['name'],
        'label' => $validated['label'],
        'sub_paragraph' => $validated['sub_paragraph'],
        'learn_more_link' => $validated['learn_more_link'],
        'slug' => $validated['slug'],
        'meta_title' => $validated['meta_title'],
        'meta_description' => $validated['meta_description'],
        'faqs' => json_encode($validated['faqs']),
        'analytics' => json_encode($validated['analytics']),
        'happy_customers' => $validated['happy_customers'] ?? null,
        'projects_completed' => $validated['projects_completed'] ?? null,
        'years_of_experience' => $validated['years_of_experience'] ?? null,
        'team_members_count' => $validated['team_members_count'] ?? null,
    ]);

    return redirect()->route('admin.campaigns.index')->with('success', 'Campaign created successfully!');
}

public function update(Request $request, Campaign $campaign)
{

    // return $request->all();

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'label' => 'nullable|string',
        'sub_paragraph' => 'nullable|string',
        'learn_more_link' => 'nullable|url',
        'slug' => 'required|unique:campaigns,slug,' . $campaign->id,
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'faqs' => 'nullable|array',
        'faqs.*.question' => 'nullable|string',
        'faqs.*.answer' => 'nullable|string',
        'analytics' => 'nullable|array',
        'happy_customers' => 'nullable|integer|min:0',
        'projects_completed' => 'nullable|integer|min:0',
        'years_of_experience' => 'nullable|integer|min:0',
        'team_members_count' => 'nullable|integer|min:0',
    ]);

    $campaign->update([
        'name' => $validated['name'],
        'label' => $validated['label'] ?? null,
        'sub_paragraph' => $validated['sub_paragraph'] ?? null,
        'learn_more_link' => $validated['learn_more_link'] ?? null,
        'slug' => $validated['slug'],
        'meta_title' => $validated['meta_title'] ?? null,
        'meta_description' => $validated['meta_description'] ?? null,
        'faqs' => json_encode($validated['faqs'] ?? []),
        'analytics' => json_encode($validated['analytics'] ?? []),
        // 'description' => $validated['description'] ?? null,
        'happy_customers' => $validated['happy_customers'] ?? null,
        'projects_completed' => $validated['projects_completed'] ?? null,
        'years_of_experience' => $validated['years_of_experience'] ?? null,
        'team_members_count' => $validated['team_members_count'] ?? null,
    ]);

    return redirect()->route('admin.campaigns.index')->with('success', 'Campaign updated successfully!');
}

public function destroy(Campaign $campaign)
{
    $campaign->delete();
    return redirect()->route('admin.campaigns.index')->with('success', 'Campaign deleted successfully!');
}


}
