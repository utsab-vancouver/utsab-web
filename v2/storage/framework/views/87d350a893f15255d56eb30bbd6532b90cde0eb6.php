<?php $__env->startSection('content'); ?>
<div class="breadcrumbs">
    <div class="container">
        <h1 class="pull-left"><?php echo e($gallery->gallery_name); ?></h1>
         <ul class="pull-right breadcrumb">
            <li><a href="<?php echo e(url()->previous()); ?>">Back Gallery</a></li>
        </ul>
    </div>
    <!--/container-->
</div>
<!-- container content -->
<div class="container content">
    <?php
        $galleryLists = explode(',', $gallery->image);

    ?>
        <div class="row  margin-bottom-30">
            <?php $__currentLoopData = $galleryLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $galleryList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-3 sm-margin-bottom-30">
                <a href="<?php echo e(url('uploads/gallery/'.$gallery->gallery_name.'/group/'.$galleryList)); ?>" rel="gallery2" class="fancybox img-hover-v1" title="Durga Puja 2012">
                    <span><img class="img-responsive" src="<?php echo e(url('uploads/gallery/'.$gallery->gallery_name.'/group/'.$galleryList)); ?>" alt="Durga Puja 2012"></span>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
<!-- End container content -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.sites', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>