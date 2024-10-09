@extends('layout.orglayout')
@section('content')

@if(Session::has('error'))
    <script>
        window.flashMessage = {
            message: "{{ Session::get('error') }}",
            type: "error"
        };
    </script>
@endif

@if(Session::has('success'))
    <script>
        window.flashMessage = {
            message: "{{ Session::get('success') }}",
            type: "success"
        };
    </script>
@endif

<div class="fra-container">
    <form action="{{ url('/annex-a') }}" method="POST">
    @csrf
        <h2>FUND RAISING ACTIVITY APPLICATION (Annex-A)</h2>
        <div class="fill-up-container">
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">
            
            <div class="fra-group">
                <label for="name_of_project">Name of Project</label>
                <input type="text" id="name_of_project" name="name_of_project" class="form-control" value="{{ old('name_of_project') }}">
            </div>
            
            <div id="duration">
                <div class="split">
                    <div class="fra-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}">
                    </div>
                    
                    <div class="fra-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date') }}">
                    </div>
                </div>
            </div>

            <div class="fra-group">
                <label for="requesting_organization">Requesting Organization</label>
                <input type="text" id="requesting_organization" name="requesting_organization" class="form-control {{ Session::has('error_field') && Session::get('error_field') == 'requesting_organization' ? 'is-invalid' : '' }}" 
                    value="{{ old('requesting_organization') }}" 
                    placeholder="{{ auth()->user()->name_of_organization ?? 'Enter your organization name' }}">
                @if(Session::has('error_field') && Session::get('error_field') == 'requesting_organization')
                    <small class="text-danger">The requesting organization does not match our records.</small>
                @endif
            </div>
            
            <div class="fra-group">
                <label for="college_branch">College/Branch/Campus</label>
                <input type="text" id="college_branch" name="college_branch" class="form-control" value="{{ old('college_branch') }}">
            </div>
    
            <div class="fra-group">
                <label for="representative">Name of Representative</label>
                <input type="text" id="representative" name="representative" class="form-control" value="{{ old('representative') }}">
            </div>
    
            <div class="fra-group">
                <label for="address_contact">Address/Contact No.</label>
                <input type="text" id="address_contact" name="address_contact" class="form-control" value="{{ old('address_contact') }}">
            </div>
    
            <div class="fra-group">
                <label for="objectives">Objectives</label>
                <input type="text" id="objectives" name="objectives" class="form-control" value="{{ old('objectives') }}">
            </div>

            <h2>Project Estimates</h2>
            <h3>1. Estimate Income</h3>
            
            <div id="items">
                <h5>(Tickets are to be registered at the Office of Student Services)</h5>
                <div class="items-to-be-sold">
                    <div class="fra-group">
                        <label for="estimate_income">a. Number of tickets/items to be sold</label>
                        @if (is_array(old('estimate_income')))
                            @foreach (old('estimate_income') as $income)
                                <input type="text" id="estimate_income" name="estimate_income[]" class="form-control" value="{{ $income }}"><br>
                            @endforeach
                        @else
                            <input type="text" id="estimate_income" name="estimate_income[]" class="form-control" value="">
                        @endif
                    </div>
    
                    <div class="fra-group">
                        <label for="item_pieces">Pieces</label>
                        @if (is_array(old('item_pieces')))
                            @foreach (old('item_pieces') as $pieces)
                                <input type="text" id="item_pieces" name="item_pieces[]" class="form-control" value="{{ $pieces }}">
                            @endforeach
                        @else
                            <input type="text" id="item_pieces" name="item_pieces[]" class="form-control" value="">
                        @endif
                    </div>

                    <div class="fra-group">
                        <label for="price_ticket">b. Price per ticket/item</label>
                        @if (is_array(old('price_ticket')))
                            @foreach (old('price_ticket') as $price)
                                <input type="text" id="price_ticket" name="price_ticket[]" class="form-control" placeholder="Php" value="{{ $price }}">
                            @endforeach
                        @else
                            <input type="text" id="price_ticket" name="price_ticket[]" class="form-control" value="">
                        @endif
                    </div>
                </div>
            </div>

            <div class="button-items">
                <button type="button" id="remove-items">Remove</button>
                <button type="button" id="add-items">Add</button>
            </div> 

            <div id="add-sales">
                <div class="total-sales">
                    <div class="fra-group">
                        <label for="total_estimate_ticket">c. Total estimated tickets/items sales (a × b)</label>
                        @if (is_array(old('total_estimate_ticket')))
                            @foreach (old('total_estimate_ticket') as $total)
                                <input type="text" id="total_estimate_ticket" name="total_estimate_ticket[]" class="form-control" value="{{ $total }}">
                            @endforeach
                        @else
                            <input type="text" id="total_estimate_ticket" name="total_estimate_ticket[]" class="form-control" value="">
                        @endif
                    </div>
                </div>
            </div>

            <div class="button-sales">
                <button type="button" id="remove-item-sales">Remove</button>
                <button type="button" id="add-item-sales">Add</button>
            </div> 

            <div id="add-income">
                <div class="split">
                    <div class="fra-group">
                        <label for="other_income">d. Other Income</label>
                        @if (is_array(old('other_income')))
                            @foreach (old('other_income') as $income)
                                <input type="text" id="other_income" name="other_income[]" class="form-control" value="{{ $income }}">
                            @endforeach
                        @else
                            <input type="text" id="other_income" name="other_income[]" class="form-control" value="">
                        @endif
                    </div>

                    <div class="fra-group">
                        <label for="income_amount">Amount</label>
                        @if (is_array(old('income_amount')))
                            @foreach (old('income_amount') as $amount)
                                <input type="text" id="income_amount" name="income_amount[]" class="form-control" value="{{ $amount }}">
                            @endforeach
                        @else
                            <input type="text" id="income_amount" name="income_amount[]" class="form-control" value="">
                        @endif
                    </div>
                </div>
            </div>

            <div class="button-income">
                <button type="button" id="remove-other-income">Remove</button>
                <button type="button" id="add-other-income">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_estimated_income">e.Total estimated Income (c + d)</label>
                <input type="text" id="total_estimated_income" name="total_estimated_income" class="form-control" value="{{ old('total_estimated_income') }}">
            </div>

            <h3>2. Budget Expenses</h3>
            <div id="budget-container">
                <div class="split">
                    <div class="fra-group">
                        <label for="expenditures">Expenditure</label>
                        @if (is_array(old('expenditures')))
                            @foreach (old('expenditures') as $expenditure)
                                <input type="text" id="expenditures" name="expenditures[]" class="form-control" value="{{ $expenditure }}">
                            @endforeach
                        @else
                            <input type="text" id="expenditures" name="expenditures[]" class="form-control" value="">
                        @endif
                    </div>
            
                    <div class="fra-group">
                        <label for="amount">Cost</label>
                        @if (is_array(old('amount')))
                            @foreach (old('amount') as $amount)
                                <input type="text" id="amount" name="amount[]" class="form-control" value="{{ $amount }}">
                            @endforeach
                        @else
                            <input type="text" id="amount" name="amount[]" class="form-control" value="">
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="button-budget">
                <button type="button" id="remove-budget">Remove</button>
                <button type="button" id="add-budget">Add</button>
            </div>  

            <div class="fra-group">
                <label for="total_budget_expenses_php">a. Total Budgeted Expenses</label>
                <input type="text" id="total_budget_expenses_php" name="total_budget_expenses_php" class="form-control" placeholder="(sum of 𝑛 terms of 𝑎) Php" value="{{ old('total_budget_expenses_php') }}">
            </div>

            <div class="fra-group">
                <label for="total_estimated_proceeds">3. Total Estimated Proceeds (1e-2a)</label>
                <input type="text" id="total_estimated_proceeds" name="total_estimated_proceeds" class="form-control" placeholder="Php" value="{{ old('total_estimated_proceeds') }}">
            </div>

            <div class="fra-group">
                <label for="utilization_plan">4. Proceeds Utilization Plan/Budget Proposal</label>
                <input type="text" id="utilization_plan" name="utilization_plan" class="form-control" value="{{ old('utilization_plan') }}">
            </div>

            <div class="fra-group">
                <label for="solicitation">5. Solicitation/Lists of Donors</label>
                <input type="text" id="solicitation" name="solicitation" class="form-control" value="{{ old('solicitation') }}">
            </div>

            <div class="fra-group">
                <label for="coordinator">6. Lists of Officials/Coordinator</label>
                <input type="text" id="coordinator" name="coordinator" class="form-control" value="{{ old('coordinator') }}">
            </div>

            <div class="fra-group">
                <label for="participants">7. Lists of Participants</label>
                <input type="text" id="participants" name="participants" class="form-control" value="{{ old('participants') }}">
            </div>

            <h3>Additional Information</h3>
        <div class="split">
            <div class="fra-group">
                <label for="president">President of Organization</label>
                <input type="text" id="president" name="president" class="form-control {{ Session::has('error_field') && Session::get('error_field') == 'president' ? 'is-invalid' : '' }}" 
                    value="{{ old('president') }}" 
                    placeholder="{{ auth()->user()->name ?? 'Enter the president\'s name' }}">
                @if(Session::has('error_field') && Session::get('error_field') == 'president')
                    <small class="text-danger">The president's name does not match our records.</small>
                @endif
            </div>

            <div class="fra-group">
                <label for="treasurer">Treasurer/ Representative</label>
                <input type="text" id="treasurer" name="treasurer" class="form-control" value="{{ old('treasurer') }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
