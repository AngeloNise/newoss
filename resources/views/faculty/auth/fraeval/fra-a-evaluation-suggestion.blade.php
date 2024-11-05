@extends('layout.adminlayout')

@section('content')
<script src="{{ asset('js/faculty/dean/annexasuggestion.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/faculty/fraevalsuggestion.css') }}">

<div class="suggestion-container">
    <a href="{{ route('faculty.fra-a-evaluation.show', $application->id) }}" class="btn btn-primary">Back</a>
    <h2>Add Suggestion for FRA {{ $application->name_of_project }}</h2>

    <!-- Second Form: Suggestions -->
    <form id="suggestions-form" action="{{ route('faculty.fra-a-evaluation.store-suggestion', $application->id) }}" method="POST">
        @csrf
        <div id="suggestions">
            <div class="split suggestion-group">
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

        <!-- Changed the button type to submit -->
        <button type="submit" id="submit-both" class="btn btn-primary">Send</button>
    </form>
</div>
@endsection
