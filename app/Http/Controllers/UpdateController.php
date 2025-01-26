<?php
namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    // List all updates
    public function index()
    {
        $updates = Update::latest()->simplePaginate(10);
        return view('updates.index', compact('updates'));
    }

    // Store update in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url'
        ]);

        Update::create($request->all());

        return redirect()->route('updates.index')->with('success', 'Update created successfully!');
    }

    // Show the form to edit an update
    public function edit($id)
    {
        $updates = Update::findOrFail($id);
        return view('updates.edit', compact('updates'));
    }

    // Update update in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
        ]);

        $update = Update::findOrFail($id);
        $update->update($request->all());

        return redirect()->route('updates.index')->with('success', 'Update updated successfully!');
    }

    // Delete update
    public function destroy($id)
    {
        $update = Update::findOrFail($id);
        $update->delete();

        return redirect()->route('updates.index')->with('success', 'Update deleted successfully!');
    }
}