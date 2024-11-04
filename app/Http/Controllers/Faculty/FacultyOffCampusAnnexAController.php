<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\PreApprovalSubmission;

class FacultyOffCampusAnnexAController extends Controller
{
    public function index()
{
    $submissions = PreApprovalSubmission::all();
    return view('faculty.auth.offcampuseval.offcampusannexa', ['submissions' => $submissions]);
}



    public function show($id)
    {
        // Fetch specific submission details by ID
        $submission = PreApprovalSubmission::findOrFail($id);
        return view('faculty.auth.offcampuseval.annexashow', compact('submission'));
    }
}
