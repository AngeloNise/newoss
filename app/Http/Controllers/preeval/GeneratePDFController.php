<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use App\Models\AnnexA; // Fund-Raising Model
use App\Models\Logo; // Logo Model for PDF
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePDFController extends Controller
{
    public function index()
    {
        $userEmail = auth()->user()->email;

        // Fetch Fund-Raising (AnnexA) applications
        $applications = AnnexA::where('email', $userEmail)
            ->orderBy('updated_at', 'desc')
            ->get();

        // Pass all variables to the view
        return view('org.auth.sidebar.preevalpdf', compact('applications'));
    }

    public function generatePDF($id)
    {
        $userEmail = auth()->user()->email;

        // Fetch the first logo record
        $logo = Logo::first(); // This gets the first logo record

        // Fetch the specific AnnexA record for the authenticated user
        $annexa = AnnexA::where('id', $id)
            ->where('email', $userEmail)
            ->firstOrFail(); // This will throw a 404 if the record is not found

        // Pass the specific annexA record and logo to the view
        $pdf = PDF::loadView('pdf.annexapdf', compact('annexa', 'logo'))
            ->setPaper('legal', 'portrait');

        // Display the PDF in the browser
        return $pdf->stream('annexA-' . $id . '.pdf');
    }

    public function show($id)
    {
        $userEmail = auth()->user()->email;

        // Fetch the specific AnnexA record for the authenticated user
        $annexa = AnnexA::where('id', $id)
            ->where('email', $userEmail)
            ->firstOrFail(); // This will throw a 404 if the record is not found

        // Fetch all logo records
        $logos = Logo::all(); // Get all logo records

        // Fetch related suggestions for this AnnexA record
        $suggestions = $annexa->suggestions; // Get suggestions using the relationship defined in AnnexA

        // Pass both $annexa, $logos, and suggestions to the view
        return view('org.auth.sidebar.fraeval.fra-a-evaluation-detail', compact('annexa', 'logos', 'suggestions'));
    } 

    public function downloadPDF($id) // Separate method to handle downloads
    {
        $userEmail = auth()->user()->email;

        // Fetch the first logo record
        $logo = Logo::first();

        // Fetch the specific AnnexA record for the authenticated user
        $annexa = AnnexA::where('id', $id)
            ->where('email', $userEmail)
            ->firstOrFail();

        // Pass the specific annexA record and logo to the view
        $pdf = PDF::loadView('pdf.annexapdf', compact('annexa', 'logo'))
            ->setPaper('legal', 'portrait');

        // Set the filename to the name of the project
        $fileName = $annexa->name_of_project ?? 'annexA-' . $id;

        // Download the PDF
        return $pdf->download($fileName . 'Annex.pdf');
    }
}