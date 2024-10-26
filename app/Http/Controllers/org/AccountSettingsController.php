<?php

namespace App\Http\Controllers\org;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AccountSettingsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('org/auth/sidebar/accset', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
    
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'organization' => 'required|string|max:255',
            'old_password' => 'required',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
    
        // Check if the old password is correct
        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors([
                'old_password' => 'The provided old password does not match our records.'
            ]);
        }
    
        // Check if the new password and confirmation match
        if ($request->password && $request->password !== $request->password_confirmation) {
            return back()->withErrors([
                'password' => 'New password and confirmation do not match.'
            ]);
        }
    
        // Update the user's details
        $user->name = $request->name;
        $user->name_of_organization = $request->organization;
    
        // Update the password if a new one is provided
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
    
        // Save the updated user information
        $user->save();
        
        \Log::info('User updated: ' . $user);
    
        return redirect()->route('accset')->with('success', 'Account settings updated successfully.');
    }
}