@extends('layout.adminlayout')

@section('content')
<script src="{{ asset('js/faculty/offcampuseval/annexasuggestion.js') }}"></script>
<link rel="stylesheet" href="{{ asset('css/faculty/offcampuseval/offcampusevalsuggestion.css') }}">

<div class="suggestion-container">
    <a href="{{ route('faculty.offcampus.annex.a.show', $submission->id) }}" class="btn btn-primary">Back</a>
    <h2>Add Comment for OffCampus Annex A: {{ $submission->name_of_activity }}</h2>

    <!-- Comment Form for OffCampus Annex A -->
    <form id="comments-form" action="{{ route('faculty.faculty.offcampus.annex-a.store-evaluation', $submission->id) }}" method="POST">
        @csrf
        <div id="comments">
            <div class="split comment-group">
                <div class="form-group">
                    <label for="section">Select Section</label>
                    <select name="section[]" class="form-control" required>
                        <option value="" disabled selected>Select a section</option>
                        <option value="Activity Overview">Letter of Intent</option>
                        <option value="Invitation/Acceptance Letter">Invitation/Acceptance Letter</option>
                        <option value="Endorsement Letter">Endorsement Letter</option>
                        <option value="Program of Activities">Program of Activities</option>
                        <option value="Summary List of Participants">Summary List of Participants</option>
                        <option value="Latest Certificate of Registration">Latest Certificate of Registration</option>
                        <option value="Curriculum Copy (For Curricular Activities)">Curriculum Copy (For Curricular Activities)</option>
                        <option value="Other Concerns">Other Concerns</option>
                    </select>
                </div>
                <div class="comment-group">
                    <label for="comment">Your Suggestions/Comments</label>
                    <input type="text" name="comment[]" class="form-control" required />
                </div>
            </div>
        </div>

        <div class="button-items">
            <button type="button" id="remove-comment" class="btn btn-danger">Remove</button>
            <button type="button" id="add-comment" class="btn btn-secondary">Add</button>
        </div>

        <button type="submit" id="submit-comments" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    document.getElementById('add-comment').addEventListener('click', function() {
        const commentGroup = document.createElement('div');
        commentGroup.classList.add('split', 'comment-group');
        commentGroup.innerHTML = `
            <div class="form-group">
                <label for="section">Select Section</label>
                <select name="section[]" class="form-control" required>
                    <option value="" disabled selected>Select a section</option>
                    <option value="Activity Overview">Activity Overview</option>
                    <option value="Invitation/Acceptance Letter">Invitation/Acceptance Letter</option>
                    <option value="Endorsement Letter">Endorsement Letter</option>
                    <option value="Program of Activities">Program of Activities</option>
                    <option value="Summary List of Participants">Summary List of Participants</option>
                    <option value="Latest Certificate of Registration">Latest Certificate of Registration</option>
                    <option value="Curriculum Copy (For Curricular Activities)">Curriculum Copy (For Curricular Activities)</option>
                    <option value="Other Concerns">Other Concerns</option>
                </select>
            </div>
            <div class="comment-group">
                <label for="comment">Your Comment</label>
                <input type="text" name="comment[]" class="form-control" required />
            </div>
        `;
        document.getElementById('comments').appendChild(commentGroup);
    });

    document.getElementById('remove-comment').addEventListener('click', function() {
        const comments = document.getElementById('comments');
        if (comments.children.length > 1) {
            comments.removeChild(comments.lastChild);
        }
    });
</script>
@endsection
