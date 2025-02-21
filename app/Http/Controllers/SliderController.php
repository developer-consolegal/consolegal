<?php
namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::orderBy('timestamp', 'desc')->simplePaginate(20);
        return view('sliders.index', compact('sliders'));
    }

    public function create()
    {
        return view('sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'label' => 'required',
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'active' => 'required|boolean',
        ]);

        // return $request->all();

        $image = $request->file('image');
        $imagePath = time() . '_appslider.' . $image->extension();
        $image->move(public_path('storage'), $imagePath);

        Slider::create([
            'label' => $request->label,
            'image' => $imagePath,
            'active' => $request->active,
        ]);

        return redirect()->route('admin.sliders.index')->with('success', 'Slider added successfully!');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('sliders.show', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $slider = Slider::findOrFail($id);

        $request->validate([
            'label' => 'required',
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'active' => 'required|boolean',
        ]);

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($slider->image);

            $image = $request->file('image');
            $imagePath = time() . '_appslider.' . $image->extension();
            $image->move(public_path('storage'), $imagePath);

            $slider->image = $imagePath;
        }

        $slider->label = $request->label;
        $slider->active = $request->active;
        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully!');
    }

    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);
        Storage::disk('public')->delete($slider->image);
        $slider->delete();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider deleted successfully!');
    }
}
