<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        Log::info('Form Submitted:', $request->all()); // Log the form data for debugging

        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'href' => 'required|url',
            'image' => 'required|image|max:2048',
            'event_date' => 'required|date|after:today', // Make sure to validate for datetime
        ]);

        try {
            // Handle the image upload
            $imagePath = $request->file('image')->store('events', 'public');

            // Create a new event
            Event::create([
                'title' => $request->title,
                'description' => $request->description,
                'href' => $request->href,
                'image' => $imagePath,
                'category' => 'In-Campus',
                'organization' => Auth::user()->name_of_organization,
                'event_date' => $request->event_date, // Store the datetime
            ]);
            // Set success message
            return redirect()->route('events.incampus')->with('success', 'Event created successfully!');
        } catch (\Exception $e) {
            // Log the exception for debugging
            Log::error('Error creating event: ' . $e->getMessage());

            return redirect()->route('events.create')->with('error', 'There was an error submitting the event.');
        }
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

        // Validate the request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'href' => 'required|url',
            'image' => 'nullable|image|max:2048',
            'event_date' => 'required|date|after:today', // Ensure event_date is updated
        ]);

        Log::info('Updating Event:', [
            'title' => $request->title,
            'event_date' => $request->event_date,
            'id' => $id,
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
        $event->event_date = $request->event_date; // Update the event date

        $event->save();

        return redirect()->route('events.incampus')->with('success', 'Event updated successfully!');
    }
}
