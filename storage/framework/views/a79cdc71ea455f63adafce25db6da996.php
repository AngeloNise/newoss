

<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/orgs/pdf/evalpdf.css')); ?>">
<div class="fra-container mt-4">
    <h2>Your Submitted Forms</h2>
    <br><br>

          <h3>Off-Campus Applications</h3>

        <?php if($offCampusApplications->isEmpty()): ?>
              <p>No Off-Campus applications found.</p>
        <?php else: ?>
              <table class="table table-bordered">
                  <thead>
                      <tr>
                          <th>#</th>
                          <th>Name of Activity</th>
                          <th>Place of Activity</th>
                          <th>Start Date</th>
                          <th>End Date</th>
                          <th>Number of Participants</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php $__currentLoopData = $offCampusApplications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $submission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                              <td><?php echo e($loop->iteration); ?>.</td>
                              <td><?php echo e($submission->name_of_activity); ?></td>
                              <td><?php echo e($submission->place_of_activity); ?></td>
                              <td><?php echo e($submission->start_date); ?></td>
                              <td><?php echo e($submission->end_date); ?></td>
                              <td><?php echo e($submission->number_of_participants); ?></td>
                              <td>
                                  <button onclick="window.location='<?php echo e(route('offcampus.annex.a.show', $submission->id)); ?>'" class="btn btn-primary">View</button>
                              </td>
                          </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </tbody>
              </table>
          <?php endif; ?>
      </div>
      <?php $__env->stopSection(); ?>
      
<?php echo $__env->make('layout.orglayout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\College\oss\resources\views/org/auth/sidebar/offcampusforms.blade.php ENDPATH**/ ?>