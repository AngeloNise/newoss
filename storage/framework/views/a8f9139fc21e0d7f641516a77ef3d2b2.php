

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/ocaeval/annexa.css')); ?>">

<div class="oca-container">
    <a href="/Off-Campus-Activity-SF" class="btn btn-primary">Back</a>
    <a href="<?php echo e(route('org.auth.sidebar.offcampus.edit', $submission->id)); ?>" class="btn btn-warning">Edit</a><!-- Edit Button -->
    <h2>Evaluation Details</h2>

    <h3 class="info-title">Activity Details</h3>
    <table class="table activity-table">
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
                <td><?php echo e($submission->name_of_activity ?? 'N/A'); ?></td>
                <td><?php echo e($submission->place_of_activity ?? 'N/A'); ?></td>
                <td><?php echo e($submission->start_date ?? 'N/A'); ?></td>
                <td><?php echo e($submission->end_date ?? 'N/A'); ?></td>
                <td><?php echo e($submission->number_of_participants ?? 'N/A'); ?></td>
                <td><?php echo e($submission->campus_college_org ?? 'N/A'); ?></td>
            </tr>
        </tbody>
    </table>

    <div class="attachments">
        <h3 class="attachments-title">Attachments</h3>
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
    </div>

    <div class="comments">
        <h3>Comments</h3>
        <?php if($submission->comments->isEmpty()): ?>
            <p>No comments available.</p>
        <?php else: ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Section</th>
                        <th>Comment</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $submission->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($comment->section ?? 'N/A'); ?></td>
                            <td><?php echo e($comment->comment ?? 'N/A'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/offcampus/oca-evaluation-detail.blade.php ENDPATH**/ ?>