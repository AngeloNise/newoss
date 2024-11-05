@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/applicationdetails.css') }}">
<script src="{{ asset('js/faculty/applicationstatus.js') }}"></script>

<div class="application-detail-container">
    <a href="{{ route('faculty.application.admin') }}" class="btn btn-primary">Back</a>
    <h2>Application Details</h2>
    <a href="{{ route('faculty.applications.comments.create', $application->id) }}" class="btn btn-secondary">Add Comment</a>
    <form id="applicationForm" method="POST" action="{{ route('faculty.application.update', $application->id) }}">
        @csrf
        @method('PUT')

        <div class="application-info">
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
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endif
                    
                    @if ($endDate)
                        <tr>
                            <td>End Date</td>
                            <td>{{ $endDate['old'] ?? 'N/A' }}</td>
                            <td>{{ $endDate['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endif

                    @if ($totalEstimatedIncome)
                        <tr>
                            <td>Total Estimated Income</td>
                            <td>{{ $totalEstimatedIncome['old'] ?? 'N/A' }}</td>
                            <td>{{ $totalEstimatedIncome['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endif

                    @if ($status)
                        <tr>
                            <td>Status</td>
                            <td>{{ $status['old'] ?? 'N/A' }}</td>
                            <td>{{ $status['new'] ?? 'N/A' }}</td>
                            <td>{{ $log->updated_at }}</td>
                        </tr>
                    @endif

                    @if ($currentFileLocation)
                        <tr>
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

@endsection
