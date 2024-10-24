<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use App\Models\AnnexA;
use Illuminate\Http\Request;

class DeanFRAAnnexAController extends Controller
{
    public function index()
    {
        $userColor = auth()->check() ? auth()->user()->color : null;
        $applications = $userColor ? AnnexA::where('color', $userColor)->get() : collect();
        return view('dean.auth.fraeval.fra-a-evaluation', compact('applications'));
    }

    public function show($id)
    {
        $application = AnnexA::findOrFail($id);
        return view('dean.auth.fraeval.fra-a-evaluation-detail', compact('application'));
    }

    public function sidenotif()
    {
        $userColor = auth()->check() ? auth()->user()->color : null;
        $notifications = $userColor ? AnnexA::where('color', $userColor)->orderBy('created_at', 'desc')->get()->map(function ($application) {
            return [
                'id' => $application->id,
                'message' => "{$application->requesting_organization} submitted a pre-evaluation in FRA",
                'time' => $application->created_at->diffForHumans(),
            ];
        }) : collect();
        return view('dean.auth.dashboard', compact('notifications'));
    }
}
