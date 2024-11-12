<?php

namespace App\Http\Controllers;

use App\Models\PreApprovalSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;

class PreApprovalSubmissionController extends Controller
{
    public function showForm()
    {
        return view('org.auth.sidebar.offcampus.annex-a');
    }

    public function viewAttachment($id, $attachmentNumber)
    {
        $submission = PreApprovalSubmission::findOrFail($id);
        $attachmentField = "attachment{$attachmentNumber}_path";

        if (!$submission->$attachmentField) {
            return redirect()->back()->with('error', 'Attachment not found.');
        }

        $filePath = public_path($submission->$attachmentField); // Use public_path

        if (!file_exists($filePath)) { // Check if file exists
            return redirect()->back()->with('error', 'File does not exist.');
        }

        return response()->file($filePath);
    }
        
    public function submitForm(Request $request)
    {
        // Validate the request
        $request->validate([
            'name_of_activity' => 'required|string|max:100',
            'place_of_activity' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'number_of_participants' => 'required|integer|min:1|max:1000',
            'campus_college_org' => 'required|string|max:100',
            'attachments.*' => 'required|file|mimetypes:application/pdf|max:2048'  // Ensure only PDFs are accepted
        ]);        
    
        // Prepare the data for insertion
        $submissionData = $request->only([
            'name_of_activity', 
            'place_of_activity', 
            'start_date', 
            'end_date', 
            'number_of_participants', 
            'campus_college_org'
        ]);
    
        // Handle the file attachments
        $attachments = [];
        for ($i = 1; $i <= 7; $i++) {
            if ($request->hasFile("attachment{$i}")) {
                // Store the file in 'public/attachments' directory
                $filePath = $request->file("attachment{$i}")->move(public_path('attachments'), $request->file("attachment{$i}")->getClientOriginalName());
                $attachments["attachment{$i}_path"] = 'attachments/' . $request->file("attachment{$i}")->getClientOriginalName();
            }
        }
    
        // Merge the attachments into the submission data
        $submissionData = array_merge($submissionData, $attachments);
    
        // Create a new submission record in the database
        PreApprovalSubmission::create($submissionData);
    
        // Flash success message
        Session::flash('success', 'Your form has passed the first evaluation');
    
        // Redirect to the 'preeval' route
        return redirect()->route('org.auth.sidebar.preeval');
    }
}
