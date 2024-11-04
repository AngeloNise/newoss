<?php

namespace App\Http\Controllers;

use App\Models\AnnexDSubmission;
use Illuminate\Http\Request;

class AnnexDSubmissionController extends Controller
{
    public function showForm()
    {
        return view('org.auth.sidebar.offcampus.annex-d');
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
        $request->validate([
            'name_of_activity2' => 'required|string|max:100',
            'place_of_activity2' => 'required|string|max:100',
            'start_date2' => 'required|date',
            'end_date2' => 'required|date|after_or_equal:start_date',
            'number_of_participants2' => 'required|integer|min:1|max:1000',
            'campus_college_org2' => 'required|string|max:100',
            'attachments.*' => 'required|file|mimetypes:application/pdf|max:2048'  // Ensure only PDFs are accepted
        ]);        
        
    
        $submissionData = $request->only([
            'name_of_activity2', 
            'place_of_activity2', 
            'start_date2', 
            'end_date2', 
            'number_of_participants2', 
            'campus_college_org2'
        ]);
    
        $attachments = [];
        for ($i = 8; $i <= 21; $i++) {
            if ($request->hasFile("attachment{$i}")) {
                // Store the file directly in 'public/attachments' directory
                $filePath = $request->file("attachment{$i}")->storeAs('attachments', $request->file("attachment{$i}")->getClientOriginalName(), 'public');
                $attachments["attachment{$i}_path"] = 'attachments/' . $request->file("attachment{$i}")->getClientOriginalName();
            }
        }

            // Combine submission data and attachments, and save to the database
        $dataToSave = array_merge($submissionData, $attachments);
        AnnexDSubmission::create($dataToSave);

        return redirect()->back()->with('success', 'Annex D submitted successfully!');
    }
}
