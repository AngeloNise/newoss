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
    public function showInCampus(Request $request)
    {
        $currentDateTime = \Carbon\Carbon::now();
        
        // Get the search term from the request
        $search = $request->get('search');
        
        // Define the current page for upcoming and ended events separately
        $upcomingPage = $request->get('upcoming_page', 1);  // Default to page 1 if not present
        $endedPage = $request->get('ended_page', 1);  // Default to page 1 if not present
        
        // Upcoming Events: events that are in the future but not expired (not 24 hours past the event date)
        $upcomingEvents = Event::where('category', 'In-Campus')
            ->where('event_date', '>', $currentDateTime) // Future events
            ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Ensure the event is not expired
            ->when($search, function($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                          ->orWhere('colleges', 'like', '%' . $search . '%');
                })
                ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)); // Apply time restriction
            })
            ->paginate(12, ['*'], 'upcoming_page', $upcomingPage);
        
        // Ended Events: events that are in the past but less than 24 hours old
        $endedEvents = Event::where('category', 'In-Campus')
            ->where('event_date', '<=', $currentDateTime) // Past events
            ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Ensure it's within the 24-hour period
            ->orderBy('event_date', 'desc') // Sort events by event_date in descending order
            ->paginate(12, ['*'], 'ended_page', $endedPage);
        
        // Pass both sets of events to the view
        return view('org.auth.sidebar.incampus', compact('upcomingEvents', 'endedEvents', 'search'));
    }
    
    public function showGuestInCampus(Request $request)
    {
        $currentDateTime = \Carbon\Carbon::now();
        
        // Get the search term from the request
        $search = $request->get('search');
        
        // Define the current page for upcoming and ended events separately
        $upcomingPage = $request->get('upcoming_page', 1);  // Default to page 1 if not present
        $endedPage = $request->get('ended_page', 1);  // Default to page 1 if not present
        
        // Upcoming Events: events that are in the future but not expired (not 24 hours past the event date)
        $upcomingEvents = Event::where('category', 'In-Campus')
            ->where('event_date', '>', $currentDateTime) // Future events
            ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Ensure the event is not expired
            ->when($search, function($query, $search) {
                return $query->where(function ($query) use ($search) {
                    $query->where('title', 'like', '%' . $search . '%')
                          ->orWhere('colleges', 'like', '%' . $search . '%');
                })
                ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)); // Apply time restriction
            })
            ->paginate(12, ['*'], 'upcoming_page', $upcomingPage);
        
        // Ended Events: events that are in the past but less than 24 hours old
        $endedEvents = Event::where('category', 'In-Campus')
            ->where('event_date', '<=', $currentDateTime) // Past events
            ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Ensure it's within the 24-hour period
            ->orderBy('event_date', 'desc') // Sort events by event_date in descending order
            ->paginate(12, ['*'], 'ended_page', $endedPage);
        
        // Return data to the guest view
        return view('guest.incampusg', compact('upcomingEvents', 'endedEvents', 'search'));
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

    public function adminIndex(Request $request)
    {
        $currentDateTime = \Carbon\Carbon::now();
        $search = $request->get('search');
    
        // Upcoming Events: events that are in the future but not expired (not 24 hours past the event date)
        $upcomingEvents = Event::where('event_date', '>', $currentDateTime) // Future events
                                ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Ensure the event is not expired
                                ->when($search, function ($query, $search) {
                                    return $query->where(function ($query) use ($search) {
                                        $query->where('title', 'like', '%' . $search . '%')
                                              ->orWhere('colleges', 'like', '%' . $search . '%');
                                    });
                                })
                                ->paginate(12, ['*'], 'upcoming_page', $request->get('upcoming_page', 1));
    
        // Ended Events: events that are in the past but less than 24 hours old
        $endedEvents = Event::where('event_date', '<=', $currentDateTime) // Past events
                            ->where('event_date', '>', \Carbon\Carbon::now()->subHours(24)) // Ensure it's within the 24-hour period
                            ->orderBy('event_date', 'desc') // Sort events by event_date in descending order
                            ->paginate(12, ['*'], 'ended_page', $request->get('ended_page', 1));
    
        return view('faculty.auth.managepost', compact('upcomingEvents', 'endedEvents'));
    }
    

    // Faculty: show form to create event
    public function facultyCreate()
    {
        return view('faculty.auth.faculty_create_event');
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