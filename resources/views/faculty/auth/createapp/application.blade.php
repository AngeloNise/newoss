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
    <div class="fra-group">
        <label for="search_organization">Search Organization for FRA(only)</label>
        <input type="text" id="search_organization" class="form-control" placeholder="Type to search organization...">
        <ul id="organization_list" class="list-group" style="display: none;"></ul>
    </div>
    <form action="{{ url('/faculty/Application') }}" method="POST">
        @csrf
        <h2>CREATE APPLICATION</h2>
        <div class="fill-up-container">
            <div class="fra-group">
                <label for="name_of_project">Name of Project/Activity</label>
                <input type="text" id="name_of_project" name="name_of_project" class="form-control" required>
            </div>

            <div class="fra-group">
                <label for="proposed_activity">Proposed Activity</label>
                <select id="proposed_activity" name="proposed_activity" class="form-control" required>
                    <option value="">Select Proposed Activity</option>
                    <option value="Off Campus">Off Campus</option>
                    <option value="In Campus">In Campus</option>
                    <option value="Fund Raising">Fund Raising</option>
                </select>
            </div>

            <div id="duration">
                <div class="split">
                    <div class="fra-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                        @error('start_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="fra-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                        @error('end_date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
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
                <label for="college_branch">College Branch</label>
                <input type="text" id="college_branch" name="college_branch" class="form-control" required>
            </div>

            <div class="fra-group">
                <label for="total_estimated_income">Total Estimated Income</label>
                <input type="text" id="total_estimated_income" name="total_estimated_income" class="form-control" required>
            </div>

            <div class="fra-group">
                <label for="place_of_activity">Place of Activity</label>
                <input type="text" id="place_of_activity" name="place_of_activity" class="form-control">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>

<script>
$(document).ready(function() {
    // Search organization
    $('#search_organization').on('keyup', function() {
        var query = $(this).val();
        if (query.length > 0) {
            $.ajax({
                url: "{{ route('faculty.search.organization') }}", // Adjust to your route
                method: "GET",
                data: { query: query },
                success: function(data) {
                    $('#organization_list').html(data).show();
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        } else {
            $('#organization_list').hide();
        }
    });
        // Select organization from the list
        $(document).on('click', '.organization-item', function() {
            var organizationData = $(this).data('organization');
            
            $('#search_organization').val(organizationData.requesting_organization);
            $('#name_of_organization').val(organizationData.requesting_organization);
            $('#name_of_project').val(organizationData.name_of_project); // Ensure this field is populated
            $('#college_branch').val(organizationData.college_branch); // Ensure this field is populated
            $('#total_estimated_income').val(organizationData.total_estimated_income); // Ensure this field is populated
            $('#start_date').val(organizationData.start_date);
            $('#end_date').val(organizationData.end_date);
            
            $('#organization_list').hide();

            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select Organization",
                    allowClear: true
                });
            });

        });


        // Close the organization list on outside click
        $(document).click(function(event) {
            if (!$(event.target).closest('#search_organization, #organization_list').length) {
                $('#organization_list').hide();
            }
        });
    });
</script>
<link rel="stylesheet" href="/css/faculty/applicationadd.css">
@endsection