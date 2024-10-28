@extends('layout.adminlayout')

@section('content')

@if(Session::has('error'))
    <script>
        window.flashMessage = {
            message: "{{ Session::get('error') }}",
            type: "error"
        };
    </script>
@endif

@if(Session::has('success'))
    <script>
        window.flashMessage = {
            message: "{{ Session::get('success') }}",
            type: "success"
        };
    </script>
@endif

<div class="fra-container">
    
    <form action="{{ route('faculty.application.index') }}" method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search by project name, organization, or branch" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary mt-2">Search</button>
    </form>

    <form action="{{ route('faculty.application.store') }}" method="POST">
        @csrf
        <h2>CREATE APPLICATION</h2>
        <div class="split">
            <div class="fra-group">
                <input type="text" id="name_of_project" name="name_of_project" class="form-control" placeholder="Name of the Project" required>
            </div>

            <div class="fra-group">
                <input type="text" id="start_date" name="start_date" class="form-control" placeholder="Start Date" required>
            </div>

            <div class="fra-group">
                <input type="text" id="end_date" name="end_date" class="form-control" placeholder="End Date" required>
            </div>

            <div class="fra-group">
                <input type="text" id="requesting_organization" name="requesting_organization" class="form-control" placeholder="Requesting Organization" required>
            </div>

            <div class="fra-group">
                <input type="text" id="college_branch" name="college_branch" class="form-control" placeholder="College Branch" required>
            </div>

            <div class="fra-group">
                <input type="text" id="total_estimated_income" name="total_estimated_income" class="form-control" placeholder="Total Estimated Income" required>
            </div>

            <div class="fra-group">
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>

            <div class="fra-group">
                <textarea id="activity" name="activity" class="form-control" placeholder="Proposed Activity (optional)"></textarea>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection
