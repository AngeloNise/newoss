<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use App\Models\annexb; // Assuming applications are stored in AnnexA model
use Illuminate\Http\Request;

class FacultyFRAAnnexBController extends Controller
{
    public function index()
    {
        $applications = annexb::all();

        return view('faculty.auth.fraeval.fra-b-evaluation', compact('applications'));
    }

    public function show($id)
    {
        $annexb = annexb::findOrFail($id);

        return view('faculty.auth.fraeval.fra-b-evaluation-detail', compact('annexb'));
    }
}