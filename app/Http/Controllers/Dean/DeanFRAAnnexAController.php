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
        $userBranch = auth()->check() ? auth()->user()->branch : null;
        $applications = $userBranch 
            ? AnnexA::where('branch', $userBranch)->orderBy('updated_at', 'desc')->get()
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
        $userBranch = auth()->check() ? auth()->user()->branch : null;
        $notifications = $userBranch ? AnnexA::where('branch', $userBranch)
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

    public function storeSuggestion(Request $request, $id)
    {
        $request->validate([
            'section' => 'required|array',
            'section.*' => 'required|string|max:255',
            'comment' => 'required|array',
            'comment.*' => 'required|string',
        ]);
    
        // Create a new suggestion
        Frasuggestion::create([
            'application_id' => $id, // Use the application ID passed in the route
            'section' => json_encode($request->section),
            'comment' => json_encode($request->comment),
        ]);
    
        return redirect()->route('dean.fra-a-evaluation.show', $id)
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

        return redirect()->route('dean.fra-a-evaluation.show', $id)
                         ->with('success', 'Status updated successfully!');
    }
}
