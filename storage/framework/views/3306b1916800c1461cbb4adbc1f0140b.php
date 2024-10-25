

<?php $__env->startSection('content'); ?>
<div class="suggestion-container">
    <h2>Add Suggestion for FRA <?php echo e($application->name_of_project); ?></h2>
    
    <!-- First Form: Status Update -->
    <form id="status-update-form" action="<?php echo e(route('dean.fra-a-evaluation.update-status', $application->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="status">Update Status</label>
            <select name="new_status" id="status" class="form-control" required>
                <option value="" disabled selected>Select new status</option>
                <option value="Pending Approval" <?php echo e($application->status === 'Pending Approval' ? 'selected' : ''); ?>>Pending Approval</option>
                <option value="Approved" <?php echo e($application->status === 'Approved' ? 'selected' : ''); ?>>Approved</option>
                <option value="Returned" <?php echo e($application->status === 'Returned' ? 'selected' : ''); ?>>Returned</option>
            </select>
        </div>
    </form>

    <!-- Second Form: Suggestions -->
    <form id="suggestions-form" action="<?php echo e(route('dean.fra-a-evaluation.store-suggestion', $application->id)); ?>" method="POST">

        <?php echo csrf_field(); ?>
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

<script src="<?php echo e(asset('js/faculty/dean/annexasuggestion.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.deanlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/dean/auth/fra-a-evaluation-suggestion.blade.php ENDPATH**/ ?>