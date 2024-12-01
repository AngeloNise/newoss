@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/applicationdetails.css') }}">
<link rel="stylesheet" href="{{ asset('css/faculty/applicationaddcomment.css') }}">
<script src="{{ asset('js/faculty/applicationstatus.js') }}"></script>

<div class="application-detail-container">
    <a href="{{ route('faculty.application.admin') }}" class="btn btn-primary">Back</a>
    <h2>Application Details</h2>
    <form id="applicationForm" method="POST" action="{{ route('faculty.application.update', $application->id) }}">
        @csrf
        @method('PUT')


        <div class="form-group">
            <select name="document" id="document" class="form-control">
                <option value="" disabled selected>Select a document</option>
                <option value="Pre-numbered tickets">Pre-numbered tickets</option>
                <option value="Official receipts">Official receipts</option>
                <option value="Control sheets">Control sheets</option>
                <option value="Reservation Slip for use of venue">Reservation Slip for use of venue</option>
                <option value="Goods/services inspection report">Goods/services inspection report</option>
                <option value="Statement of Projected Net Income and Expenses">Statement of Projected Net Income and Expenses</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="comment">Comment</label>
            <input type="text" name="comment" id="comment" class="form-control" disabled>
        </div>
        <div class="application-info">
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Name of Project</th>
                        <th>Organization</th>
                        <th>Proposed Activity</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $application->name_of_project }}</td>
                        <td>{{ $application->name_of_organization }}</td>
                        <td>{{ $application->proposed_activity }}</td>
                        
                        <td>
                            <input type="date" name="start_date" value="{{ $application->start_date }}" class="form-control">
                        </td>

                        <td>
                            <input type="date" name="end_date" value="{{ $application->end_date }}" class="form-control">
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="table">
                <thead>
                    <tr>
                        <th>College Branch</th>
                        <th>Total Estimated Income</th>
                        <th>Status</th>
                        <th>Current File Location</th>
                        <th>Submission Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <input type="text" name="college_branch" value="{{ $application->college_branch }}" class="form-control">
                        </td>

                        <td>
                            <input type="number" name="total_estimated_income" value="{{ $application->total_estimated_income }}" step="0.01" class="form-control">
                        </td>

                        <td>
                            <select name="status" id="status" class="form-control">
                                <option value="Pending Approval" {{ $application->status === 'pending approval' ? 'selected' : '' }}>Pending Approval</option>
                                <option value="Approved" {{ $application->status === 'Approved' ? 'selected' : '' }}>Approved</option>
                                <option value="Returned" {{ $application->status === 'Returned' ? 'selected' : '' }}>Returned</option>
                            </select>
                        </td>

                        <td>
                            <select name="current_file_location" id="current_file_location" class="form-control">
                                <option value="OSS" {{ $application->current_file_location === 'OSS' ? 'selected' : '' }}>OSS</option>
                                <option value="Forwarded by OSS" {{ $application->current_file_location === 'Forwarded by OSS' ? 'selected' : '' }}>Forwarded by OSS</option>
                                <option value="Returned to OSS" {{ $application->current_file_location === 'Returned to OSS' ? 'selected' : '' }}>Returned to OSS</option>
                            </select>
                        </td>

                        <td>{{ \Carbon\Carbon::parse($application->submission_date)->format('Y-m-d') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <button type="button" class="btn btn-success" onclick="confirmChanges()">Save</button>
    </form>

    <h3>Application Logs</h3>
    @if($application->logs->isNotEmpty())
        <table class="table">
            <thead>
                <tr>
                    <th>Reviewed By</th>
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
                            <td>{{ $log->updated_by ?? 'N/A' }}</td>
                            <td>Start Date</td>
                            <td>{{ $startDate['old'] ?? 'N/A' }}</td>
                            <td>{{ $startDate['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endif
                    
                    @if ($endDate)
                        <tr>
                            <td>{{ $log->updated_by ?? 'N/A' }}</td>
                            <td>End Date</td>
                            <td>{{ $endDate['old'] ?? 'N/A' }}</td>
                            <td>{{ $endDate['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endif

                    @if ($totalEstimatedIncome)
                        <tr>
                            <td>{{ $log->updated_by ?? 'N/A' }}</td>
                            <td>Total Estimated Income</td>
                            <td>{{ $totalEstimatedIncome['old'] ?? 'N/A' }}</td>
                            <td>{{ $totalEstimatedIncome['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endif

                    @if ($status)
                        <tr>
                            <td>{{ $log->updated_by ?? 'N/A' }}</td>
                            <td>Status</td>
                            <td>{{ $status['old'] ?? 'N/A' }}</td>
                            <td>{{ $status['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endif

                    @if ($currentFileLocation)
                        <tr>
                            <td>{{ $log->updated_by ?? 'N/A' }}</td>
                            <td>Current File Location</td>
                            <td>{{ $currentFileLocation['old'] ?? 'N/A' }}</td>
                            <td>{{ $currentFileLocation['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    @else
        <p>No logs available for this application.</p>
    @endif

</div>

<script>
    // JavaScript to enable/disable comment input based on dropdown selection
    document.getElementById('document').addEventListener('change', function() {
        const commentField = document.getElementById('comment');
        if (this.value) {
            // Enable comment field if a document is selected
            commentField.disabled = false;
        } else {
            // Disable comment field if no document is selected
            commentField.disabled = true;
        }
    });
</script>
@endsection
