<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnnexA;
use App\Models\User; // Import the User model to check for organization
use Illuminate\Support\Facades\Session;

class AnnexAController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'name_of_project' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'requesting_organization' => 'required|string',
            'college_branch' => 'required|string',
            'representative' => 'required|string',
            'address_contact' => 'required|string',
            'objectives' => 'required|string',
            'items_to_be_sold' => 'nullable|array',
            'items_to_be_sold.*' => 'nullable|string',
            'item_pieces' => 'nullable|array',
            'item_pieces.*' => 'nullable|string',
            'price_ticket' => 'nullable|array',
            'price_ticket.*' => 'nullable|string',
            'total_estimate_ticket' => 'nullable|array',
            'total_estimate_ticket.*' => 'nullable|string',
            'other_income' => 'nullable|array',
            'other_income.*' => 'nullable|string',
            'income_amount' => 'nullable|array',
            'income_amount.*' => 'nullable|string',
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
            'email' => 'required|email',
        ]);
    
        // Get the logged-in user
        $user = auth()->user();
    
        // Check if the requesting organization matches the user's organization
        if ($user->name_of_organization !== $validated['requesting_organization']) {
            Session::flash('error', 'Your organization name does not match your credentials.');
            Session::flash('error_field', 'requesting_organization');
            return redirect()->back()->withInput();
        }
    
        // Check if the president exists in the same organization as the logged-in user
        $presidentExists = User::where('name', $validated['president'])
            ->where('name_of_organization', $user->name_of_organization)
            ->exists();
    
        if (!$presidentExists) {
            Session::flash('error', 'President name does not match your organization.');
            Session::flash('error_field', 'president');
            return redirect()->back()->withInput();
        }
    
        // Proceed with saving the form data if validations pass
        $annexA = new AnnexA();
        $annexA->name_of_project = $validated['name_of_project'];
        $annexA->start_date = $validated['start_date'];
        $annexA->end_date = $validated['end_date'];
        $annexA->requesting_organization = $validated['requesting_organization'];
        $annexA->college_branch = $validated['college_branch'];
        $annexA->representative = $validated['representative'];
        $annexA->address_contact = $validated['address_contact'];
        $annexA->objectives = $validated['objectives'];
        $annexA->items_to_be_sold = json_encode($validated['items_to_be_sold'] ?? []);
        $annexA->item_pieces = json_encode($validated['item_pieces'] ?? []);
        $annexA->price_ticket = json_encode($validated['price_ticket'] ?? []);
        $annexA->total_estimate_ticket = json_encode($validated['total_estimate_ticket'] ?? []);
        $annexA->other_income = json_encode($validated['other_income'] ?? []);
        $annexA->income_amount = json_encode($validated['income_amount'] ?? []);
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
        $annexA->email = $validated['email'];
        $annexA->save();
    
        // Show a success message
        Session::flash('success', 'Your form has been evaluated.');
        return redirect()->route('org.auth.sidebar.preevalfra');
    }
}