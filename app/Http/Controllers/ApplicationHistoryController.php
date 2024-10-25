<?php

namespace App\Http\Controllers;

use App\Models\ApplicationHistoryModel; // Adjusted to use your model
use Illuminate\Http\Request;

class ApplicationHistoryController extends Controller
{
    // Method to display the organization’s application history
    public function index()
    {
        $organizationId = auth()->user()->id; // Get logged-in organization ID
        $currentApplication = ApplicationHistoryModel::where('organization_id', $organizationId)
            ->latest()
            ->first(); // Get the latest application

        $applicationHistory = ApplicationHistoryModel::where('organization_id', $organizationId)
            ->orderBy('date_issued', 'desc')
            ->get(); // Get all application history

        return view('org.auth.fundraising_history', compact('currentApplication', 'applicationHistory'));
    }

    // Method for admin to view all fundraising history
    public function adminIndex()
    {
        $fundRaisingHistory = ApplicationHistoryModel::orderBy('date_issued', 'desc')->get();
        return view('faculty.auth.adminfundraising_history', compact('fundRaisingHistory'));
    }

    // Method to store a new fundraising activity by admin
    public function adminStore(Request $request)
    {
        $request->validate([
            'organization_id' => 'required|exists:organizations,id', // Ensure the organization exists
            'document' => 'required|file|mimes:pdf',
            'date_issued' => 'required|date',
            'proposed_activity' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|string',
        ]);

        // Store the uploaded document
        $documentPath = $request->file('document')->store('documents');

        // Create fundraising history record
        ApplicationHistoryModel::create([
            'organization_id' => $request->organization_id, // Use the selected organization
            'document' => $documentPath,
            'date_issued' => $request->date_issued,
            'proposed_activity' => $request->proposed_activity,
            'location' => $request->location,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.application.index')->with('success', 'Fundraising record submitted successfully.');
    }

    // New function for organizations to view their fundraising history
    public function fundRaisingHistory()
    {
        $organizationId = auth()->user()->id; // Get logged-in organization ID

        // Fetch all fundraising application histories for the logged-in organization
        $fundRaisingHistory = ApplicationHistoryModel::where('organization_id', $organizationId)
            ->orderBy('date_issued', 'desc')
            ->get();

        return view('org.auth.fundraising_history', compact('fundRaisingHistory'));
    }

    // The store method remains the same for organizations to submit their activities
    public function store(Request $request)
    {
        $request->validate([
            'document' => 'required|file|mimes:pdf',
            'date_issued' => 'required|date',
            'proposed_activity' => 'required|string',
            'location' => 'required|string',
            'status' => 'required|string',
        ]);

        // Store the uploaded document
        $documentPath = $request->file('document')->store('documents');

        // Create application history record
        ApplicationHistoryModel::create([
            'organization_id' => auth()->user()->id,
            'document' => $documentPath,
            'date_issued' => $request->date_issued,
            'proposed_activity' => $request->proposed_activity,
            'location' => $request->location,
            'status' => $request->status,
        ]);

        return redirect()->route('application.history.index')->with('success', 'Application submitted successfully.');
    }
}
