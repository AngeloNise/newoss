<?php

namespace App\Http\Controllers\preeval;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\preevalstatuscreation;

class FRAStatusController extends Controller
{
    public function display()
    {
        $data = preevalstatuscreation::all();
        return view('faculty.auth.preevalstatus', compact('data')); // Adjust the view name as necessary
    }
}
