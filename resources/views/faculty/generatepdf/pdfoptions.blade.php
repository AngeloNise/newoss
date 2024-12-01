@extends('layout.adminlayout')

@section('content')
<link rel="stylesheet" href="{{ asset('css/faculty/genpdfoptions.css') }}">
<div class="parent-container">
    <div class="container">
        <h2>Generate Applications Report</h2>
        <form id="reportForm" action="{{ route('faculty.application-admin.generate-pdf') }}" method="GET">
            @csrf

            <!-- Dropdown to Select Activity Type -->
            <div class="split">
                <div class="dropdown-container">
                    <label for="activity_type">Select Activity Type:</label>
                    <select id="activity_type" name="activity_type" class="form-control">
                        <option value="all" {{ request('activity_type') == 'all' ? 'selected' : '' }}>All Applications</option>
                        <option value="fund raising" {{ request('activity_type') == 'fund raising' ? 'selected' : '' }}>Fund Raising</option>
                        <option value="in campus" {{ request('activity_type') == 'in campus' ? 'selected' : '' }}>In Campus</option>
                        <option value="off campus" {{ request('activity_type') == 'off campus' ? 'selected' : '' }}>Off Campus</option>
                    </select>
                </div>

            <!-- Date Range Button Group -->
                <div class="button-group">
                    <label for="range">Select Time Period:</label>
                    <button type="submit" name="range" value="monthly" class="btn btn-primary">Monthly</button>
                    <button type="submit" name="range" value="quarterly" class="btn btn-primary">Quarterly</button>
                    <button type="submit" name="range" value="semi_annually" class="btn btn-primary">Semi-Annually</button>
                    <button type="submit" name="range" value="annually" class="btn btn-primary">Annually</button>
                    <button type="submit" name="range" value="all" class="btn btn-primary">All</button>
                </div>
            </div>

            <!-- Custom Date Range Section -->
            <div class="custom-range-container">
                <h3>Custom Date Range</h3>
                <div class="split">
                    <div class="pdf-group">
                        <label for="custom_start">Custom Start Date:</label>
                        <input type="date" id="custom_start" name="custom_start" class="form-control" value="{{ request('custom_start') }}">
                    </div>
                    <div class="pdf-group">
                        <label for="custom_end">Custom End Date:</label>
                        <input type="date" id="custom_end" name="custom_end" class="form-control" value="{{ request('custom_end') }}">
                    </div>
                </div>
                <button type="submit" name="range" value="custom" class="btn btn-primary">Generate Custom Range</button>
            </div>

            <!-- Search Section for Organization and College -->
            <div class="search-section">
                <h3>Search Filters</h3>
                <div class="split">
                    <div class="pdf-group">
                        <label for="name_of_organization">Organization Name:</label>
                        <input type="text" id="name_of_organization" name="name_of_organization" class="form-control" placeholder="Search by Organization" value="{{ request('name_of_organization') }}">
                        <ul id="organization-suggestions" class="suggestions-list"></ul>
                    </div>
                    <div class="pdf-group">
                        <label for="college_branch">College Branch:</label>
                        <input type="text" id="college_branch" name="college_branch" class="form-control" placeholder="Search by College Branch" value="{{ request('college_branch') }}">
                        <ul id="branch-suggestions" class="suggestions-list"></ul>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Handle Organization Search Input
        $('#name_of_organization').on('input', function () {
            var query = $(this).val();
            if (query.length >= 2) {
                $.get("{{ route('faculty.search.organizations') }}", { query: query }, function (data) {
                    $('#organization-suggestions').empty();
                    if (data.length > 0) {
                        data.forEach(function (organization) {
                            $('#organization-suggestions').append('<li>' + organization + '</li>');
                        });
                    }
                });
            } else {
                $('#organization-suggestions').empty();
            }
        });

        // Handle College Branch Search Input
        $('#college_branch').on('input', function () {
            var query = $(this).val();
            if (query.length >= 2) {
                $.get("{{ route('faculty.search.branches') }}", { query: query }, function (data) {
                    $('#branch-suggestions').empty();
                    if (data.length > 0) {
                        data.forEach(function (branch) {
                            $('#branch-suggestions').append('<li>' + branch + '</li>');
                        });
                    }
                });
            } else {
                $('#branch-suggestions').empty();
            }
        });

        // Handle suggestion click to fill input
        $(document).on('click', '#organization-suggestions li', function () {
            $('#name_of_organization').val($(this).text());
            $('#organization-suggestions').empty();
        });

        $(document).on('click', '#branch-suggestions li', function () {
            $('#college_branch').val($(this).text());
            $('#branch-suggestions').empty();
        });
    });
</script>
@endsection
