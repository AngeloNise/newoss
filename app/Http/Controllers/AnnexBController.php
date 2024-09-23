<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnexB;

class AnnexBController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_of_org' => 'required|string',
            'semester' => 'required|string',
            'school_year' => 'required|string',
            'period_covered' => 'required|string',
            'cash_balance' => 'nullable|string',
            'cash_receipt' => 'nullable|string',
            'solicitation' => 'nullable|string',
            'cash_available' => 'nullable|string',
            'cash_disbursements' => 'required|string',
            'ending_cash_balance' => 'required|string',
            'date_receipt' => 'nullable|array',
            'date_receipt.*' => 'nullable|string',
            'invoice_no_receipt' => 'nullable|array',
            'invoice_no_receipt.*' => 'nullable|string',
            'particulars' => 'nullable|array',
            'particulars.*' => 'nullable|string',
            'amount' => 'nullable|array',
            'amount.*' => 'nullable|string',
            'remarks_receipt' => 'nullable|array',
            'remarks_receipt.*' => 'nullable|string',
            'total_receipt' => 'required|string',
            'date_disburse' => 'nullable|array',
            'date_disburse.*' => 'nullable|string',
            'invoice_no_disburse' => 'nullable|array',
            'invoice_no_disburse.*' => 'nullable|string',
            'description' => 'nullable|array',
            'description.*' => 'nullable|string',
            'purpose' => 'nullable|array',
            'purpose.*' => 'nullable|string',
            'remarks_disburse' => 'nullable|array',
            'remarks_disburse.*' => 'nullable|string',
            'total_disburse' => 'required|string',
            'prepared' => 'nullable|string',
            'checked' => 'nullable|string',
            'approved' => 'nullable|string',
            'certified' => 'nullable|string',
        ]);

        $annexB = new AnnexB();
        $annexB->name_of_org = $validated['name_of_org'];
        $annexB->semester = $validated['semester'];
        $annexB->school_year = $validated['school_year'];
        $annexB->period_covered = $validated['period_covered'];
        $annexB->cash_balance = $validated['cash_balance'];
        $annexB->cash_receipt = $validated['cash_receipt'];
        $annexB->solicitation = $validated['solicitation'];
        $annexB->cash_available = $validated['cash_available'];
        $annexB->cash_disbursements = $validated['cash_disbursements'];
        $annexB->ending_cash_balance = $validated['ending_cash_balance'];
        $annexB->date_receipt = json_encode($validated['date_receipt'] ?? []);
        $annexB->invoice_no_receipt = json_encode($validated['invoice_no_receipt'] ?? []);
        $annexB->particulars = json_encode($validated['particulars'] ?? []);
        $annexB->amount = json_encode($validated['amount'] ?? []);
        $annexB->remarks_receipt = json_encode($validated['remarks_receipt'] ?? []);
        $annexB->total_receipt = $validated['total_receipt'];
        $annexB->date_disburse = json_encode($validated['date_disburse'] ?? []);
        $annexB->invoice_no_disburse = json_encode($validated['invoice_no_disburse'] ?? []);
        $annexB->description = json_encode($validated['description'] ?? []);
        $annexB->purpose = json_encode($validated['purpose'] ?? []);
        $annexB->remarks_disburse = json_encode($validated['remarks_disburse'] ?? []);
        $annexB->total_disburse = $validated['total_disburse'];
        $annexB->prepared = $validated['prepared'];
        $annexB->checked = $validated['checked'];
        $annexB->approved = $validated['approved'];
        $annexB->certified = $validated['certified'];
        $annexB->save();

        return view('/org/auth/preevalfra');
    }
}
