<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnexA;

class AnnexAController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            'name_of_project' => 'required|string',
            'date_duration' => 'required|string',
            'requesting_organization' => 'required|string',
            'college_branch' => 'required|string',
            'representative' => 'required|string',
            'address_contact' => 'required|string',
            'objectives' => 'required|string',
            'estimate_income' => 'required|string',
            'price_ticket' => 'required|string',
            'total_estimate_ticket' => 'required|string',
            'other_income' => 'nullable|string',
            'total_estimated_income' => 'required|string',
            'expenditures' => 'required|array',
            'expenditures.*' => 'required|string',
            'amount' => 'required|array',
            'amount.*' => 'required|string',
            'total_budget_expenses_php' => 'required|string',
            'total_estimated_proceeds' => 'required|string',
            'utilization_plan' => 'required|string',
            'solicitation' => 'required|string',
            'coordinator' => 'required|string',
            'participants' => 'required|string',
            'president' => 'required|string',
            'treasurer' => 'required|string',
        ]);

        // Process and store data
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
        $annexA->other_income = $validated['other_income'];
        $annexA->total_estimated_income = $validated['total_estimated_income'];
        $annexA->expenditures = json_encode($validated['expenditures']); // Convert array to JSON
        $annexA->amount = json_encode($validated['amount']); // Convert array to JSON
        $annexA->total_budget_expenses_php = $validated['total_budget_expenses_php'];
        $annexA->total_estimated_proceeds = $validated['total_estimated_proceeds'];
        $annexA->utilization_plan = $validated['utilization_plan'];
        $annexA->solicitation = $validated['solicitation'];
        $annexA->coordinator = $validated['coordinator'];
        $annexA->participants = $validated['participants'];
        $annexA->president = $validated['president'];
        $annexA->treasurer = $validated['treasurer'];
        $annexA->save();

        // Redirect to the specified view
        return view('/org/auth/preeval');
    }
}