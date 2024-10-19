<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left">Gallery</h1>
    </div>
    <!--/container-->
</div>
<!-- container content -->
<div class="container">
    <div class="row margin-top-20">
        <?php if(isset($galleries)): ?>
        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-sm-3">
            <div class="caption-overlay">
                <figure><a href="<?php echo e(url('gallery-show'.'/'.$gallery->id)); ?>"><img class="img-responsive img-thumbnail" src="<?php echo e(url('uploads/gallery/'.$gallery->gallery_name.'/'.$gallery->gallery_image)); ?>" alt=""> </a></figure>
                <div class="caption bottom-right">
                    <div class="title">
                        <h3 class="main-title layer"><?php echo e($gallery->gallery_name); ?></h3>
                    </div>
                    <!--/.title -->
                </div>
                <!--/.caption -->
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
        
    </div>
</div>
<!-- End container content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sites', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>