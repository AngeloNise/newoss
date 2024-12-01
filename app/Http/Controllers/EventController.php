<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    // Show all In-Campus events
    public function showInCampus(Request $request)
    {
        $currentDateTime = \Carbon\Carbon::now();
    
        // Define the current page for upcoming and ended events separately
        $upcomingPage = $request->get('upcoming_page', 1);  // Default to page 1 if not present
        $endedPage = $request->get('ended_page', 1);  // Default to page 1 if not present
    
        // Upcoming Events: events that are in the future but not expired (not 24 hours past the event date)
        $upcomingEvents = Event::where('category', 'In-Campus')
            ->where('event_date', '>', $currentDateTime)
            ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Make sure the event is not expired
            ->paginate(12, ['*'], 'upcoming_page', $upcomingPage);
    
        // Ended Events: events that are in the past but less than 24 hours old
        $endedEvents = Event::where('category', 'In-Campus')
            ->where('event_date', '<=', $currentDateTime)
            ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Ensure it's within the 24-hour period
            ->orderBy('event_date', 'desc') // Sort events by event_date in descending order
            ->paginate(12, ['*'], 'ended_page', $endedPage);
    
        // Pass both sets of events to the view
        return view('org.auth.sidebar.incampus', compact('upcomingEvents', 'endedEvents'));
    }

    public function showGuestInCampus(Request $request)
    {
        $currentDateTime = \Carbon\Carbon::now();
    
        // Define the current page for upcoming and ended events separately
        $upcomingPage = $request->get('upcoming_page', 1);  // Default to page 1 if not present
        $endedPage = $request->get('ended_page', 1);  // Default to page 1 if not present
    
        // Upcoming Events: events that are in the future but not expired (not 24 hours past the event date)
        $upcomingEvents = Event::where('category', 'In-Campus')
            ->where('event_date', '>', $currentDateTime)
            ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Make sure the event is not expired
            ->paginate(12, ['*'], 'upcoming_page', $upcomingPage);
    
        // Ended Events: events that are in the past but less than 24 hours old
        $endedEvents = Event::where('category', 'In-Campus')
            ->where('event_date', '<=', $currentDateTime)
            ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Ensure it's within the 24-hour period
            ->orderBy('event_date', 'desc') // Sort events by event_date in descending order
            ->paginate(12, ['*'], 'ended_page', $endedPage);
    
        // Return data to the guest view
        return view('guest.incampusg', compact('upcomingEvents', 'endedEvents'));
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
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,bmp|:7000',
            'eligible' => 'required|string|max:255',
            'event_date' => 'required|date|after:today',
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
            'eligible' => $request->eligible,
            'colleges' => $request->colleges,
            'event_date' => $request->event_date,
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
        // Fetch the event to be edited
        $event = Event::findOrFail($id);
    
        // Check if the logged-in user has permission to edit the event
        if (Auth::user()->name_of_organization !== $event->organization) {
            return redirect()->route('events.incampus')->with('error', 'You do not have permission to edit this event.');
        }
    
        // Return the view with the event data to be edited
        return view('org.auth.sidebar.edit_event', compact('event'));
    }
    
    public function update(Request $request, $id)
    {
        // Fetch the event to be updated
        $event = Event::findOrFail($id);
    
        // Check if the logged-in user has permission to edit the event
        if (Auth::user()->name_of_organization !== $event->organization) {
            return redirect()->route('events.incampus')->with('error', 'You do not have permission to edit this event.');
        }
    
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'href' => 'required|url',
            'image' => 'nullable|image|max:2048',
            'eligible' => 'required|string|max:255',
            'event_date' => 'required|date|after:today',
            'colleges' => 'required|string|max:255',
        ]);
    
        // Handle the image upload if there is a new image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }
    
        // Update event data
        $event->title = $request->title;
        $event->description = $request->description;
        $event->href = $request->href;
        $event->eligible = $request->eligible;
        $event->event_date = $request->event_date;
        $event->colleges = $request->colleges;
        $event->save();
    
        // Redirect to the events list with a success message
        return redirect()->route('events.incampus')->with('success', 'Event updated successfully!');
    }
    
    

    // Search for events by colleges
    public function search(Request $request)
    {
        $colleges = $request->input('colleges');
        $events = Event::when($colleges, function($query, $colleges) {
            return $query->where('colleges', 'LIKE', '%' . $colleges . '%');
        })->where('category', 'In-Campus')->get();

        foreach ($events as $event) {
            $event->image_url = Storage::url($event->image);
        }

        return view('guest.incampusg', compact('events'));
    }

    public function searchorg(Request $request)
    {
        $query = Event::query();

        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('colleges', 'like', '%' . $search . '%');
        }

        $events = $query->paginate(10);

        return view('org.auth.sidebar.incampus', compact('events'));
    }

    // Admin: view all events
    public function adminIndex(Request $request)
    {
        $currentDateTime = \Carbon\Carbon::now();
    
        // Upcoming Events: events that are in the future
        $upcomingEvents = Event::where('event_date', '>', $currentDateTime)
                                ->paginate(12, ['*'], 'upcoming_page', $request->get('upcoming_page', 1));
    
        // Ended Events: events that are in the past
        $endedEvents = Event::where('event_date', '<=', $currentDateTime)
                            ->orderBy('event_date', 'desc') // Sort by event_date in descending order
                            ->paginate(12, ['*'], 'ended_page', $request->get('ended_page', 1));
    
        return view('faculty.auth.managepost', compact('upcomingEvents', 'endedEvents'));
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
            'colleges' => 'required|string|max:255',
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
            'eligible' => $request->eligible,
            'colleges' => $request->colleges,
            'event_date' => $request->event_date,
        ]);

        return redirect()->route('faculty.managePost')->with('success', 'Event created successfully!');
    }

    public function manageEvents(Request $request)
    {
        $currentDateTime = \Carbon\Carbon::now();
    
        // Define the current page for upcoming and ended events separately
        $upcomingPage = $request->get('upcoming_page', 1);  // Default to page 1 if not present
        $endedPage = $request->get('ended_page', 1);  // Default to page 1 if not present
    
        // Upcoming Events: events that are in the future
        $upcomingEvents = Event::where('organization', Auth::user()->name_of_organization)
            ->where('event_date', '>', $currentDateTime)
            ->paginate(12, ['*'], 'upcoming_page', $upcomingPage);
    
        // Ended Events: events that are in the past
        $endedEvents = Event::where('organization', Auth::user()->name_of_organization)
            ->where('event_date', '<=', $currentDateTime)
            ->orderBy('event_date', 'desc') // Sort by event_date in descending order
            ->paginate(12, ['*'], 'ended_page', $endedPage);
    
        // Pass both sets of events to the view
        return view('org.auth.sidebar.manage_events', compact('upcomingEvents', 'endedEvents'));
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
            'colleges' => 'required|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('events', 'public');
            $event->image = $imagePath;
        }

        $event->title = $request->title;
        $event->description = $request->description;
        $event->href = $request->href;
        $event->event_date = $request->event_date;
        $event->colleges = $request->colleges;
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

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|string|in:With Deficiencies,Without Deficiencies',
        ]);
    
        $organization = User::findOrFail($id);
        $organization->status = $request->status;
        $organization->save();
    
        return redirect()->back()->with('success', 'Status updated successfully.');
    }
    
    

    public function updateRemarks(Request $request, $id)
    {
        $request->validate([
            'remarks' => 'nullable|string|max:255',
        ]);

        $organization = User::findOrFail($id);
        $organization->remarks = $request->remarks; // Save the remarks
        $organization->save();

        return redirect()->back()->with('success', 'Remarks updated successfully.');
    }



}
