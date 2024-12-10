<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\ApplicationLog;
use App\Models\User;
use App\Models\Application;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class CreateApplicationController extends Controller
{
    public function showPdfOptions()
    {
        // Fetch distinct organizations and branches
        $distinctOrganizations = Application::distinct()->pluck('name_of_organization');
        $distinctBranches = Application::distinct()->pluck('college_branch');
    
        // Return the view with the fetched data
        return view('faculty.generatepdf.pdfoptions', compact('distinctOrganizations', 'distinctBranches'));
    }
    
    public function generateApplicationsPDF(Request $request)
    {
        $range = $request->input('range');
        $activityType = $request->input('activity_type', 'all'); // Default to 'all' if not provided
        $endDate = now();
        $startDate = null;
        $dateRange = 'All Application'; // Default date range description
    
        // Start building the query
        $query = Application::query();
    
        // Apply activity type filter
        if ($activityType !== 'all') {
            $query->where('proposed_activity', $activityType);
        }
    
        // Apply date range filter
        switch ($range) {
            case 'monthly':
                $startDate = $endDate->copy()->subMonth();
                $query->whereBetween('submission_date', [$startDate, $endDate]);
                $dateRange = $startDate->format('M d, Y') . ' - ' . $endDate->format('M d, Y');
                break;
            case 'quarterly':
                $startDate = $endDate->copy()->subMonths(3);
                $query->whereBetween('submission_date', [$startDate, $endDate]);
                $dateRange = $startDate->format('M d, Y') . ' - ' . $endDate->format('M d, Y');
                break;
            case 'semi_annually':
                $startDate = $endDate->copy()->subMonths(6);
                $query->whereBetween('submission_date', [$startDate, $endDate]);
                $dateRange = $startDate->format('M d, Y') . ' - ' . $endDate->format('M d, Y');
                break;
            case 'annually':
                $startDate = $endDate->copy()->subYear();
                $query->whereBetween('submission_date', [$startDate, $endDate]);
                $dateRange = $startDate->format('M d, Y') . ' - ' . $endDate->format('M d, Y');
                break;
            case 'custom':
                $startDate = Carbon::parse($request->input('custom_start'));
                $endDate = Carbon::parse($request->input('custom_end'));
                $query->whereBetween('submission_date', [$startDate, $endDate]);
                $dateRange = $startDate->format('M d, Y') . ' - ' . $endDate->format('M d, Y');
                break;
            case 'all':
                // No date filtering for 'all' range
                $dateRange = 'All Application';
                break;
        }
    
        // Apply search filters
        if ($request->has('name_of_organization') && $request->name_of_organization) {
            $query->where('name_of_organization', 'like', '%' . $request->name_of_organization . '%');
        }
    
        if ($request->has('college_branch') && $request->college_branch) {
            $query->where('college_branch', 'like', '%' . $request->college_branch . '%');
        }
    
        // Get the filtered applications
        $applications = $query->get();
    
        // Fetch the logo for the PDF
        $logo = Logo::first();
    
        // Choose the correct view and filename based on the activity type
        switch ($activityType) {
            case 'off campus':
                $view = 'faculty.generatepdf.offcampusapplicationspdf';
                $filename = 'off_campus_applications.pdf';
                break;
            case 'fund raising':
                $view = 'faculty.generatepdf.fundraisingapplicationspdf';
                $filename = 'fund_raising_applications.pdf';
                break;
            case 'in campus':
                $view = 'faculty.generatepdf.incampusapplicationspdf';
                $filename = 'in_campus_applications.pdf';
                break;
            default:
                $view = 'faculty.generatepdf.allapplicationspdf';
                $filename = 'filtered_applications.pdf';
                break;
        }
    
        // Generate the PDF
        $pdf = Pdf::loadView($view, compact('applications', 'logo', 'dateRange'));
    
        // Stream the PDF
        return $pdf->stream($filename);
    }

    
    public function create()
    {
        // Fetch and sort organization names from the users table
        $organizations = User::pluck('name_of_organization')->unique()->sort();

        return view('faculty.auth.createapp.application', compact('organizations')); // Ensure the path matches your view
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        // Check if the user already has a Fund Raising application with a status other than 'Returned' and 'frapost' is not 'submitted'
        $existingApplication = Application::where('name_of_organization', $user->name_of_organization)
            ->where('proposed_activity', 'Fund Raising') // Check if the proposed activity is 'Fund Raising'
            ->where(function($query) {
                $query->where('status', '!=', 'Returned') // Exclude 'Returned' status
                      ->where('frapost', '!=', 'submitted'); // Exclude if 'frapost' is 'submitted'
            })
            ->first();
        
        // If an application exists and it's not eligible for a new submission
        if ($existingApplication) {
            Session::flash('error', 'You cannot submit a new Fund Raising application unless your previous application has been returned or the Frapost status is "submitted".');
            return redirect()->back();
        }
        
    
        // If no restriction, proceed with creating the new application
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
        $application->proposed_activity = $validated['proposed_activity'];
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
    

    public function updateFrapost(Request $request, $id)
    {
        // Find the application by its ID
        $application = Application::findOrFail($id);

        // Validate the 'frapost' field (ensure it's either 'not_submitted' or 'submitted')
        $validated = $request->validate([
            'frapost' => 'required|in:not_submitted,submitted', // Validate the 'frapost' field
        ]);

        // Update the 'frapost' field with the validated value
        $application->frapost = $validated['frapost'];
        
        // Save the updated application
        $application->save();

        // Redirect back to the list of approved applications with a success message
        return redirect()->route('faculty.post-activity-fra')->with('success', 'Frapost status updated successfully!');
    }


    // In your ApplicationController.php

    public function searchOrganizations(Request $request)
    {
        $query = $request->input('query');
        // Fetch unique organization names based on the query
        $organizations = Application::where('name_of_organization', 'like', '%' . $query . '%')
            ->distinct()
            ->pluck('name_of_organization');
        
        return response()->json($organizations);
    }

    public function searchBranches(Request $request)
    {
        $query = $request->input('query');
        // Fetch unique college branches based on the query
        $branches = Application::where('college_branch', 'like', '%' . $query . '%')
            ->distinct()
            ->pluck('college_branch');
        
        return response()->json($branches);
    }

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
        // Validate the input for application details
        $validated = $request->validate([
            'status' => 'required|string',
            'current_file_location' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'college_branch' => 'nullable|string',
            'total_estimated_income' => 'nullable|numeric',
            'place_of_activity' => 'nullable|string',
            'comment' => 'nullable|string|max:500', // Add validation for comment
            'document' => 'nullable|string', // Add validation for document
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
            'comment' => $application->comment, // Add the old comment value to the oldValues array
            'document' => $application->document, // Add the old document value to the oldValues array
        ];

        // Update fields with new values
        $application->status = $validated['status'];
        $application->current_file_location = $validated['current_file_location'];
        $application->start_date = $validated['start_date'];
        $application->end_date = $validated['end_date'];
        $application->college_branch = $validated['college_branch'];
        $application->total_estimated_income = $validated['total_estimated_income'];

        // Update the document if provided
        if (isset($validated['document']) && $validated['document'] !== null) {
            $application->document = $validated['document']; // Update the document field
        }

        // Update the comment if provided
        if (isset($validated['comment']) && $validated['comment'] !== null) {
            $application->comment = $validated['comment']; // Update the comment field
        }

        // Save the updated application
        $application->save();

        // Create an array to hold changes for logging
        $logData = [];
        $userName = auth()->user()->name;  // Capture the logged-in user's name

        // Check for changes and prepare log data
        if ($oldValues['comment'] !== $application->comment) {
            $logData['comment'] = json_encode([
                'new' => $application->comment,
            ]);
        }

        if ($oldValues['document'] !== $application->document) {
            $logData['document'] = json_encode([
                'new' => $application->document,
            ]);
        }

        if ($oldValues['start_date'] !== $application->start_date) {
            $logData['start_date'] = json_encode([
                'old' => $oldValues['start_date'],
                'new' => $application->start_date,
            ]);
        }

        if ($oldValues['end_date'] !== $application->end_date) {
            $logData['end_date'] = json_encode([
                'old' => $oldValues['end_date'],
                'new' => $application->end_date,
            ]);
        }

        if ($oldValues['total_estimated_income'] !== $application->total_estimated_income) {
            $logData['total_estimated_income'] = json_encode([
                'old' => $oldValues['total_estimated_income'],
                'new' => $application->total_estimated_income,
            ]);
        }

        if ($oldValues['status'] !== $application->status) {
            $logData['status'] = json_encode([
                'old' => $oldValues['status'],
                'new' => $application->status,
            ]);
        }

        if ($oldValues['current_file_location'] !== $application->current_file_location) {
            $logData['current_file_location'] = json_encode([
                'old' => $oldValues['current_file_location'],
                'new' => $application->current_file_location,
            ]);
        }

        // Only create a log entry if there are any changes
        if (!empty($logData)) {
            // Include the faculty name in the log data
            ApplicationLog::create(array_merge([
                'application_id' => $application->id,
                'updated_by' => $userName,  // Store the name of the user who made the update
                'submission_date' => $oldValues['submission_date'], // Assuming submission_date does not change
                'updated_at' => now(),
            ], $logData));
        }

        // Flash success message
        Session::flash('success', 'Application updated successfully.');

        // Redirect back to the admin applications route
        return redirect()->route('faculty.applications.show', ['id' => $application->id])->with('success', 'Application updated successfully!');
    }
    

    public function applicationAdmin(Request $request)
    {
        // Initialize the query for each status
        $searchTerm = strtolower($request->input('search', '')); // Normalize the search term
        
        $pendingApplicationsQuery = Application::where('status', 'Pending Approval');
        $returnedApplicationsQuery = Application::where('status', 'Returned');
        $approvedApplicationsQuery = Application::where('status', 'Approved');
        
        // Apply the search filter if there's a search term
        if (!empty($searchTerm)) {
            $searchFilter = function ($query) use ($searchTerm) {
                $query->whereRaw('LOWER(name_of_project) LIKE ?', ["%{$searchTerm}%"])
                      ->orWhereRaw('LOWER(name_of_organization) LIKE ?', ["%{$searchTerm}%"]);
            };
    
            $pendingApplicationsQuery->where($searchFilter);
            $returnedApplicationsQuery->where($searchFilter);
            $approvedApplicationsQuery->where($searchFilter);
        }
        
        // Set the current page for each section (Pending, Returned, Approved)
        $pendingPage = $request->get('pending_page', 1); // Default to page 1 if not present
        $returnedPage = $request->get('returned_page', 1); // Default to page 1 if not present
        $approvedPage = $request->get('approved_page', 1); // Default to page 1 if not present
        
        // Paginate the results with separate page parameters for each section
        $pendingApplications = $pendingApplicationsQuery->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'pending_page', $pendingPage);
        
        $returnedApplications = $returnedApplicationsQuery->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'returned_page', $returnedPage);
        
        $approvedApplications = $approvedApplicationsQuery->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'approved_page', $approvedPage);
    
        // Return the view with the applications and search term
        return view('faculty.auth.applicationadmin', compact(
            'pendingApplications',
            'returnedApplications',
            'approvedApplications',
            'searchTerm'
        ));
    }
    
    
    public function showComments($id)
    {
        // Find the application by ID or fail
        $application = Application::findOrFail($id);
    
        // Retrieve the associated comments and documents for the application
        $comments = ApplicationLog::where('application_id', $id)
            ->whereNotNull('comment') // Only get records with comments
            ->get();
    
        return view('org.auth.sidebar.history.frahistorydetails', compact('application', 'comments'));
    }
    
    public function showApprovedApplications(Request $request)
    {
        // Get the search term from the request
        $search = $request->get('search');
        
        // Base query to get approved applications with status 'Approved' and 'proposed_activity' as 'fund raising'
        $approvedApplicationsQuery = Application::where('status', 'Approved')
            ->where('proposed_activity', 'fund raising'); 
    
        // Apply search filter if search term is provided
        if ($search) {
            $approvedApplicationsQuery->where(function($query) use ($search) {
                $query->where('name_of_organization', 'like', '%' . $search . '%')
                      ->orWhere('name_of_project', 'like', '%' . $search . '%');
            });
        }
    
        // Paginate 'Not Submitted' applications
        $notSubmittedApplications = $approvedApplicationsQuery->clone()
            ->where('frapost', 'not_submitted')
            ->paginate(5, ['*'], 'not_submitted_page', $request->get('not_submitted_page', 1));
    
        // Paginate 'Submitted' applications
        $submittedApplications = $approvedApplicationsQuery->clone()
            ->where('frapost', 'submitted')
            ->paginate(5, ['*'], 'submitted_page', $request->get('submitted_page', 1));
    
        // Pass both sets of applications and search term to the view
        return view('faculty.auth.postreportfra', compact('notSubmittedApplications', 'submittedApplications', 'search'));
    }
    
}
