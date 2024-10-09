@extends('layout.adminlayout')
@section('content')
<div class="fra-container">
    <a href="/faculty/FRA-B-Evaluation" class="btn btn-primary">Back</a>
    <h2>Financial Summary</h2>
    
    <div class="org_info">
        <p><strong>Name of Organization:</strong> {{ $annexb->name_of_org ?? 'N/A' }}</p>
        <p><strong>Semester:</strong> {{ $annexb->semester ?? 'N/A' }}</p>
        <p><strong>School Year:</strong> {{ $annexb->school_year ?? 'N/A' }}</p>
        <p><strong>Period Covered:</strong> {{ $annexb->period_covered ?? 'N/A' }}</p>
        <p><strong>Cash Balance:</strong> {{ $annexb->cash_balance ?? 'N/A' }}</p>
        <p><strong>Cash Receipts:</strong> {{ $annexb->cash_receipt ?? 'N/A' }}</p>
        <p><strong>Solicitation:</strong> {{ $annexb->solicitation ?? 'N/A' }}</p>
        <p><strong>Cash Available:</strong> {{ $annexb->cash_available ?? 'N/A' }}</p>
        <p><strong>Cash Disbursements:</strong> {{ $annexb->cash_disbursements ?? 'N/A' }}</p>
        <p><strong>Ending Cash Balance:</strong> {{ $annexb->ending_cash_balance ?? 'N/A' }}</p>
    </div>

    <div class="receipt_info">
        <h3>Receipts</h3>
        @php
            $dates_receipt = json_decode($annexb->date_receipt) ?? [];
            $invoice_no_receipt = json_decode($annexb->invoice_no_receipt) ?? [];
            $particulars = json_decode($annexb->particulars) ?? [];
            $amounts = json_decode($annexb->amount) ?? [];
            $remarks_receipt = json_decode($annexb->remarks_receipt) ?? [];
        @endphp
        <p>
            @if (is_array($dates_receipt) && is_array($invoice_no_receipt))
                @foreach ($dates_receipt as $index => $date)
                    <strong>Date:</strong> {{ $date ?? 'N/A' }},
                    <strong>Invoice No:</strong> {{ $invoice_no_receipt[$index] ?? 'N/A' }},
                    <strong>Particulars:</strong> {{ $particulars[$index] ?? 'N/A' }},
                    <strong>Amount:</strong> {{ $amounts[$index] ?? 'N/A' }},
                    <strong>Remarks:</strong> {{ $remarks_receipt[$index] ?? 'N/A' }}<br>
                @endforeach
            @else
                <strong>Receipts:</strong> N/A
            @endif
        </p>
        <p><strong>Total Receipts:</strong> {{ $annexb->total_receipt ?? 'N/A' }}</p>
    </div>

    <div class="disbursement_info">
        <h3>Disbursements</h3>
        @php
            $dates_disburse = json_decode($annexb->date_disburse) ?? [];
            $invoice_no_disburse = json_decode($annexb->invoice_no_disburse) ?? [];
            $descriptions = json_decode($annexb->description) ?? [];
            $purposes = json_decode($annexb->purpose) ?? [];
            $remarks_disburse = json_decode($annexb->remarks_disburse) ?? [];
        @endphp
        <p>
            @if (is_array($dates_disburse) && is_array($invoice_no_disburse))
                @foreach ($dates_disburse as $index => $date)
                    <strong>Date:</strong> {{ $date ?? 'N/A' }},
                    <strong>Invoice No:</strong> {{ $invoice_no_disburse[$index] ?? 'N/A' }},
                    <strong>Description:</strong> {{ $descriptions[$index] ?? 'N/A' }},
                    <strong>Purpose:</strong> {{ $purposes[$index] ?? 'N/A' }},
                    <strong>Remarks:</strong> {{ $remarks_disburse[$index] ?? 'N/A' }}<br>
                @endforeach
            @else
                <strong>Disbursements:</strong> N/A
            @endif
        </p>
        <p><strong>Total Disbursements:</strong> {{ $annexb->total_disburse ?? 'N/A' }}</p>
    </div>

    <div class="other_info">
        <p><strong>Prepared by:</strong> {{ $annexb->prepared ?? 'N/A' }}</p>
        <p><strong>Checked by:</strong> {{ $annexb->checked ?? 'N/A' }}</p>
        <p><strong>Approved by:</strong> {{ $annexb->approved ?? 'N/A' }}</p>
        <p><strong>Certified by:</strong> {{ $annexb->certified ?? 'N/A' }}</p>
    </div>
</div>
@endsection
