@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/application.css') }}">
<script src="{{ asset('js/faculty/application.js') }}"></script>

<div class="application-container">
    <a href="{{ route('faculty.application.create') }}" class="button">Add Application</a>
    <h2>Application List</h2>

    <!-- Search Bar -->
    <input type="text" id="searchBar" placeholder="Search..." class="search-bar" onkeyup="filterApplications()">

    {{-- Pending Approval Applications --}}
    <h3>Pending Approval Applications</h3>
    @php
        $pendingApplications = $applications->filter(function ($application) {
            return $application->status === 'Pending Approval';
        })->sortBy(function ($application) {
            return [$application->created_at, $application->updated_at];
        });
    @endphp

    @if($pendingApplications->isEmpty())
        <p>No pending approval applications.</p>
    @else
        <table class="table" id="pendingApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Proposed Activity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingApplications as $application)
                <tr onclick="window.location='{{ route('faculty.applications.show', $application->id) }}'" style="cursor:pointer;">
                    <td>{{ $application->name_of_project }}</td>
                    <td>{{ $application->name_of_organization }}</td>
                    <td>{{ $application->proposed_activity }}</td>
                    <td>{{ $application->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- Returned Applications --}}
    <h3>Returned Applications</h3>
    @php
        $returnedApplications = $applications->filter(function ($application) {
            return $application->status === 'Returned';
        })->sortBy(function ($application) {
            return [$application->created_at, $application->updated_at];
        });
    @endphp

    @if($returnedApplications->isEmpty())
        <p>No returned applications.</p>
    @else
        <table class="table" id="returnedApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Proposed Activity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($returnedApplications as $application)
                <tr onclick="window.location='{{ route('faculty.applications.show', $application->id) }}'" style="cursor:pointer;">
                    <td>{{ $application->name_of_project }}</td>
                    <td>{{ $application->name_of_organization }}</td>
                    <td>{{ $application->proposed_activity }}</td>
                    <td>{{ $application->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- Approved Applications --}}
    <h3>Approved Applications</h3>
    @php
        $approvedApplications = $applications->filter(function ($application) {
            return $application->status === 'Approved';
        })->sortBy(function ($application) {
            return [$application->created_at, $application->updated_at];
        });
    @endphp

    @if($approvedApplications->isEmpty())
        <p>No approved applications.</p>
    @else
        <table class="table" id="approvedApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Proposed Activity</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvedApplications as $application)
                <tr onclick="window.location='{{ route('faculty.applications.show', $application->id) }}'" style="cursor:pointer;">
                    <td>{{ $application->name_of_project }}</td>
                    <td>{{ $application->name_of_organization }}</td>
                    <td>{{ $application->proposed_activity }}</td>
                    <td>{{ $application->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection
