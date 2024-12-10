<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FacultyOrgAcctManagementController extends Controller
{
    public function index(Request $request)
    {
        $query = User::where('is_admin', 0); // Get all organizations
    
        // Apply the search filter if there's a search term
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = strtolower($request->search); // Normalize the search term
            $query->where(function ($query) use ($searchTerm) {
                $query->whereRaw('LOWER(name_of_organization) LIKE ?', ["%{$searchTerm}%"])
                      ->orWhereRaw('LOWER(name) LIKE ?', ["%{$searchTerm}%"])
                      ->orWhereRaw('LOWER(email) LIKE ?', ["%{$searchTerm}%"])
                      ->orWhereRaw('LOWER(colleges) LIKE ?', ["%{$searchTerm}%"]);
            });
        }
    
        $organizations = $query->orderByRaw('status = "With Deficiencies" AND remarks IS NOT NULL DESC')  // First, with deficiencies and remarks
        ->orderByRaw('status = "With Deficiencies" AND remarks IS NULL DESC')  // Second, with deficiencies and no remarks
        ->orderByRaw('status = "Without Deficiencies" DESC')  // Lastly, without deficiencies
        ->paginate(10);
    
        return view('faculty.auth.oam', compact('organizations'));
    }
    
    public function edit($id)
    {
        $organization = User::findOrFail($id);
        return view('faculty.auth.oamedit', compact('organization'));
    }

    // Update organization information
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'name_of_organization' => 'required',
            'name' => 'required',
            'password' => 'nullable|confirmed|min:8',
        ]);

        $organization = User::findOrFail($id);
        $organization->email = $request->email;
        $organization->name_of_organization = $request->name_of_organization;
        $organization->name = $request->name;

        if ($request->password) {
            $organization->password = bcrypt($request->password);
        }

        $organization->save();

        return redirect()->route('faculty.orgs.index')->with('success', 'Organization updated successfully.');
    }

    // Remove an organization
    public function remove($id)
    {
        $organization = User::findOrFail($id);
        $organization->delete();
        return redirect()->route('faculty.orgs.index')->with('success', 'Organization removed successfully.');
    }
    // In FacultyOrgAcctManagementController.php

    // Show the form to add a new organization account
    public function create()
    {
        return view('faculty.auth.oamcreate');
    }

    // Store the new organization account
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', // The password field will be ignored here, as we're auto-generating it
            'name_of_organization' => 'required|string|max:255',
            'colleges' => 'nullable|string|max:255',
        ]);
    
        // Generate the password
        $nameParts = explode(' ', $request->name);
        $firstName = strtolower($nameParts[0]); // Get the first name and convert it to lowercase
        
        $emailParts = explode('@', $request->email);
        $webmailPrefix = strtolower(substr($emailParts[0], 0, 5)); // Get the first 5 letters of the email and convert to lowercase
    
        $generatedPassword = $firstName . $webmailPrefix . '@PUP';
    
        // Create the new user (organization)
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($generatedPassword), // Use the generated password
            'name_of_organization' => $request->name_of_organization,
            'colleges' => $request->colleges,
            'branch' => 'PUP-MAIN',  // Default value
        ]);
    
        return redirect()->route('faculty.orgs.index')->with('success', 'Organization account added successfully.');
    }    
}
