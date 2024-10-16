<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class FacultyOrgAcctManagementController extends Controller
{
    // Display all organizations
    public function index()
    {
        $organizations = User::where('is_admin', 0)->get(); // Get all organizations
        return view('faculty.auth.oam', compact('organizations')); // Update view reference
    }

    // Show edit form for a specific organization
    public function edit($id)
    {
        $organization = User::findOrFail($id);
        return view('faculty.auth.oamedit', compact('organization')); // Updated to use oamedit.blade.php
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
}