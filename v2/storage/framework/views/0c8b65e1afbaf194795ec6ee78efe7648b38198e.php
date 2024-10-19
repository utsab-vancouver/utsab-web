<?php $__env->startSection('content'); ?>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Slider')); ?></div>

                <div class="card-body">
                	<?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                	<?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form method="POST" action="<?php echo e(url('update-slider')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" value="<?php echo e($slider->id); ?>">

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Slider Image')); ?></label>

                            <div class="col-md-6">
                                <img height="100" width="150" src="<?php echo e(url('uploads/slider/'.$slider->slider_image)); ?>" style="margin-bottom: 20px;">
                                <br />
                                <input type="hidden" name="slider_image_old" value="<?php echo e($slider->slider_image); ?>">
                                <input id="slider_image" type="file" class="form-control<?php echo e($errors->has('slider_image') ? ' is-invalid' : ''); ?>" name="slider_image" value="<?php echo e(old('slider_image')); ?>">

                                <?php if($errors->has('slider_image')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('slider_image')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Update')); ?>

                                </button>

                                <a href="<?php echo e(url()->previous()); ?>" class="btn btn-primary">
                                    <?php echo e(__('Back')); ?>

                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>