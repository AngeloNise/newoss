<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use App\Models\PreApprovalSubmission; // Off-Campus Model
use App\Models\Logo; // Logo Model for PDF
use Barryvdh\DomPDF\Facade\Pdf;

class OffCampusController extends Controller
{
    public function index()
    {
        $userEmail = auth()->user()->email;

        // Fetch Off-Campus applications
        $offCampusApplications = PreApprovalSubmission::orderBy('updated_at', 'desc')
            ->get();

        // Pass all variables to the view
        return view('org.auth.sidebar.offcampusforms', compact('offCampusApplications'));
    }

   
}