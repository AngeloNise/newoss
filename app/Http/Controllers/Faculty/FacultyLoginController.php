<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyLoginController extends Controller
{
    public function index()
    {
        return view('faculty.auth.login'); // Login view for both admin types
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect based on admin type
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('faculty.dbadmin'); // Admin type 1 redirects to admin dashboard
            } elseif (auth()->user()->is_admin == 2) {
                return redirect()->route('dean.homepage'); // Dean redirects to the dean homepage
            }
        }

        // Log out if the credentials are incorrect or the user is not an admin
        Auth::logout(); 
        return back()->withErrors(['email' => 'Wrong credentials']);
    }
}
