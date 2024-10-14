<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\annexc;
use Illuminate\Http\Request;
use App\Models\User;

class FacultyFRAAnnexCController extends Controller
{
    public function index()
    {
        $applications = annexc::all();

        return view('faculty.auth.fraeval.fra-c-evaluation', compact('applications'));
    }

    public function show($id)
    {
        $annexc = annexc::findOrFail($id);

        return view('faculty.auth.fraeval.fra-c-evaluation-detail', compact('annexc'));
    }

    
}