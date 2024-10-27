@extends('layout.adminlayout')
@section('content')
<div class="fra-container">
    <a href="/faculty/FRA-A-Evaluation" class="btn btn-primary">Back</a>
    <h2>Evaluation Details</h2>

    <div class="org_info">
        <h3>Project Information</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Name of Project</th>
                    <th>Requesting Organization</th>
                    <th>College Branch</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $annexa->email ?? 'N/A' }}</td>
                    <td>{{ $annexa->name_of_project ?? 'N/A' }}</td>
                    <td>{{ $annexa->requesting_organization ?? 'N/A' }}</td>
                    <td>{{ $annexa->college_branch ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table">
            <thead>
                <tr>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Representative</th>
                    <th>Address and Contact</th>
                    <th>Objectives</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $annexa->start_date ?? 'N/A' }}</td>
                    <td>{{ $annexa->end_date ?? 'N/A' }}</td>
                    <td>{{ $annexa->representative ?? 'N/A' }}</td>
                    <td>{{ $annexa->address ?? 'N/A' }}{{ $annexa->address && $annexa->contact ? ' - ' : '' }}{{ $annexa->contact ?? 'N/A' }}</td>
                    <td>{{ $annexa->objectives ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="items_info">
        <h3>Items to be Sold</h3>
        @php
            $items_to_be_sold = json_decode($annexa->items_to_be_sold) ?? [];
            $item_pieces = json_decode($annexa->item_pieces) ?? [];
            $itemPrices = json_decode($annexa->price_ticket) ?? [];
            $totalEstimateItems = json_decode($annexa->total_estimate_ticket) ?? [];
        @endphp

        @if (is_array($items_to_be_sold) && is_array($itemPrices))
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Item Pieces</th>
                        <th>Price</th>
                        <th>Estimate Item Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items_to_be_sold as $index => $item)
                        <tr>
                            <td>{{ $item ?? 'N/A' }}</td>
                            <td>{{ $item_pieces[$index] ?? 'N/A' }}</td>
                            <td>{{ $itemPrices[$index] ?? 'N/A' }}</td>
                            <td>{{ $totalEstimateItems[$index] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p><strong>Other Income:</strong> N/A</p>
        @endif

        <h3>Other Income</h3>
        @php
            $other_income = json_decode($annexa->other_income) ?? [];
            $income_amount = json_decode($annexa->income_amount) ?? [];
        @endphp

        @if (is_array($other_income) && is_array($income_amount))
            <table class="table">
                <thead>
                    <tr>
                        <th>Other Income</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($other_income as $index => $item)
                        <tr>
                            <td>{{ $item ?? 'N/A' }}</td>
                            <td>{{ $income_amount[$index] ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p><strong>Other Income:</strong> N/A</p>
        @endif

            <h3>Expenditures</h3>
            @php
                $expenditures = json_decode($annexa->expenditures) ?? [];
                $amounts = json_decode($annexa->amount) ?? [];
            @endphp
    
            @if (is_array($expenditures) && is_array($amounts))
                <table class="table">
                    <thead>
                        <tr>
                            <th>Expenditure</th>
                            <th>Cost</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenditures as $index => $expenditure)
                            <tr>
                                <td>{{ $expenditure ?? 'N/A' }}</td>
                                <td>{{ $amounts[$index] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p><strong>Expenditures:</strong> N/A</p>
            @endif

        <p><strong>Total Estimated Income:</strong> {{ $annexa->total_estimated_income ?? 'N/A' }}</p>
        <p><strong>Total Budget Expenses (PHP):</strong> {{ $annexa->total_budget_expenses_php ?? 'N/A' }}</p>
        <p><strong>Total Estimated Proceeds:</strong> {{ $annexa->total_estimated_proceeds ?? 'N/A' }}</p>
    </div>
        
        <div class="other_info">
            <h3>Other Information</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Coordinator</th>
                        <th>Participants</th>
                        <th>Utilization Plan</th>
                        <th>Solicitation</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
    
                        <td>{{ $annexa->coordinator ?? 'N/A' }}</td>
                        <td>{{ $annexa->participants ?? 'N/A' }}</td>
                        <td>{{ $annexa->utilization_plan ?? 'N/A' }}</td>
                        <td>{{ $annexa->solicitation ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>

        <table class="table">
            <thead>
                <tr>
                    <th>President</th>
                    <th>Treasurer</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $annexa->president ?? 'N/A' }}</td>
                    <td>{{ $annexa->treasurer ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection