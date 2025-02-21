<?php
namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->simplePaginate(20);
        return view('banners.index', compact('banners'));
    }

    public function create()
    {
        return view('banners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'label' => 'required|in:home,about,contact,services,other',
            'active' => 'required|boolean',
        ]);

        $image = $request->file('image');
        $imagePath = time() . '_appslider.' . $image->extension();
        $image->move(public_path('storage'), $imagePath);


        Banner::create([
            'image' => $imagePath,
            'label' => $request->label,
            'active' => $request->active,
        ]);

        return redirect()->route('admin.banners.index')->with('success', 'Banner added successfully!');
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);
        return view('banners.show', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        $request->validate([
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'label' => 'required|in:home,about,contact,services,other',
            'active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($banner->image);
            $image = $request->file('image');
            $imagePath = time() . '_appslider.' . $image->extension();
            $image->move(public_path('storage'), $imagePath);
            $banner->image = $imagePath;
        }

        $banner->label = $request->label;
        $banner->active = $request->active;
        $banner->save();

        return redirect()->route('admin.banners.index')->with('success', 'Banner updated successfully!');
    }

    public function destroy($id)
    {
        $banner = Banner::findOrFail($id);
        Storage::disk('public')->delete($banner->image);
        $banner->delete();

        return redirect()->route('admin.banners.index')->with('success', 'Banner deleted successfully!');
    }
}
