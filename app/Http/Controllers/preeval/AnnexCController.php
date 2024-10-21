<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnnexC;
use Illuminate\Support\Facades\Session;

class AnnexCController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'nullable|string',
            'organization' => 'nullable|string',
            'qty' => 'required|array',
            'qty.*' => 'required|string',
            'unit' => 'required|array',
            'unit.*' => 'required|string',
            'item_description' => 'nullable|array',
            'item_description.*' => 'nullable|string',
            'serial_no' => 'nullable|array',
            'serial_no.*' => 'nullable|string',
            'property_no' => 'nullable|array',
            'property_no.*' => 'nullable|string',
            'unit_cost' => 'required|array',
            'unit_cost.*' => 'required|string',
            'total_amount' => 'required|array',
            'total_amount.*' => 'required|string',
        ]);

        // Save the validated form data
        $annexC = new AnnexC();
        $annexC->name = $validated['name'] ?? auth()->user()->name;  // Default to authenticated user's name
        $annexC->name_of_organization = $validated['organization'] ?? auth()->user()->name_of_organization;  // Default to authenticated user's organization
        $annexC->qty = json_encode($validated['qty']);
        $annexC->unit = json_encode($validated['unit']);
        $annexC->item_description = json_encode($validated['item_description'] ?? []);
        $annexC->serial_no = json_encode($validated['serial_no'] ?? []);
        $annexC->property_no = json_encode($validated['property_no'] ?? []);
        $annexC->unit_cost = json_encode($validated['unit_cost']);
        $annexC->total_amount = json_encode($validated['total_amount']);
        $annexC->save();

        // Set a success message and redirect
        Session::flash('success', 'Your form has been evaluated.');
        return redirect()->route('org.auth.sidebar.preevalfra');
    }
}
