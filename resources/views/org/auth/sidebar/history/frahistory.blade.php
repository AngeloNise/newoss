@extends('layout.orglayout')

@section('content')
<div class="history-container">
    <h2>Fund Raising Application History</h2>

    @if($applications->isEmpty())
        <p>No fund raising applications found.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Name of Organization</th>
                    <th>Proposed Activity</th>
                    <th>Status</th>
                    <th>Current File Location</th>
                    <th>Submission Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $application)
                <tr onclick="window.location='{{ url('Fund-Raising-History/applications/'.$application->id.'/comments') }}'" style="cursor: pointer;">
                    <td>{{ $application->name_of_project }}</td>
                    <td>{{ $application->name_of_organization }}</td>
                    <td>{{ $application->proposed_activity }}</td>
                    <td>{{ $application->status }}</td>
                    <td>{{ $application->current_file_location }}</td>
                    <td>{{ $application->submission_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
