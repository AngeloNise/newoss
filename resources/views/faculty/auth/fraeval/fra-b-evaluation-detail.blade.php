@extends('layout.adminlayout')
@section('content')
<div class="fra-container">
    <a href="/faculty/FRA-B-Evaluation" class="btn btn-primary">Back</a>
    <h2>Financial Summary</h2>

    <div class="org_info">
        <h3>Organization Information</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Name of Organization</th>
                    <th>Period Cover</th>
                    <th>Semester</th>
                    <th>School Year</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $annexb->name_of_org ?? 'N/A' }}</td>
                    <td>{{ $annexb->period_covered ?? 'N/A' }}</td>
                    <td>{{ $annexb->semester ?? 'N/A' }}</td>
                    <td>{{ $annexb->school_year ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="org_info">
        <table class="table">
            <thead>
                <tr>
                    <th>Solicitation</th>
                    <th>Cash Available</th>
                    <th>Cash Receipts</th>
                    <th>Cash Disbursements</th>
                    <th>Cash Balance</th>
                    <th>Ending Cash Balance</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $annexb->solicitation ?? 'N/A' }}</td>
                    <td>{{ $annexb->cash_available ?? 'N/A' }}</td>
                    <td>{{ $annexb->cash_receipt ?? 'N/A' }}</td>
                    <td>{{ $annexb->cash_disbursements ?? 'N/A' }}</td>
                    <td>{{ $annexb->cash_balance ?? 'N/A' }}</td>
                    <td>{{ $annexb->ending_cash_balance ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
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

        @if (count($dates_receipt) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Particulars</th>
                        <th>Amount</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($dates_receipt); $i++)
                        <tr>
                            <td>{{ $dates_receipt[$i] ?? 'N/A' }}</td>
                            <td>{{ $invoice_no_receipt[$i] ?? 'N/A' }}</td>
                            <td>{{ $particulars[$i] ?? 'N/A' }}</td>
                            <td>{{ $amounts[$i] ?? 'N/A' }}</td>
                            <td>{{ $remarks_receipt[$i] ?? 'N/A' }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @else
            <p><strong>Receipts:</strong> N/A</p>
        @endif

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

        @if (count($dates_disburse) > 0)
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Invoice No</th>
                        <th>Description</th>
                        <th>Purpose</th>
                        <th>Remarks</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 0; $i < count($dates_disburse); $i++)
                        <tr>
                            <td>{{ $dates_disburse[$i] ?? 'N/A' }}</td>
                            <td>{{ $invoice_no_disburse[$i] ?? 'N/A' }}</td>
                            <td>{{ $descriptions[$i] ?? 'N/A' }}</td>
                            <td>{{ $purposes[$i] ?? 'N/A' }}</td>
                            <td>{{ $remarks_disburse[$i] ?? 'N/A' }}</td>
                        </tr>
                    @endfor
                </tbody>
            </table>
        @else
            <p><strong>Disbursements:</strong> N/A</p>
        @endif

        <p><strong>Total Disbursements:</strong> {{ $annexb->total_disburse ?? 'N/A' }}</p>
    </div>

    <div class="other_info">
        <h3>Other Information</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Prepared by</th>
                    <th>Approved by</th>
                    <th>Checked by</th>
                    <th>Certified by</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $annexb->prepared ?? 'N/A' }}</td>
                    <td>{{ $annexb->approved ?? 'N/A' }}</td>
                    <td>{{ $annexb->checked ?? 'N/A' }}</td>
                    <td>{{ $annexb->certified ?? 'N/A' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    
</div>
@endsection
