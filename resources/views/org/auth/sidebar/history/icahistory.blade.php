@extends('layout.orglayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/applicationhistory.css') }}">
<div class="history-container">
    <h2>In Campus Application History</h2>

    {{-- Ongoing Applications (Pending Approval) --}}
    <h3>Ongoing Applications (Pending Approval)</h3>
    @php
        $pendingApplications = $applications->filter(function ($application) {
            return $application->status === 'Pending Approval';
        });
    @endphp

    @if($pendingApplications->isEmpty())
        <p>No ongoing applications.</p>
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
                @foreach($pendingApplications as $application)
                <tr>
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

    {{-- Recently Approved or Returned Application --}}
    <h3>Recently Approved or Returned Application</h3>
    @php
        // Get the most recent application that is either Approved or Returned, excluding ongoing applications
        $mostRecentApprovedOrReturned = $applications->filter(function ($application) use ($pendingApplications) {
            return in_array($application->status, ['Approved', 'Returned']) && 
                   !$pendingApplications->contains('id', $application->id);
        })->sortByDesc('updated_at')->first(); // Get the most recent one
    @endphp

    @if(!$mostRecentApprovedOrReturned)
        <p>No approved or returned applications.</p>
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
                <tr>
                    <td>{{ $mostRecentApprovedOrReturned->name_of_project }}</td>
                    <td>{{ $mostRecentApprovedOrReturned->name_of_organization }}</td>
                    <td>{{ $mostRecentApprovedOrReturned->proposed_activity }}</td>
                    <td>{{ $mostRecentApprovedOrReturned->status }}</td>
                    <td>{{ $mostRecentApprovedOrReturned->current_file_location }}</td>
                    <td>{{ $mostRecentApprovedOrReturned->submission_date }}</td>
                </tr>
            </tbody>
        </table>
    @endif

    {{-- All Approved or Returned Applications --}}
    <h3>All Approved or Returned Applications</h3>
    @php
        // Get all applications that are either Approved or Returned, excluding ongoing and the most recent one
        $allApprovedReturned = $applications->whereIn('status', ['Approved', 'Returned'])
            ->reject(function ($application) use ($pendingApplications, $mostRecentApprovedOrReturned) {
                return $pendingApplications->contains('id', $application->id) || 
                       ($mostRecentApprovedOrReturned && $mostRecentApprovedOrReturned->id === $application->id);
            })->sortByDesc('submission_date');
    @endphp

    @if($allApprovedReturned->isEmpty())
        <p>No approved or returned applications.</p>
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
                @foreach($allApprovedReturned as $application)
                <tr>
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
