<?php $__env->startSection('content'); ?>

<!-- Management Team -->
<div class="bg-color-light">
    <div class="container content-md" style="padding-top: 40px;">
        <div class="row team-v5">
            <div class="headline">
                <h2>Executive Committee (2018-2019)</h2>
            </div>
            <div class="col-md-12">
                <p>Utsab executive committee is formed every year during an annual general meeting, which is announced and conveyed to all existing members. The executive committee is formed of the following members:-</p>
            </div>
            <?php if(isset($executives)): ?>
            <?php $__currentLoopData = $executives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $executive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-3 col-sm-6 margin-top-20">
                <div class="team-v2 no-margin-bottom">
                     <?php if($executive->image == NULL || $executive->image == ''): ?>
                    <img class="img-responsive" src="<?php echo e(asset('backend/img/no-image.png')); ?>" alt="photo">
                    <?php else: ?>
                    <img class="img-responsive" src="<?php echo e(asset('uploads/executive').'/'.$executive->image); ?>" alt="photo">
                    <?php endif; ?>

                    
                    <div class="inner-team">
                        <h3><?php echo e($executive->name); ?></h3>
                        <small class="color-green"><?php echo e($executive->title); ?></small>
                        <hr>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            
        </div>
        <!--/end team v5-->
    </div>
</div>
<!-- End Management Team -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sites', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>