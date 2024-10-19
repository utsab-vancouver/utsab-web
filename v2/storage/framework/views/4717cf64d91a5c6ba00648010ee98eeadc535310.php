<?php $__env->startSection('content'); ?>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Executive Committee')); ?></div>

                <div class="card-body">
                	<?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                	<?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form method="POST" action="<?php echo e(url('save-executive-committee')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Name')); ?></label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                                <?php if($errors->has('name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Image')); ?></label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control<?php echo e($errors->has('image') ? ' is-invalid' : ''); ?>" name="image" value="<?php echo e(old('image')); ?>" autofocus>

                                <?php if($errors->has('image')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('image')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Title')); ?></label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" name="title" value="<?php echo e(old('title')); ?>" autofocus>

                                <?php if($errors->has('title')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
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
                                <th>S/N</th>
                                <th>Name</th>
                                <th>Image</th>
                				<th>Title</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php if(isset($executives)): ?>
                			<?php $__currentLoopData = $executives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $executive): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                			<tr>
                                <td><?php echo e($key + 1); ?></td>
                                <td><?php echo e($executive->name); ?></td>
                                <td class="text-center">
                                    <?php if($executive->image == NULL || $executive->image == ''): ?>
                                    <img height="130" width="100" src="<?php echo e(asset('backend/img/no-image.png')); ?>">
                                    <?php else: ?>
                                    <img height="130" width="100" src="<?php echo e(asset('uploads/executive').'/'.$executive->image); ?>">
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($executive->title); ?></td>
                				<td>
                                    <a href="javascript:void(0)" onclick="checkStatus('<?php echo e($executive->id); ?>')" class="btn btn-<?php echo e(($executive->is_active == 1)?'primary':'secondary'); ?>" id="row-<?php echo e($executive->id); ?>"><i class="fas fa-check-circle"></i></a>
                                    <input type="hidden" name="status" value="<?php echo e($executive->is_active); ?>" id="status-<?php echo e($executive->id); ?>">
                                    <a href="<?php echo e(url('edit-executive').'/'.$executive->id); ?>" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" onclick="deleteExecutive('<?php echo e($executive->id); ?>')" class="btn btn-danger"><i class="fas fa-trash"></i></a>
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
    function deleteExecutive(id) {
        var con = confirm('Do you want to delete this?');
        if(con){
            $.ajax({
                url:'<?php echo e(route("delete-executive")); ?>',
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
                url:'<?php echo e(route("executive-status")); ?>',
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