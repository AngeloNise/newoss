@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/postactfra.css') }}">
<script src="{{ asset('js/faculty/postactfra.js') }}"></script> <!-- Link to the JS file -->

<div class="content-container">
    <h1>Post Activity Report/Untagging</h1>

    <!-- Search Bar -->
    <input type="text" id="searchBar" placeholder="Search Activity Report..." class="search-bar" onkeyup="filterApplications()">

    <!-- Not Submitted Section -->
    <h2>Not Submitted</h2>
    <table id="notSubmittedTable">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Name of Project</th>
                <th>Status</th>
                <th>Activity Report</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedApplications as $application)
            @if ($application->status == 'not_submitted')
            <tr>
                <td>{{ $application->name_of_organization }}</td>
                <td>{{ $application->name_of_project }}</td> <!-- Fix the closing </td> -->
                <td>
                    <span style="color: Green;">Approved</span>
                </td>
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
            @endif
            @endforeach
        </tbody>
    </table>

    <!-- Submitted Section -->
    <h2>Submitted</h2>
    <table id="submittedTable">
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Name of Project</th>
                <th>Status</th>
                <th>Activity Report</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($approvedApplications as $application)
            @if ($application->frapost == 'submitted')
            <tr>
                <td>{{ $application->name_of_organization }}</td>
                <td>{{ $application->name_of_project }}</td> <!-- Fix the closing </td> -->
                <td>
                    <span style="color: green;">Submitted</span>
                </td>
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
            @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection