<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use App\Models\annexa; // Assuming applications are stored in AnnexA model
use Illuminate\Http\Request;

class FacultyFRAAnnexAController extends Controller
{
    public function index()
    {
        $applications = annexa::all();

        return view('faculty.auth.fraeval.fra-a-evaluation', compact('applications'));
    }

    public function show($id)
    {
        $annexa = annexa::findOrFail($id);

        return view('faculty.auth.fraeval.fra-a-evaluation-detail', compact('annexa'));
    }
    public function sidenotif()
    {
        $notifications = AnnexA::where('status', 'approved')
            ->orderBy('updated_at', 'desc')
            ->get()
            ->map(function ($application) {
                $message = $application->created_at != $application->updated_at 
                    ? "{$application->color} forwarded a pre-evaluation in FRA from {$application->requesting_organization}"
                    : "{$application->color} forwarded a pre-evaluation in FRA from {$application->requesting_organization}";
    
                return [
                    'id' => $application->id,
                    'message' => $message,
                    'time' => $application->updated_at->diffForHumans(),
                ];
            });
    
        return view('dean.auth.dashboard', compact('notifications'));
    }
    
}