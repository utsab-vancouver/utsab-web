<?php $__env->startSection('content'); ?>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Puja Schedule')); ?></div>

                <div class="card-body">
                	<?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                	<?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form method="POST" action="<?php echo e(route('update-puja-schedule')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <input type="hidden" name="id" value="<?php echo e($puja_schedule->id); ?>">
                        
                        <div class="form-group row">
                            <label for="puja_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Puja Name')); ?></label>

                            <div class="col-md-6">
                                <select name="puja_name" class="form-control">
                                    <option value="">Select one</option>
                                    <?php if($pujas): ?>
                                    <?php $__currentLoopData = $pujas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $puja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($puja->id); ?>" <?php echo e(($puja_schedule->puja_id == $puja->id)?'selected':''); ?>><?php echo e($puja->puja_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="event_name
                            " class="col-md-4 col-form-label text-md-right"><?php echo e(__('Event')); ?></label>

                            <div class="col-md-6">
                                <input id="event_name" type="text" class="form-control<?php echo e($errors->has('event_name') ? ' is-invalid' : ''); ?>" name="event_name" value="<?php echo e($puja_schedule->event_name); ?>" required autofocus>

                                <?php if($errors->has('event_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('event_name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Date')); ?></label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control<?php echo e($errors->has('date') ? ' is-invalid' : ''); ?>" name="date" value="<?php echo e($puja_schedule->date); ?>" required autofocus>

                                <?php if($errors->has('date')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('date')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="timings" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Timings')); ?></label>

                            <div class="col-md-6">
                                <input id="timings" type="text" class="form-control<?php echo e($errors->has('timings') ? ' is-invalid' : ''); ?>" name="timings" value="<?php echo e($puja_schedule->timings); ?>" required autofocus>

                                <?php if($errors->has('timings')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('timings')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="activities" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Activities')); ?></label>

                            <div class="col-md-6">
                                <input id="activities" type="text" class="form-control<?php echo e($errors->has('activities') ? ' is-invalid' : ''); ?>" name="activities" value="<?php echo e($puja_schedule->activities); ?>" required autofocus>

                                <?php if($errors->has('activities')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('activities')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="prasadam" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Prasadam')); ?></label>

                            <div class="col-md-6">
                                <input id="prasadam" type="text" class="form-control<?php echo e($errors->has('prasadam') ? ' is-invalid' : ''); ?>" name="prasadam" value="<?php echo e($puja_schedule->prasadam); ?>" required autofocus>

                                <?php if($errors->has('prasadam')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('prasadam')); ?></strong>
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