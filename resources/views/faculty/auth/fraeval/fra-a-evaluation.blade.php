@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/preevallist.css') }}">
<script src="{{ asset('js/faculty/preeval.js') }}"></script> <!-- Link to the JS file -->

<div class="fra-container">
    <a href="{{ url('/faculty/Pre-Evaluation-Status') }}" class="btn btn-secondary mb-3">Back</a>
    <h2>FRA Evaluation Applications</h2>

    <form method="GET" action="{{ url()->current() }}" class="search-form mb-3">
        <input 
            type="text" 
            id="searchBar" 
            name="search" 
            placeholder="Search by project name or organization..." 
            class="search-bar" 
            value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>    

    <!-- Pending Approval Applications -->
    <h3>Pending Approval</h3>
    @if($pendingApprovalApplications->isEmpty())
        <p>No applications pending approval.</p>
    @else
        <table class="table" id="pendingApprovalTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Total Estimated Income</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pendingApprovalApplications as $application)
                <tr onclick="window.location='{{ route('faculty.fra-a-evaluation.show', $application->id) }}'" style="cursor:pointer;">
                    <td>{{ $application->name_of_project }}</td>
                    <td>{{ $application->requesting_organization }}</td>
                    <td>{{ $application->start_date }}</td>
                    <td>{{ $application->end_date }}</td>
                    <td>{{ $application->status }}</td>
                    <td>{{ $application->total_estimated_income }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-container">
            {{ $pendingApprovalApplications->appends(request()->except('pending_page'))->links('pagination::simple-bootstrap-4') }}
        </div>
    @endif

    <!-- Returned Applications -->
    <h3>Returned</h3>
    @if($returnedApplications->isEmpty())
        <p>No applications returned.</p>
    @else
        <table class="table" id="returnedApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Total Estimated Income</th>
                </tr>
            </thead>
            <tbody>
                @foreach($returnedApplications as $application)
                <tr onclick="window.location='{{ route('faculty.fra-a-evaluation.show', $application->id) }}'" style="cursor:pointer;">
                    <td>{{ $application->name_of_project }}</td>
                    <td>{{ $application->requesting_organization }}</td>
                    <td>{{ $application->start_date }}</td>
                    <td>{{ $application->end_date }}</td>
                    <td>{{ $application->status }}</td>
                    <td>{{ $application->total_estimated_income }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-container">
            {{ $returnedApplications->appends(request()->except('returned_page'))->links('pagination::simple-bootstrap-4') }}
        </div>
    @endif

    <!-- Approved Applications -->
    <h3>Approved</h3>
    @if($approvedApplications->isEmpty())
        <p>No applications approved yet.</p>
    @else
        <table class="table" id="approvedApplicationsTable">
            <thead>
                <tr>
                    <th>Name of Project</th>
                    <th>Organization</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Total Estimated Income</th>
                </tr>
            </thead>
            <tbody>
                @foreach($approvedApplications as $application)
                <tr onclick="window.location='{{ route('faculty.fra-a-evaluation.show', $application->id) }}'" style="cursor:pointer;">
                    <td>{{ $application->name_of_project }}</td>
                    <td>{{ $application->requesting_organization }}</td>
                    <td>{{ $application->start_date }}</td>
                    <td>{{ $application->end_date }}</td>
                    <td>{{ $application->status }}</td>
                    <td>{{ $application->total_estimated_income }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination-container">
            {{ $approvedApplications->appends(request()->except('approved_page'))->links('pagination::simple-bootstrap-4') }}
        </div>
    @endif
</div>

@endsection
