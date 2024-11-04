<?php $__env->startSection('content'); ?>

<?php if(Session::has('error')): ?>
    <script>
        window.flashMessage = {
            message: "<?php echo e(Session::get('error')); ?>",
            type: "error"
        };
    </script>
<?php endif; ?>

<?php if(Session::has('success')): ?>
    <script>
        window.flashMessage = {
            message: "<?php echo e(Session::get('success')); ?>",
            type: "success"
        };
    </script>
<?php endif; ?>

<div class="fra-container">
    <form action="<?php echo e(route('org.auth.sidebar.annex.d.submit')); ?>" method="POST" enctype="multipart/form-data" onsubmit="return validateAttachments()">
        <?php echo csrf_field(); ?>
        <h2> Annex D: Upon Approval Requirements Pre-Evaluation </h2>
        <div id="Annex-A-Pre-Approval-Requirements">
            <div class="requirements">
                <!-- Name of Activity and Place of Activity on one line -->
                <div class="fra-group" style="display: flex; gap: 50px; align-items: center;">
                    <div style="flex: 1;">
                        <label for="noa">Name of Activity</label>
                        <input type="text" id="noa2" name="name_of_activity2" class="form-control" value="<?php echo e(old('name_of_activity2')); ?>" maxlength="100" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="poa2">Place of Activity</label>
                        <input type="text" id="poa2" name="place_of_activity2" class="form-control2" value="<?php echo e(old('place_of_activity2')); ?>" maxlength="100" required>
                    </div>
                </div>
        
                <!-- Duration fields on one line -->
                <div class="fra-group" style="display: flex; gap: 20px; align-items: center;">
                    <div style="flex: 1; display: flex; align-items: center;">
                        <label for="duration_from2" style="margin-right: 10px; white-space: nowrap;">Start Date</label>
                        <input type="date" id="duration_from2" name="start_date2" class="form-control" required>
                    </div>
                    <div style="flex: 1; display: flex; align-items: center;">
                        <label for="duration_to2" style="margin-right: 10px; white-space: nowrap;">End Date</label>
                        <input type="date" id="duration_to2" name="end_date2" class="form-control" required>
                    </div>
                </div>

                <!-- Number of Participants and Campus/College/Organization on one line -->
                <div class="fra-group" style="display: flex; gap: 50px; align-items: center;">
                    <div style="flex: 1;">
                        <label for="nop2">Number of Participants</label>
                        <input type="number" id="nop2" name="number_of_participants2" class="form-control" min="1" max="1000" required>
                    </div>
                    <div style="flex: 1;">
                        <label for="cco2">Campus/ College/ Organization</label>
                        <input type="text" id="cco2" name="campus_college_org2" class="form-control" maxlength="100" required>
                    </div>
                </div>
            </div>
        </div>

        <h2>Annex D</h2>

        <div class="fra-group">
            <label for="attachment8">(Individual Itinerary of Travel) reviewed by PIC and approved by Dean/ Director.</label>
            <input type="file" id="attachment8" name="attachment8" accept=".pdf,.doc,.docx" required>
        </div>
    
        <div class="fra-group">
            <label for="attachment9">Scanned copy/photocopy of the Passport of participants. (for activity outside the country).</label>
            <input type="file" id="attachment9" name="attachment9" accept=".pdf,.doc,.docx" required>
        </div>
    
        <div class="fra-group">
            <label for="attachment10">Medical Clearance (Office Memorandum Order No. 13 Series 2022)</label>
            <input type="file" id="attachment10" name="attachment10" accept=".pdf,.doc,.docx" required>
        </div>

        <h2>Annex E</h2>
    
        <div class="fra-group">
            <label for="attachment11">Endorsement letter from concerned Dean/Director to Medical and Dental Services Office Director (MDSO Director)</label>
            <input type="file" id="attachment11" name="attachment11" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment12">First Aid Kit (Type of first aid will be determined by Medical and Dental Services Office)</label>
            <input type="file" id="attachment12" name="attachment12" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment13">Group insurance for all participants.</label>
            <input type="file" id="attachment13" name="attachment13" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment14">Consent Form duly signed by the parent/guardian with attached photocopy of parent/guardian’s valid ID with wet signature.</label>
            <input type="file" id="attachment14" name="attachment14" accept=".pdf,.doc,.docx" required>
        </div>
    
        <h2>Annex F</h2>
    
        <div class="fra-group">
            <label for="attachment15">Assumption of Responsibility of PIC and concerned Sector Head.</label>
            <input type="file" id="attachment15" name="attachment15" accept=".pdf,.doc,.docx" required>
        </div>
    
        <div class="fra-group">
            <label for="attachment16">Request letter to show proof of advance and proper coordination with the Local Government or concerned NGOs (for curricular activity)</label>
            <input type="file" id="attachment16" name="attachment16" accept=".pdf,.doc,.docx" required>
        </div>

        <h2>Annex G</h2>
    
        <div class="fra-group">
            <label for="attachment17">Risk Assessment Plan prepared by the Personnel-In-Charge/Adviser duly approved by the Dean/ Director.</label>
            <input type="file" id="attachment17" name="attachment17" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment18">Consultation conducted to concerned students and stakeholders with attached minutes prepared by personnel-in-charge with wet signature.</label>
            <input type="file" id="attachment18" name="attachment18" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment19">Fees/Fund (As applicable) (for curricular activity)</label>
            <input type="file" id="attachment19" name="attachment19" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment20">Procurement Requirements (for activities that involve procurement and/or outsourcing of equipment/machines, facilities and services).</label>
            <input type="file" id="attachment20" name="attachment20" accept=".pdf,.doc,.docx" required>
        </div>

        <h2>Annex H</h2>

        <div class="fra-group">
            <label for="attachment21">Complied Student Requirements prepared by personnel-in-charge</label>
            <input type="file" id="attachment21" name="attachment21" accept=".pdf,.doc,.docx" required>
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



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/offcampus/annex-d.blade.php ENDPATH**/ ?>