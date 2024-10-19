<?php $__env->startSection('content'); ?>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Gallery')); ?></div>

                <div class="card-body">
                	<?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                	<?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form method="POST" action="<?php echo e(url('update-gallery')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="<?php echo e($gallery->id); ?>">
                        <input type="hidden" name="gallery_name_old" value="<?php echo e($gallery->gallery_name); ?>">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Gallery Name')); ?></label>

                            <div class="col-md-6">
                                <input id="gallery_name" type="text" class="form-control<?php echo e($errors->has('gallery_name') ? ' is-invalid' : ''); ?>" name="gallery_name" value="<?php echo e($gallery->gallery_name); ?>" required autofocus>

                                <?php if($errors->has('gallery_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('gallery_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12 text-center" style="margin-bottom: 20px;">
                                <label>Old Image</label>
                                <input type="hidden" name="gallery_image_old" value="<?php echo e($gallery->gallery_image); ?>">
                                <br />
                                <img height="100" width="100" src="<?php echo e(asset('uploads/gallery').'/'.$gallery->gallery_name.'/'.$gallery->gallery_image); ?>">
                            </div>
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Gallery Title Image')); ?></label>
                            <div class="col-md-6">
                                <input id="gallery_image" type="file" class="form-control<?php echo e($errors->has('gallery_image') ? ' is-invalid' : ''); ?>" name="gallery_image" value="<?php echo e(old('gallery_image')); ?>" autofocus>

                                <?php if($errors->has('gallery_image')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('gallery_image')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    <?php echo e(__('Update')); ?>

                                </button>
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