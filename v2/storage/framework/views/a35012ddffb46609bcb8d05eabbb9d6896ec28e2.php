<?php $__env->startSection('content'); ?>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Puja')); ?></div>

                <div class="card-body">
                	<?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                	<?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form method="POST" action="<?php echo e(route('save-puja')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="puja_name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Puja Name')); ?></label>

                            <div class="col-md-6">
                                <input id="puja_name" type="text" class="form-control<?php echo e($errors->has('puja_name') ? ' is-invalid' : ''); ?>" name="puja_name" value="<?php echo e(old('puja_name')); ?>" required autofocus>

                                <?php if($errors->has('puja_name')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('puja_name')); ?></strong>
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
                <div class="card-header"><?php echo e(__('Puja List')); ?></div>

                <div class="card-body">

                	<table class="table table-bordered utsab-datatable">
                		<thead>
                			<tr>
                				<th>S/N</th>
                				<th>Puja Name</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php if(isset($pujas)): ?>
                			<?php $__currentLoopData = $pujas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $puja): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                			<tr>
                                <td><?php echo e($key + 1); ?></td>
                				<td><?php echo e($puja->puja_name); ?></td>
                				<td>
                                    <a href="<?php echo e(url('edit-puja').'/'.$puja->id); ?>" class="btn btn-outline-info"><i class="fas fa-edit"></i></a>
                                    <a href="javascript:void(0)" onclick="deletePuja('<?php echo e($puja->id); ?>')" class="btn btn-danger" id="row-<?php echo e($puja->id); ?>"><i class="fas fa-trash"></i></a>
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
    function deletePuja(id) {
        var con = confirm('Do you want to delete this puja? If you delete this puja then it\'s related data will be deleted.');
        if(con){
            $.ajax({
                url:'<?php echo e(url("delete-puja")); ?>',
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
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>