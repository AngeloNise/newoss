<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use App\Models\annexa;
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

        // Fetch the specific AnnexA record for the authenticated user
        $annexa = annexa::where('id', $id)
            ->where('email', $userEmail)
            ->firstOrFail(); // This will throw a 404 if the record is not found

        // Pass the specific annexA record to the view
        $pdf = PDF::loadView('pdf.annexapdf', compact('annexa'))->setPaper('legal', 'portrait');

        // Set the filename to the name of the project
        $fileName = $annexa->name_of_project ?? 'annexA-' . $id; // Fallback to annexA-{id} if name_of_project is null

        return $pdf->download($fileName . 'Annex.pdf');
    }
        
    public function show($id)
    {
        $annexa = annexa::findOrFail($id);

        return view('org.auth.sidebar.fraeval.fra-a-evaluation-detail', compact('annexa'));
    }
}
