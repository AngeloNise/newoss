<?php

namespace App\Http\Controllers\Dean;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeanLoginController extends Controller
{
    public function index() {
        return view('dean.auth.login'); // Path to the dean login view
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        if (Auth::attempt($request->only('email', 'password'))) {
            if (auth()->user()->is_admin == 2) {
                return redirect()->route('dean.homepage'); // This line could cause a loop
            }
    
            Auth::logout(); // Logout if not a dean
        }
    
        return back()->withErrors(['email' => 'Invalid credentials.']);
    }
    
}