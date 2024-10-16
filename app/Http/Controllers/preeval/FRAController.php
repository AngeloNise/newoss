<?php
namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fraeval;
use Illuminate\Support\Facades\Auth;
use App\Models\Preevalstatuscreation;

class FRAController extends Controller
{
    public function index()
    {
        return view('/org/auth/preeval');
    }

    public function preevalfra()
    {
        return view('/org/auth/preevalfra');
    }

    public function store(Request $request)
    {
        // Validate the request to ensure files are of allowed types and check if at least one file is uploaded
        $validated = $request->validate([
            'Letter_of_Intent' => 'nullable|file|mimes:pdf,doc,docx|max:51200',
            'Application_Form' => 'nullable|file|mimes:pdf,doc,docx|max:51200',
            'Pre_Numbered_Tickets' => 'nullable|file|mimes:pdf,doc,docx|max:51200',
            'Official_Receipts' => 'nullable|file|mimes:pdf,doc,docx|max:51200',
            'Control_Sheets' => 'nullable|file|mimes:pdf,doc,docx|max:51200',
            'Reservation_Slip' => 'nullable|file|mimes:pdf,doc,docx|max:51200',
            'Goods_Services_Inspection' => 'nullable|file|mimes:pdf,doc,docx|max:51200',
            'Statement_of_Projected_Net' => 'nullable|file|mimes:pdf,doc,docx|max:51200',
        ], [
            'required' => 'Please add at least one document.',
        ]);

        // Check if at least one file is uploaded
        $hasFiles = false;
        foreach (['Letter_of_Intent', 'Application_Form', 'Pre_Numbered_Tickets', 'Official_Receipts', 'Control_Sheets', 'Reservation_Slip', 'Goods_Services_Inspection', 'Statement_of_Projected_Net'] as $field) {
            if ($request->hasFile($field)) {
                $hasFiles = true;
                break;
            }
        }

        if (!$hasFiles) {
            return redirect()->back()->withErrors(['Please add at least one document.']);
        }

        $data = new Fraeval();
        $data->user_email = Auth::user()->email;
        $data->name_of_organization = $request->input('name_of_organization'); // Assuming you have this input
        $data->date_issued = now(); // Sets the current date and time

        $documentsCount = 0;
        // Handle each file individually
        foreach (['Letter_of_Intent', 'Application_Form', 'Pre_Numbered_Tickets', 'Official_Receipts', 'Control_Sheets', 'Reservation_Slip', 'Goods_Services_Inspection', 'Statement_of_Projected_Net'] as $field) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets'), $filename);
                $data->$field = $filename;
                $documentsCount++; // Increment count for each uploaded document
            }
        }

        $data->save();

        Preevalstatuscreation::create([
            'user_email' => Auth::user()->email,
            'name_of_organization' => Auth::user()->name_of_organization,
            'date_issued' => now(),
            'pre_eval_type' => 'Fund Raising Activity', // Replace with actual data
            'documents' => $documentsCount,
            'status' => 'Evaluating'
        ]);

        return redirect()->back()->with('success', 'Files uploaded successfully!');
    }
}
