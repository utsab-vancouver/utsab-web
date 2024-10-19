<?php $__env->startSection('content'); ?>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Slider')); ?></div>

                <div class="card-body">
                	<?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                	<?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form method="POST" action="<?php echo e(url('save-slider')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Slider Image')); ?></label>

                            <div class="col-md-6">
                                <input id="slider_image" type="file" class="form-control<?php echo e($errors->has('slider_image') ? ' is-invalid' : ''); ?>" name="slider_image" value="<?php echo e(old('slider_image')); ?>" required autofocus>

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
                                    <?php echo e(__('Save')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12" style="margin-top: 30px;">
            <div class="card">
                <div class="card-header"><?php echo e(__('Slider List')); ?></div>

                <div class="card-body">
                	<table class="table table-bordered utsab-datatable">
                		<thead>
                			<tr>
                				<th>Slider Image</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php if(isset($sliders)): ?>
                			<?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                			<tr>
                				<td class="text-center">
                					<img height="100" width="250" src="<?php echo e(asset('uploads/slider').'/'.$slider->slider_image); ?>">
                				</td>
                				<td>
                                    <a href="javascript:void(0)" onclick="checkStatus('<?php echo e($slider->id); ?>')" class="btn btn-<?php echo e(($slider->is_active == 1)?'primary':'secondary'); ?>" id="row-<?php echo e($slider->id); ?>"><i class="fas fa-check-circle"></i></a>
                                    <input type="hidden" name="status" value="<?php echo e($slider->is_active); ?>" id="status-<?php echo e($slider->id); ?>">
                                    <a href="<?php echo e(url('edit-slider').'/'.$slider->id); ?>" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" onclick="deleteSlider(<?php echo e($slider->id); ?>)" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                			</tr>
                			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                			<?php endif; ?>
                		</tbody>
                	</table>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function deleteSlider(id) {
        var con = confirm('Do you want to delete this image?');
        if(con){
            $.ajax({
                url:'<?php echo e(url("delete-slider")); ?>',
                method:'POST',
                data: {'id': id},
                success: function (response){
                    if(response == 1){
                        alert('Request completed successfully.')
                        $("#row-"+id).parent().parent().remove();
                    }else {
                        alert('Request failed!!')
                    }
                }
            });
        }
    }

    function checkStatus(id) {
        var is_active = $("#status-"+id).val();
        var con  = confirm('Do you want to change this status?')
        if(con){
            $.ajax({
                url:'<?php echo e(url("slider-status")); ?>',
                method:'POST',
                data:{'id':id, 'is_active':is_active},
                success: function (response) {
                    if(response == 1){
                        var sts = (is_active == 1)?0:1;
                        alert('Request completed successfully.');
                        if(is_active == 1){
                            $("#status-"+id).val(sts);                            
                            $("#row-"+id).removeClass('btn-primary').addClass('btn-secondary');
                        }else {
                            $("#status-"+id).val(sts);                            
                            $("#row-"+id).removeClass('btn-secondary').addClass('btn-primary');
                        }
                    }else {
                        alert('Request failed!!');
                    }
                }
            });
        }
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>