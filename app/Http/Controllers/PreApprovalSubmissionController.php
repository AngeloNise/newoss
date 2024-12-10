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

    	
    public function showForUser($id)
    {
        // Fetch the submission details along with any related comments
        $submission = PreApprovalSubmission::with('comments')->findOrFail($id);
    
        // Return the view located at org/auth/sidebar/offcampus/oca-evaluation-detail.blade
        return view('org.auth.sidebar.offcampus.oca-evaluation-detail', compact('submission'));
    }
    public function update(Request $request, $id)
    {
        $submission = PreApprovalSubmission::findOrFail($id);
    
        // Validate the request
        $request->validate([
            'name_of_activity' => 'required|string|max:100',
            'place_of_activity' => 'required|string|max:100',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'number_of_participants' => 'required|integer|min:1',
            'campus_college_org' => 'required|string|max:100',
            'attachments.*' => 'nullable|file|mimetypes:application/pdf|max:2048',
        ]);
    
        // Update non-attachment fields
        $submission->update($request->only([
            'name_of_activity',
            'place_of_activity',
            'start_date',
            'end_date',
            'number_of_participants',
            'campus_college_org',
        ]));
    
        // Handle attachments
        for ($i = 1; $i <= 20; $i++) {
            $attachmentField = "attachment{$i}";
            $attachmentPathField = "attachment{$i}_path";
    
            if ($request->hasFile($attachmentField)) {
                // Delete the old file if it exists
                if (!empty($submission->$attachmentPathField)) {
                    $existingFilePath = public_path($submission->$attachmentPathField);
                    if (file_exists($existingFilePath)) {
                        unlink($existingFilePath);
                    }
                }
    
                // Generate a unique filename
                $originalName = $request->file($attachmentField)->getClientOriginalName();
                $uniqueName = time() . '_' . uniqid() . '_' . $originalName;
    
                // Store the file with the unique name
                $filePath = $request->file($attachmentField)->move(public_path('attachments'), $uniqueName);
    
                // Save the new file path in the database
                $submission->$attachmentPathField = 'attachments/' . $uniqueName;
            }
        }
    
        // Save the changes to the database
        $submission->save();
    
        return redirect()->route('org.auth.sidebar.offcampus.edit', $id)
            ->with('success', 'Submission updated successfully!');
    }
    
    
    public function edit($id)
    {
        // Find the submission by ID or fail
        $submission = PreApprovalSubmission::findOrFail($id);
        // Pass the submission data to the edit view
        return view('org.auth.sidebar.offcampus.oca-edit', compact('submission'));
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
            'attachments.*' => 'required|file|mimes:pdf,doc,docx|max:500000',
            
        ]);

        // Prepare the data for insertion
        $submissionData = $request->only([
            'name_of_activity',
            'place_of_activity',
            'start_date',
            'end_date',
            'number_of_participants',
            'campus_college_org',
        ]);

        // Handle the file attachments
        $attachments = [];
        for ($i = 1; $i <= 20; $i++) {
            $attachmentField = "attachment{$i}";
            if ($request->hasFile($attachmentField)) {
                // Generate a unique filename
                $originalName = $request->file($attachmentField)->getClientOriginalName();
                $uniqueName = time() . '_' . uniqid() . '_' . $originalName;

                // Store the file with the unique name
                $filePath = $request->file($attachmentField)->move(public_path('attachments'), $uniqueName);

                // Save the file path in the attachments array
                $attachments["attachment{$i}_path"] = 'attachments/' . $uniqueName;
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