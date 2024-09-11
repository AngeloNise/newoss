@extends('layout.adminlayout')

@section('content')
<table>
    <tr>
        <th>Webmail</th>
        <th>Letter of Intent</th>
        <th>Application Form</th>
        <th>Pre Numbered Tickets</th>
        <th>Official Receipts</th>
        <th>Control Sheets</th>
        <th>Reservation Slip</th>
        <th>Goods/Services Inspection</th>
        <th>Statement of Projected Net</th>
    </tr>

    @forelse($data as $item)
    <tr>
        <td>{{ $item->user_email }}</td>
        <td>
            @if($item->Letter_of_Intent)
                <a href="{{ route('view', ['type' => 'letter_of_intent', 'filename' => $item->Letter_of_Intent]) }}" target="_blank" class="file-link view-link">View</a>
                <a href="{{ route('download', ['filename' => $item->Letter_of_Intent]) }}" class="file-link download-link">Download</a>
            @endif
        </td>
        <td>
            @if($item->Application_Form)
                <a href="{{ route('view', ['type' => 'application_form', 'filename' => $item->Application_Form]) }}" target="_blank" class="file-link view-link">View</a>
                <a href="{{ route('download', ['filename' => $item->Application_Form]) }}" class="file-link download-link">Download</a>
            @endif
        </td>
        <td>
            @if($item->Pre_Numbered_Tickets)
                <a href="{{ route('view', ['type' => 'pre_numbered_tickets', 'filename' => $item->Pre_Numbered_Tickets]) }}" target="_blank" class="file-link view-link">View</a>
                <a href="{{ route('download', ['filename' => $item->Pre_Numbered_Tickets]) }}" class="file-link download-link">Download</a>
            @endif
        </td>
        <td>
            @if($item->Official_Receipts)
                <a href="{{ route('view', ['type' => 'official_receipts', 'filename' => $item->Official_Receipts]) }}" target="_blank" class="file-link view-link">View</a>
                <a href="{{ route('download', ['filename' => $item->Official_Receipts]) }}" class="file-link download-link">Download</a>
            @endif
        </td>
        <td>
            @if($item->Control_Sheets)
                <a href="{{ route('view', ['type' => 'control_sheets', 'filename' => $item->Control_Sheets]) }}" target="_blank" class="file-link view-link">View</a>
                <a href="{{ route('download', ['filename' => $item->Control_Sheets]) }}" class="file-link download-link">Download</a>
            @endif
        </td>
        <td>
            @if($item->Reservation_Slip)
                <a href="{{ route('view', ['type' => 'reservation_slip', 'filename' => $item->Reservation_Slip]) }}" target="_blank" class="file-link view-link">View</a>
                <a href="{{ route('download', ['filename' => $item->Reservation_Slip]) }}" class="file-link download-link">Download</a>
            @endif
        </td>
        <td>
            @if($item->Goods_Services_Inspection)
                <a href="{{ route('view', ['type' => 'goods_services_inspection', 'filename' => $item->Goods_Services_Inspection]) }}" target="_blank" class="file-link view-link">View</a>
                <a href="{{ route('download', ['filename' => $item->Goods_Services_Inspection]) }}" class="file-link download-link">Download</a>
            @endif
        </td>
        <td>
            @if($item->Statement_of_Projected_Net)
                <a href="{{ route('view', ['type' => 'statement_of_projected_net', 'filename' => $item->Statement_of_Projected_Net]) }}" target="_blank" class="file-link view-link">View</a>
                <a href="{{ route('download', ['filename' => $item->Statement_of_Projected_Net]) }}" class="file-link download-link">Download</a>
            @endif
        </td>
    </tr>
    @empty
    <tr>
        <td colspan="9">No records found.</td>
    </tr>
    @endforelse
</table>
@endsection
