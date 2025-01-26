<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
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

        $imagePath = $request->file('image')->store('events', 'public');

        Event::create([
            'image' => $imagePath,
            'link' => $request->link,
            'event_date' => $request->event_date,
            'label' => $request->label,
            'description' => $request->description,
        ]);

        return redirect()->route('events.index')->with('success', 'Event added successfully!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        Storage::disk('public')->delete($event->image);

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
