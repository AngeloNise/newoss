@extends('layout.orglayout')

@section('content')
    <div class="fra-container">
        <div class="org_info">
            <table class="table_org_info" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px;">
                <tbody>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Name of Project:</th>
                        <td colspan="2" style="border: 1px solid black; padding: 1.5px;">{{ $annexa->name_of_project ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Date/Duration:</th>
                        <td colspan="2" style="border: 1px solid black; padding: 1.5px;">{{ $annexa->start_date ?? 'N/A' }} to {{ $annexa->end_date ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Requesting Organization:</th>
                        <td colspan="2" style="border: 1px solid black; padding: 1.5px;">{{ $annexa->requesting_organization ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">College/Branch/Campus:</th>
                        <td colspan="2" style="border: 1px solid black; padding: 1.5px;">{{ $annexa->college_branch ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Name of Representative:</th>
                        <td colspan="2" style="border: 1px solid black; padding: 1.5px;">{{ $annexa->representative ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Address and Contact:</th>
                        <td colspan="2" style="border: 1px solid black; padding: 1.5px;">{{ $annexa->address_contact ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">Objectives:</th>
                        <td colspan="2" style="border: 1px solid black; padding: 1.5px;">{{ $annexa->objectives ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="items_info">
            <h2 style="font-family: 'Calibri', sans-serif; font-size: 11px; font-weight: bold;">PROJECT ESTIMATES:</h2>
            <h3 style="font-family: 'Calibri', sans-serif; font-size: 11px; font-weight: bold;">1. Estimate Income (provide extra sheet if necessary)</h3>
            
            @php
                $items_to_be_sold = json_decode($annexa->items_to_be_sold) ?? [];
                $item_pieces = json_decode($annexa->item_pieces) ?? [];
                $itemPrices = json_decode($annexa->price_ticket) ?? [];
                $totalEstimateItems = json_decode($annexa->total_estimate_ticket) ?? [];
                $other_income = json_decode($annexa->other_income) ?? [];
                $amount = json_decode($annexa->amount) ?? [];
            @endphp
        
            @if (is_array($items_to_be_sold) && is_array($itemPrices))
                <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px;">
                    <tbody>
                        <tr>
                            <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">a. Number of tickets/items to be sold</th>
                            <td style="border: 1px solid black; padding: 1.5px;">
                                @foreach ($items_to_be_sold as $index => $item)
                                    {{ $item ?? 'N/A' }} 
                                    - {{ $item_pieces[$index] ?? 'N/A' }} pcs
                                    @if (!$loop->last) <br> @endif
                                @endforeach
                            </td>
                        </tr>
                        
                        <tr>
                            <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">b. Price per ticket/item</th>
                            <td style="border: 1px solid black; padding: 1.5px;">
                                @foreach ($items_to_be_sold as $index => $item)
                                    {{ $item ?? 'N/A' }} 
                                    - Php {{ $itemPrices[$index] ?? 'N/A' }} 
                                    @if (!$loop->last) <br> @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">c. Total estimated tickets/items sales (a x b)</th>
                            <td style="border: 1px solid black; padding: 1.5px;">
                                @foreach ($items_to_be_sold as $index => $item)
                                    {{ $item ?? 'N/A' }} 
                                    - Php {{ $totalEstimateItems[$index] ?? 'N/A' }} 
                                    @if (!$loop->last) <br> @endif
                                @endforeach
                            </td>
                        </tr>
                        <tr>
                            <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">d. Other Income</th>
                            <td style="border: 1px solid black; padding: 1.5px;">
                                @foreach ($other_income as $index => $item)
                                    {{ $item ?? 'N/A' }} 
                                    - Php {{ $amount[$index] ?? 'N/A' }} 
                                    @if (!$loop->last) <br> @endif
                                @endforeach
                            </td>
                        </tr>
                        
                        <tr>
                            <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left; vertical-align: top;">e. Total estimated Income (c + d)</th>
                            <td style="border: 1px solid black; padding: 1.5px;">Php {{ $annexa->total_estimated_income ?? 'N/A' }}</td>     
                        </tr>
                    </tbody>
                </table>
            @else
                <p><strong>Other Income:</strong> N/A</p>
            @endif
        </div>
        
        <div class="items_info"> 
            <h3 style="font-family: 'Calibri', sans-serif; font-size: 11px; font-weight: bold;">2. Budgeted Expenses</h3>
            @php
                $expenditures = json_decode($annexa->expenditures) ?? [];
                $amounts = json_decode($annexa->amount) ?? [];
            @endphp
        
            @if (is_array($expenditures) && is_array($amounts))
                <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px;">
                    <thead>
                        <tr>
                            <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left;">Expenditure</th>
                            <th style="border: 1px solid black; padding: 1.5px; width: 50%; text-align: left;">Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expenditures as $index => $expenditure)
                            <tr>
                                <td style="border: 1px solid black; padding: 1.5px;">{{ $expenditure ?? 'N/A' }}</td>
                                <td style="border: 1px solid black; padding: 1.5px;">Php {{ $amounts[$index] ?? 'N/A' }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td style="border: 1px solid black; padding: 1.5px; font-weight: bold;">a. Total Budget Expenses</td>
                            <td style="border: 1px solid black; padding: 1.5px;">Php {{ $annexa->total_budget_expenses_php ?? 'N/A' }}</td>
                        </tr>
                    </tbody>
                </table>
            @else
                <p><strong>Expenditures:</strong> N/A</p>
            @endif
        
            <p style="font-family: 'Calibri', sans-serif; font-size: 11px; font-weight: bold;">
                <strong>3. Total Estimated Proceeds (1e-2a)</strong> {{ $annexa->total_estimated_proceeds ?? 'N/A' }}
            </p>
        </div>

        <div class="other_info"> 
            <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px;">
                <tbody>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">4. Proceeds Utilization Plan/Budget Proposal (use extra sheet if necessary)</th>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black; padding: 1.5px;">{{ $annexa->utilization_plan ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        
            <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 10px;">
                <tbody>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">5. Solicitation/Lists of Donors (Pls. provide extra sheet if necessary)</th>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black; padding: 1.5px;">{{ $annexa->solicitation ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        
            <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 10px;">
                <tbody>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">6. Lists of Officials/Coordinator (pls. use extra sheet)</th>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black; padding: 1.5px;">{{ $annexa->coordinator ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        
            <table class="table" style="width: 100%; border-collapse: collapse; border: 1px solid black; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 10px;">
                <tbody>
                    <tr>
                        <th style="border: 1px solid black; padding: 1.5px; text-align: left; width: 28%;">7. Lists of Participants (if necessary)</th>
                    </tr>
                    <tr>
                        <td style="border: 1px solid black; padding: 1.5px;">{{ $annexa->participants ?? 'N/A' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="head_info" style="width: 100%; font-family: 'Calibri', sans-serif; font-size: 11px; margin-top: 10px;">
            <table style="width: 100%; border-collapse: collapse; font-family: 'Calibri', sans-serif; font-size: 11px;">
                <thead>
                    <tr>
                        <td style="padding: 1.5px; text-align: center;">{{ $annexa->treasurer ?? 'N/A' }}</td>
                        <td style="padding: 1.5px; text-align: center; ">{{ $annexa->president ?? 'N/A' }}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th style="padding: 1.5px; text-align: center;">
                            <div style="border-top: 1px solid black; width: 50%; margin: 0 auto;"></div> 
                            Treasurer/Representative
                        </th>
                        <th style="padding: 1.5px; text-align: center;">
                            <div style="border-top: 1px solid black; width: 50%; margin: 0 auto;"></div> 
                            President of Organization
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
