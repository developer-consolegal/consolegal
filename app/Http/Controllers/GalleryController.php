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
    public function create()
    {
        return view('gallery.create');
    }

    // Store a new image
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imagePath = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'image' => $imagePath,
        ]);

        return redirect()->route('gallery.index')->with('success', 'Image added successfully!');
    }

    // Delete an image
    public function destroy($id)
    {
        $image = Gallery::findOrFail($id);

        // Delete the image from storage
        Storage::disk('public')->delete($image->image);

        $image->delete();

        return redirect()->route('gallery.index')->with('success', 'Image deleted successfully!');
    }
}
