@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/application.css') }}">
<script src="{{ asset('js/faculty/application.js') }}"></script>

<div class="application-container">
    <a href="{{ route('faculty.application.create') }}" class="button">Add Application</a>

    <form method="GET" action="{{ route('faculty.application.admin') }}" class="search-form mb-3">
        <input 
            type="text" 
            id="searchBar" 
            name="search" 
            value="{{ request()->get('search') }}" 
            placeholder="Search by Project Name or Organization..." 
            class="search-bar">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>     

    <h2>Application List</h2>

    {{-- Pending Approval Applications --}}
    <h3>Pending Approval Applications</h3>
    @if($pendingApplications->isEmpty())
        <p>No pending approval applications found.</p>
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
        <div class="pagination-container">
            {{ $pendingApplications->appends([
                'search' => request()->get('search'),
                'pending_page' => request()->get('pending_page'),
                'returned_page' => request()->get('returned_page'),
                'approved_page' => request()->get('approved_page')
            ])->links('pagination::simple-bootstrap-4') }}
        </div>
    @endif

    {{-- Returned Applications --}}
    <h3>Returned Applications</h3>
    @if($returnedApplications->isEmpty())
        <p>No returned applications found.</p>
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
        <div class="pagination-container">
            {{ $returnedApplications->appends([
                'search' => request()->get('search'),
                'pending_page' => request()->get('pending_page'),
                'returned_page' => request()->get('returned_page'),
                'approved_page' => request()->get('approved_page')
            ])->links('pagination::simple-bootstrap-4') }}
        </div>
    @endif

    {{-- Approved Applications --}}
    <h3>Approved Applications</h3>
    @if($approvedApplications->isEmpty())
        <p>No approved applications found.</p>
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
        <div class="pagination-container">
            {{ $approvedApplications->appends([
                'search' => request()->get('search'),
                'pending_page' => request()->get('pending_page'),
                'returned_page' => request()->get('returned_page'),
                'approved_page' => request()->get('approved_page')
            ])->links('pagination::simple-bootstrap-4') }}
        </div>
    @endif
</div>

@endsection
