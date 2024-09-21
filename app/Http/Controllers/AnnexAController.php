<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnexA;

class AnnexAController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_of_project' => 'required|string',
            'date_duration' => 'required|string',
            'requesting_organization' => 'required|string',
            'college_branch' => 'required|string',
            'representative' => 'required|string',
            'address_contact' => 'required|string',
            'objectives' => 'required|string',
            'estimate_income' => 'nullable|string',
            'price_ticket' => 'nullable|string',
            'total_estimate_ticket' => 'nullable|string',
            'other_income' => 'nullable|array',
            'other_income.*' => 'nullable|string',
            'total_estimated_income' => 'required|string',
            'expenditures' => 'nullable|array',
            'expenditures.*' => 'nullable|string',
            'amount' => 'nullable|array',
            'amount.*' => 'nullable|string',
            'total_budget_expenses_php' => 'required|string',
            'total_estimated_proceeds' => 'required|string',
            'utilization_plan' => 'nullable|string',
            'solicitation' => 'nullable|string',
            'coordinator' => 'nullable|string',
            'participants' => 'nullable|string',
            'president' => 'nullable|string',
            'treasurer' => 'nullable|string',
        ]);
    
        $annexA = new AnnexA();
        $annexA->name_of_project = $validated['name_of_project'];
        $annexA->date_duration = $validated['date_duration'];
        $annexA->requesting_organization = $validated['requesting_organization'];
        $annexA->college_branch = $validated['college_branch'];
        $annexA->representative = $validated['representative'];
        $annexA->address_contact = $validated['address_contact'];
        $annexA->objectives = $validated['objectives'];
        $annexA->estimate_income = $validated['estimate_income'];
        $annexA->price_ticket = $validated['price_ticket'];
        $annexA->total_estimate_ticket = $validated['total_estimate_ticket'];
        $annexA->other_income = json_encode($validated['other_income'] ?? []);
        $annexA->total_estimated_income = $validated['total_estimated_income'];
        $annexA->expenditures = json_encode($validated['expenditures'] ?? []);
        $annexA->amount = json_encode($validated['amount'] ?? []);
        $annexA->total_budget_expenses_php = $validated['total_budget_expenses_php'];
        $annexA->total_estimated_proceeds = $validated['total_estimated_proceeds'];
        $annexA->utilization_plan = $validated['utilization_plan'];
        $annexA->solicitation = $validated['solicitation'];
        $annexA->coordinator = $validated['coordinator'];
        $annexA->participants = $validated['participants'];
        $annexA->president = $validated['president'];
        $annexA->treasurer = $validated['treasurer'];
        $annexA->save();
    
        return view('/org/auth/preevalfra');
    }
    
}
