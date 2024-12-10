@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/postactfra.css') }}">
<script src="{{ asset('js/faculty/postactfra.js') }}"></script> <!-- Link to the JS file -->

<div class="content-container">
    <h1>Post Activity Report/Untagging</h1>

    <!-- Search Bar -->
    <form method="GET" action="{{ route('faculty.application.frapost') }}" class="search-form mb-3">
        <input 
            type="text" 
            id="searchBar" 
            name="search" 
            value="{{ request()->get('search') }}" 
            placeholder="Search by Project Name or Organization..." 
            class="search-bar">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    
    <!-- Not Submitted Applications -->
    <h2>Not Submitted</h2>
    <table id="notSubmittedTable">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Name of Project</th>
                <th>Activity Report</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($notSubmittedApplications as $application)
            <tr>
                <td>{{ $application->name_of_organization }}</td>
                <td>{{ $application->name_of_project }}</td>
                <td>
                    <!-- Dropdown for 'frapost' status -->
                    <form action="{{ route('faculty.updateFrapost', $application->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="frapost" onchange="this.form.submit()">
                            <option value="not_submitted" {{ $application->frapost == 'not_submitted' ? 'selected' : '' }}>Not Submitted</option>
                            <option value="submitted" {{ $application->frapost == 'submitted' ? 'selected' : '' }}>Submitted</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination for Not Submitted Applications -->
    <div class="pagination-container">
        {{ $notSubmittedApplications->appends(['search' => request()->get('search')])->links('pagination::simple-bootstrap-4') }}
    </div>

    <!-- Submitted Applications -->
    <h2>Submitted</h2>
    <table id="submittedTable">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Name of Project</th>
                <th>Activity Report</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($submittedApplications as $application)
            <tr>
                <td>{{ $application->name_of_organization }}</td>
                <td>{{ $application->name_of_project }}</td>
                <td>
                    <!-- Dropdown for 'frapost' status -->
                    <form action="{{ route('faculty.updateFrapost', $application->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="frapost" onchange="this.form.submit()">
                            <option value="not_submitted" {{ $application->frapost == 'not_submitted' ? 'selected' : '' }}>Not Submitted</option>
                            <option value="submitted" {{ $application->frapost == 'submitted' ? 'selected' : '' }}>Submitted</option>
                        </select>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination for Submitted Applications -->
    <div class="pagination-container">
        {{ $submittedApplications->appends(['search' => request()->get('search')])->links('pagination::simple-bootstrap-4') }}
    </div>
</div>
@endsection
