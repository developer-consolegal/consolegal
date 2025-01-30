<?php
namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    // List all images
    public function index()
    {
        $images = Gallery::latest()->get();
        return view('gallery.index', compact('images'));
    }

    // Show form to upload an image
    public function edit(Request $request, $id)
    {
        $image = Gallery::find($id);

        return view('gallery.edit', compact('image'));
    }

    // Store a new image
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'meta' => 'nullable|string|max:255',
        ]);

        $image = $request->file('image');
        $imagePath = time() . "_gallery" . $image->extension();
        $image->move(public_path('storage'), $imagePath);

        Gallery::create([
            'image' => $imagePath,
            'meta' => $request->meta,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Image added successfully!');
    }

    public function update(Request $request, $id)
    {
        $image = Gallery::findOrFail($id);

        $request->validate([
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048', // Image is optional
            'meta' => 'nullable|string|max:255',
        ]);

        // If a new image is uploaded, replace the old one
        if ($request->hasFile('image')) {
            // Delete old image from storage
            Storage::disk('public')->delete($image->image);

            // Store new image
            $file = $request->file('image');
            $filePath = time() . "_gallery" . $file->extension();
            $file->move(public_path("storage"), $filePath);
            $image->image = $filePath;
        }

        // Update meta field
        $image->meta = $request->meta;
        $image->save();

        return redirect()->route('gallery.index')->with('success', 'Image updated successfully!');
    }

    // Delete an image
    public function destroy($id)
    {
        $image = Gallery::findOrFail($id);

        // Delete the image from storage
        Storage::disk('storage')->delete($image->image);

        $image->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully!');
    }
}
