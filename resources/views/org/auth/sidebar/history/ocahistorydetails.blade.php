@extends('layout.orglayout') 

@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/applicationhistorycomment.css') }}">

<div class="comments-container">
    <h2>Comments for {{ $application->name_of_project }}</h2>
    
    <!-- Added the table element here -->
    <table>
        <thead>
            <tr>
                <th>Document</th>
                <th>Comment</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($application->logs as $log)
                @php
                    $document = json_decode($log->document, true);
                    $comment = json_decode($log->comment, true);
                @endphp

                @if ($document || $comment) <!-- Only show if document or comment exist -->
                    <tr>
                        <td>{{ $document['new'] ?? 'N/A' }}</td>
                        <td>{{ $comment['new'] ?? 'N/A' }}</td>
                        <td>{{ $log->updated_at->format('F j, Y, g:i a') }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <h3>Application Logs</h3>
    @if($application->logs->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>Field</th>
                    <th>Previous</th>
                    <th>Current</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach($application->logs as $log)
                    @php
                        $startDate = json_decode($log->start_date, true);
                        $endDate = json_decode($log->end_date, true);
                        $totalEstimatedIncome = json_decode($log->total_estimated_income, true);
                        $status = json_decode($log->status, true);
                        $currentFileLocation = json_decode($log->current_file_location, true);
                    @endphp

                    @if ($startDate)
                        <tr>
                            <td>Start Date</td>
                            <td>{{ $startDate['old'] ?? 'N/A' }}</td>
                            <td>{{ $startDate['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at->format('F j, Y, g:i a') }}</td>
                        </tr>
                    @endif
                    
                    @if ($endDate)
                        <tr>
                            <td>End Date</td>
                            <td>{{ $endDate['old'] ?? 'N/A' }}</td>
                            <td>{{ $endDate['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at->format('F j, Y, g:i a') }}</td>
                        </tr>
                    @endif

                    @if ($totalEstimatedIncome)
                        <tr>
                            <td>Total Estimated Income</td>
                            <td>{{ $totalEstimatedIncome['old'] ?? 'N/A' }}</td>
                            <td>{{ $totalEstimatedIncome['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at->format('F j, Y, g:i a') }}</td>
                        </tr>
                    @endif

                    @if ($status)
                        <tr>
                            <td>Status</td>
                            <td>{{ $status['old'] ?? 'N/A' }}</td>
                            <td>{{ $status['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at->format('F j, Y, g:i a') }}</td>
                        </tr>
                    @endif

                    @if ($currentFileLocation)
                        <tr>
                            <td>Current File Location</td>
                            <td>{{ $currentFileLocation['old'] ?? 'N/A' }}</td>
                            <td>{{ $currentFileLocation['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at->format('F j, Y, g:i a') }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p>No logs available for this application.</p>
    @endif
</div>
@endsection
