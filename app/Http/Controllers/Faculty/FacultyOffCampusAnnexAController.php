<?php

namespace App\Http\Controllers\Faculty;

use Illuminate\Http\Request;
use App\Models\PreApprovalSubmission;
use App\Http\Controllers\Controller;


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


    public function updateStatus(Request $request, $id)
    {
        // Validate and fetch the submission
        $submission = PreApprovalSubmission::findOrFail($id);
        
        // Update the status with the new value from the request
        $submission->status = $request->input('new_status');
        $submission->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    }

        public function evaluate($id)
    {
        // Retrieve the specific submission for evaluation
        $submission = PreApprovalSubmission::findOrFail($id);
        return view('faculty.auth.offcampuseval.annex-a-evaluate', compact('submission'));
    }

    public function storeEvaluation(Request $request, $id)
    {
        // Retrieve the specific submission
        $submission = PreApprovalSubmission::findOrFail($id);
    
        // Validate the comment input fields
        $request->validate([
            'section' => 'required|array',
            'comment' => 'required|array',
        ]);
    
        // Process each comment associated with sections
        foreach ($request->section as $index => $section) {
            $submission->comments()->create([
                'section' => $section,
                'comment' => $request->comment[$index],
            ]);
        }
    
        return redirect()->route('faculty.offcampus.annex.a.index')->with('success', 'Evaluation comments submitted successfully.');
    }
}
