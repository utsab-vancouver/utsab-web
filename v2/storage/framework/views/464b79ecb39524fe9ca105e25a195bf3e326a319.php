<?php $__env->startSection('content'); ?>
	<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><?php echo e(__('Gallery')); ?></div>

                <div class="card-body">
                	<?php echo $__env->make('admin.includes.message', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                	<?php echo $__env->make('admin.includes.errors', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <form method="POST" action="<?php echo e(url('save-gallery-multiple-image')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Gallery')); ?></label>

                            <div class="col-md-6">
                                <select name="gallery" class="form-control">
                                    <option value="">Select one</option>
                                    <?php if($galleriess): ?>
                                    <?php $__currentLoopData = $galleriess; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($gallery->id); ?>"><?php echo e($gallery->gallery_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><?php echo e(__('Gallery Group Image')); ?></label>

                            <div class="col-md-6">
                                <input id="gallery_group_image" type="file" multiple class="form-control" name="gallery_group_image[]">
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
                <div class="card-header"><?php echo e(__('Gallery List')); ?></div>

                <div class="card-body">
                	<table class="table table-bordered utsab-datatable">
                		<thead>
                			<tr>
                				<th>Gallery Name</th>
                				<th>No. of Image</th>
                				<th>Action</th>
                			</tr>
                		</thead>
                		<tbody>
                			<?php if(isset($galleries)): ?>
                			<?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                			<tr>
                				<td><?php echo e($gallery->gallery_name); ?></td>
                				<td>
                                    <?php
                                    $images = explode(',', $gallery->image);
                                    ?>
                                    <?php echo e(count($images)); ?>

                                    <ul class="list-group">
                                    </ul>
                				</td>
                				<td><a href="javascript:void(0)" onclick="deleteGroupGallery(<?php echo e($gallery->id); ?>)" class="btn btn-danger" id="row-<?php echo e($gallery->id); ?>"><i class="fas fa-trash"></i></a></td>
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
    function deleteGroupGallery(id) {
        var con = confirm('Do you want to delete this?')
        if(con){
            $.ajax({
                url:'<?php echo e(url("delete-group-gallery")); ?>',
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