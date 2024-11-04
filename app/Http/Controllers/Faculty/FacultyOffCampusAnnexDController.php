<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\AnnexDSubmission;

class FacultyOffCampusAnnexDController extends Controller
{
    public function index()
{
    $submissions = AnnexDSubmission::all();
    return view('faculty.auth.offcampuseval.offcampusannexd', ['submissions' => $submissions]);
}



    public function show($id)
    {
        // Fetch specific submission details by ID
        $submission = PreApprovalSubmission::findOrFail($id);
        return view('faculty.auth.offcampuseval.annexdshow', compact('submission'));
    }
}
