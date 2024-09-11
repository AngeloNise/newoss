<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Fraeval;
use App\Models\preevalstatuscreation;

class FRADocController extends Controller
{
    public function display() {
        $data = Fraeval::all();
        if ($data->isEmpty()) {
            \Log::info('No data found for Fraeval.');
        }
        return view('faculty.auth.preevaldoc', compact('data'));
    }

    public function download(Request $request, $filename) {
        $path = public_path('assets/' . $filename);

        if (file_exists($path)) {
            return response()->download($path);
        } else {
            return abort(404, 'File not found.');
        }
    }

    public function view($type, $filename) {
    // Define a map of valid types to file paths if needed
    $validTypes = ['letter_of_intent', 'application_form', 'pre_numbered_tickets', 'official_receipts', 'control_sheets', 'reservation_slip', 'goods_services_inspection', 'statement_of_projected_net'];
    
    // Validate type
        if (!in_array($type, $validTypes)) {
            return abort(404, 'Invalid file type.');
        }

        $path = public_path('assets/' . $filename);

        if (file_exists($path)) {
            $mime = mime_content_type($path);
            $content = file_get_contents($path);

            return response($content, 200)
                ->header('Content-Type', $mime)
                ->header('Content-Disposition', 'inline; filename="' . $filename . '"');
        } else {
            return abort(404, 'File not found.');
        }
    }
    public function show($id)
    {
        $status = preevalstatuscreation::find($id);

        if (!$status) {
            return abort(404, 'Record not found.');
        }

        // Fetch all associated Fraeval records based on user_email
        $data = Fraeval::where('id', $status->id)->get();

        if ($data->isEmpty()) {
            return abort(404, 'No data found for this email.');
        }

        return view('faculty.auth.preevaldoc', compact('data', 'status'));
    }
}
