<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/ocaeval/annexa.css')); ?>">

<div class="oca-container">
    <a href="<?php echo e(url('/faculty/Off-Campus-Evaluation')); ?>" class="oca-btn oca-back-btn-primary">Back</a>
    <h2>Submission Details</h2>

    <div class="oca-org-info">
        <form id="status-update-form" class="mb-4">
            <div class="oca-form-group">
                <label for="status">Update Status</label>
                <select id="status" class="oca-form-control" required>
                    <option value="" disabled selected>Select new status</option>
                    <option value="Pending Approval">Pending Approval</option>
                    <option value="Approved">Approved</option>
                    <option value="Returned">Returned</option>
                </select>
                <div class="oca-split">
                    <button type="button" class="oca-btn oca-btn-primary">Update Status</button>
                    <a href="<?php echo e(route('faculty.faculty.offcampus.annex-a.evaluate', ['id' => $submission->id])); ?>" class="oca-btn oca-btn-secondary">Evaluate</a>
                </div>
            </div>

            <?php if(session('success')): ?>
                <div class="oca-alert-success"><?php echo e(session('success')); ?></div>
            <?php endif; ?>

            <?php if($errors->any()): ?>
                <div class="oca-alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <p><?php echo e($error); ?></p>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
            <h3>Activity Details</h3>
                <table class="activity-table">
                    <thead>
                        <tr>
                            <th>Name of Activity</th>
                            <th>Place of Activity</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Number of Participants</th>
                            <th>Campus/College/Organization</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo e($submission->name_of_activity); ?></td>
                            <td><?php echo e($submission->place_of_activity); ?></td>
                            <td><?php echo e($submission->start_date); ?></td>
                            <td><?php echo e($submission->end_date); ?></td>
                            <td><?php echo e($submission->number_of_participants); ?></td>
                            <td><?php echo e($submission->campus_college_org); ?></td>
                        </tr>
                    </tbody>
                </table>

                                    <h3>Attachments</h3>
                    <table class="attachments-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Attachment Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $attachmentLabels = [
                                    '<strong>ANNEX B: Letter of Intent</strong> addressed to the sector head and duly recommended by the Director/Dean.',
                                    '<strong>Letter of Invitation/Acceptance Letter</strong> from the Organizers of the event/activity.',
                                    '<strong>Endorsement from Research Management Office</strong> (for research-related activities).',
                                    '<strong>Copy of Program of Activities</strong>.',
                                    '<strong>ANNEX C: Summary list</strong> of all Participants (Personnel-in-charge and Students) indicating their respective colleges.',
                                    '<strong>Latest Student’s Certificate of Registration</strong>.',
                                    '<strong>Copy of Curriculum</strong> (for Curricular activity).',
                                    '<strong>ANNEX D: Individual Itinerary of Travel</strong> reviewed by PIC and approved by Dean/Director.',
                                    '<strong>Scanned copy/photocopy of the Passport</strong> of participants (for activity outside the country).',
                                    '<strong>Medical Clearance</strong> (Office Memorandum Order No. 13 Series 2022). <strong>ANNEX E: Endorsement letter</strong> from concerned Dean/Director to Medical and Dental Services Office Director (MDSO Director).',
                                    '<strong>First Aid Kit</strong> (Type of first aid will be determined by Medical and Dental Services Office).',
                                    '<strong>Group insurance</strong> for all participants.',
                                    '<strong>Consent Form</strong> duly signed by the parent/guardian with attached photocopy of parent/guardian’s valid ID with wet signature.',
                                    '<strong>ANNEX F: Assumption of Responsibility</strong> of PIC and concerned Sector Head.',
                                    '<strong>Request letter</strong> to show proof of advance and proper coordination with the Local Government or concerned NGOs (for curricular activity).',
                                    '<strong>ANNEX G: Risk Assessment Plan</strong> prepared by the Personnel-In-Charge/Adviser duly approved by the Dean/Director.',
                                    '<strong>Consultation</strong> conducted to concerned students and stakeholders with attached minutes prepared by personnel-in-charge with wet signature.',
                                    '<strong>Fees/Fund</strong> (As applicable) (for curricular activity).',
                                    '<strong>Procurement Requirements</strong> (for activities that involve procurement and/or outsourcing of equipment/machines, facilities, and services).',
                                    '<strong>ANNEX H: Complied Student Requirements</strong> prepared by personnel-in-charge.',
                                ];
                            ?>
                            <?php for($i = 1; $i <= count($attachmentLabels); $i++): ?>
                                <?php
                                    $attachmentField = "attachment{$i}_path";
                                ?>
                                <tr>
                                    <td><?php echo e($i); ?></td>
                                    <td><?php echo $attachmentLabels[$i - 1]; ?></td>
                                    <td>
                                        <?php if(!empty($submission->$attachmentField)): ?>
                                            <a href="<?php echo e(url('attachments/' . basename($submission->$attachmentField))); ?>" class="attachment-link" target="_blank">
                                                View Attachment
                                            </a>
                                        <?php else: ?>
                                            Not provided
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endfor; ?>
                        </tbody>
                    </table>
                </ul>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/offcampuseval/annexashow.blade.php ENDPATH**/ ?>