<?php

namespace App\Http\Controllers\Faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FacultyLoginController extends Controller
{
    public function index(){
        return view('faculty.auth.login');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' =>'required'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            if(auth()->user()->is_admin){
                return redirect()->route('faculty.dbadmin');
            }
            Auth::logout();
        }
        return back()->withErrors(['email'=>'Wrong credentials']);
    }
}
