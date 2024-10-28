<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application; // Model for applications
use App\Models\Annexa; // Model for annexas
use Illuminate\Support\Facades\Session;

class CreateApplicationController extends Controller
{
    // Method to display the application admin view
    public function applicationAdmin()
    {
        // Fetch all applications if needed
        $applications = Application::all();
        return view('faculty.auth.applicationadmin', compact('applications'));
    }

    // Method to show the application creation form
    public function create()
    {
        // Retrieve data from the annexas table
        $annexas = Annexa::all(); // Fetch all annexas or modify based on specific requirements
        return view('faculty.auth.createapp.application', compact('annexas'));
    }

    // Method to handle the form submission for creating an application
    public function store(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name_of_project' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date', // Ensure end_date is after start_date
            'requesting_organization' => 'required|string|max:255',
            'college_branch' => 'required|string|max:255',
            'total_estimated_income' => 'required|string|min:0', // Changed from numeric to string
            'email' => 'required|email', // If you're capturing email, include validation
            'activity' => 'nullable|string',
        ]);

        // Create a new application record
        Application::create($request->all());

        // Set a session flash message for success
        Session::flash('success', 'Application created successfully.');

        // Redirect to the application admin route after successful creation
        return redirect()->route('application.admin'); 
    }
}
