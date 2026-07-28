<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('Admin.Event.index', compact('events'));
    }

    public function create()
    {
        return view('Admin.Event.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description'=>'required',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'nullable',
            'location' => 'required',
            'contact' => 'nullable',
            'image' => 'nullable|mimes:png,jpg',
        ]);

        if ($request->hasFile('image')) {
            $validatedData['image'] = $request->file('image')->store('images/events', 'public');
        }

        Event::create($validatedData);

        return redirect()->route('admin.event.index')->with('success', 'Event created successfully.');
    }
    public function edit($id)
{
    $event = Event::findOrFail($id);

    return view('Admin.Event.edit', compact('event'));
}
public function update(Request $request, $event)
{
    $event = Event::findOrFail($event);
    $validated = $request->validate([
        'title' => 'required',
        'description' => 'required',
        'date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'nullable',
        'location' => 'required',
        'contact' => 'required',
    ]);
    $event->update($validated);
    return redirect()->route('admin.event.index')->with('success', 'Event updated successfully!');
}
public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('admin.event.index')->with('success', 'Event deleted successfully.');
    }

}
