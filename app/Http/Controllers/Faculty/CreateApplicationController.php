<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use App\Models\ApplicationLog;
use App\Models\User; // Import the User model to fetch organizations
use Illuminate\Support\Facades\Session;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Logo;
use Carbon\Carbon;

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

        $user = auth()->user();

        // Restriction: Check if the user already has a Fund Raising application with a status other than 'Returned'
        $existingApplication = Application::where('name_of_organization', $user->name_of_organization)
            ->where('status', '!=', 'Returned') // Exclude 'Returned' status
            ->where('proposed_activity', 'Fund Raising') // Check if the proposed activity is 'Fund Raising'
            ->first();
    
        if ($existingApplication) {
            Session::flash('error', 'You cannot submit a new Fund Raising application unless your previous application has been returned.');
            return redirect()->back();
        }
        
        // Validate the input
        $validated = $request->validate([
            'name_of_project' => 'required|string',
            'name_of_organization' => 'required|string',
            'proposed_activity' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'college_branch' => 'nullable|string',
            'total_estimated_income' => 'nullable',
            'place_of_activity' => 'nullable|string',
        ]);
    
        // Create a new application instance
        $application = new Application();
        $application->name_of_project = $validated['name_of_project'];
        $application->name_of_organization = $validated['name_of_organization'];
        $application->proposed_activity = $validated['proposed_activity']; // Assign the validated value
        $application->status = 'pending approval'; 
        $application->current_file_location = 'OSS'; 
        $application->submission_date = now();
        
        // Assign additional fields
        $application->start_date = $validated['start_date'];
        $application->end_date = $validated['end_date'];
        $application->college_branch = $validated['college_branch'];
        $application->total_estimated_income = $validated['total_estimated_income'];
        $application->place_of_activity = $validated['place_of_activity'];
    
        $application->save();
    
        Session::flash('success', 'Application created successfully.');
        return redirect()->route('faculty.application.admin')->with('success', 'Application created successfully!');

    }

    public function showPdfOptions()
    {
        return view('faculty.generatepdf.pdfoptions');
    }

    public function generateApplicationsPDF(Request $request)
    {
        $range = $request->input('range');
        $endDate = now();
        $startDate = null;
        $applications = collect(); // Default empty collection

        switch ($range) {
            case 'monthly':
                $startDate = $endDate->copy()->subMonth();
                $applications = Application::whereBetween('submission_date', [$startDate, $endDate])->get();
                break;
            case 'quarterly':
                $startDate = $endDate->copy()->subMonths(3);
                $applications = Application::whereBetween('submission_date', [$startDate, $endDate])->get();
                break;
            case 'semi_annually':
                $startDate = $endDate->copy()->subMonths(6);
                $applications = Application::whereBetween('submission_date', [$startDate, $endDate])->get();
                break;
            case 'annually':
                $startDate = $endDate->copy()->subYear();
                $applications = Application::whereBetween('submission_date', [$startDate, $endDate])->get();
                break;
            case 'custom':
                $startDate = Carbon::parse($request->input('custom_start'));
                $endDate = Carbon::parse($request->input('custom_end'));
                $applications = Application::whereBetween('submission_date', [$startDate, $endDate])->get();
                break;
            case 'all':
                $applications = Application::all(); // Fetch all applications without date filtering
                break;
        }

        // Determine date range display for the header
        $dateRange = $range === 'all' ? 'All Applications' : $startDate->format('M d, Y') . ' - ' . $endDate->format('M d, Y');

        $logo = Logo::first();
        $pdf = PDF::loadView('faculty.generatepdf.allapplicationspdf', compact('applications', 'logo', 'dateRange'));
        return $pdf->stream('filtered_applications.pdf');
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
        $application = Application::with('logs')->findOrFail($id); // Eager load logs
    
        return view('faculty.auth.applicationadmindetails', compact('application'));
    }

    public function update(Request $request, $id)
    {
        // Validate the input
        $validated = $request->validate([
            'status' => 'required|string',
            'current_file_location' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'college_branch' => 'nullable|string',
            'total_estimated_income' => 'nullable|numeric',
            'place_of_activity' => 'nullable|string',
        ]);
    
        // Find the application by ID or fail with a 404 error
        $application = Application::findOrFail($id);
    
        // Store old values before the update
        $oldValues = [
            'start_date' => $application->start_date,
            'end_date' => $application->end_date,
            'total_estimated_income' => $application->total_estimated_income,
            'status' => $application->status,
            'current_file_location' => $application->current_file_location,
            'submission_date' => $application->submission_date, // Assuming submission_date does not change
        ];
    
        // Update fields with new values
        $application->status = $validated['status'];
        $application->current_file_location = $validated['current_file_location'];
        $application->start_date = $validated['start_date'];
        $application->end_date = $validated['end_date'];
        $application->college_branch = $validated['college_branch'];
        $application->total_estimated_income = $validated['total_estimated_income'];
    
        // Save the application
        $application->save();
    
        // Create an array to hold changes for logging
        $logData = [];
    
        // Check for changes and prepare log data
        if ($oldValues['start_date'] !== $application->start_date) {
            $logData['start_date'] = json_encode([
                'old' => $oldValues['start_date'],
                'new' => $application->start_date
            ]);
        }
    
        if ($oldValues['end_date'] !== $application->end_date) {
            $logData['end_date'] = json_encode([
                'old' => $oldValues['end_date'],
                'new' => $application->end_date
            ]);
        }
    
        if ($oldValues['total_estimated_income'] !== $application->total_estimated_income) {
            $logData['total_estimated_income'] = json_encode([
                'old' => $oldValues['total_estimated_income'],
                'new' => $application->total_estimated_income
            ]);
        }
    
        if ($oldValues['status'] !== $application->status) {
            $logData['status'] = json_encode([
                'old' => $oldValues['status'],
                'new' => $application->status
            ]);
        }
    
        if ($oldValues['current_file_location'] !== $application->current_file_location) {
            $logData['current_file_location'] = json_encode([
                'old' => $oldValues['current_file_location'],
                'new' => $application->current_file_location
            ]);
        }
    
        // Only create a log entry if there are any changes
        if (!empty($logData)) {
            ApplicationLog::create(array_merge([
                'application_id' => $application->id,
                'submission_date' => $oldValues['submission_date'], // Assuming submission_date does not change
                'updated_at' => now(),
            ], $logData));
        }
    
        // Flash success message
        Session::flash('success', 'Application updated successfully.');
    
        // Redirect back to the admin applications route
        return redirect()->route('faculty.application.admin')->with('success', 'Application updated successfully!');
    }    

    // Add the applicationAdmin method here
    public function applicationAdmin()
    {
        // Retrieve all applications from the database
        $applications = Application::all();
        
        // Return the view with the applications data
        return view('faculty.auth.applicationadmin', compact('applications'));
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function createComment($id)
    {
        // Find the application by ID or fail
        $application = Application::findOrFail($id);
        
        // Pass the application to the renamed comment view
        return view('faculty.auth.createapp.applicationcomment', compact('application'));
    }
    

    public function storeComment(Request $request, $id)
    {
        // Validate the comment and document fields
        $validated = $request->validate([
            'comment' => 'required|string|max:500',
            'document' => 'required|string', // Add validation for the document field
        ]);
    
        // Find the application by ID
        $application = Application::findOrFail($id);
    
        // Save the comment
        $application->comments()->create([
            'comment' => $validated['comment'],
            'document' => $validated['document'], // Include document in the creation data
            'user_id' => auth()->id(), // Assuming user is authenticated
        ]);
    
        return redirect()->route('faculty.application.admin')->with('success', 'Comment added successfully.');
    }

    public function showComments($id)
    {
        $application = Application::findOrFail($id);
        $comments = $application->comments()->with('user')->get();
        
        return view('org.auth.sidebar.history.frahistorydetails', compact('application', 'comments'));
    }

    public function showApprovedApplications()
    {
        // Retrieve only approved applications
        $approvedApplications = Application::where('status', 'Approved')->get();

        // Pass the approved applications to the view
        return view('faculty.auth.postreportfra', compact('approvedApplications'));
    }
}
