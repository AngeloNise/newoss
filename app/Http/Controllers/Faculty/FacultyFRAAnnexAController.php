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

    public function sidenotif()
    {
        $notifications = AnnexA::orderBy('updated_at', 'desc')
            ->get()
            ->map(function ($application) {
                $message = $application->created_at != $application->updated_at 
                    ? "The {$application->requesting_organization} updated a pre-evaluation in FRA"
                    : "The {$application->requesting_organization} submitted a pre-evaluation in FRA";

                return [
                    'id' => $application->id,
                    'message' => $message,
                    'time' => $application->updated_at->diffForHumans(),
                ];
            });

        return view('faculty.auth.dbadmin', compact('notifications'));
    }

    public function suggestion($id)
    {
        $application = AnnexA::findOrFail($id);
        return view('faculty.auth.fraeval.fra-a-evaluation-suggestion', compact('application'));
    }    

    public function storeSuggestion(Request $request, $id)
    {
        $request->validate([
            'section' => 'required|array',
            'section.*' => 'required|string|max:255',
            'comment' => 'required|array',
            'comment.*' => 'required|string',
        ]);

        Frasuggestion::create([
            'application_id' => $id,
            'section' => json_encode($request->section),
            'comment' => json_encode($request->comment),
        ]);

        return redirect()->route('faculty.fra-a-evaluation.show', $id)
                         ->with('success', 'Suggestions submitted successfully!');
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'new_status' => 'required|string|in:Pending Approval,Approved,Returned',
        ]);

        $application = AnnexA::findOrFail($id);
        $application->status = $request->new_status;
        $application->save();

        return redirect()->route('faculty.fra-a-evaluation.show', $id)
                         ->with('success', 'Status updated successfully!');
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
