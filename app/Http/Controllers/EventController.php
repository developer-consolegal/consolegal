<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->simplePaginate(20);
        return view('events.index', compact('events'));
    }

    public function edit(Request $request, $id)
    {
        $event = Event::find($id);

        return view('events.edit', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|file|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'required|url',
            'event_date' => 'required|date',
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $image = $request->file('image');
        $imagePath = time() . "_gallery" . $image->extension();
        $image->move(public_path('storage'), $imagePath);

        Event::create([
            'image' => $imagePath,
            'link' => $request->link,
            'event_date' => $request->event_date,
            'label' => $request->label,
            'description' => $request->description,
        ]);

        return redirect()->route('events.index')->with('success', 'Event added successfully!');
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'image' => 'nullable|file|mimes:jpg,jpeg,png,webp|max:2048',
            'link' => 'nullable|url',
            'event_date' => 'nullable|date',
            'label' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // If a new image is uploaded, replace the old one
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($event->image); // Delete old image
            
            $image = $request->file('image');
            $imagePath = time() . "_gallery" . $image->extension();
            $image->move(public_path('storage'), $imagePath);
            $event->image = $imagePath;
        }

        // Update other fields
        $event->link = $request->link;
        $event->event_date = $request->event_date ?? $event->event_date;
        $event->label = $request->label;
        $event->description = $request->description;

        $event->save();

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        Storage::disk('public')->delete($event->image);

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
