<?php

namespace App\Http\Controllers\preeval;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AnnexA;
use App\Models\User; // Import the User model to check for organization
use Illuminate\Support\Facades\Session;

class AnnexAController extends Controller
{
    // Common validation rules
    protected function validationRules()
    {
        return [
            'name_of_project' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'requesting_organization' => 'required|string|max:255',
            'college_branch' => 'required|string|max:255',
            'representative' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'objectives' => 'required|string|max:255',
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
        ];
    }

    protected function prepareData(array $validated, $user)
    {
        return [
            'name_of_project' => $validated['name_of_project'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'requesting_organization' => $validated['requesting_organization'],
            'college_branch' => $validated['college_branch'],
            'representative' => $validated['representative'],
            'address' => $validated['address'],
            'contact' => $validated['contact'],
            'objectives' => $validated['objectives'],
            'items_to_be_sold' => json_encode($validated['items_to_be_sold'] ?? []),
            'item_pieces' => json_encode($validated['item_pieces'] ?? []),
            'price_ticket' => json_encode($validated['price_ticket'] ?? []),
            'total_estimate_ticket' => json_encode($validated['total_estimate_ticket'] ?? []),
            'other_income' => json_encode($validated['other_income'] ?? []),
            'income_amount' => json_encode($validated['income_amount'] ?? []),
            'total_estimated_income' => $validated['total_estimated_income'],
            'expenditures' => json_encode($validated['expenditures'] ?? []),
            'amount' => json_encode($validated['amount'] ?? []),
            'total_budget_expenses_php' => $validated['total_budget_expenses_php'],
            'total_estimated_proceeds' => $validated['total_estimated_proceeds'],
            'utilization_plan' => $validated['utilization_plan'],
            'solicitation' => $validated['solicitation'],
            'coordinator' => $validated['coordinator'],
            'participants' => $validated['participants'],
            'president' => $validated['president'],
            'treasurer' => $validated['treasurer'],
            'email' => $validated['email'],
            'color' => $user->color, // Assuming the AnnexA model has a 'color' field
        ];
    }

    public function store(Request $request)
    {
        $validated = $request->validate($this->validationRules());
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
        $annexA = new AnnexA($this->prepareData($validated, $user));
        $annexA->save();

        // Show a success message
        Session::flash('success', 'Your form has passed the first evaluation');
        return redirect()->route('org.auth.sidebar.preevalfra');
    }

    public function edit($id)
    {
        // Find the AnnexA record by ID
        $annexA = AnnexA::findOrFail($id);
    
        // Return a view to edit the record, passing the record data
        return view('org.auth.sidebar.fraeval.edit', compact('annexA'));
    }

    public function update(Request $request, $id)
    {
        // Validate incoming request data
        try {
            $validatedData = $request->validate($this->validationRules());
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Flatten the error messages for a proper string representation
            $errorMessages = array_map(function($error) {
                return implode(', ', $error);
            }, $e->errors());
    
            Session::flash('error', 'Validation failed: ' . implode(', ', $errorMessages));
            return redirect()->back()->withInput();
        }
    
        $user = auth()->user();
    
        // Check if the requesting organization matches the user's organization
        if ($user->name_of_organization !== $validatedData['requesting_organization']) {
            Session::flash('error', 'Your organization name does not match your credentials.');
            return redirect()->back()->withInput();
        }
    
        // Find the AnnexA record by ID
        $annexA = AnnexA::findOrFail($id);
    
        // Prepare the data for updating
        $dataToUpdate = [
            'name_of_project' => $validatedData['name_of_project'],
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'requesting_organization' => $validatedData['requesting_organization'],
            'college_branch' => $validatedData['college_branch'],
            'representative' => $validatedData['representative'],
            'address' => $validatedData['address'],
            'contact' => $validatedData['contact'],
            'objectives' => $validatedData['objectives'],
            // JSON encode array fields
            'items_to_be_sold' => is_array($validatedData['items_to_be_sold']) ? json_encode($validatedData['items_to_be_sold']) : null,
            'item_pieces' => is_array($validatedData['item_pieces']) ? json_encode($validatedData['item_pieces']) : null,
            'price_ticket' => is_array($validatedData['price_ticket']) ? json_encode($validatedData['price_ticket']) : null,
            'total_estimate_ticket' => is_array($validatedData['total_estimate_ticket']) ? json_encode($validatedData['total_estimate_ticket']) : null,
            'other_income' => is_array($validatedData['other_income']) ? json_encode($validatedData['other_income']) : null,
            'income_amount' => is_array($validatedData['income_amount']) ? json_encode($validatedData['income_amount']) : null,
            'total_estimated_income' => $validatedData['total_estimated_income'],
            'expenditures' => is_array($validatedData['expenditures']) ? json_encode($validatedData['expenditures']) : null,
            'amount' => is_array($validatedData['amount']) ? json_encode($validatedData['amount']) : null,
            'total_budget_expenses_php' => $validatedData['total_budget_expenses_php'],
            'total_estimated_proceeds' => $validatedData['total_estimated_proceeds'],
            'utilization_plan' => $validatedData['utilization_plan'],
            'solicitation' => $validatedData['solicitation'],
            'coordinator' => $validatedData['coordinator'],
            'participants' => $validatedData['participants'],
            'president' => $validatedData['president'],
            'treasurer' => $validatedData['treasurer'],
            'email' => $validatedData['email'],
        ];
    
        // Update the fields using mass assignment with the prepared data
        $annexA->fill($dataToUpdate);
    
        // Save the changes and handle the response
        if ($annexA->save()) {
            Session::flash('success', 'Your form has been updated successfully');
        } else {
            Session::flash('error', 'Failed to update the form. Please try again.');
        }
    
        return redirect()->route('org.auth.sidebar.preevalfra.edit', $id); // Adjust the route if necessary
    }    
}
