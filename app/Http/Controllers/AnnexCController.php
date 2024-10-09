<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnexC;
use Illuminate\Support\Facades\Session;

class AnnexCController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
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

        $annexC = new AnnexC();
        $annexC->qty = json_encode($validated['qty']);
        $annexC->unit = json_encode($validated['unit']);
        $annexC->item_description = json_encode($validated['item_description'] ?? []);
        $annexC->serial_no = json_encode($validated['serial_no'] ?? []);
        $annexC->property_no = json_encode($validated['property_no'] ?? []);
        $annexC->unit_cost = json_encode($validated['unit_cost']);
        $annexC->total_amount = json_encode($validated['total_amount']);
        $annexC->save();

        Session::flash('success', 'Your form has been evaluated.');
        return redirect()->route('org.auth.preevalfra');
    }
}
