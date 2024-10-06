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

        return view('faculty.auth.fra-evaluation', compact('applications'));
    }

    public function show($id)
    {
        $annexa = annexa::findOrFail($id);

        return view('faculty.auth.fra-evaluation-detail', compact('annexa'));
    }
}