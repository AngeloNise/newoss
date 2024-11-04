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
        <h2>Annex D: Travel Requirements</h2>
        
        <div class="fra-group">
            <label for="attachment1">Individual Itinerary of Travel (Reviewed by PIC and approved by Dean/Director)</label>
            <input type="file" id="attachment1" name="attachment1" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment2">Scanned Copy/Photocopy of Passport of Participants (For activities outside the country)</label>
            <input type="file" id="attachment2" name="attachment2" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment3">Medical Clearance (Office Memorandum Order No. 13 Series 2022)</label>
            <input type="file" id="attachment3" name="attachment3" accept=".pdf,.doc,.docx" required>
        </div>

        <h2>Annex E: Medical and Dental Services Requirements</h2>
        
        <div class="fra-group">
            <label for="attachment4">Endorsement Letter from Dean/Director to MDSO Director</label>
            <input type="file" id="attachment4" name="attachment4" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment5">First Aid Kit (Type determined by MDSO)</label>
            <input type="file" id="attachment5" name="attachment5" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment6">Group Insurance for All Participants</label>
            <input type="file" id="attachment6" name="attachment6" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment7">Consent Form Signed by Parent/Guardian with ID</label>
            <input type="file" id="attachment7" name="attachment7" accept=".pdf,.doc,.docx" required>
        </div>

        <h2>Annex F: Coordination Requirements</h2>
        
        <div class="fra-group">
            <label for="attachment8">Assumption of Responsibility of PIC and Sector Head</label>
            <input type="file" id="attachment8" name="attachment8" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment9">Request Letter for Coordination with Local Government/NGOs</label>
            <input type="file" id="attachment9" name="attachment9" accept=".pdf,.doc,.docx" required>
        </div>

        <h2>Annex G: Risk Management Requirements</h2>
        
        <div class="fra-group">
            <label for="attachment10">Risk Assessment Plan Approved by Dean/Director</label>
            <input type="file" id="attachment10" name="attachment10" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment11">Consultation Minutes with Stakeholders</label>
            <input type="file" id="attachment11" name="attachment11" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment12">Fees/Fund Documentation (As applicable)</label>
            <input type="file" id="attachment12" name="attachment12" accept=".pdf,.doc,.docx" required>
        </div>

        <div class="fra-group">
            <label for="attachment13">Procurement Requirements for Activities</label>
            <input type="file" id="attachment13" name="attachment13" accept=".pdf,.doc,.docx" required>
        </div>

        <h2>Annex H: Student Requirements</h2>
        
        <div class="fra-group">
            <label for="attachment14">Complied Student Requirements Prepared by Personnel-in-Charge</label>
            <input type="file" id="attachment14" name="attachment14" accept=".pdf,.doc,.docx" required>
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

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views//org/auth/sidebar/offcampus/annex-d.blade.php ENDPATH**/ ?>