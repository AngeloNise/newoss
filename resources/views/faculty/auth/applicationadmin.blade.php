@extends('layout.adminlayout')

@section('content')
    
    <div class="application-container">
        <a href="{{ route('faculty.application.create') }}" class="button">Add Application</a>
        <h2>Application List</h2>

        <!-- Search Bar -->
        <input type="text" id="searchBar" placeholder="Search..." class="search-bar" onkeyup="filterApplications()">

        @if($applications->isEmpty())
            <p>No applications submitted yet.</p>
        @else
            <table class="table" id="applicationsTable">
                <thead>
                    <tr>
                        <th>Name of Project</th>
                        <th>Organization</th>
                        <th>Proposed Activity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($applications as $application)
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

    <script src="/js/faculty/application.js"></script>
@endsection
