@extends('layout.adminlayout')

@section('content')

<div class="application-detail-container">
    <a href="{{ route('faculty.application.admin') }}" class="btn btn-primary">Back</a>
    <h2>Application Details</h2>

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
                        <th>College Branch</th>
                        <th>Total Estimated Income</th>
                        <th>Status</th>
                        <th>Current File Location</th>
                        <th>Submission Date</th>
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

        <button type="button" class="btn btn-success" onclick="confirmChanges()">Commit Changes</button>
    </form>
</div>

<script src="/js/faculty/applicationstatus.js"></script>
@endsection
