<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    // List all team members
    public function index()
    {
        $teamMembers = TeamMember::latest()->simplePaginate(20);
        return view('team.index', compact('teamMembers'));
    }

    // Store a new team member in the database
    public function store(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            // 'is_expert' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        $profile = $request->file('profile_photo');
        $profile_path = time() . '_kyc.' . $profile->extension();
        $profile->move(public_path('storage'), $profile_path);

        TeamMember::create([
            'profile_photo' => $profile_path,
            'name' => $request->name,
            'designation' => $request->designation,
            'is_expert' => $request->is_expert,
            'description' => $request->description,
        ]);

        return redirect()->route('team.index')->with('success', 'Team member added successfully!');
    }

    // Show the form to edit a team member
    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('team.edit', compact('member'));
    }

    // Update a team member in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'profile_photo' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            // 'is_expert' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        $teamMember = TeamMember::findOrFail($id);

        $profilePhotoPath = "";

        if ($request->hasFile('profile_photo')) {
            // Delete the old photo
            if ($teamMember->profile_photo) {
                Storage::disk('public')->delete($teamMember->profile_photo);
            }

            $profile = $request->file('profile_photo');
            $url_name = time() . '_kyc.' . $profile->extension();
            $profile->move(public_path('storage'), $url_name);
            $profilePhotoPath = $url_name;
        } else {
            $profilePhotoPath = $teamMember->profile_photo;
        }

        $teamMember->update([
            'profile_photo' => $profilePhotoPath,
            'name' => $request->name,
            'designation' => $request->designation,
            'is_expert' => $request->is_expert,
            'description' => $request->description,
        ]);

        return redirect()->route('team.index')->with('success', 'Team member updated successfully!');
    }

    // Delete a team member
    public function destroy($id)
    {
        $teamMember = TeamMember::findOrFail($id);

        // Delete the profile photo
        if ($teamMember->profile_photo) {
            Storage::disk('public')->delete($teamMember->profile_photo);
        }

        $teamMember->delete();

        return redirect()->route('team.index')->with('success', 'Team member deleted successfully!');
    }
}
