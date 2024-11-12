<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    // Show all In-Campus events
    public function showInCampus()
    {
        $events = Event::where('category', 'In-Campus')->get();
        foreach ($events as $event) {
            $event->image_url = Storage::url($event->image);
        }
        return view('org.auth.sidebar.incampus', compact('events'));
    }

    // Show form to create a new event
    public function create()
    {
        return view('org.auth.sidebar.create_event');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'href' => 'required|url',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,bmp|max:2048',  // Correct validation rule for image
            'event_date' => 'required|date|after:today',
            'department' => 'required|string|max:255',
        ]);
    
        // Store the image in the public storage directory and get the file path
        $imagePath = $request->file('image')->store('events', 'public');
    
        // Create the event in the database
        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'href' => $request->href,
            'image' => $imagePath,  // Save the image file path (not the validation rule)
            'category' => 'In-Campus',
            'organization' => Auth::user()->name_of_organization,
            'event_date' => $request->event_date,
            'department' => $request->department,
        ]);
    
        // Redirect the user with a success message
        return redirect()->route('events.incampus')->with('success', 'Event created successfully!');
    }

    // Delete an event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        if (Auth::user()->name_of_organization !== $event->organization) {
            return redirect()->route('events.incampus')->with('error', 'You do not have permission to delete this event.');
        }
        $event->delete();
        return redirect()->route('events.incampus')->with('success', 'Event deleted successfully!');
    }

    // Show the form to edit an event
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        if (Auth::user()->name_of_organization !== $event->organization) {
            return redirect()->route('events.incampus')->with('error', 'You do not have permission to edit this event.');
        }
        return view('org.auth.sidebar.edit_event', compact('event'));
    }

    // Update an event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'href' => 'required|url',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'required|date|after:today',
            'department' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }

        $event->title = $request->title;
        $event->description = $request->description;
        $event->href = $request->href;
        $event->event_date = $request->event_date;
        $event->department = $request->department;
        $event->save();

        return redirect()->route('events.incampus')->with('success', 'Event updated successfully!');
    }

    // Search for events by department
    public function search(Request $request)
    {
        $department = $request->input('department');
        $events = Event::when($department, function($query, $department) {
            return $query->where('department', 'LIKE', '%' . $department . '%');
        })->where('category', 'In-Campus')->get();

        foreach ($events as $event) {
            $event->image_url = Storage::url($event->image);
        }

        return view('guest.incampusg', compact('events'));
    }

    // Admin: view all events
    public function adminIndex()
    {
        $events = Event::all();
        return view('faculty.auth.managepost', compact('events'));
    }

    // Faculty: show form to create event
    public function facultyCreate()
    {
        return view('faculty.auth.faculty_create_event');
    }

    // Faculty: store a new event
    public function facultyStore(Request $request)
    {
        if (Gate::denies('create', Event::class)) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'href' => 'required|url',
            'image' => 'required|image|max:2048',
            'event_date' => 'required|date|after:today',
            'department' => 'required|string|max:255',
        ]);

        $imagePath = $request->file('image')->store('events', 'public');
        $organization = Auth::user()->name_of_organization ?? 'Default Organization';

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'href' => $request->href,
            'image' => $imagePath,
            'category' => 'In-Campus',
            'organization' => $organization,
            'event_date' => $request->event_date,
            'department' => $request->department,
        ]);

        return redirect()->route('faculty.managePost')->with('success', 'Event created successfully!');
    }

    // Faculty: show form to edit event
    public function facultyEdit($id)
    {
        $event = Event::findOrFail($id);
        return view('faculty.auth.faculty_edit_event', compact('event'));
    }

    // Faculty: update an event
    public function facultyUpdate(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        if (Gate::denies('update', $event)) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'href' => 'required|url',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'required|date|after:today',
            'department' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }

        $event->title = $request->title;
        $event->description = $request->description;
        $event->href = $request->href;
        $event->event_date = $request->event_date;
        $event->department = $request->department;
        $event->save();

        return redirect()->route('faculty.managePost')->with('success', 'Event updated successfully!');
    }

    // Faculty: delete an event
    public function facultyDestroy($id)
    {
        $event = Event::findOrFail($id);
        if (Gate::denies('delete', $event)) {
            abort(403, 'Unauthorized action.');
        }
        $event->delete();
        return redirect()->route('faculty.managePost')->with('success', 'Event deleted successfully!');
    }
}
