<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Gate;


class EventController extends Controller
{
    // Method to show all In-Campus events
    public function showInCampus()
    {
        // Fetch events categorized as "In-Campus"
        $events = Event::where('category', 'In-Campus')->get();

        // Pass the events to the view
        return view('org.auth.sidebar.incampus', compact('events'));
    }

    // Method to show the form to create a new event
    public function create()
    {
        return view('org.auth.sidebar.create_event');
    }

    // Method to store a new event
    public function store(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'href' => 'required|url',
        'image' => 'required|image',
        'event_date' => 'required|date|after:today',
        'department' => 'required|string|max:255', // Validate the department input
    ]);

    // Handle the image upload
    $imagePath = $request->file('image')->store('events', 'public');

    // Create a new event, including department
    Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'href' => $request->href,
        'image' => $imagePath,
        'category' => 'In-Campus',
        'organization' => Auth::user()->name_of_organization,
        'event_date' => $request->event_date,
        'department' => $request->department, // Store department input
    ]);

    // Redirect to the In-Campus events page with a success message
    return redirect()->route('events.incampus')->with('success', 'Event created successfully!');
}


    // Method to delete an event
    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        // Check if the authenticated user belongs to the organization that created the event
        if (Auth::user()->name_of_organization !== $event->organization) {
            return redirect()->route('events.incampus')->with('error', 'You do not have permission to delete this event.');
        }

        $event->delete();
        return redirect()->route('events.incampus')->with('success', 'Event deleted successfully!');
    }

    // Method to edit an event
    public function edit($id)
    {
        $event = Event::findOrFail($id);

        // Check if the authenticated user belongs to the organization that created the event
        if (Auth::user()->name_of_organization !== $event->organization) {
            return redirect()->route('events.incampus')->with('error', 'You do not have permission to edit this event.');
        }

        // Pass the event data to the edit view
        return view('org.auth.sidebar.edit_event', compact('event'));
    }

    // Method to update an event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'href' => 'required|url',
            'image' => 'required|image',
            'event_date' => 'required|date|after:today',
            'department' => 'required|string|max:255', // Validate the department input
        ]);

        // Handle image upload if a new image is uploaded
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }

        // Update the event details
        $event->title = $request->title;
        $event->description = $request->description;
        $event->href = $request->href;
        $event->event_date = $request->event_date;
        $event->department = $request->department; // Update the department input

        // Save the updated event data
        $event->save();

        // Redirect to the In-Campus events page with a success message
        return redirect()->route('events.incampus')->with('success', 'Event updated successfully!');
    }

    public function search(Request $request)
    {
        // Get the department search term from the request
        $department = $request->input('department');
    
        // Fetch events that match the department (case-insensitive) or return all if no department is specified
        $events = Event::when($department, function($query, $department) {
            return $query->where('department', 'LIKE', '%' . $department . '%');
        })->where('category', 'In-Campus')->get(); // Assuming we're only fetching In-Campus events
    
        // Return the view with the filtered events
        return view('guest.incampusg', compact('events'));
    }
    public function adminIndex()
    {
        $events = Event::all(); // Fetch all events or adjust as needed
        return view('faculty.auth.managepost', compact('events'));
    }

    //Faculty side
    public function facultyCreate()
{
    return view('faculty.auth.faculty_create_event');
}

public function facultyStore(Request $request)
{

    if (Gate::denies('create', Event::class)) {
        abort(403, 'Unauthorized action.');
    }
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'href' => 'required|url',
        'image' => 'required|image',
        'event_date' => 'required|date|after:today',
        'department' => 'required|string|max:255',
    ]);

    $imagePath = $request->file('image')->store('events', 'public');
     // Set organization value (replace 'Default Organization' with appropriate logic if needed)
     $organization = Auth::user()->name_of_organization ?? 'Default Organization';

     Event::create([
        'title' => $request->title,
        'description' => $request->description,
        'href' => $request->href,
        'image' => $imagePath,
        'category' => 'In-Campus',
        'organization' => $organization, // Make sure this is not null
        'event_date' => $request->event_date,
        'department' => $request->department,
    ]);

    return redirect()->route('faculty.managePost')->with('success', 'Event created successfully!');
}

public function facultyEdit($id)
{
    $event = Event::findOrFail($id);
    return view('faculty.auth.faculty_edit_event', compact('event'));
}

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
        'image' => 'required|image',
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

public function facultyDestroy($id)
{
    $event = Event::findOrFail($id);

    // Optional: Add authorization check if needed
    if (Gate::denies('delete', $event)) {
        abort(403, 'Unauthorized action.');
    }

    $event->delete();
    return redirect()->route('faculty.managePost')->with('success', 'Event deleted successfully!');
}


}