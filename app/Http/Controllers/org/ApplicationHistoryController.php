<?php

namespace App\Http\Controllers\org;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;

class ApplicationHistoryController extends Controller
{
    public function frahistory()
    {
        // Get the logged-in user's organization name
        $organization = auth()->user()->name_of_organization;

        // Fetch applications where the activity is 'fund raising' and the organization matches
        $applications = Application::where('proposed_activity', 'fund raising')
                                    ->where('name_of_organization', $organization)
                                    ->get();

        // Return the view with the filtered applications
        return view('org.auth.sidebar.history.frahistory', compact('applications'));
    }
    
    public function icahistory()
    {
        // Get the logged-in user's organization name
        $organization = auth()->user()->name_of_organization;
    
        // Fetch applications where the activity is 'in campus' and the organization matches
        $applications = Application::where('proposed_activity', 'in campus')
                                    ->where('name_of_organization', $organization)
                                    ->get();
    
        // Return the view with the filtered applications
        return view('org.auth.sidebar.history.icahistory', compact('applications'));
    }    

    public function ocahistory()
    {
        // Get the logged-in user's organization name
        $organization = auth()->user()->name_of_organization;

        // Fetch applications where the activity is 'fund raising' and the organization matches
        $applications = Application::where('proposed_activity', 'off campus')
                                    ->where('name_of_organization', $organization)
                                    ->get();

        // Return the view with the filtered applications
        return view('org.auth.sidebar.history.ocahistory', compact('applications'));
    } 
}
