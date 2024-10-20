<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use App\Models\annexa;
use App\Models\logo;
use Barryvdh\DomPDF\Facade\Pdf;

class GeneratePDFController extends Controller
{
    public function index()
    {
        $userEmail = auth()->user()->email;

        $applications = annexa::where('email', $userEmail)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('org.auth.sidebar.preevalpdf', compact('applications'));
    }

    public function generatePDF($id)
    {
        $userEmail = auth()->user()->email;
    
        // Fetch the first logo record
        $logo = logo::first(); // This gets the first logo record
    
        // Fetch the specific AnnexA record for the authenticated user
        $annexa = annexa::where('id', $id)
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
        $annexa = annexa::findOrFail($id);

        // Fetch all logo records
        $logos = logo::all(); // Get all logo records

        // Pass both $annexa and $logos to the view
        return view('org.auth.sidebar.fraeval.fra-a-evaluation-detail', compact('annexa', 'logos'));
    } 

    public function downloadPDF($id) // Separate method to handle downloads
    {
        $userEmail = auth()->user()->email;

        // Fetch the first logo record
        $logo = logo::first();

        // Fetch the specific AnnexA record for the authenticated user
        $annexa = annexa::where('id', $id)
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
