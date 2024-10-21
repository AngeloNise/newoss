<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application; // Import the Application model
use App\Models\User; // Import the User model to fetch organizations
use Illuminate\Support\Facades\Session;

class CreateApplicationController extends Controller
{
    public function create()
    {
        // Fetch and sort organization names from the users table
        $organizations = User::pluck('name_of_organization')->unique()->sort();

        return view('faculty.auth.createapp.application', compact('organizations')); // Ensure the path matches your view
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name_of_project' => 'required|string',
            'name_of_organization' => 'required|string',
            'proposed_activity' => 'required|string',
        ]);
    
        // Create a new application instance
        $application = new Application();
        $application->name_of_project = $validated['name_of_project'];
        $application->name_of_organization = $validated['name_of_organization'];
        $application->proposed_activity = $validated['proposed_activity']; // Assign the validated value
        $application->status = 'pending approval'; 
        $application->current_file_location = 'OSS'; 
        $application->submission_date = now();
    
        $application->save();
    
        Session::flash('success', 'Application created successfully.');
        return redirect()->route('faculty.applicationadmin')->with('success', 'Application created successfully!'); // Change here
    }

    // Method to display all applications
    public function index()
    {
        // Retrieve all applications from the database
        $applications = Application::all();
        
        // Log the applications to see if they are fetched correctly
        \Log::info($applications);
        
        // Return the view with the applications data
        return view('faculty.auth.applicationadmin', compact('applications'));
    }

    public function show($id)
    {
        // Find the application by ID or fail with a 404 error
        $application = Application::findOrFail($id);
    
        // Return the view with the application detail
        return view('faculty.auth.applicationadmindetails', compact('application')); // Updated to your new path
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|string',
            'current_file_location' => 'required|string',
        ]);

        $application = Application::findOrFail($id);
        $application->status = $validated['status'];
        $application->current_file_location = $validated['current_file_location'];
        $application->save();

        Session::flash('success', 'Application updated successfully.');
        return redirect()->route('faculty.applicationadmin')->with('success', 'Application updated successfully!');
    }

    // Add the applicationAdmin method here
    public function applicationAdmin()
    {
        // Retrieve all applications from the database
        $applications = Application::all();
        
        // Return the view with the applications data
        return view('faculty.auth.applicationadmin', compact('applications'));
    }
}
