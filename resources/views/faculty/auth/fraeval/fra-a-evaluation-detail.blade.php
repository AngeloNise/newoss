@extends('layout.adminlayout')
@section('content')
<div class="fra-container">
    <a href="/faculty/FRA-A-Evaluation" class="btn btn-primary">Back</a>
    <h2>Evaluation Details</h2>
    <div class="org_info">
        <p><strong>Email:</strong> {{ $annexa->email ?? 'N/A' }}</p>
        <p><strong>Name of Project:</strong> {{ $annexa->name_of_project ?? 'N/A' }}</p>
        <p><strong>Requesting Organization:</strong> {{ $annexa->requesting_organization ?? 'N/A' }}</p>
        <p><strong>College Branch:</strong> {{ $annexa->college_branch ?? 'N/A' }}</p>
        <p><strong>Start Date:</strong> {{ $annexa->start_date ?? 'N/A' }}</p>
        <p><strong>End Date:</strong> {{ $annexa->end_date ?? 'N/A' }}</p>
        <p><strong>Representative:</strong> {{ $annexa->representative ?? 'N/A' }}</p>
        <p><strong>Address and Contact:</strong> {{ $annexa->address_contact ?? 'N/A' }}</p>
        <p><strong>Objectives:</strong> {{ $annexa->objectives ?? 'N/A' }}</p>
    </div>
    <div class="items_info">
        @php
            $estimate_income = json_decode($annexa->estimate_income) ?? [];
            $item_pieces = json_decode($annexa->item_pieces) ?? [];
            $itemPrices = json_decode($annexa->price_ticket) ?? [];
            $totalEstimateItems = json_decode($annexa->total_estimate_ticket) ?? [];
        @endphp

        <p>
            @if (is_array($estimate_income) && is_array($itemPrices))
                @foreach ($estimate_income as $index => $item)
                    <strong>Item:</strong> {{ $item ?? 'N/A' }}, 
                    <strong>Item Pieces:</strong> {{ $item_pieces[$index] ?? 'N/A' }}, 
                    <strong>Price:</strong> {{ $itemPrices[$index] ?? 'N/A' }}, 
                    <strong>Estimate Item Price:</strong> {{ $totalEstimateItems[$index] ?? 'N/A' }}<br>
                @endforeach
            @else
                <strong>Items to be sold:</strong> {{ $estimate_income ? implode(', ', $estimate_income) : 'N/A' }}<br>
                <strong>Item Pieces:</strong> {{ $item_pieces ? implode(', ', $item_pieces) : 'N/A' }}<br>
                <strong>Item Price:</strong> {{ $itemPrices ? implode(', ', $itemPrices) : 'N/A' }}<br>
                <strong>Total Estimate Item Price:</strong> {{ $totalEstimateItems ? implode(', ', $totalEstimateItems) : 'N/A' }}
            @endif
        </p>

        @php
            $otherIncome = json_decode($annexa->other_income) ?? [];
            $otherIncomeAmount = json_decode($annexa->income_amount) ?? [];
        @endphp

        <p>
            @if (is_array($otherIncome) && is_array($otherIncomeAmount))
                @foreach ($otherIncome as $index => $income)
                    <strong>Other Income:</strong> {{ $income ?? 'N/A' }}, 
                    <strong>Amount:</strong> {{ $otherIncomeAmount[$index] ?? 'N/A' }}<br>
                @endforeach
            @else
                <strong>Other Income:</strong> {{ $otherIncome ? implode(', ', $otherIncome) : 'N/A' }}<br>
                <strong>Amount:</strong> {{ $otherIncomeAmount ? implode(', ', $otherIncomeAmount) : 'N/A' }}
            @endif
        </p>

        <p><strong>Total Estimated Income:</strong> {{ $annexa->total_estimated_income ?? 'N/A' }}</p>
        <p><strong>Total Budget Expenses (PHP):</strong> {{ $annexa->total_budget_expenses_php ?? 'N/A' }}</p>
        <p><strong>Total Estimated Proceeds:</strong> {{ $annexa->total_estimated_proceeds ?? 'N/A' }}</p>
    </div>

    <div class="other_info">
        <p><strong>Coordinator:</strong> {{ $annexa->coordinator ?? 'N/A' }}</p>
        <p><strong>Participants:</strong> {{ $annexa->participants ?? 'N/A' }}</p>
        <p><strong>Utilization Plan:</strong> {{ $annexa->utilization_plan ?? 'N/A' }}</p>
        <p><strong>Solicitation:</strong> {{ $annexa->solicitation ?? 'N/A' }}</p>
        @php
            $expenditures = json_decode($annexa->expenditures) ?? [];
            $amounts = json_decode($annexa->amount) ?? [];
        @endphp

        <p>
            @if (is_array($expenditures) && is_array($amounts))
                @foreach ($expenditures as $index => $expenditure)
                    <strong>Expenditure:</strong> {{ $expenditure ?? 'N/A' }}, 
                    <strong>Cost:</strong> {{ $amounts[$index] ?? 'N/A' }}<br>
                @endforeach
            @else
                <strong>Expenditures:</strong> {{ $expenditures ? implode(', ', $expenditures) : 'N/A' }} 
                <strong>Cost:</strong> {{ $amounts ? implode(', ', $amounts) : 'N/A' }}
            @endif
        </p>

        <p><strong>President:</strong> {{ $annexa->president ?? 'N/A' }}</p>
        <p><strong>Treasurer:</strong> {{ $annexa->treasurer ?? 'N/A' }}</p>
    </div>
</div>
@endsection
