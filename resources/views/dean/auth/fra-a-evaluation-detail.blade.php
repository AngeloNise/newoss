@extends('layout.deanlayout')
@section('content')
<div class="fra-container">
    <a href="/dean/Pre-Evaluation-Forms" class="btn btn-primary">Back</a>
    <h2>Evaluation Details</h2>

    <div class="org_info">
        <div class="suggestions">
            <h3>Suggestions</h3>
            @if ($application->suggestions->isEmpty())
            <table class="table">
                <thead>
                    <tr>
                        <th>Section</th>
                        <th>Suggestion</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>None</td>
                        <td>No current Suggestion/Comments</td>
                    </tr>
                </tbody>
            </table>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Comment</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($application->suggestions as $suggestion)
                            @php
                                $sections = json_decode($suggestion->section, true); // Decode JSON to array
                                $comments = json_decode($suggestion->comment, true);
                            @endphp
        
                            @foreach ($sections as $index => $section)
                                <tr>
                                    <td>{{ $section ?? 'N/A' }}</td>
                                    <td>{{ $comments[$index] ?? 'N/A' }}</td>
                                    <td></td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            @endif
        
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
                    <td>{{ $application->email ?? 'N/A' }}</td>
                    <td>{{ $application->name_of_project ?? 'N/A' }}</td>
                    <td>{{ $application->requesting_organization ?? 'N/A' }}</td>
                    <td>{{ $application->college_branch ?? 'N/A' }}</td>
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
                    <td>{{ $application->start_date ?? 'N/A' }}</td>
                    <td>{{ $application->end_date ?? 'N/A' }}</td>
                    <td>{{ $application->representative ?? 'N/A' }}</td>
                    <td>{{ $application->address ?? 'N/A' }}{{ $application->address && $application->contact ? ' - ' : '' }}{{ $application->contact ?? 'N/A' }}</td>
                    <td>{{ $application->objectives ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="items_info">
        <h3>Items to be Sold</h3>
        @php
            $items_to_be_sold = json_decode($application->items_to_be_sold) ?? [];
            $item_pieces = json_decode($application->item_pieces) ?? [];
            $itemPrices = json_decode($application->price_ticket) ?? [];
            $totalEstimateItems = json_decode($application->total_estimate_ticket) ?? [];
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
            $other_income = json_decode($application->other_income) ?? [];
            $income_amount = json_decode($application->income_amount) ?? [];
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
            $expenditures = json_decode($application->expenditures) ?? [];
            $amounts = json_decode($application->amount) ?? [];
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

        <p><strong>Total Estimated Income:</strong> {{ $application->total_estimated_income ?? 'N/A' }}</p>
        <p><strong>Total Budget Expenses (PHP):</strong> {{ $application->total_budget_expenses_php ?? 'N/A' }}</p>
        <p><strong>Total Estimated Proceeds:</strong> {{ $application->total_estimated_proceeds ?? 'N/A' }}</p>
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
                    <td>{{ $application->coordinator ?? 'N/A' }}</td>
                    <td>{{ $application->participants ?? 'N/A' }}</td>
                    <td>{{ $application->utilization_plan ?? 'N/A' }}</td>
                    <td>{{ $application->solicitation ?? 'N/A' }}</td>
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
                    <td>{{ $application->president ?? 'N/A' }}</td>
                    <td>{{ $application->treasurer ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <a href="{{ route('dean.fra-a-evaluation.suggestion', $application->id) }}" class="btn btn-secondary">Evaluate</a>
</div>
@endsection
