<?php

namespace App\Http\Controllers\faculty;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Logo;

class SecretFormController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'pup_logo' => 'required|image|mimes:jpeg,png,jpg',
            'ched_logo' => 'required|image|mimes:jpeg,png,jpg',
        ]);

        // Prepare data for insertion
        $data = [];

        // Handle PUP logo upload
        if ($request->hasFile('pup_logo')) {
            $file = $request->file('pup_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['pup_logo'] = $filename; // Set filename for PUP logo
        }

        // Handle CHED logo upload
        if ($request->hasFile('ched_logo')) {
            $file = $request->file('ched_logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['ched_logo'] = $filename; // Set filename for CHED logo
        }

        // Save the logos in the database
        logo::updateOrCreate(
            ['id' => 1], // Assuming you're updating the first record; change as needed
            $data // Use the prepared data
        );

        return redirect()->route('faculty.secretform123')->with('success', 'Logos uploaded successfully!');
    }

}
