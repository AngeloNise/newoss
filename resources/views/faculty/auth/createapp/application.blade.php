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
    <form action="{{ url('/faculty/Application') }}" method="POST">
        @csrf
        <h2>CREATE APPLICATION</h2>
        <div class="split">
            <div class="fra-group">
                <input type="text" id="name_of_project" name="name_of_project" class="form-control" placeholder="Name of the Project" required>
            </div>

            <div class="fra-group">
                <select id="name_of_organization" name="name_of_organization" class="form-control select2" required>
                    <option value="">Select Organization</option>
                    @foreach($organizations as $organization)
                        <option value="{{ $organization }}">{{ $organization }}</option>
                    @endforeach
                </select>
            </div>

            <div class="fra-group">
                <select id="proposed_activity" name="proposed_activity" class="form-control" required>
                    <option value="">Select Proposed Activity</option>
                    <option value="Off Campus">Off Campus</option>
                    <option value="In Campus">In Campus</option>
                    <option value="Fund Raising">Fund Raising</option>
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    // Initialize Select2
    $(document).ready(function() {
        $('.select2').select2({
            placeholder: "Select Organization",
            allowClear: true
        });
    });
</script>
@endsection
