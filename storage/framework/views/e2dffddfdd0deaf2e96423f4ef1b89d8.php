
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
    <div class="fra-group">
        <label for="search_organization">Search Organization for FRA(only)</label>
        <input type="text" id="search_organization" class="form-control" placeholder="Type to search organization...">
        <ul id="organization_list" class="list-group" style="display: none;"></ul>
    </div>
    <form action="<?php echo e(url('/faculty/Application')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <h2>CREATE APPLICATION</h2>
        <div class="fill-up-container">
            <div class="fra-group">
                <label for="name_of_project">Name of Project/Activity</label>
                <input type="text" id="name_of_project" name="name_of_project" class="form-control" required>
            </div>

            <div class="fra-group">
                <label for="proposed_activity">Proposed Activity</label>
                <select id="proposed_activity" name="proposed_activity" class="form-control" required>
                    <option value="">Select Proposed Activity</option>
                    <option value="Off Campus">Off Campus</option>
                    <option value="In Campus">In Campus</option>
                    <option value="Fund Raising">Fund Raising</option>
                </select>
            </div>

            <div id="duration">
                <div class="split">
                    <div class="fra-group">
                        <label for="start_date">Start Date</label>
                        <input type="date" id="start_date" name="start_date" class="form-control" value="<?php echo e(old('start_date')); ?>" required>
                        <?php $__errorArgs = ['start_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="fra-group">
                        <label for="end_date">End Date</label>
                        <input type="date" id="end_date" name="end_date" class="form-control" value="<?php echo e(old('end_date')); ?>" required>
                        <?php $__errorArgs = ['end_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
            </div>

            <div class="fra-group">
                <select id="name_of_organization" name="name_of_organization" class="form-control select2" required>
                    <option value="">Select Organization</option>
                    <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($organization); ?>"><?php echo e($organization); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="fra-group">
                <label for="college_branch">College Branch</label>
                <input type="text" id="college_branch" name="college_branch" class="form-control" required>
            </div>

            <div class="fra-group">
                <label for="total_estimated_income">Total Estimated Income</label>
                <input type="text" id="total_estimated_income" name="total_estimated_income" class="form-control" required>
            </div>

            <div class="fra-group">
                <label for="place_of_activity">Place of Activity</label>
                <input type="text" id="place_of_activity" name="place_of_activity" class="form-control">
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        // Search organization
        $('#search_organization').on('keyup', function() {
            var query = $(this).val();
            if (query.length > 0) {
                $.ajax({
                    url: "<?php echo e(route('faculty.search.organization')); ?>", // Adjust to your route
                    method: "GET",
                    data: { query: query },
                    success: function(data) {
                        $('#organization_list').html(data).show();
                    }
                });
            } else {
                $('#organization_list').hide();
            }
        });
        // Select organization from the list
        $(document).on('click', '.organization-item', function() {
            var organizationData = $(this).data('organization');
            
            $('#search_organization').val(organizationData.requesting_organization);
            $('#name_of_organization').val(organizationData.requesting_organization);
            $('#name_of_project').val(organizationData.name_of_project); // Ensure this field is populated
            $('#college_branch').val(organizationData.college_branch); // Ensure this field is populated
            $('#total_estimated_income').val(organizationData.total_estimated_income); // Ensure this field is populated
            $('#start_date').val(organizationData.start_date);
            $('#end_date').val(organizationData.end_date);
            
            $('#organization_list').hide();

            $(document).ready(function() {
                $('.select2').select2({
                    placeholder: "Select Organization",
                    allowClear: true
                });
            });

        });


        // Close the organization list on outside click
        $(document).click(function(event) {
            if (!$(event.target).closest('#search_organization, #organization_list').length) {
                $('#organization_list').hide();
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.adminlayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/faculty/auth/createapp/application.blade.php ENDPATH**/ ?>