@extends('layout.adminlayout')
@section('content')
<div class="fra-container">
    <h2>Evaluation Details</h2>
    <div class="org_info">
        <p><strong>Email:</strong> {{ $annexa->email }}</p>
        <p><strong>Name of Project:</strong> {{ $annexa->name_of_project }}</p>
        <p><strong>Requesting Organization:</strong> {{ $annexa->requesting_organization }}</p>
        <p><strong>College Branch:</strong> {{ $annexa->college_branch }}</p>
        <p><strong>Start Date:</strong> {{ $annexa->start_date }}</p>
        <p><strong>End Date:</strong> {{ $annexa->end_date }}</p>
        <p><strong>Representative:</strong> {{ $annexa->representative }}</p>
        <p><strong>Address and Contact:</strong> {{ $annexa->address_contact }}</p>
        <p><strong>Objectives:</strong> {{ $annexa->objectives }}</p>
    </div>
    <div class="items_info">
        @php
            $estimate_income = json_decode($annexa->estimate_income);
            $item_pieces = json_decode($annexa->item_pieces);
            $itemPrices = json_decode($annexa->price_ticket);
            $totalEstimateItems = json_decode($annexa->total_estimate_ticket);
        @endphp

        <p>
            @if (is_array($estimate_income) && is_array($itemPrices))
                @foreach ($estimate_income as $index => $item)
                    <strong>Item:</strong> {{ $item }}, 
                    <strong>Item Pieces:</strong> {{ $item_pieces[$index] ?? 'N/A' }}, 
                    <strong>Price:</strong> {{ $itemPrices[$index] ?? 'N/A' }}, 
                    <strong>Estimate Item Price:</strong> {{ $totalEstimateItems[$index] ?? 'N/A' }}<br>
                @endforeach
            @else
                <strong>Items to be sold:</strong> {{ $estimate_income ?? $annexa->estimate_income }}<br>
                <strong>Item Pieces:</strong> {{ $item_pieces ?? $annexa->item_pieces }}<br>
                <strong>Item Price:</strong> {{ $itemPrices ?? $annexa->price_ticket }}<br>
                <strong>Total Estimate Item Price:</strong> {{ $totalEstimateItems ?? $annexa->total_estimate_ticket }}
            @endif
        </p>

        @php
            $otherIncome = json_decode($annexa->other_income);
            $otherIncomeAmount = json_decode($annexa->income_amount);
        @endphp

        <p>
            @if (is_array($otherIncome) && is_array($otherIncomeAmount))
                @foreach ($otherIncome as $index => $income)
                    <strong>Other Income:</strong> {{ $income }}, 
                    <strong>Amount:</strong> {{ $otherIncomeAmount[$index] ?? 'N/A' }}<br>
                @endforeach
            @else
                <strong>Other Income:</strong> {{ $annexa->other_income }}<br>
                <strong>Amount:</strong> {{ $annexa->income_amount }}
            @endif
        </p>


        <p><strong>Total Estimated Income:</strong> {{ $annexa->total_estimated_income }}</p>
        <p><strong>Total Budget Expenses (PHP):</strong> {{ $annexa->total_budget_expenses_php }}</p>
        <p><strong>Total Estimated Proceeds:</strong> {{ $annexa->total_estimated_proceeds }}</p>
    </div>

    <div class="other_info">
        <p><strong>Coordinator:</strong> {{ $annexa->coordinator }}</p>
        <p><strong>Participants:</strong> {{ $annexa->participants }}</p>
        <p><strong>Utilization Plan:</strong> {{ $annexa->utilization_plan }}</p>
        <p><strong>Solicitation:</strong> {{ $annexa->solicitation }}</p>
        @php
            $expenditures = json_decode($annexa->expenditures);
            $amounts = json_decode($annexa->amount);
        @endphp

        <p>
            @if (is_array($expenditures) && is_array($amounts))
                @foreach ($expenditures as $index => $expenditure)
                    <strong>Expenditure:</strong> {{ $expenditure }}, 
                    <strong>Amount:</strong> {{ $amounts[$index] ?? 'N/A' }}<br>
                @endforeach
            @else
                <strong>Expenditures:</strong> {{ $expenditures ?? $annexa->expenditures }} 
                <strong>Amount:</strong> {{ $amounts ?? $annexa->amount }}
            @endif
        </p>

        <p><strong>President:</strong> {{ $annexa->president }}</p>
        <p><strong>Treasurer:</strong> {{ $annexa->treasurer }}</p>
    <div>

    <a href="{{ route('faculty.fra.evaluation') }}" class="btn btn-primary">Back to List</a>
</div>
@endsection