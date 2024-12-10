<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\AnnexA; // Ensure this is correct
use App\Models\Frasuggestion; // Ensure this is correct
use Illuminate\Http\Request;

class FacultyFRAAnnexAController extends Controller
{
    public function index(Request $request) 
    {
        $search = $request->get('search', ''); // Retrieve search query
        $pendingPage = $request->get('pending_page', 1);
        $returnedPage = $request->get('returned_page', 1);
        $approvedPage = $request->get('approved_page', 1);
    
        // Fetch and paginate applications with search functionality
        $pendingApprovalApplications = AnnexA::where('status', 'Pending Approval')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name_of_project', 'like', "%$search%")
                      ->orWhere('requesting_organization', 'like', "%$search%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'pending_page', $pendingPage);
    
        $returnedApplications = AnnexA::where('status', 'Returned')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name_of_project', 'like', "%$search%")
                      ->orWhere('requesting_organization', 'like', "%$search%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'returned_page', $returnedPage);
    
        $approvedApplications = AnnexA::where('status', 'Approved')
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name_of_project', 'like', "%$search%")
                      ->orWhere('requesting_organization', 'like', "%$search%");
                });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(5, ['*'], 'approved_page', $approvedPage);
    
        return view('faculty.auth.fraeval.fra-a-evaluation', compact(
            'pendingApprovalApplications',
            'returnedApplications',
            'approvedApplications',
            'search'
        ));
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
