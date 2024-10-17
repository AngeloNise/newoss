<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use App\Models\annexa;
use Illuminate\Http\Request;

class GeneratePDFController extends Controller
{
    public function index()
    {
        // Assuming you're using the user's email to filter submissions
        $userEmail = auth()->user()->email;

        // Retrieve only the forms submitted by the logged-in user
        $applications = annexa::where('email', $userEmail)->get();

        return view('preeval.user-forms', compact('applications'));
    }
}
