@extends('layout.deanlayout')

@section('content')
<div class="suggestion-container">
    <a href="{{ route('dean.fra-a-evaluation.show', $application->id) }}" class="btn btn-primary">Back</a>
    <h2>Add Suggestion for FRA {{ $application->name_of_project }}</h2>
    
    <!-- First Form: Status Update -->
    <form id="status-update-form" action="{{ route('dean.fra-a-evaluation.update-status', $application->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="status">Update Status</label>
            <select name="new_status" id="status" class="form-control" required>
                <option value="" disabled selected>Select new status</option>
                <option value="Pending Approval" {{ $application->status === 'Pending Approval' ? 'selected' : '' }}>Pending Approval</option>
                <option value="Approved" {{ $application->status === 'Approved' ? 'selected' : '' }}>Approved</option>
                <option value="Returned" {{ $application->status === 'Returned' ? 'selected' : '' }}>Returned</option>
            </select>
        </div>
    </form>

    <!-- Second Form: Suggestions -->
    <form id="suggestions-form" action="{{ route('dean.fra-a-evaluation.store-suggestion', $application->id) }}" method="POST">

        @csrf
        <div id="suggestions">
            <div class="split">
                <div class="form-group">
                    <label for="section">Select Section</label>
                    <select name="section[]" class="form-control" required>
                        <option value="" disabled selected>Select a section</option>
                        <option value="Approved">Approved</option>
                        <option value="Project Information">Project Information</option>
                        <option value="Items to be Sold">Items to be Sold</option>
                        <option value="Other Income">Other Income</option>
                        <option value="Expenditures">Expenditures</option>
                        <option value="Other Information">Other Information</option>
                        <option value="Other Concerns">Other Concerns</option>
                    </select>
                </div>
                <div class="fra-group">
                    <label for="comment">Your Suggestion/Comments</label>
                    <input type="text" name="comment[]" class="form-control" required />
                </div>
            </div>
        </div>

        <div class="button-items">
            <button type="button" id="remove-suggestion" class="btn btn-danger">Remove</button>
            <button type="button" id="add-suggestion" class="btn btn-secondary">Add</button>
        </div>
    </form>

    <button type="submit" id="submit-both" class="btn btn-primary">Send</button>
</div>

<script src="{{ asset('js/faculty/dean/annexasuggestion.js') }}"></script>
@endsection
