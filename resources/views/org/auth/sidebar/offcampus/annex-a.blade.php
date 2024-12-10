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
    <h2>Pre-Approval Requirements</h2>
    <label style="font-weight: bold; font-size: 25px;">Max PDF FILE: 2048kb | 2 mb</label>

    
    <br>
    <br><div class="oca-group">
        <label for="attachment1">Annex B: Letter of Intent (Addressed to Sector Head and Recommended by Director/Dean)</label>
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

    <div class="oca-group">
        <label for="attachment5">Annex C: Summary List of Participants (With College Indicated)</label>
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

    <h2>Upon Approval Requirements</h2>

    <div class="oca-group">
        <label for="attachment8">ANNEX D: Individual Itinerary of Travel (Reviewed by PIC and Approved by Dean/Director)</label>
        <input type="file" id="attachment8" name="attachment8" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment9">Scanned Copy/Photocopy of Passport of Participants (For Activity Outside the Country)</label>
        <input type="file" id="attachment9" name="attachment9" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment10">Medical Clearance (Office Memorandum Order No. 13 Series 2022)</label>
        <input type="file" id="attachment10" name="attachment10" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment11">ANNEX E: Endorsement Letter from Dean/Director to Medical and Dental Services Office Director (MDSO Director)</label>
        <input type="file" id="attachment11" name="attachment11" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment12">First Aid Kit (Type Determined by Medical and Dental Services Office)</label>
        <input type="file" id="attachment12" name="attachment12" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment13">Group Insurance for All Participants</label>
        <input type="file" id="attachment13" name="attachment13" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment14">Consent Form (Signed by Parent/Guardian with Photocopy of Valid ID and Wet Signature)</label>
        <input type="file" id="attachment14" name="attachment14" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment15">ANNEX F: Assumption of Responsibility of PIC and Concerned Sector Head</label>
        <input type="file" id="attachment15" name="attachment15" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment16">Request Letter for Advance Coordination with Local Government/NGOs (For Curricular Activity)</label>
        <input type="file" id="attachment16" name="attachment16" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment17">ANNEX G: Risk Assessment Plan (Prepared by PIC/Adviser, Approved by Dean/Director)</label>
        <input type="file" id="attachment17" name="attachment17" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment18">Consultation Minutes (With Stakeholders, Signed by PIC)</label>
        <input type="file" id="attachment18" name="attachment18" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment19">Fees/Funds (As Applicable for Curricular Activity)</label>
        <input type="file" id="attachment19" name="attachment19" accept=".pdf,.doc,.docx" required>
    </div>

    <div class="oca-group">
        <label for="attachment20">Procurement Requirements (For Equipment/Machines, Facilities, Services)</label>
        <input type="file" id="attachment20" name="attachment20" accept=".pdf,.doc,.docx" required>
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
            // Only validate if a file is selected
            if (fileInputs[i].files.length > 0) {
                const file = fileInputs[i].files[0];
                const fileType = file.type;
                const validExtensions = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                
                // Check if the file type is allowed
                if (!validExtensions.includes(fileType)) {
                    alert("Only PDF, DOC, and DOCX files are allowed.");
                    return false;
                }
            }
        }
        // No restrictions, allow form submission
        return true;
    }
</script>


@endsection
