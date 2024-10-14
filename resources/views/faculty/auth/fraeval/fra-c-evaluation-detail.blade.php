@extends('layout.adminlayout')
@section('content')
<div class="fra-container">
    <a href="/faculty/FRA-C-Evaluation" class="btn btn-primary">Back</a>
    <h2>Acknowledgement Receipt for Equipment</h2>

    <div class="receipt_info">
        @php
            // Assuming these variables are arrays similar to the receipts example
            $quantities = json_decode($annexc->qty) ?? [];
            $units = json_decode($annexc->unit) ?? [];
            $descriptions = json_decode($annexc->item_description) ?? [];
            $serial_nos = json_decode($annexc->serial_no) ?? [];
            $property_nos = json_decode($annexc->property_no) ?? [];
            $unit_costs = json_decode($annexc->unit_cost) ?? [];
            $total_amounts = json_decode($annexc->total_amount) ?? [];
        @endphp

        @if (count($quantities) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Qty.</th>
                        <th>Unit</th>
                        <th>Item/Description</th>
                        <th>Serial No.</th>
                        <th>Property No.</th>
                        <th>Unit Cost</th>
                        <th>Total Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($quantities); $i++)
                        <tr>
                            <td>{{ $quantities[$i] ?? 'N/A' }}</td>
                            <td>{{ $units[$i] ?? 'N/A' }}</td>
                            <td>{{ $descriptions[$i] ?? 'N/A' }}</td>
                            <td>{{ $serial_nos[$i] ?? 'N/A' }}</td>
                            <td>{{ $property_nos[$i] ?? 'N/A' }}</td>
                            <td>{{ $unit_costs[$i] ?? 'N/A' }}</td>
                            <td>{{ $total_amounts[$i] ?? 'N/A' }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @else
            <p><strong>Equipment Details:</strong> N/A</p>
        @endif
    </div>
</div>
@endsection
