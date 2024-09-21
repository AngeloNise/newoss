@extends('layout.orglayout')
@section('content')
<div class="fra-container">
    <form action="{{ url('annexas') }}" method="POST">
    @csrf
        <h2>FUND RAISING ACTIVITY APPLICATION (Annex-A)</h2>
        <div class="fill-up-container">
            <div class="fra-group">
                <label for="name_of_project">Name of Project</label>
                <input type="text" id="name_of_project" name="name_of_project" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="date_duration">Date/Duration</label>
                <input type="text" id="date_duration" name="date_duration" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="requesting_organization">Requesting Organization</label>
                <input type="text" id="requesting_organization" name="requesting_organization" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="college_branch">College/Branch/Campus</label>
                <input type="text" id="college_branch" name="college_branch" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="representative">Name of Representative</label>
                <input type="text" id="representative" name="representative" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="address_contact">Address/Contact No.</label>
                <input type="text" id="address_contact" name="address_contact" class="form-control">
            </div>
    
            <div class="fra-group">
                <label for="objectives">Objectives</label>
                <input type="text" id="objectives" name="objectives" class="form-control">
            </div>

            <h2>Project Estimates</h2>
            <h3>1. Estimate Income</h3>
            <div class="fra-group">
                <label for="estimate_income">a. Number of tickets/items to be sold</label>
                <input type="text" id="estimate_income" name="estimate_income" class="form-control">
                <h5>(Tickets are to be registered at the Office of Student Services)</h5>
            </div>

            <div class="fra-group">
                <label for="price_ticket">b. Price per ticket/item</label>
                <input type="text" id="price_ticket" name="price_ticket" class="form-control" placeholder="Php">
            </div>

            <div class="fra-group">
                <label for="total_estimate_ticket">c. Total estimated tickets/items sales (a × b)</label>
                <input type="text" id="total_estimate_ticket" name="total_estimate_ticket" class="form-control">
            </div>

            <div id="add-income">
                <div class="other-income">
                    <div class="fra-group">
                        <label for="other_income">d. Other Income</label>
                        <input type="text" id="other_income" name="other_income[]" class="form-control">
                    </div>
                </div>
            </div>

            <div class="button-container">
                <button type="button" id="add-other-income">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_estimated_income">e.Total estimated Income (c + d)</label>
                <input type="text" id="total_estimated_income" name="total_estimated_income" class="form-control">
            </div>

            <h3>2. Budget Expenses</h3>
            <div id="budget-container">
                <div class="split">
                    <div class="fra-group">
                        <label for="expenditures">a. EXPENDITURES</label>
                        <input type="text" id="expenditures" name="expenditures[]" class="form-control">
                    </div>
            
                    <div class="fra-group">
                        <label for="amount">AMOUNT</label>
                        <input type="text" id="amount" name="amount[]" class="form-control">
                    </div>
                </div>
            </div>                

            <div class="fra-group">
                <label for="total_budget_expenses_php">Total Budgeted Expenses</label>
                <input type="text" id="total_budget_expenses_php" name="total_budget_expenses_php" class="form-control" placeholder="(sum of 𝑛 terms of 𝑎) Php">
            </div>

            <div class="button-container">
                <button type="button" id="add-budget">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_estimated_proceeds">3. Total Estimated Proceeds (1e-2a)</label>
                <input type="text" id="total_estimated_proceeds" name="total_estimated_proceeds" class="form-control" placeholder="Php">
            </div>

            <div class="fra-group">
                <label for="utilization_plan">4. Proceeds Utilization Plan/Budget Proposal</label>
                <input type="text" id="utilization_plan" name="utilization_plan" class="form-control">
            </div>

            <div class="fra-group">
                <label for="solicitation">5. Solicitation/Lists of Donors</label>
                <input type="text" id="solicitation" name="solicitation" class="form-control">
            </div>

            <div class="fra-group">
                <label for="coordinator">6. Lists of Officials/Coordinator</label>
                <input type="text" id="coordinator" name="coordinator" class="form-control">
            </div>

            <div class="fra-group">
                <label for="participants">7. Lists of Participants</label>
                <input type="text" id="participants" name="participants" class="form-control">
            </div>

            <h3>Additional Information</h3>
        <div class="split">
            <div class="fra-group">
                <label for="president">President of Organization</label>
                <input type="text" id="president" name="president" class="form-control">
            </div>

            <div class="fra-group">
                <label for="treasurer">Treasurer/ Representative</label>
                <input type="text" id="treasurer" name="treasurer" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection