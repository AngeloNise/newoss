<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use App\Models\annexa;
use Illuminate\Http\Request;

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
}
