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
        // Fetch and sort notifications, newest first
        $notifications = annexa::orderBy('created_at', 'desc')->get()->map(function ($application) {
            return [
                'id' => $application->id, // Ensure you're including the id
                'message' => "{$application->requesting_organization} submitted a pre-evaluation in FRA",
                'time' => $application->created_at->diffForHumans(), // Use diffForHumans for relative time
            ];
        });

        return view('faculty.auth.dbadmin', compact('notifications')); // Pass notifications to the view
    }
}