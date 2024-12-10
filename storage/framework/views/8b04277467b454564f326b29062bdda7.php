
<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/ocaeval/ocaedit.css')); ?>">
<script src="<?php echo e(asset('js/org/annexa.js')); ?>"></script>

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

<div class="oca-container">
    <a href="<?php echo e(route('org.auth.sidebar.offcampus.detail', $submission->id)); ?>" class="btn btn-primary">Back</a>
    <h1>Edit Annex A (Off-Campus Activity)</h1>
    <form action="<?php echo e(route('org.auth.sidebar.offcampus.update', $submission->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <h2>OFF-CAMPUS ACTIVITY APPLICATION (Annex-A)</h2>
        <div class="fill-up-container">
            <input type="hidden" name="email" value="<?php echo e(auth()->user()->email); ?>">

            <div class="oca-group">
                <label for="name_of_activity">Name of Activity</label>
                <input type="text" id="name_of_activity" name="name_of_activity" 
                    class="form-control <?php echo e($errors->has('name_of_activity') ? 'is-invalid' : ''); ?>" 
                    value="<?php echo e(old('name_of_activity', $submission->name_of_activity)); ?>">
                <?php $__errorArgs = ['name_of_activity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div id="duration">
                <div class="split">
                    <div class="oca-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" 
                            class="form-control <?php echo e($errors->has('start_date') ? 'is-invalid' : ''); ?>" 
                            value="<?php echo e(old('start_date', $submission->start_date)); ?>">
                        <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="oca-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" 
                            class="form-control <?php echo e($errors->has('end_date') ? 'is-invalid' : ''); ?>" 
                            value="<?php echo e(old('end_date', $submission->end_date)); ?>">
                        <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <div class="oca-group">
                <label for="place_of_activity">Place of Activity</label>
                <input type="text" id="place_of_activity" name="place_of_activity" 
                    class="form-control <?php echo e($errors->has('place_of_activity') ? 'is-invalid' : ''); ?>" 
                    value="<?php echo e(old('place_of_activity', $submission->place_of_activity)); ?>">
                <?php $__errorArgs = ['place_of_activity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="oca-group">
                <label for="number_of_participants">Number of Participants</label>
                <input type="number" id="number_of_participants" name="number_of_participants" 
                    class="form-control <?php echo e($errors->has('number_of_participants') ? 'is-invalid' : ''); ?>" 
                    value="<?php echo e(old('number_of_participants', $submission->number_of_participants)); ?>">
                <?php $__errorArgs = ['number_of_participants'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <div class="oca-group">
                <label for="campus_college_org">Campus/College/Organization</label>
                <input type="text" id="campus_college_org" name="campus_college_org" 
                    class="form-control <?php echo e($errors->has('campus_college_org') ? 'is-invalid' : ''); ?>" 
                    value="<?php echo e(old('campus_college_org', $submission->campus_college_org)); ?>">
                <?php $__errorArgs = ['campus_college_org'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <small class="text-danger"><?php echo e($message); ?></small>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>

            <h2>Pre-Approval Attachments</h2>
    <p>Ensure all files are uploaded in the required formats.</p>

                
                <?php
                    $attachmentLabels = [
                        'ANNEX B: <strong>Letter of Intent</strong> addressed to the sector head and duly recommended by the Director/Dean.',
                        'Letter of Invitation/Acceptance Letter from the Organizers of the event/activity.',
                        'Endorsement from Research Management Office (for research-related activities).',
                        'Copy of Program of Activities.',
                        'ANNEX C: <strong>Summary list</strong> of all Participants (Personnel-in-charge and Students) indicating their respective colleges.',
                        'Latest Student’s Certificate of Registration.',
                        'Copy of Curriculum (for Curricular activity).',
                        'ANNEX D: <strong>Individual Itinerary of Travel</strong> reviewed by PIC and approved by Dean/Director.',
                        'Scanned copy/photocopy of the Passport of participants (for activity outside the country).',
                        'Medical Clearance (Office Memorandum Order No. 13 Series 2022). ANNEX E: <strong>Endorsement letter</strong> from concerned Dean/Director to Medical and Dental Services Office Director (MDSO Director).',
                        'First Aid Kit (Type of first aid will be determined by Medical and Dental Services Office).',
                        'Group insurance for all participants.',
                        'Consent Form duly signed by the parent/guardian with attached photocopy of parent/guardian’s valid ID with wet signature.',
                        'ANNEX F: <strong>Assumption of Responsibility</strong> of PIC and concerned Sector Head.',
                        'Request letter to show proof of advance and proper coordination with the Local Government or concerned NGOs (for curricular activity).',
                        'ANNEX G: <strong>Risk Assessment Plan</strong> prepared by the Personnel-In-Charge/Adviser duly approved by the Dean/Director.',
                        'Consultation conducted to concerned students and stakeholders with attached minutes prepared by personnel-in-charge with wet signature.',
                        'Fees/Fund (As applicable) (for curricular activity).',
                        'Procurement Requirements (for activities that involve procurement and/or outsourcing of equipment/machines, facilities, and services).',
                        'ANNEX H: <strong>Complied Student Requirements</strong> prepared by personnel-in-charge.',
                    ];
                ?>

                <?php for($i = 1; $i <= 20; $i++): ?>
                    <div class="oca-group">
                        <label for="attachment<?php echo e($i); ?>">
                            <strong><?php echo e($i); ?>.</strong> <?php echo $attachmentLabels[$i - 1]; ?>

                        </label>
                        <?php if(!empty($submission->{'attachment'.$i.'_path'})): ?>
                            <p>Current File: 
                                <a href="<?php echo e(asset($submission->{'attachment'.$i.'_path'})); ?>" target="_blank">View File</a>
                            </p>
                        <?php else: ?>
                            <p>No file uploaded yet.</p>
                        <?php endif; ?>
                        <input type="file" id="attachment<?php echo e($i); ?>" name="attachment<?php echo e($i); ?>" 
                            class="form-control <?php echo e($errors->has('attachment'.$i) ? 'is-invalid' : ''); ?>">
                        <?php $__errorArgs = ['attachment'.$i];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <small class="text-danger"><?php echo e($message); ?></small>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                <?php endfor; ?>

            <div class="oca-group">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/offcampus/oca-edit.blade.php ENDPATH**/ ?>