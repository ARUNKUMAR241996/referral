

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Dashboard')); ?></div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
<h3>Welcome to Admin Dashboard</h3>
                    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Referral code</th>
      <th scope="col">Points</th>
    </tr>
  </thead>
  <tbody>
    <?php if(count($users)<=0): ?>
    <tr>
        <td style="text-align: center;" colspan="5">"no records found"</td>
    </tr>
        
    <?php endif; ?>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
      <th scope="row"><?php echo e(($users->currentpage() - 1) * $users->perpage() + $loop->index + 1); ?></th>
      <td><?php echo e($user->name); ?></td>
      <td><?php echo e($user->email); ?></td>
      <td><?php echo e($user->referral_code); ?></td>
      <td><?php echo e($user->points); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
   
  </tbody>
</table>
<?php echo e($users->links('pagination::bootstrap-4')); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\interview2\referral\resources\views/adminhome.blade.php ENDPATH**/ ?>