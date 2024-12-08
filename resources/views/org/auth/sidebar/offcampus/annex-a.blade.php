@extends('layout.orglayout')
@section('content')
<link rel="stylesheet" href="{{ asset('css/orgs/ocaeval/annexa.css') }}">
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

<div class="oca-container">
    <form action="{{ route('org.auth.sidebar.annex.a.submit') }}" method="POST" enctype="multipart/form-data" onsubmit="return validateAttachments()">
        @csrf
        <h2> Annex A Pre-Approval Requirements </h2>
        <div id="Annex-A-Pre-Approval-Requirements">
            <div class="requirements">
                <!-- Name of Activity and Place of Activity on one line -->
                <div class="oca-group" style="display: flex; gap: 50px; align-items: center;">
                    <div style="flex: 1;">
                        <label for="noa">Name of Activity</label>
                        <input type="text" id="noa" name="name_of_activity" class="form-control" value="{{ old('name_of_activity') }}" maxlength="100" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="poa">Place of Activity</label>
                        <input type="text" id="poa" name="place_of_activity" class="form-control" value="{{ old('place_of_activity') }}" maxlength="100" required>
                    </div>
                </div>
        
                <!-- Duration fields on one line -->
                <div id="duration">
                    <div class="split">
                        <div class="oca-group">
                            <label for="start_date">Start Date</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date') }}" required>
                            @error('start_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="oca-group">
                            <label for="end_date">End Date</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date') }}" required>
                            @error('end_date')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                       

                <!-- Number of Participants and Campus/College/Organization on one line -->
                <div class="oca-group" style="display: flex; gap: 50px; align-items: center;">
                    <div style="flex: 1;">
                        <label for="nop">Number of Participants</label>
                        <input type="number" id="nop" name="number_of_participants" class="form-control" min="1" max="1000" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="cco">Campus/ College/ Organization</label>
                        <input type="text" id="cco" name="campus_college_org" class="form-control" maxlength="100" required>
                    </div>
                </div>
            </div>
        </div>

    <!-- Attachment Fields with Custom Labels -->
    <h2>Annex B</h2>

    <div class="oca-group">
        <label for="attachment1">Letter of Intent (Addressed to Sector Head and Recommended by Director/Dean)</label>
        <input type="file" id="attachment1" name="attachment1" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment2">Invitation/Acceptance Letter (From Organizers of Event/Activity)</label>
        <input type="file" id="attachment2" name="attachment2" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment3">Endorsement (From Research Management Office for Research-Related Activities)</label>
        <input type="file" id="attachment3" name="attachment3" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment4">Program of Activities</label>
        <input type="file" id="attachment4" name="attachment4" accept=".pdf,.doc,.docx" required>
    </div>

    <h2>Annex C</h2>

    <div class="oca-group">
        <label for="attachment5">Summary List of Participants (With College Indicated)</label>
        <input type="file" id="attachment5" name="attachment5" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment6">Latest Certificate of Registration (For Students)</label>
        <input type="file" id="attachment6" name="attachment6" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment7">Curriculum Copy (For Curricular Activities)</label>
        <input type="file" id="attachment7" name="attachment7" accept=".pdf,.doc,.docx" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<!-- JavaScript Validation -->
<script>
    function validateAttachments() {
        // Get all file inputs in the form
        const fileInputs = document.querySelectorAll('input[type="file"]');
        
        for (let i = 0; i < fileInputs.length; i++) {
            // Check if the file input has a file selected
            if (!fileInputs[i].files.length) {
                alert("Please upload all required attachments.");
                return false;
            }
            
            // Get the file and its extension
            const file = fileInputs[i].files[0];
            const fileType = file.type;
            const validExtensions = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            
            // Check if the file type is allowed
            if (!validExtensions.includes(fileType)) {
                alert("Only PDF, DOC, and DOCX files are allowed.");
                return false;
            }
        }
        return true; // Proceed with form submission if all checks pass
    }
</script>

@endsection
