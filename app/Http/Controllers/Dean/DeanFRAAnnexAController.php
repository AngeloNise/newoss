<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\AnnexA;
use App\Models\Frasuggestion;
use Illuminate\Http\Request;

class DeanFRAAnnexAController extends Controller
{
    public function index()
    {
        $userColor = auth()->check() ? auth()->user()->color : null;
        $applications = $userColor 
            ? AnnexA::where('color', $userColor)->orderBy('updated_at', 'desc')->get() // Change 'start_date' to your desired column
            : collect();
    
        return view('dean.auth.fra-a-evaluation', compact('applications'));
    }

    public function show($id)
    {
        $application = AnnexA::findOrFail($id);
        return view('dean.auth.fra-a-evaluation-detail', compact('application'));
    }

    public function sidenotif()
    {
        $userColor = auth()->check() ? auth()->user()->color : null;
        $notifications = $userColor ? AnnexA::where('color', $userColor)
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(function ($application) {
                $message = $application->created_at != $application->updated_at 
                    ? "{$application->requesting_organization} updated a pre-evaluation in FRA"
                    : "{$application->requesting_organization} submitted a pre-evaluation in FRA";

                return [
                    'id' => $application->id,
                    'message' => $message,
                    'time' => $application->updated_at->diffForHumans(),
                ];
            }) : collect();

        return view('dean.auth.dashboard', compact('notifications'));
    }


    public function suggestion($id)
    {
        $application = AnnexA::findOrFail($id);
        return view('dean.auth.fra-a-evaluation-suggestion', compact('application'));
    }

    public function storeSuggestion(Request $request, $id = null)
    {
        // Validation rules
        $request->validate([
            'section' => 'required|array',
            'section.*' => 'required|string|max:255',
            'comment' => 'required|array',
            'comment.*' => 'required|string',
        ]);
    
        // Check if we're updating an existing suggestion
        if ($id) {
            // Find the suggestion by ID for updating
            $frasuggestion = Frasuggestion::findOrFail($id);
            
            // Update fields
            $frasuggestion->section = json_encode($request->section);
            $frasuggestion->comment = json_encode($request->comment);
            $frasuggestion->status = $request->input('status', 'Pending Approval'); // Default if not provided
            $frasuggestion->save();
    
            return redirect()->route('dean.fra-a-evaluation.show', $frasuggestion->application_id)
                             ->with('success', 'Suggestion updated successfully!');
        } else {
            // Create a new suggestion
            Frasuggestion::create([
                'application_id' => $id, // Ensure you have the application ID for new suggestions
                'section' => json_encode($request->section),
                'comment' => json_encode($request->comment),
            ]);
    
            return redirect()->route('dean.fra-a-evaluation.show', $id)
                             ->with('success', 'Suggestions submitted successfully!');
        }
    }    

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'new_status' => 'required|string|in:Pending Approval,Approved,Returned',
        ]);

        $application = AnnexA::findOrFail($id);
        $application->status = $request->new_status;
        $application->save();

        return redirect()->route('dean.fra-a-evaluation.show', $id)
                         ->with('success', 'Status updated successfully!');
    }
}
