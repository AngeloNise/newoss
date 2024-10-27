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
        $userColor = auth()->check() ? auth()->user()->color : null;
        $notifications = $userColor ? AnnexA::where('color', $userColor)
            ->orderBy('created_at', 'desc')
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
}