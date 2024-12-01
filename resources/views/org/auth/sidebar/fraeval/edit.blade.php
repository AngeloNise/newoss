@extends('layout.orglayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/fraeval/annexa.css') }}">
<script src="{{ asset('js/org/annexa.js') }}"></script>
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
    <a href="/Pre-Evaluation-PDF" class="btn btn-primary">Back</a>
    <h1>Edit Annex A</h1>
    <form action="{{ route('org.auth.sidebar.preevalfra.update', $annexA->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h2>FUND RAISING ACTIVITY APPLICATION (Annex-A)</h2>
        <div class="fill-up-container">
            <input type="hidden" name="email" value="{{ auth()->user()->email }}">

            <div class="fra-group">
                <label for="name_of_project">Name of Project</label>
                <input type="text" id="name_of_project" name="name_of_project" class="form-control {{ $errors->has('name_of_project') ? 'is-invalid' : '' }}" 
                    value="{{ old('name_of_project', $annexA->name_of_project) }}">
                @error('name_of_project')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div id="duration">
                <div class="split">
                    <div class="fra-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" 
                            value="{{ old('start_date', $annexA->start_date) }}">
                        @error('start_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="fra-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" 
                            value="{{ old('end_date', $annexA->end_date) }}">
                        @error('end_date')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="fra-group">
                <label for="requesting_organization">Requesting Organization</label>
                <input type="text" id="requesting_organization" name="requesting_organization" class="form-control {{ Session::has('error_field') && Session::get('error_field') == 'requesting_organization' ? 'is-invalid' : '' }}" 
                    value="{{ old('requesting_organization', $annexA->requesting_organization) }}" 
                    placeholder="{{ auth()->user()->name_of_organization ?? 'Enter your organization name' }}"readonly>
                @if(Session::has('error_field') && Session::get('error_field') == 'requesting_organization')
                    <small class="text-danger">The requesting organization does not match our records.</small>
                @endif
            </div>

            <div class="fra-group">
                <label for="college_branch">College/Branch/Campus</label>
                <input type="text" id="college_branch" name="college_branch" class="form-control {{ $errors->has('college_branch') ? 'is-invalid' : '' }}" 
                    value="{{ old('college_branch', $annexA->college_branch) }}">
                @error('college_branch')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="fra-group">
                <label for="representative">Name of Representative</label>
                <input type="text" id="representative" name="representative" class="form-control {{ $errors->has('representative') ? 'is-invalid' : '' }}" 
                    value="{{ old('representative', $annexA->representative) }}">
                @error('representative')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="fra-group">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" 
                    value="{{ old('address', $annexA->address) }}">
                @error('address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="fra-group">
                <label for="contact">Contact No.</label>
                <input type="text" id="contact" name="contact" class="form-control {{ $errors->has('contact') ? 'is-invalid' : '' }}" 
                    value="{{ old('contact', $annexA->contact) }}">
                @error('contact')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="fra-group">
                <label for="objectives">Objectives</label>
                <input type="text" id="objectives" name="objectives" class="form-control {{ $errors->has('objectives') ? 'is-invalid' : '' }}" 
                    value="{{ old('objectives', $annexA->objectives) }}">
                @error('objectives')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <h2>Project Estimates</h2>
            <h3>1. Estimate Income</h3>

            <div id="items">
                <h5>(Tickets are to be registered at the Office of Student Services)</h5>
                <div class="items-to-be-sold">
                    <div class="fra-group">
                        <label for="items_to_be_sold">a. Tickets/items to be sold</label>
                        @if (is_array(old('items_to_be_sold')) || !empty($annexA->items_to_be_sold))
                            @foreach (old('items_to_be_sold', json_decode($annexA->items_to_be_sold)) as $income)
                                <input type="text" id="items_to_be_sold" name="items_to_be_sold[]" class="form-control" value="{{ $income }}"><br>
                            @endforeach
                        @else
                            <input type="text" id="items_to_be_sold" name="items_to_be_sold[]" class="form-control" value="">
                        @endif
                    </div>
            
                    <div class="fra-group">
                        <label for="item_pieces">Pieces</label>
                        @if (is_array(old('item_pieces')) || !empty($annexA->item_pieces))
                            @foreach (old('item_pieces', json_decode($annexA->item_pieces)) as $pieces)
                                <input type="number" id="item_pieces" name="item_pieces[]" class="form-control" value="{{ $pieces }}">
                                <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div> <!-- Error message -->
                            @endforeach
                        @else
                            <input type="number" id="item_pieces" name="item_pieces[]" class="form-control" value="">
                            <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div> <!-- Error message -->
                        @endif
                    </div>
                    
                    <div class="fra-group">
                        <label for="price_ticket">b. Price per ticket/item</label>
                        @if (is_array(old('price_ticket')) || !empty($annexA->price_ticket))
                            @foreach (old('price_ticket', json_decode($annexA->price_ticket)) as $price)
                                <input type="number" id="price_ticket" name="price_ticket[]" class="form-control" value="{{ $price }}">
                                <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div> <!-- Error message -->
                            @endforeach
                        @else
                            <input type="number" id="price_ticket" name="price_ticket[]" class="form-control" value="">
                            <div class="error-message" style="color: red; display: none;">Please enter a valid number.</div> <!-- Error message -->
                        @endif
                    </div>
                </div>
            </div>

            <div class="button-items">
                <button type="button" id="remove-items">Remove</button>
                <button type="button" id="add-items">Add</button>
            </div> 

            <div id="total-sales-container">
                <div class="total-sales">
                    <div class="fra-group">
                        <label for="total_estimate_ticket">c. Total estimated tickets/items sales (a × b)</label>
                        <h5>(Note: Change the value if you see the computation went wrong or different from what you got.)</h5>
                        @if (is_array(old('total_estimate_ticket')) || !empty($annexA->total_estimate_ticket))
                            @foreach (old('total_estimate_ticket', json_decode($annexA->total_estimate_ticket)) as $total)
                                <input type="text" id="total_estimate_ticket" name="total_estimate_ticket[]" class="form-control" value="{{ $total }}">
                            @endforeach
                        @else
                            <input type="text" id="total_estimate_ticket" name="total_estimate_ticket[]" class="form-control" value="">
                        @endif
                    </div>
                </div>
            </div>
            
            <div id="add-income">
                <div class="split">
                    <div class="fra-group">
                        <label for="other_income">d. Other Income</label>
                        @if (is_array(old('other_income')) || !empty($annexA->other_income))
                            @foreach (old('other_income', json_decode($annexA->other_income)) as $income)
                                <input type="text" id="other_income" name="other_income[]" class="form-control" value="{{ $income }}">
                            @endforeach
                        @else
                            <input type="text" id="other_income" name="other_income[]" class="form-control" value="">
                        @endif
                    </div>
            
                    <div class="fra-group">
                        <label for="income_amount">Amount</label>
                        @if (is_array(old('income_amount')) || !empty($annexA->income_amount))
                            @foreach (old('income_amount', json_decode($annexA->income_amount)) as $amount)
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
                <label for="total_estimated_income">e. Total estimated Income (c + d)</label>
                <input type="text" id="total_estimated_income" name="total_estimated_income" class="form-control" 
                    value="{{ old('total_estimated_income', $annexA->total_estimated_income ?? '') }}">
            </div>
            
            <h3>2. Budget Expenses</h3>
            <div id="budget-container">
                <div class="split">
                    <div class="fra-group">
                        <label for="expenditures">Expenditure</label>
                        @if (is_array(old('expenditures')) || !empty($annexA->expenditures))
                            @foreach (old('expenditures', json_decode($annexA->expenditures)) as $expenditure)
                                <input type="text" id="expenditures" name="expenditures[]" class="form-control" value="{{ $expenditure }}">
                            @endforeach
                        @else
                            <input type="text" id="expenditures" name="expenditures[]" class="form-control" value="">
                        @endif
                    </div>
            
                    <div class="fra-group">
                        <label for="amount">Cost</label>
                        @if (is_array(old('amount')) || !empty($annexA->amount))
                            @foreach (old('amount', json_decode($annexA->amount)) as $amount)
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
                <input type="text" id="total_budget_expenses_php" name="total_budget_expenses_php" class="form-control" 
                    placeholder="(sum of all expenditures) Php" 
                    value="{{ old('total_budget_expenses_php', $annexA->total_budget_expenses_php ?? '') }}">
            </div>
            
            <div class="fra-group">
                <label for="total_estimated_proceeds">3. Total Estimated Proceeds (1e-2a)</label>
                <input type="text" id="total_estimated_proceeds" name="total_estimated_proceeds" class="form-control" 
                    placeholder="(Php) total estimated income minus total budgeted expenses" 
                    value="{{ old('total_estimated_proceeds', $annexA->total_estimated_proceeds ?? '') }}">
            </div>
            
            <div class="fra-group">
                <label for="utilization_plan">4. Proceeds Utilization Plan/Budget Proposal</label>
                <input type="text" id="utilization_plan" name="utilization_plan" class="form-control" 
                    value="{{ old('utilization_plan', $annexA->utilization_plan ?? '') }}">
            </div>
            
            <div class="fra-group">
                <label for="solicitation">5. Solicitation/Lists of Donors</label>
                <input type="text" id="solicitation" name="solicitation" class="form-control" 
                    value="{{ old('solicitation', $annexA->solicitation ?? '') }}">
            </div>
            
            <div class="fra-group">
                <div id="coordinator">
                    <div class="fra-group">
                        <label for="coordinator">6. Lists of Officials/Coordinators</label>
                        @if (is_array(old('coordinator')) || !empty($annexA->coordinator))
                            @foreach (old('coordinator', json_decode($annexA->coordinator, true)) as $coordinator)
                                <input type="text" id="coordinator" name="coordinator[]" class="form-control" value="{{ $coordinator }}">
                            @endforeach
                        @else
                            <input type="text" id="coordinator" name="coordinator[]" class="form-control" value="">
                        @endif
                    </div>
                </div>                             
            </div>

            <div class="button-coordinator">
                <button type="button" id="remove-coordinator">Remove</button>
                <button type="button" id="add-coordinator">Add</button>
            </div>
            
            <div class="fra-group">
                <label for="participants">7. Lists of Participants</label>
                <input type="text" id="participants" name="participants" class="form-control" 
                    value="{{ old('participants', $annexA->participants ?? '') }}">
            </div>
            
            <h3>Additional Information</h3>
            <div class="split">
                <div class="fra-group">
                    <label for="president">President of Organization</label>
                    <input type="text" id="president" name="president" class="form-control {{ Session::has('error_field') && Session::get('error_field') == 'president' ? 'is-invalid' : '' }}" 
                        value="{{ old('president', $annexA->president ?? auth()->user()->name) }}" 
                        placeholder="{{ auth()->user()->name ?? 'Enter the president\'s name' }}" readonly>
                    @if(Session::has('error_field') && Session::get('error_field') == 'president')
                        <small class="text-danger">The president's name does not match our records.</small>
                    @endif
                </div>
            
                <div class="fra-group">
                    <label for="treasurer">Treasurer/ Representative</label>
                    <input type="text" id="treasurer" name="treasurer" class="form-control" 
                        value="{{ old('treasurer', $annexA->treasurer ?? '') }}">
                </div>
            </div>

            <div class="fra-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
