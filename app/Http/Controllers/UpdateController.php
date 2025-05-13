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
            'link' => 'required|file'
        ]);

        $image = $request->file('link');
        $imagePath = time() . "_update_doc" . $image->extension();
        $image->move(public_path('storage'), $imagePath);

        Update::create([
            'title' => $request->title,
            'link' => $imagePath,
            'date' => now()->toDateString(),
        ]);

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

        $update = Update::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'nullable|file',
        ]);

        // If a new image is uploaded, replace the old one
        if ($request->hasFile('link')) {
            // Delete old image from storage
            Storage::disk('public')->delete($update->link);

            // Store new image
            $file = $request->file('link');
            $filePath = time() . "_update_doc" . $file->extension();
            $file->move(public_path("storage"), $filePath);
            $update->link = $filePath;
        }

        $update->title = $request->title;
        $update->save();

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