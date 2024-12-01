<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use App\Models\AnnexA; // Ensure this is correct
use App\Models\Frasuggestion; // Ensure this is correct
use Illuminate\Http\Request;

class FacultyFRAAnnexAController extends Controller
{
    public function index()
    {
        $applications = AnnexA::all(); // Fetch all applications without filtering by status
        return view('faculty.auth.fraeval.fra-a-evaluation', compact('applications'));
    }

    public function show($id)
    {
        $annexa = annexa::findOrFail($id);
    
        return view('faculty.auth.fraeval.fra-a-evaluation-detail', compact('annexa'));
    }

    public function updateStatus(Request $request, $id)
    {
        // Validate the input
        $request->validate([
            'new_status' => 'required|string|in:Pending Approval,Approved,Returned',
            'section' => 'required|array',
            'section.*' => 'required|string|max:255',
            'comment' => 'required|array',
            'comment.*' => 'required|string',
        ]);
    
        // Find the application by ID
        $application = AnnexA::findOrFail($id);
    
        // Update the status
        $application->status = $request->new_status;
    
        // Append new sections and comments to the existing ones
        $existingSections = json_decode($application->section, true) ?? [];
        $existingComments = json_decode($application->comment, true) ?? [];
    
        // Merge new sections and comments, placing the newest ones at the top
        $updatedSections = array_merge($request->section, $existingSections);
        $updatedComments = array_merge($request->comment, $existingComments);
    
        // Update the fields in the database
        $application->section = json_encode($updatedSections);
        $application->comment = json_encode($updatedComments);
    
        // Save the application
        $application->save();
    
        // Redirect back to the show page with a success message
        return redirect()->route('faculty.fra-a-evaluation.show', $id)
                         ->with('success', 'Status updated and new suggestions added!');
    }

    public function searchOrganization(Request $request)
    {
        $query = $request->input('query');
        $organizations = AnnexA::where('requesting_organization', 'LIKE', "%{$query}%")
                                ->orWhere('name_of_project', 'LIKE', "%{$query}%")
                                ->get();
    
        $output = '';
        if ($organizations->isEmpty()) {
            $output .= '<li class="list-group-item">No results found</li>';
        } else {
            foreach ($organizations as $organization) {
                $output .= '<li class="list-group-item organization-item" data-organization=\''. json_encode($organization) .'\'>'
                            . htmlspecialchars($organization->requesting_organization) . ' - ' . htmlspecialchars($organization->name_of_project) . '</li>';
            }
        }
    
        return response($output);
    }
}
