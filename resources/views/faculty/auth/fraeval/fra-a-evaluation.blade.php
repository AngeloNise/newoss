@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/preevallist.css') }}">
<script src="{{ asset('js/faculty/preeval.js') }}"></script> <!-- Link to the JS file -->

<div class="fra-container">
    <a href="{{ url('/faculty/Pre-Evaluation-Status') }}" class="btn btn-secondary mb-3">Back</a>
    <h2>FRA Evaluation Applications</h2>

    <!-- Search Bar -->
    <input type="text" id="searchBar" placeholder="Search..." class="search-bar" onkeyup="filterApplications()">

    @php
        // Filter applications based on their status
        $pendingApprovalApplications = $applications->filter(function ($application) {
            return $application->status === 'Pending Approval';
        });

        $returnedApplications = $applications->filter(function ($application) {
            return $application->status === 'Returned';
        });

        $approvedApplications = $applications->filter(function ($application) {
            return $application->status === 'Approved';
        });
    @endphp

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
    @endif
</div>

@endsection
